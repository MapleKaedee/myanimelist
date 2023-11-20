<?php

namespace App\Http\Controllers;

class ListController extends Controller
{
    public function index()
    {
        return view("home.home");
    }

    public function profile()
    {
        return view("profile.edit");
    }
}
