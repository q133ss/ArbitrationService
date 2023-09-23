<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        return view('master.offers.index', compact('offers'));
    }

    public function show(int $id)
    {
        $offer = Offer::findOrFail($id);
        return view('master.offers.show', compact('offer'));
    }

    public function request(int $id)
    {
        $offer = Offer::findOrFail($id);

        DB::table('user_offer')->insert([
            'user_id' => Auth()->id(),
            'offer_id' => $offer->id
        ]);

        return to_route('master.offers.index')->withSuccess('Заявка успешно создана');
    }

    public function myOffers()
    {
        $offers = Auth()->User()->offers;
        return view('master.offers.my', compact('offers'));
    }
}
