<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersController\BalanceRequest;
use App\Http\Requests\UsersController\StoreRequest;
use App\Http\Requests\UsersController\UpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if($data['confirmed'] != 0) {
            $data['confirmed'] = true;
        }
        $user = User::create($data);

        $to      = $data['email'];
        $subject = 'Вы зарегистрированы на '.env('APP_NAME');
        $message = "Вы зарегистрированы на ".env('APP_NAME')."<br> Email: ".$data['email']."<br> Пароль: ".$request->password;
        $headers = 'From: info@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);

        return to_route('admin.users.edit', $user->id)->withSuccess('Пользователь успешно создан');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();
        if($data['password'] == null){
            unset($data['password']);
        }
        User::findOrFail($id)->update($data);
        return to_route('admin.users.edit', $id);
    }

    public function balance(BalanceRequest $request, int $id)
    {
        User::findOrFail($id)->update(['balance' => $request->balance]);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return to_route('admin.users.index')->withSuccess('Пользователь успешно удален!');
    }
}
