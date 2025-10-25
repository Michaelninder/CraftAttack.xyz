<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Participant extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'name',
        'pfp_path',
        'is_new',
        'twitch_username',
        'youtube_url',
        'twitch_url',
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

    public function getPfp()
    {
        if ($this->pfp_path) {
            if (Str::startsWith($this->pfp_path, 'http://') || Str::startsWith($this->pfp_path, 'https://')) {
                return $this->pfp_path;
            }
            return Storage::url($this->pfp_path);
        }
        return "https://static-cdn.jtvnw.net/jtv_user_pictures/f1ca6bd1-7b29-424b-ad72-9aa2d5327c35-profile_image-70x70.png";
    }

    public function getLiveState(): bool
    {
        if (!$this->twitch_username) {
            return false;
        }

        $cacheKey = 'participant_live_state_' . $this->id;
        $cacheDuration = now()->addMinutes(rand(9,19));

        return Cache::remember($cacheKey, $cacheDuration, function () {
            $clientId = config('services.twitch.client_id');
            $clientSecret = config('services.twitch.client_secret');

            if (!$clientId || !$clientSecret) {
                return false;
            }

            $tokenResponse = Http::asForm()->post('https://id.twitch.tv/oauth2/token', [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'grant_type' => 'client_credentials',
            ]);

            $accessToken = $tokenResponse->json('access_token');

            if (!$accessToken) {
                return false;
            }

            $streamResponse = Http::withHeaders([
                'Client-ID' => $clientId,
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get('https://api.twitch.tv/helix/streams', [
                'user_login' => $this->twitch_username,
            ]);

            return !empty($streamResponse->json('data'));
        });
    }
}