<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\Category;

use App\Http\Controllers\ReportController;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index() {

        $dailyIncome = ReportController::dailyIncome();
        

        $menuCount      =   Menu::count();
        $stocks         =   Stock::count();
        $categoryCount  =   Category::count(); 
        $transactions   =   Transaction::all();

        // group transaction by month
        $transactionByMonth = $transactions->groupBy(function($transaction) {

            return $transaction->created_at->format('M-Y');
        });

        // calculate the sum of amount by month
        $monthlySums = $transactionByMonth->map(function($transaction) {

            return $transaction->sum('amount');
        });

        /**
         * this functions is to calculate the total amount 
         * of the current and next month
         */ 

        $transactions = Transaction::all();

        // Group transactions by month
        $transactionByMonth = $transactions->groupBy(function($transaction) {
            return $transaction->created_at->format('Y-m');
        });
    
        // Get the current month and next month
        $currentMonth = now()->format('Y-m');
        $nextMonth = now()->addMonth()->format('Y-m');
    
        // Calculate the total amount for the current month
        $currentMonthTotal = $transactionByMonth->get($currentMonth, collect())->sum('amount');
    
        // Calculate the total amount for the next month
        $nextMonthTotal = $transactionByMonth->get($nextMonth, collect())->sum('amount');

        return view('components.admin.dashboard.index', compact(
            'menuCount', 
            'stocks', 
            'monthlySums', 
            'transactionByMonth', 
            'categoryCount',
            'currentMonthTotal',
            'nextMonthTotal'
        ));
    }
}
