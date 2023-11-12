<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $leads = Lead::with('master','offer')->withFilter($request)->orderBy('created_at', 'DESC')->get();

        return view('admin.leads.index', compact('leads'));
    }
}
