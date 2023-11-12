<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\LeadController\StoreRequest;
use App\Models\Lead;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Auth()->user()->getOperatorLeads;
        return view('operator.leads.index', compact('leads'));
    }

    public function create()
    {
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        $masters = User::where('role_id', function ($query){
            return $query->select('id')
                ->from('roles')
                ->where('tech_name', 'webmaster')
                ->first();
        })->get();
        return view('operator.leads.create', compact('offers', 'masters'));
    }

    public function store(StoreRequest $request)
    {
        $lead = Lead::create($request->validated());
        DB::table('operator_leads')->insert(['lead_id' => $lead->id, 'operator_id' => Auth()->id()]);
        return to_route('lead.index')->withSuccess('Лид успешно добавлен');
    }
}
