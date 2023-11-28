<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;

class CustomerReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::all();
        return view('components.menu.reservation', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'firstname'         =>  'required',
                'lastname'          =>  'required',
                'phone'             =>  'required',
                'email'             =>  '',
                'table'             =>  '',
                'special_request'   =>  '',
                'reservation_date'  =>  'required'
            ]);

            $reservation = new Reservation;
            $reservation->firstname         =   $validatedData['firstname'];
            $reservation->lastname          =   $validatedData['lastname'];
            $reservation->phone             =   $validatedData['phone'];
            $reservation->email             =   $validatedData['email'];
            $reservation->table             =   $validatedData['table'];
            $reservation->special_request   =   $validatedData['special_request'];
            $reservation->reservation_date  =   $validatedData['reservation_date'];
            $reservation->save();

            return redirect()->route('reserve.complete');
        } catch (\Exception $e) {   

            return redirect()->route('reserve.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function complete()
    {
        
        return view('components.menu.reserve-complete');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
