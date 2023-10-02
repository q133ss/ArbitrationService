<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\FinanceController\AddCardRequest;
use App\Models\UserCard;

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
}
