<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
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
}