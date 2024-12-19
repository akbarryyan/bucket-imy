<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\OrderItem;
use App\Models\DailyProfit;
use Illuminate\Http\Request;
use App\Models\MonthlyProfit;
use Illuminate\Support\Facades\DB;

class ProfitController extends Controller
{
    public function calculateDailyProfit()
    {
        $today = Carbon::today()->toDateString();
        $profit = OrderItem::whereDate('created_at', $today)
            ->sum(DB::raw('quantity * price'));

        DailyProfit::updateOrCreate(
            ['date' => $today],
            ['total_profit' => $profit]
        );

        return redirect()->back()->with('success', 'Daily profit calculated successfully!');
    }

    public function calculateMonthlyProfit()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $profit = OrderItem::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum(DB::raw('quantity * price'));

        MonthlyProfit::updateOrCreate(
            ['month' => $currentMonth],
            ['total_profit' => $profit]
        );

        return redirect()->back()->with('success', 'Monthly profit calculated successfully!');
    }

    public function showProfits()
    {
        $dailyProfits = DailyProfit::orderBy('date', 'desc')->get();
        $monthlyProfits = MonthlyProfit::orderBy('month', 'desc')->get();

        return view('admin.profits', compact('dailyProfits', 'monthlyProfits'));
    }

    public function generateDailyProfitPDF() {
        $dailyProfits = DailyProfit::orderBy('date', 'desc')->get();
        $pdf = PDF::loadView('admin.pdf.daily_profits', compact('dailyProfits'));
        
        return $pdf->download('daily_profits.pdf');
    }
    
    public function generateMonthlyProfitPDF() {
        $monthlyProfits = MonthlyProfit::orderBy('month', 'desc')->get();
        $pdf = PDF::loadView('admin.pdf.monthly_profits', compact('monthlyProfits'));
        
        return $pdf->download('monthly_profits.pdf');
    }
}