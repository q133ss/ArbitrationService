<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\IndexController\StoreRequest;
use App\Models\Lead;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['master_id'] = $request->master_id;
        Lead::create($data);
        return back()->withSuccess('Лид успешно добавлен!');
    }
}
