<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OffersController\StoreRequest;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $advertisers = User::where('role_id', function ($query){
            $query->select('id')
                ->from('roles')
                ->where('tech_name', 'advertiser')
                ->first();
        })->get();
        return view('admin.offers.create', compact('advertisers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Offer::create($request->validated());
        return to_route('admin.offers.index')->withSuccess('Офер успешно добавлен!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = Offer::findOrFail($id);
        $advertisers = User::where('role_id', function ($query){
            $query->select('id')
                ->from('roles')
                ->where('tech_name', 'advertiser')
                ->first();
        })->get();

        return view('admin.offers.edit', compact('offer', 'advertisers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        Offer::findOrFail($id)->update($request->validated());
        return to_route('admin.offers.index')->withSuccess('Офер успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Offer::findOrFail($id)->delete();
        return to_route('admin.offers.index')->withSuccess('Офер успешно удален!');
    }
}
