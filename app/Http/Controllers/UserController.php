<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rows = User::whereNull('deleted_at')->get();
        return view('users.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::wherenull('deleted_at')->pluck('name', 'id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|string|max:100|min:3',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            $data = $request->only('name', 'email', 'password', 'role_id', 'phone', 'address');

            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $filename = time() .'.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/profiles'), $filename);
                $data['profile'] = 'images/profiles/'.$filename;
            }

            User::create($data);
            return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = User::FindOrFail($id);
        $roles = Role::whereNull('deleted_at')->pluck('name','id');
        return view('users.edit', compact('row','roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|string|email|max:100|unique:users,email,'. $id,
            'role_id' => 'required|exists:roles,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('name', 'email', 'role_id', 'phone', 'address');

        if ($request->hasFile('profile')) {
            if ($row->profile && file_exists(public_path($row->profile))) {
                unlink(public_path($row->profile));
            }

            $file = $request->file('profile');
            $filename = time().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('images/profiles'), $filename);
            $data['profile'] = 'images/profiles/'.$filename;
        }

        $row->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = User::findOrFail($id);
        $row->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
