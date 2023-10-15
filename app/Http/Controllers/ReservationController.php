<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = Reservation::take(10)->get();
        return view('components.admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tables = Table::all();
        return view('components.admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     * @param array $request
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'firstname'         => 'required',
                'lastname'          => 'required',
                'phone'             => 'required',
                'email'             => '',
                'table'             => '',
                'special_request'   => '',
                'reservation_date'  => 'required'
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

            return redirect()->route('reservation.index')->with('success', 'Resevervation successfuly added');
        } catch (\Exception $e) {

            return redirect()->route('reservation.index')->with('error', 'Opps! Something went wrong. ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation) {
        
        return view('components.admin.reservation.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        try {
            $validatedData = $request->validate([
            'firstname'         => 'required',
            'lastname'          => 'required',
            'phone'             => 'required',
            'email'             => '',
            'table'             => '',
            'special_request'   => '',
            'reservation_date'  => 'required'
            ]);

            $reservation->update($validatedData);
            return redirect()->route('reservation.index')->with('success', 'Updated successfully');
            
        } catch(\Exception $e) {
            return redirect()->route('reservation.index')->with('error', 'Something went wrong, try again');
        }
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success', 'Reservation Deleted Successfuly');
    }
}