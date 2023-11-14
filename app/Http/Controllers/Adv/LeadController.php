<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adv\OfferController\UpdateRequest;
use App\Models\Lead;
use App\Models\Offer;
use App\Models\User;
use App\Models\UserOperation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::whereIn('offer_id', function ($query){
            $query->select('id')
                ->from('offers')
                ->where('advertiser_id', Auth()->id());
            return $query;
        })->where('approved', true)->orderBy('id', 'DESC')->get();
        return view('advertiser.leads.index', compact('leads'));
    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        return view('advertiser.leads.show', compact('lead'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $lead = Lead::findOrFail($id);

        if($request->status != 'hold' && $lead->status != 'accept'){
            //delete!
            DB::table('numbers_calls')->where('number_from', $lead->phone)->delete();

            if($request->status == 'accept' && !UserOperation::where('lead_id', $lead->id)->where('user_id', Auth()->id())->exists()) {
                $balance = Auth()->user()->balance;
                Auth()->user()->update(['balance' => $balance -= $lead->offer->price]);
                UserOperation::create([
                    'lead_id' => $lead->id,
                    'user_id' => Auth()->id(),
                    'sum' => -$lead->offer->price,
                    'description' => 'Списание за заявку'
                ]);

                $master = User::find($lead->master_id);
                $newHold = $master->hold -= Offer::find($lead->offer_id)->price;
                $newBalance = $master->balance += Offer::find($lead->offer_id)->price;
                $master->update(['hold' => $newHold, 'balance' => $newBalance]);
            }
            //переводим из холда в баланс
            // или удаляем из холда
        }

        $data = $request->validated();
        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');
        $lead->update($data);
        return to_route('adv.leads.index')->withSuccess('Лид успешно обновлен!');
    }
}
