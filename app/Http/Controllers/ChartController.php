<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function getChartData()
    {
        // Fetch the data from your database
        /*  $data = DB::table('your_table')
            ->select('period', 'Sales', 'Earning', 'Marketing')
            ->get(); */
        /* $data = [
            
            [
                'period' => '2024-01',
                'total_count' => 70,
                
            ],
            [
                'period' => '2024-02',
                'total_count' => 180,
                
            ],
            [
                'period' => '2024-03',
                'total_count' => 105,
               
            ],
            [
                'period' => '2024-04',
                'total_count' => 250,
               
            ],
        ];

        // To return the data as a JSON response, use:
        return response()->json($data); */
        // Get the current year
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Retrieve the raw data
        $rawResults = DB::table('ayuda_members')
            ->join('ayudas', 'ayuda_members.ayuda_id', '=', 'ayudas.id')
            ->select(
                DB::raw('DATE_FORMAT(ayuda_members.date_availed, "%Y-%m") as month'),
                DB::raw('COUNT(ayuda_members.id) as total_count')
            )
            ->whereYear('ayuda_members.date_availed', $currentYear)
            ->groupBy(DB::raw('DATE_FORMAT(ayuda_members.date_availed, "%Y-%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(ayuda_members.date_availed, "%Y-%m")'))
            ->get();

        // Initialize an array to hold the formatted results
        $formattedResults = [];

        // Process the raw results
        foreach ($rawResults as $row) {
            $formattedResults[] = [
                'month' => $row->month,
                'total_count' => $row->total_count,
            ];
        }

        // Return the final results as JSON
        return response()->json($formattedResults);
    }
}
