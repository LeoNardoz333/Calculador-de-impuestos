<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;


class UserController extends Controller
{
    public function index()
    {
        return view('admins.users.index', [
            'users' => User::all()
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('admins.users.index')->with('success', 'Usuario creado exitosamente');
    }

    public function update(CreateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if(isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->route('admins.users.index')->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admins.users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
