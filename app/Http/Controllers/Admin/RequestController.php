<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\UserOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class RequestController extends Controller
{
    public function index()
    {
        $offers = UserOffer::where('approved', 'wait')->with(['user','offer'])->get();
        return view('admin.requests', compact('offers'));
    }

    public function action($action, $offer_id)
    {
        try {
            DB::transaction(function() use ($action, $offer_id) {
                $offer = UserOffer::findOrFail($offer_id);
                $offer->approved = $action;
                $offer->save();
                $message = '';
                switch ($action) {
                    case 'canceled':
                        (new Notification)->send('Заявка на оффер "' . $offer->offer->name . '" отклонена', $offer->user_id, $offer_id);
                        break;
                    case 'approved':
                        (new Notification)->send('Заявка на оффер "' . $offer->offer->name . '" одобрена!', $offer->user_id, $offer_id);
                        break;
                }
            }, 1);
            return back()->withSuccess('Запрос успешно обработан');
        } catch (Exception $e){
            return 'Ошибка';
        }
    }
}
