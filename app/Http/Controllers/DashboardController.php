<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Offer;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(Auth()->user()->role->tech_name == 'admin'){
            $data = (new DashboardService())->getAdminData();
            $leads = $data['leads'];
            $sums = $data['sums'];

            return view(Auth()->user()->role->tech_name.'.index', compact('leads', 'sums'));
        }

        if(Auth()->user()->role->tech_name == 'webmaster'){
            $data = (new DashboardService())->getMasterData($request);
            $offers = Auth()->User()->offers;
            $cities = Lead::whereIn('offer_id', $offers->pluck('id')->all())->where('city', '!=', '')->pluck('city')->unique()->all();

            return view(Auth()->user()->role->tech_name.'.index', compact('data', 'offers', 'cities'));
        }

        if(Auth()->user()->role->tech_name == 'operator'){
            $calls = DB::table('numbers_calls')

                ->leftJoin('numbers', 'numbers.id', 'numbers_calls.number_id')
                ->leftJoin('offers', 'numbers.offer_id', 'offers.id')

                ->where('numbers_calls.approved', false)
                ->orderBy('numbers_calls.created_at')
                ->select('numbers_calls.id','numbers_calls.number_from','numbers_calls.duration', 'offers.id as offer_id', 'offers.name as offer_name', 'numbers_calls.created_at')
                ->get();
            return view(Auth()->user()->role->tech_name.'.index', compact('calls'));
        }

        return view(Auth()->user()->role->tech_name.'.index');
    }
}
