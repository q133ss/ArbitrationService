<?php

namespace App\Http\Controllers;

use App\Models\Lead;
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

        return view(Auth()->user()->role->tech_name.'.index');
    }
}
