<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Number;
use App\Models\Offer;
use App\Models\UserOperation;
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
            ->where('approved', 1)
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
            ->leftJoin('users', 'users.id', 'numbers.user_id')
            ->where('numbers_calls.id',$call_id)
            ->select('numbers_calls.*','offers.price', 'users.id as master_id', 'offers.advertiser_id', 'numbers.offer_id')->first();
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
                $status = 'hold';
            }

            //call delete + make lead
            try {
                DB::transaction(function () use ($call, $status) {
                    $lead = Lead::where('phone', $call->number_from)
                        ->where('offer_id', $call->offer_id);

                    $leadId = null;

                    if($lead->exists()) {
                        $lead->update(['status' => $status]);
                        $leadId = $lead->first()->id;
                    }else{
                        $newLead = DB::table('leads')->insertGetId([
                            'phone' => $call->number_from,
                            'name' => $call->name,
                            'city' => $call->city,
                            'status' => $status,
                            'address' => $call->address,
                            'comment' => $call->comment,
                            'date' => $call->date,
                            'time' => $call->time,
                            'offer_id' => $call->offer_id,
                            'master_id' => $call->master_id
                        ]);
                        $leadId = $newLead;

                    }
#TODO кажеться тут не нужно менять баланс
//                    if ($status == 'accept') {
//                        $balance = Auth()->user()->balance;
//                        Auth()->user()->update(['balance' => $balance -= $call->price]);
//                        UserOperation::create([
//                            'lead_id' => $leadId,
//                            'user_id' => Auth()->id(),
//                            'sum' => -$call->price,
//                            'description' => 'Списание за заявку'
//                        ]);
//                    }

                    DB::table('numbers_calls')->where('id', $call->id)->delete();

                }, 3);
            } catch (\Exception $exception){
                return 'Произошла ошибка, попробуйте еще раз';
            }
        }
        return back()->withSuccess('Звонок успешно обработан!');
    }
}
