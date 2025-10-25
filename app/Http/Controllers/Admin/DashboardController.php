<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clip;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $participantCount = Participant::count();
        $clipCount = Clip::count();

        return view('admin.dashboard.index', compact('userCount', 'participantCount', 'clipCount'));
    }
}
