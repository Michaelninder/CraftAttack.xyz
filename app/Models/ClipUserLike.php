<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClipUserLike extends Model
{
    use HasFactory;

    protected $primaryKey = ['user_id', 'clip_id'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['user_id', 'clip_id'];
}
