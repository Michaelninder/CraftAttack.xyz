<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $participants = [
            // [
            //     'name' => 'test',
            //     'pfp_path' => 'test',
            //     'is_new' => false,
            //     'twitch_username' => 'test',
            //     'youtube_url' => 'test',
            //     'twitch_url' => 'test',
            // ],
        ];

        foreach ($participants as $participant) {
            Participant::create($participant);
        }
    }
}
