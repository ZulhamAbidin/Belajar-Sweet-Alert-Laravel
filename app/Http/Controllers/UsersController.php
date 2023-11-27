<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('*');
            return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    return '<a href="' .
                        route('users.edit', $user->id) .
                        '" class="btn btn-primary">Edit</a>
                <button type="button" onclick="deleteUser(' .
                        $user->id .
                        ')" class="btn btn-danger">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('welcome');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create($validatedData);

        Alert::success('Success', 'User created successfully');

        return redirect()->route('welcome');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required',
        ]);

        $user->update($validatedData);

        Alert::success('Success', 'User updated successfully');

        return redirect()->route('welcome');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['success' => 'User deleted'], 200);
    }
}
