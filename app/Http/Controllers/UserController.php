<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        return view('layouts.master', [
            'users' => User::all(),
        ]);
    }
}