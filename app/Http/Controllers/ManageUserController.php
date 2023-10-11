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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate(User $user)
    {
        try {
            $user->update(['status' => 'deactivated']); // Make sure you pass an array of attributes
            return redirect()->route('user.index')->with('success', 'Deactivated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('danger', 'Oops! Something went wrong');
        }
    }

      /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reactivate(User $user)
    {
        try {
            $user->update(['status' => 'active']); // Make sure you pass an array of attributes
            return redirect()->route('user.index')->with('success', 'Deactivated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('danger', 'Oops! Something went wrong');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     * @param array $user
     * @return \Illiminate\Http\RedirectResponse
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
