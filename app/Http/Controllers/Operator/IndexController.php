<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\IndexController\StoreRequest;
use App\Models\Lead;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function callShow(int $id)
    {
        $call = DB::table('numbers_calls')

            ->leftJoin('numbers', 'numbers.id', 'numbers_calls.number_id')
            ->leftJoin('offers', 'numbers.offer_id', 'offers.id')
            ->leftJoin('users', 'numbers.user_id', 'users.id')

            ->where('numbers_calls.id', $id)
            ->orderBy('numbers_calls.created_at')
            ->select(
                'numbers_calls.id',
                'numbers_calls.number_from',
                'numbers_calls.duration',
                'users.name as master_name',
                'users.id as master_id',
                'offers.id as offer_id',
                'offers.name as offer_name',
                'numbers_calls.created_at'
            )
            ->first();


        return view('operator.show', compact('call'));
    }

    public function offerShow(int $id)
    {
        $offer = Offer::findOrFail($id);
        return view('master.offers.show', compact('offer'));
    }

    public function approve(StoreRequest $request, int $id){
        $data = $request->validated();
        $data['approved'] = 1;
        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');
        DB::table('numbers_calls')->where('id',$id)->update($data);
        return to_route('dashboard')->withSuccess('Звонок успешно обработан!');
    }

    public function cancel(int $id){
        DB::table('numbers_calls')->where('id',$id)->delete();
        return to_route('dashboard')->withSuccess('Звонок успешно обработан!');
    }
}
