<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adv\OfferController\UpdateRequest;
use App\Models\Lead;
use App\Models\Offer;
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
        })->orderBy('created_at', 'DESC')->get();
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

        if($request->status != 'hold'){
            //delete!
            DB::table('numbers_calls')->where('number_from', $lead->phone)->delete();
        }

        $lead->update($request->validated());
        return to_route('adv.leads.index')->withSuccess('Лид успешно обновлен!');
    }
}
