<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::orderBy('created_at', 'DESC')->get();
        return view('admin.withdraws.index', compact('withdraws'));
    }

    public function withdraw(int $id, string $status)
    {
        DB::transaction(function() use ($id, $status) {
            $withdraw = Withdraw::findOrFail($id);
            $withdraw->update(['status' => $status]);
            if ($status == 'cancel') {
                $user = User::findOrFail($withdraw->user_id);

                $balance = $user->balance + $withdraw->sum;
                $user->update(['balance' => $balance]);

                return back()->withSuccess('Выплата отклонена!');
            }
        }, 3);
        return back()->withSuccess('Выплата завершена!');
    }
}
