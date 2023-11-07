<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\LeadsController\StoreRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadsController extends Controller
{
    public function index()
    {
        $leads = Lead::where('master_id', Auth()->id())->get();
        $hold = DB::table('numbers_calls')
            ->leftJoin('numbers', 'numbers_calls.number_id', 'numbers.id')
            ->leftJoin('offers', 'offers.id', 'numbers.offer_id')
            ->whereIn('numbers_calls.number_id', Auth()->user()->numbers->pluck('id')->all())
            ->where('numbers_calls.approved', 1)
            ->select('numbers_calls.*', 'offers.name as offer_name', 'offers.id as offer_id', 'offers.price as offer_price')
            ->get();
        return view('master.leads.index', compact('leads', 'hold'));
    }

    public function create()
    {
        $offers = Auth()->user()->acceptedOffers;
        return view('master.leads.create', compact('offers'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['master_id'] = Auth()->id();
        $data['from_form'] = true;
        Lead::create($data);
        return to_route('master.leads.index')->withSuccess('Лид успешно добавлен!');
    }
}
