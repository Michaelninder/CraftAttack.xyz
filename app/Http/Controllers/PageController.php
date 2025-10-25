<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Clip, Participant};

class PageController extends Controller
{
    public function lander()
    {
        $stats = [
            'user_count' => User::count(),
            'clip_count' => Clip::count(),
            'participant_count' => Participant::count(),
        ];
        return view('pages.lander', compact('stats'));
    }
}
