<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NumbersController\UpdateNumberRequest;
use App\Models\Number;
use App\Models\User;
use App\Services\TelphinService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NumbersController extends Controller
{
    public function index()
    {
        $numbers = Number::with('user')->get();
        return view('admin.numbers.index', compact('numbers'));
    }

    public function update()
    {
        $numbers = (new TelphinService())->getNumbers();
        $newNumbers = [];
        foreach ($numbers as $number){
            $newNumbers[] = ['number' => $number->name];
        }
        DB::table('numbers')->insertOrIgnore($newNumbers);
        return back()->withSuccess('Номера успешно обновлены!');
    }

    public function edit(int $id)
    {
        $number = Number::findOrFail($id);
        $users = User::where('id', '!=', Auth()->id())
            ->where('role_id', function ($query){
                return $query->select('id')
                    ->from('roles')
                    ->where('tech_name', 'webmaster')
                    ->limit(1);
            })
            ->get();
        return view('admin.numbers.edit', compact('number', 'users'));
    }

    public function updateNumber(UpdateNumberRequest $request, int $id)
    {
        Number::findOrFail($id)->update($request->validated());
        return to_route('admin.numbers.index')->withSuccess('Номер успешно изменен!');
    }
}
