<?php

namespace App\Http\Controllers\Backend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view("backend.home.index");
    }
}
