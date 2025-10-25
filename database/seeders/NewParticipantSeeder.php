<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewParticipantSeeder extends Seeder
{
    public function run(): void
    {
        $participants = [
            [
                'name' => 'Aditotoro',
                'is_new' => true,
                'twitch_username' => 'aditotoro',
                'youtube_url' => 'https://www.youtube.com/@aditotoro',
                'twitch_url' => 'https://www.twitch.tv/aditotoro',
            ],
            [
                'name' => 'Bonjwa',
                'is_new' => true,
                'twitch_username' => 'bonjwa',
                'youtube_url' => 'https://www.youtube.com/@bonjwade',
                'twitch_url' => 'https://www.twitch.tv/bonjwa',
            ],
            [
                'name' => 'Dimeax',
                'is_new' => true,
                'twitch_username' => 'dimeax',
                'youtube_url' => 'https://www.youtube.com/@dimeaxspeedruns',
                'twitch_url' => 'https://www.twitch.tv/dimeax',
            ],
            [
                'name' => 'EliasN97',
                'is_new' => true,
                'twitch_username' => 'eliasn97',
                'youtube_url' => 'https://www.youtube.com/@EligellaYT',
                'twitch_url' => 'https://www.twitch.tv/eliasn97',
            ],
            [
                'name' => 'iNoiizY',
                'is_new' => true,
                'twitch_username' => 'inoiizy',
                'youtube_url' => 'https://www.youtube.com/@iNoiizY',
                'twitch_url' => 'https://www.twitch.tv/inoiizy',
            ],
            [
                'name' => 'KubaFPS',
                'is_new' => true,
                'twitch_username' => 'kubafps',
                'youtube_url' => 'https://www.youtube.com/@kubafps',
                'twitch_url' => 'https://www.twitch.tv/kubafps',
            ],
            [
                'name' => 'LukeUCraft',
                'is_new' => true,
                'twitch_username' => 'lukeucraft',
                'youtube_url' => 'https://www.youtube.com/@lukeucraft',
                'twitch_url' => 'https://www.twitch.tv/lukeucraft',
            ],
            [
                'name' => 'Maudado',
                'is_new' => true,
                'twitch_username' => 'maudado',
                'youtube_url' => 'https://www.youtube.com/@maudado',
                'twitch_url' => 'https://www.twitch.tv/maudado',
            ],
            [
                'name' => 'metashi12',
                'is_new' => true,
                'twitch_username' => 'metashi12',
                'youtube_url' => 'https://www.youtube.com/@metashi12',
                'twitch_url' => 'https://www.twitch.tv/metashi12',
            ],
            [
                'name' => 'MontanaBlack',
                'is_new' => true,
                'twitch_username' => 'montanablack88',
                'youtube_url' => 'https://www.youtube.com/@MontanaBlack88',
                'twitch_url' => 'https://www.twitch.tv/montanablack88',
            ],
            [
                'name' => 'Nicistemmler',
                'is_new' => true,
                'twitch_username' => 'nicistemmler',
                'youtube_url' => null,
                'twitch_url' => 'https://www.twitch.tv/nicistemmler',
            ],
            [
                'name' => 'NiklasWilson',
                'is_new' => true,
                'twitch_username' => 'niklaswilson',
                'youtube_url' => 'https://www.youtube.com/@NiklasWilson',
                'twitch_url' => 'https://www.twitch.tv/niklaswilson',
            ],
            [
                'name' => 'Paul Frege',
                'is_new' => true,
                'twitch_username' => 'paulfrege',
                'youtube_url' => 'https://www.youtube.com/@paulfrege',
                'twitch_url' => 'https://www.twitch.tv/paulfrege',
            ],
            [
                'name' => 'PietSmiet',
                'is_new' => true,
                'twitch_username' => 'pietsmiet',
                'youtube_url' => 'https://www.youtube.com/@pietsmiet',
                'twitch_url' => 'https://www.twitch.tv/pietsmiet',
            ],
            [
                'name' => 'Platin',
                'is_new' => true,
                'twitch_username' => 'platin',
                'youtube_url' => 'https://www.youtube.com/@Platin',
                'twitch_url' => 'https://www.twitch.tv/platin',
            ],
            [
                'name' => 'ROSEMONDY',
                'is_new' => true,
                'twitch_username' => 'rose_mondy',
                'youtube_url' => 'https://www.youtube.com/@rose_mondy',
                'twitch_url' => 'https://www.twitch.tv/rose_mondy',
            ],
            [
                'name' => 'SidneyEweka',
                'is_new' => true,
                'twitch_username' => 'sidneyeweka',
                'youtube_url' => null,
                'twitch_url' => 'https://www.twitch.tv/sidneyeweka',
            ],
            [
                'name' => 'SYou',
                'is_new' => true,
                'twitch_username' => 'syou',
                'youtube_url' => 'https://www.youtube.com/@syou',
                'twitch_url' => 'https://www.twitch.tv/syou',
            ],
            [
                'name' => 'Varion',
                'is_new' => true,
                'twitch_username' => 'varion',
                'youtube_url' => 'https://www.youtube.com/@Varion',
                'twitch_url' => 'https://www.twitch.tv/varion',
            ],
        ];

        foreach ($participants as $participantData) {
            Participant::create([
                'id' => Str::uuid(),
                'name' => $participantData['name'],
                'is_new' => $participantData['is_new'],
                'twitch_username' => $participantData['twitch_username'],
                'youtube_url' => $participantData['youtube_url'],
                'twitch_url' => $participantData['twitch_url'],
            ]);
        }
    }
}