<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Validation\ValidationException;


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
    // public function store(Request $request)
    // {
    //         $validatedData = $request->validate([
    //             'firstname'         =>  'required',
    //             'lastname'          =>  'required',
    //             'phone'             =>  'required',
    //             'email'             =>  'required|unique:reservations,email',
    //             'table'             =>  'required',
    //             'special_request'   =>  '',
    //             'reservation_date'  =>  'required',
    //             'time_from'         =>  'required|unique:reservations,time_from',
    //             'time_to'           =>  'required|unique_time_range|unique:reservations,time_to',
    //         ]);

    //         // try {
    //         $reservation = new Reservation;

    //         $reservation->firstname         =   $validatedData['firstname'];
    //         $reservation->lastname          =   $validatedData['lastname'];
    //         $reservation->phone             =   $validatedData['phone'];
    //         $reservation->email             =   $validatedData['email'];
    //         $reservation->table             =   $validatedData['table'];
    //         $reservation->special_request   =   $validatedData['special_request'];
    //         $reservation->reservation_date  =   $validatedData['reservation_date'];
    //         $reservation->time_from         =   $validatedData['time_from'];
    //         $reservation->time_to           =   $validatedData['time_to'];

    //         $reservation->status            =   'pending';
    //         $reservation->save();

    //         return redirect()->route('reserve.complete');

    //         // } catch (\Exception $e) {   
    //         //     \Log::error('Validation failed: ' . $e->getMessage());
    //         //     return redirect()->route('reserve.create');
    //         // }
    // }

    // new function store reservation
        public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'firstname'         =>  'required',
                'lastname'          =>  'required',
                'phone'             =>  'required',
                'email'             =>  'required',
                'table'             =>  'required',
                'special_request'   =>  '',
                'reservation_date'  =>  'required',
                'time_from'         =>  'required',
                'time_to'           =>  'required',
            ]);

            // Check if a reservation with the same date, time range, and table already exists
            $existingReservation = Reservation::where([
                'reservation_date' => $validatedData['reservation_date'],
                'time_from' => $validatedData['time_from'],
                'time_to' => $validatedData['time_to'],
                'table' => $validatedData['table'],
            ])->first();
            // dd($existingReservation);

            if ($existingReservation) {
                return redirect()->back()->with(['warning' => 'Reservation with the same date, time range, and table already exists.']);
            }

            // If no existing reservation found, proceed to save the new reservation
            $reservation = new Reservation;

            $reservation->firstname = $validatedData['firstname'];
            $reservation->lastname = $validatedData['lastname'];
            $reservation->phone = $validatedData['phone'];
            $reservation->email = $validatedData['email'];
            $reservation->table = $validatedData['table'];
            $reservation->special_request = $validatedData['special_request'];
            $reservation->reservation_date = $validatedData['reservation_date'];
            $reservation->time_from = $validatedData['time_from'];
            $reservation->time_to = $validatedData['time_to'];

            $reservation->status = 'pending';
            $reservation->save();

            return redirect()->route('reserve.complete');

        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->route('reserve.create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error saving reservation: ' . $e->getMessage());
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
                'firstname'         => 'required',
                'lastname'          => 'required',
                'phone'             => 'required',
                'email'             => 'required|unique:reservations,email', 
                'table'             => 'required|unique:reservations,table',
                'special_request'   => '',
                'reservation_date'  => 'required',
                'reservation_time'  => 'required|unique:reservations,time',
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
