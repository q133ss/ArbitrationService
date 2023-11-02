<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsController\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return view('settings', compact('user'));
    }

    public function update(UpdateRequest $request, int $id)
    {
        $data = [];
        $data['name'] = $request->name;
        if($request->new_password != null){
            $data['password'] = Hash::make($request->new_password);
        }

        $user = User::findOrFail($id);
        $user->update($data);

        if($request->hasFile('photo')){
            $path = '/storage/'.$request->file('photo')->store('photos', 'public');
            $user->updateImage($path);
        }

        return back()->withSuccess('Профиль успешно обновлен!');
    }
}
