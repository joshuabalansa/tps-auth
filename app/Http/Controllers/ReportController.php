<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;

class ReportController extends Controller
{
    /**
     * Display a listing of order history
     * @return \Illuminate\View\View
     */
    public function ordersReport() {

        $transactions = Transaction::all();

        $approvedOrders = Order::where('status', 'approved')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        return view('components.admin.reports.order-history', compact('transactions', 'approvedOrders', 'cancelledOrders'));
    }

    /**
     * returns with the monthly total
     * @return \Illuminate\View\View
    */
    public function monthlyReport() {
        
        $transactions = Transaction::all();

        // group transaction by month
        $transactionByMonth = $transactions->groupBy(function($transaction) {

            return $transaction->created_at->format('Y-m');
        });

        // calculate the sum of amount by month
        $monthlySums = $transactionByMonth->map(function($transaction) {

            return $transaction->sum('amount');
        });

        self::monthlyIncome($transactions);
        return view('components.admin.reports.monthly-reports', compact('monthlySums', 'transactionByMonth'));
    }


    public static function monthlyIncome($transactions) {
        
        return $transactions;
    }
    

    /**
     * returns the daily sums
     * @return \Illuminate\View\View
     */
    public static function dailyReport() {
        $transactions = Transaction::all();

        // Group transactions by day
        $transactionsByDay = $transactions->groupBy(function($transaction) {
            return $transaction->created_at->format('Y-m-d');
        });

        // Calculate the sum of amount for each day
        $dailySums = $transactionsByDay->map(function($transactions) {
            return $transactions->sum('amount');
        });

        return view('components.admin.reports.daily-reports', compact('dailySums', 'transactionsByDay'));
    }

    /**
     * Retrieve the daily income by summing up transaction amounts for each day.
     * @return \Illuminate\Support\Collection
     */
    public static function dailyIncome() {
        
        $transactions = Transaction::all();
        $dailySums = $transactions->groupBy(fn($transaction) => $transaction->created_at->format('Y-m-d'))->map(fn($transactions) => $transactions->sum('amount'));
        return $dailySums;
    }
}
