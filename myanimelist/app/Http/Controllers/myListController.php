<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myListController extends Controller
{
    public function index(){
        return view("mylist.mylist");
    }
}
