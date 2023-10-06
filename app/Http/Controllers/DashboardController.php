<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaction;
use App\Http\Controllers\ReportController;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index() {

        $reports = ReportController::dailyReports();
        $dailyTotal = $reports['dailySums']->first();
        $menus = Menu::all();
        $stocks = Stock::count();
        $transactions = Transaction::all();

        // group transaction by month
        $transactionByMonth = $transactions->groupBy(function($transaction) {

            return $transaction->created_at->format('F-Y');
        });

        // calculate the sum of amount by month
        $monthlySums = $transactionByMonth->map(function($transaction) {

            return $transaction->sum('amount');
        });

        return view('components.admin.dashboard.index', compact('menus', 'stocks', 'monthlySums', 'transactionByMonth', 'dailyTotal'));
    }
}
