<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Number;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallsController extends Controller
{
    public function index()
    {
        $numbers = Number::whereIn(
            'offer_id', Offer::where('advertiser_id', Auth()->id())->pluck('id')->all()
        )->pluck('id')->all();
        $calls = DB::table('numbers_calls')
            ->select('*')
            ->whereIn('number_id', $numbers)
            ->orderBy('id', 'DESC')
            ->get();
        return view('advertiser.calls', compact('calls'));
    }

    public function action(int $call_id, int $status)
    {
        //call validation
        $call = DB::table('numbers_calls')
            ->leftJoin('numbers', 'numbers.id', 'numbers_calls.number_id')
            ->leftJoin('offers', 'offers.id', 'numbers.offer_id')
            ->where('numbers_calls.id',$call_id)
            ->select('numbers_calls.id', 'offers.advertiser_id', 'numbers_calls.number_from', 'numbers.offer_id')->first();
        if($call == null){
            abort(404);
        }

        if($call->advertiser_id != Auth()->id()){
            abort(403);
        }

        if(in_array($status, [0,1])){
            // ok
            if($status == 0){
                $status = 'cancel';
            }elseif($status == 1){
                $status = 'accept';
            }

            //call delete + make lead
            try {
                DB::transaction(function () use ($call, $status) {
                    $lead = Lead::where('phone', $call->number_from)
                        ->where('offer_id', $call->offer_id)
                        ->firstOrFail();
                    $lead->update(['status' => $status]);
                    DB::table('numbers_calls')->where('id', $call->id)->delete();
                }, 3);
            } catch (\Exception $exception){
                return 'Произошла ошибка, попробуйте еще раз';
            }
        }
        return back()->withSuccess('Звонок успешно обработан!');
    }
}
