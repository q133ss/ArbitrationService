<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::where('user_id', Auth()->id())->get();
        return view('master.payments', compact('withdraws'));
    }
}
