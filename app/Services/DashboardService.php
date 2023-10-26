<?php
namespace App\Services;

use App\Models\Lead;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardService{
    public function getAdminData(): array
    {
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

        return [
            'leads' => $leads,
            'sums' => $sums
        ];
    }

    public function getMasterData(Request $request): array
    {
        $leads = Lead::withFilter($request)
            ->whereIn('offer_id', Auth()->user()->offers->pluck('id')->all())
            ->select('id','created_at', 'from_form', 'offer_id', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();

        $unFormData = [];
        foreach ($leads as $lead){
            $date = Carbon::parse($lead['created_at'])->format('Y-m-d');
            $id = $lead->id;
            $unFormData[$date][$id]['offer_id'] = $lead->offer_id;
            $unFormData[$date][$id]['created_at'] = $date;
            $unFormData[$date][$id]['from'] = $lead->from_form;
            $unFormData[$date][$id]['status'] = $lead->status;
        }
        $offers = Offer::whereIn('id', $leads->pluck('offer_id')->all())->pluck('price', 'id')->all();

        $data = [];

        foreach ($unFormData as $k => $value){
            $form_false = 0;
            $form_true = 0;
            $sum = 0;

            $conv_true = 0;
            $conv_wait = 0;
            $conv_trash = 0;

            $fin_hold = 0;
            $fin_accept = 0;

            foreach ($value as $item){
                $sum += $offers[$item['offer_id']];

                if($item['status'] == 'cancel'){
                    $conv_trash++;
                }elseif($item['status'] == 'hold'){
                    $conv_wait++;
                    $fin_hold += $offers[$item['offer_id']];
                }elseif($item['status'] == 'accept'){
                    $conv_true++;
                    $fin_accept += $offers[$item['offer_id']];
                }

                if($item['from'] == 0){
                    $form_false++;
                }else{
                    $form_true++;
                }
            }

            $data[$k]['calls'] = count($unFormData[$k]);
            $data[$k]['lead_all'] = count($unFormData[$k]);
            $data[$k]['lead_calls'] = count($unFormData[$k]);
            $data[$k]['lead_form'] = $form_true;

            $data[$k]['conv_all'] = count($unFormData[$k]);
            $data[$k]['conv_form'] = $form_true;
            $data[$k]['conv_calls'] = $form_false;

            $data[$k]['conv_true'] = $conv_true;
            $data[$k]['conv_wait'] = $conv_wait;
            $data[$k]['conv_trash'] = $conv_trash;

            $data[$k]['fin_all'] = $sum;
            $data[$k]['fin_paid'] = $fin_accept; //accept
            $data[$k]['fin_forecast'] = $fin_hold; //hold
        }

        asort($data);

        return $data;
    }
}
