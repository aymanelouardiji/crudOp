<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import the Hash facade


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

   
    public function store(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'User added successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
 
        $user->update($request->all());
 
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
    
}
