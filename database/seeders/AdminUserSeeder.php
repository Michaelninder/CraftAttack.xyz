<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => (string) Str::uuid(),
            'name' => 'michaelninder',
            'email' => 'f.ternis@xpsystems.eu',
            'email_verified_at' => now(),
            'twitch_id' => '1057386477',
            'twitch_token' => null,
            'role' => 'admin',
        ]);
    }
}