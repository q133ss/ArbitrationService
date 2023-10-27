<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Number;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallsController extends Controller
{
    public function index()
    {
        $numbers = Number::whereIn(
            'offer_id', Offer::where('advertiser_id', Auth()->id())->pluck('id')->all()
        )->pluck('id')->all();
        $calls = DB::table('numbers_calls')
            ->select('*')
            ->whereIn('number_id', $numbers)
            ->orderBy('created_at')
            ->get();
        return view('advertiser.calls', compact('calls'));
    }
}
