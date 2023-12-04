<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;

class CustomerReservationController extends Controller {

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
        // dd($request);
        try {

            $validatedData = $request->validate([
                'firstname'         =>  'required',
                'lastname'          =>  'required',
                'phone'             =>  'required',
                'email'             =>  '',
                'special_request'   =>  '',
                'reservation_date'  =>  'required',
                'reservation_time'  =>  'required',
                'table'             =>  '',
            ]);

            $reservation = new Reservation;

            $reservation->firstname         =   $validatedData['firstname'];
            $reservation->lastname          =   $validatedData['lastname'];
            $reservation->phone             =   $validatedData['phone'];
            $reservation->email             =   $validatedData['email'];
            $reservation->table             =   $validatedData['table'];
            $reservation->special_request   =   $validatedData['special_request'];
            $reservation->reservation_date  =   $validatedData['reservation_date'];
            $reservation->time              =   $validatedData['reservation_time'];
            $reservation->status            =   'pending';
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
     * Update reservation status to reserved
     */
    public function accept(Reservation $reservation) {
        
        $reservation->status = 'reserved';
        $reservation->save();

        return redirect()->back()->with('success', 'Customer has beed reserved');
    }

       /**
     * Update reservation status
     */
    public function decline(Reservation $reservation) {

        $reservation->delete();

        return redirect()->back()->with('success', 'Customer has beed declined');
    }

    public function cashierReservationCreate() {

        $tables = Table::all();
        return view('components.cashier.create', compact('tables'));
    }

    public function cashierReservationStore(Request $request) {
        try {

            $validatedData = $request->validate([
                'firstname'         =>  'required',
                'lastname'          =>  'required',
                'phone'             =>  'required',
                'email'             =>  '',
                'table'             =>  '',
                'special_request'   =>  '',
                'reservation_date'  =>  'required',
                'reservation_time'  =>  'required',
            ]);

            $reservation = new Reservation;
            $reservation->firstname         =   $validatedData['firstname'];
            $reservation->lastname          =   $validatedData['lastname'];
            $reservation->phone             =   $validatedData['phone'];
            $reservation->email             =   $validatedData['email'];
            $reservation->table             =   $validatedData['table'];
            $reservation->special_request   =   $validatedData['special_request'];
            $reservation->reservation_date  =   $validatedData['reservation_date'];
            $reservation->time              =   $validatedData['reservation_time'];
            $reservation->status            =   'reserved';
            $reservation->save();

            return redirect()->route('cashier.reservations')->with('success', 'Customer has been reserved');
        } catch (\Exception $e) {   

            return redirect()->route('cashier.reservations')->with('danger', $e->getMessage());
        }
    }
}
