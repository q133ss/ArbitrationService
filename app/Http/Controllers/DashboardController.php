<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role->tech_name == 'admin'){
            $leadsQuery = DB::table('leads')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                ->where('created_at', '>=', now()->subWeek())
                ->groupBy('date')
                ->get()
                ->toArray();

            $leads = [];

            $sums = [];

            $sumsQuery = DB::table('leads')
                ->where('leads.created_at', '>=', now()->subWeek())
                ->leftJoin('offers', 'offers.id', 'leads.offer_id')
                ->select(DB::raw('DATE(leads.created_at) as date'), DB::raw('SUM(offers.price) as total_price'))
                ->groupBy('leads.created_at')
                ->get()
                ->toArray();

            foreach ($sumsQuery as $sum){
                $sums[$sum->date] = $sum->total_price;
            }

            foreach ($leadsQuery as $lead) {
                $leads[$lead->date] = $lead->count;
            }

            // Заполняем отсутствующие даты значением 9
            $startDate = now()->subWeek()->startOfDay();
            $endDate = now()->endOfDay();
            $currentDate = $startDate;
            while ($currentDate <= $endDate) {
                $dateString = $currentDate->toDateString();

                if (!isset($leads[$dateString])) {
                    $leads[$dateString] = 0;
                }

                if (!isset($sums[$dateString])) {
                    $sums[$dateString] = 0;
                }

                $currentDate->addDay();
            }

            ksort($leads);
            ksort($sums);

            return view(Auth()->user()->role->tech_name.'.index', compact('leads', 'sums'));
        }
        return view(Auth()->user()->role->tech_name.'.index');
    }
}
