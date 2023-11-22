<?php

namespace App\Http\Controllers;

class ListController extends Controller
{

    public function profile()
    {
        return view("profile.edit");
    }

    public function coba()
    {
        return view("home.coba");
    }

    public function home()
    {
        return view("home.home");
    }
}
