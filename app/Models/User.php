<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'twitch_id',
        'twitch_token',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'twitch_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function clips()
    {
        return $this->hasMany(Clip::class);
    }

    public function likedClips()
    {
        return $this->belongsToMany(
            Clip::class,
            'clip_user_likes',
            'user_id',
            'clip_id',
        )->withTimestamps();
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isMember(): bool
    {
        return $this->role === 'member' || $this->isAdmin();
    }

    public function getAvatar(): string
    {
        if (!$this->twitch_id) {
            return "https://www.gravatar.com/avatar/" .
                md5(strtolower(trim($this->email))) .
                "?d=mp";
        }

        // Cache the avatar URL to avoid hitting the Twitch API on every request
        return Cache::remember(
            "user_avatar_{$this->twitch_id}",
            now()->addHours(1), // Cache for 1 hour
            function () {
                try {
                    $client = new Client();
                    $clientId = config('services.twitch.client_id');
                    $accessToken = $this->twitch_token;

                    if (!$clientId || !$accessToken) {
                        throw new \Exception(
                            "Twitch Client ID or Access Token missing.",
                        );
                    }

                    $response = $client->get(
                        'https://api.twitch.tv/helix/users',
                        [
                            'headers' => [
                                'Client-ID' => $clientId,
                                'Authorization' => "Bearer {$accessToken}",
                            ],
                            'query' => [
                                'id' => $this->twitch_id,
                            ],
                        ],
                    );

                    $data = json_decode($response->getBody()->getContents(), true);

                    if (
                        isset($data['data'][0]['profile_image_url']) &&
                        $data['data'][0]['profile_image_url']
                    ) {
                        return $data['data'][0]['profile_image_url'];
                    }
                } catch (\Exception $e) {
                    //\Log::error("Failed to get Twitch avatar for user " . $this->id . ": " . $e->getMessage());
                }

                return "https://www.gravatar.com/avatar/" .
                    md5(strtolower(trim($this->email))) .
                    "?d=mp";
            },
        );
    }
}