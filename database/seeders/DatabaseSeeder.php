<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> origin/main
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
    use WithoutModelEvents;

=======
>>>>>>> origin/main
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
