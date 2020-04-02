<?php

namespace App\Http\Controllers;

use App\models\Sale;
use App\School;
use App\Seller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function get_week()
    {
        $today  = Carbon::today();
        $last_week = Carbon::now()->subDays(7);
        return array($last_week, $today);
    }
    public function user_count()
    {
        return User::count();
    }
    public function school_count()
    {
        return School::count();
    }
    public function sellers_count()
    {
        return Seller::count();
    }
    public function total_sales_count()
    {
        return Sale::count();
    }
    public function week_sales_count()
    {
        return Sale::whereBetween('created_at', $this->get_week())->count();
    }
    // Charts

    public function sales_chart(Request $request)
    {
        // return $request->all();
        $sales = Sale::withoutGlobalScopes()
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date');
        if ($request->year_f) {
            $sales = $sales->whereYear('created_at', '=', (int) $request->year_f);
        }
        $sales = $sales->get();
        $lables = [];
        $rows = [];
        foreach ($sales as $key => $sale) {
            $lables[] = $sale->date;
            $rows[] = $sale->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }
    public function sellers_chart(Request $request)
    {
        // return $request->all();
        $sellers = Seller::withoutGlobalScopes()
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date');
        if ($request->year_f) {
            $sellers = $sellers->whereYear('created_at', '=', (int) $request->year_f);
        }
        $sellers = $sellers->get();
        $lables = [];
        $rows = [];
        foreach ($sellers as $key => $seller) {
            $lables[] = $seller->date;
            $rows[] = $seller->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }
    public function schools_chart(Request $request)
    {
        // return $request->all();
        $schools = School::withoutGlobalScopes()
            ->select(DB::raw('count(id) as count, date_format(created_at, "%M") as date'))
            ->orderBy('id', 'asc')
            ->groupBy('date');
        if ($request->year_f) {
            $schools = $schools->whereYear('created_at', '=', (int) $request->year_f);
        }
        $schools = $schools->get();
        $lables = [];
        $rows = [];
        foreach ($schools as $key => $school) {
            $lables[] = $school->date;
            $rows[] = $school->count;
        }
        $data = array(
            'lables' => $lables,
            'rows' => $rows
        );
        return response()->json(['data' => $data]);
    }
}
