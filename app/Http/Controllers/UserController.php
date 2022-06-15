<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function check()
    {
        // dd('anjing memek ngentot asu');
        //nanti bikin if nokk
        return view('user.dashboard.gformkuisoner.index');
    }
}
