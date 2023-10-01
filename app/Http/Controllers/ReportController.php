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
    public function ordersReport()
    {
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
        
        return view('components.admin.reports.monthly-reports', compact('monthlySums', 'transactionByMonth'));
    }
    

    /**
     * returns the daily sums
     * @return \Illuminate\View\View
     */
    public function dailyReport() {
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

}
