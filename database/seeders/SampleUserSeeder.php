<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SampleUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(10)->create();
    }
}