<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\LeadsController\StoreRequest;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function index()
    {
        $leads = Lead::where('master_id', Auth()->id())->get();
        return view('master.leads.index', compact('leads'));
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
        Lead::create($data);
        return to_route('master.leads.index')->withSuccess('Лид успешно добавлен!');
    }
}
