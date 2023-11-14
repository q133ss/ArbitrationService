<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        //получаем все офферы юзера
        // получаем по ним инфу
        $user = Auth()->user();

        $offers = $user->offers;
        $calls = DB::table('numbers_calls')->whereIn('number_id', $user->numbers->pluck('id')->all())->get();
        $leads = Lead::whereIn('offer_id', $offers->pluck('id')->all())->get();

        $data = [];

        foreach ($offers as $key => $offer){
            $data[$key]['offer'] = ['name' => $offer->name, 'id' => $offer->id];

            $data[$key]['calls'] = $calls->where('number_id',
                $user->numbers->where('offer_id', $offer->id)->pluck('id')->first())
                ->count();

            $data[$key]['leads'] = $leads->where('offer_id', $offer->id)->count();
            $data[$key]['cancels'] = $leads->where('offer_id', $offer->id)->where('status', 'cancel')->count();


//            $hold = $offer->price *
//                $calls->where('number_id',
//                    $user->numbers->where('offer_id', $offer->id)->pluck('id')->first()
//                )->count();
            $holdCalls = DB::table('numbers_calls')->whereIn('number_id', function ($query) use ($offer, $user){
                return $query->select('id')
                    ->from('numbers')
                    ->where('offer_id', $offer->id)
                    ->where('user_id', $user->id)
                    ->get();
            })->where('approved', 1)
            ->count();
            $holdLeads = Lead::where('offer_id', $offer->id)->where('master_id', $user->id)->where('status', 'hold')->count();

            $holdSum = $holdCalls + $holdLeads;

            $hold = $holdSum * $offer->price;

            //ждоин оффер прайс


//            $hold += $offer->price * $leads->where('offer_id', $offer->id)->count();

            $data[$key]['hold'] = $hold;
            //холд это лиды + number_calls
            $data[$key]['sum'] = $leads->where('offer_id', $offer->id)->where('status', 'accept')->count() * $offer->price; //принятые лиды на прйс
        }
        return view('master.statistics', compact('data'));
    }
}
