<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionTestController extends Controller
{
    public function index(Request $request)
    {
        // Get all session data
        $sessionData = [
            'all_session_data' => session()->all(),
            'user' => auth()->user(),
            'is_authenticated' => auth()->check(),
            'session_id' => session()->getId(),
            'last_activity' => session('last_activity'),
            'token' => session('_token'),
        ];

        return view('session-test', compact('sessionData'));
    }
}