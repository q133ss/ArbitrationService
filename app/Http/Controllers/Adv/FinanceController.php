<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\UserOperation;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $operations = UserOperation::where('user_id', Auth()->id())->orderBy('id', 'DESC')->get();
        return view('advertiser.finance', compact('operations'));
    }
}
