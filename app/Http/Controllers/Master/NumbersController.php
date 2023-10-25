<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NumbersController extends Controller
{
    public function index()
    {
        $numbers = Auth()->user()->numbers;
        return view('master.numbers.index', compact('numbers'));
    }
}
