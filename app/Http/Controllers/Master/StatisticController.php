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


            $hold = $offer->price *
                $calls->where('number_id',
                    $user->numbers->where('offer_id', $offer->id)->pluck('id')->first()
                )->count();


            $hold += $offer->price * $leads->where('offer_id', $offer->id)->count();
            $data[$key]['hold'] = $hold; //сумма холда = колво звонков на прайс
            $data[$key]['sum'] = $leads->where('offer_id', $offer->id)->where('status', 'accept')->count() * $offer->price; //принятые лиды на прйс
        }
        return view('master.statistics', compact('data'));
    }
}
