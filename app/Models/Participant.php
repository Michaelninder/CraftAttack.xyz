<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
}