<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::where('advertiser_id', Auth()->id())->orderBy('created_at', 'DESC')->get();
        return view('advertiser.offers.index', compact('offers'));
    }
}
