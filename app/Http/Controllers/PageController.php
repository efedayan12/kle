<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        return view('anasayfa');
    }

    public function hakkinda()
    {
        return view('hakkinda');
    }
}