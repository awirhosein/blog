<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\Register as RegisterRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(config('custom.per_page'));

        return view('admin.pages.users.index', compact('users'), [
            'fields' => ['Name', 'Email', 'Role', 'Registration Date']
        ]);
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(RegisterRequest $request)
    {
        $request->validate(['role' => 'required']);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        toast(__('msg.success.create'), 'success');

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'role' => ['required'],
        ]);

        $user->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}
