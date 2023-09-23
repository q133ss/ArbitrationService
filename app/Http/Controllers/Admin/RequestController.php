<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index()
    {
        $offers = UserOffer::where('approved', 'wait')->with(['user','offer'])->get();
        return view('admin.requests', compact('offers'));
    }

    public function action($action, $offer_id)
    {
        $offer = UserOffer::findOrFail($offer_id);
        $offer->approved = $action;
        $offer->save();
        $message = '';
        switch ($action){
            case 'canceled':
                $message = 'отклонен!';
                break;
            case 'approved':
                $message = 'принят!';
                break;
        }
        return back()->withSuccess('Запрос успешно '.$message);
    }
}
