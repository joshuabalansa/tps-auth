<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaction;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index() {

        $menus = Menu::all();
        $stocks = Stock::count();
        $transactions = Transaction::all();

        // group transaction by month
        $transactionByMonth = $transactions->groupBy(function($transaction) {

            return $transaction->created_at->format('Y-m');
        });

        // calculate the sum of amount by month
        $monthlySums = $transactionByMonth->map(function($transaction) {

            return $transaction->sum('amount');
        });

        return view('components.admin.dashboard.index', compact('menus', 'stocks', 'monthlySums', 'transactionByMonth'));
    }

    /**
     * returns with the monthly total
     * @return \Illuminate\View\View
     */
    // public function monthlyReport() {
        
    //     $transactions = Transaction::all();

    //     // group transaction by month
    //     $transactionByMonth = $transactions->groupBy(function($transaction) {

    //         return $transaction->created_at->format('Y-m');
    //     });

    //     // calculate the sum of amount by month
    //     $monthlySums = $transactionByMonth->map(function($transaction) {

    //         return $transaction->sum('amount');
    //     });

    //     return view('components.admin.dashboard.card-table', compact('monthlySums', 'transactionByMonth'));
    // }
}
