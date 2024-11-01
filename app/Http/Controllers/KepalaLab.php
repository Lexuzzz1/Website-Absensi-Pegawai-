<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaLab extends Controller
{
    public function show(){
        return view("pages.KepalaLab.admin_dashboard");
    }
    public function index(string $page)
    {
        if (view()->exists("pages.KepalaLab.{$page}")) {
            return view("pages.KepalaLab.{$page}");
        }

        return abort(404);
    }
}
