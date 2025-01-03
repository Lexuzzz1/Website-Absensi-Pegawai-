<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('layouts.master', [
            'user' => $user,
        ]);
    }
}
