<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('admin-panel.user.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin-panel.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|in:admin,user',
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status
        ]);
        return redirect('/admin/users')->with('successMsg', 'You have updated successfully!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('successMsg', 'You have deleted successfully!');
    }
}
