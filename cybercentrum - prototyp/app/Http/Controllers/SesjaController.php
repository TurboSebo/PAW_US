<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesjaController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
