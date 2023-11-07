<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Offer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::where('approved_to_show', 1)->orderBy('created_at', 'DESC')->get();
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

        // Notifications
        $admins = User::where('role_id', Role::where('tech_name', 'admin')->pluck('id')->first())->pluck('id')->all();
        foreach ($admins as $admin_id){
            (new Notification())->send('Пользователь #'.Auth()->id().' оставил заявку на оффер', $admin_id , $offer->id);
        }

        return to_route('master.offers.index')->withSuccess('Заявка успешно создана');
    }

    public function myOffers()
    {
        $offers = Auth()->User()->offers;
        return view('master.offers.my', compact('offers'));
    }
}
