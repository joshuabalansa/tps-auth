<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('components.admin.users.index', compact('users'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        try {

            $user->update(['role' => 0]);
            return redirect()->route('user.index')->with('success', 'Deactivated Successfully');
        } catch(\Exception $e) {

            return redirect()->route('user.index')->with('danger', 'Opps! Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        
        try {

            $user->delete();
            return redirect()->route('user.index')->with('success', 'Deleted Successfully');
        } catch(\Exception $e) {

            return redirect()->route('user.index')->with('danger', 'Opps! Something went wrong');
        }
    }
}
