<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Clip extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'twitch_clip_id',
        'title',
        'embed_url',
        'thumbnail_url',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(
            User::class,
            'clip_user_likes',
            'clip_id',
            'user_id',
        )->withTimestamps();
    }

    public function getThumbnail(): string
    {
        return Cache::remember(
            "clip_thumbnail_{$this->twitch_clip_id}",
            now()->addHours(24),
            function () {
                try {
                    $client = new Client();
                    $clientId = config('services.twitch.client_id');
                    $appAccessToken = User::get()->twitch_token;

                    if (! $clientId || ! $appAccessToken) {
                        throw new \Exception(
                            'Twitch Client ID or App Access Token missing.',
                        );
                    }

                    $response = $client->get(
                        'https://api.twitch.tv/helix/clips',
                        [
                            'headers' => [
                                'Client-ID' => $clientId,
                                'Authorization' => "Bearer {$appAccessToken}",
                            ],
                            'query' => [
                                'id' => $this->twitch_clip_id,
                            ],
                        ],
                    );

                    $data = json_decode(
                        $response->getBody()->getContents(),
                        true,
                    );

                    if (
                        isset($data['data'][0]['thumbnail_url']) &&
                        $data['data'][0]['thumbnail_url']
                    ) {
                        return $data['data'][0]['thumbnail_url'];
                    }
                } catch (\Exception $e) {
                }

                return 'https://static-cdn.jtvnw.net/jtv_user_pictures/71b0f0fc-f38a-4ad8-9d78-46a688ac87a4-profile_image-70x70.png';
            },
        );
    }
}