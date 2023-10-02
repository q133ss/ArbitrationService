<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::orderBy('created_at', 'DESC')->get();
        return view('admin.withdraws.index', compact('withdraws'));
    }
}
