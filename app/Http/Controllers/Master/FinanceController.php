<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\FinanceController\AddCardRequest;
use App\Http\Requests\Master\FinanceController\WithoutRequest;
use App\Models\UserCard;
use App\Models\Withdraw;

class FinanceController extends Controller
{
    public function index()
    {
        $cards = Auth()->User()->cards;
        return view('master.finances', compact('cards'));
    }

    public function addCard(AddCardRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth()->Id();
        $data['card'] = str_replace(' ', '',$request->card);
        UserCard::create($data);
        return Response()->json(['card' => $data['card']]);
    }

    public function without(WithoutRequest $request)
    {
        $data = $request->validated();
        unset($data['card_id']);

        $data['card'] = UserCard::findOrFail($request->card_id)->card;
        $data['user_id'] = Auth()->id();
        Withdraw::create($data);

        $balance = Auth()->user()->balance - $data['sum'];
        Auth()->user()->update(['balance' => $balance]);
        return response($balance);
    }
}
