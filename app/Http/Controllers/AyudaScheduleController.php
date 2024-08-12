<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AyudaSchedule;

class AyudaScheduleController extends Controller
{
    public function index()
    {
        // Retrieve all AyudaSchedule records
        $schedules = AyudaSchedule::with('ayuda')->orderBy('schedule_date', 'desc')->paginate(50); // Using eager loading to include related 'ayuda'

        // If you are returning a view
        return view('adminwrap.ayuda_schedule.index', compact('schedules'));

        // If you are returning JSON (e.g., for an API response)
        // return response()->json($schedules);
    }
}
