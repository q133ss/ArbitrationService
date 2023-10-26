<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role->tech_name == 'admin'){
            $data = (new DashboardService())->getAdminData();
            $leads = $data['leads'];
            $sums = $data['sums'];

            return view(Auth()->user()->role->tech_name.'.index', compact('leads', 'sums'));
        }

        if(Auth()->user()->role->tech_name == 'webmaster'){
            $data = (new DashboardService())->getMasterData();
            return view(Auth()->user()->role->tech_name.'.index', compact('data'));
        }

        return view(Auth()->user()->role->tech_name.'.index');
    }
}
