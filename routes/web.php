<?php

use App\Http\Controllers\AyudaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

Route::get('/', function () {
    /* return view('welcome'); */
    return redirect()->route('dashboard');
});

Route::get('/test', function () {
    $currentYear = Carbon::now()->year;

    // Retrieve the raw data
    $rawResults = DB::table('ayuda_members')
        ->join('ayudas', 'ayuda_members.ayuda_id', '=', 'ayudas.id')
        ->select(
            DB::raw('MONTHNAME(ayuda_members.date_availed) as month'),
            DB::raw('COUNT(ayuda_members.id) as total_count')
        )
        ->whereYear('ayuda_members.date_availed', $currentYear)
        ->groupBy(DB::raw('MONTH(ayuda_members.date_availed)'), DB::raw('MONTHNAME(ayuda_members.date_availed)'))
        ->orderBy(DB::raw('MONTH(ayuda_members.date_availed)'))
        ->get();

    // Initialize an array to hold the formatted results
    $formattedResults = [];

    // Process the raw results
    foreach ($rawResults as $row) {
        $month = strtoupper(substr($row->month, 0, 3)); // Convert month name to uppercase and take the first 3 letters
        $formattedResults[] = [
            'month' => $month,
            'total_count' => $row->total_count,
        ];
    }

    // Return the final results as JSON
    return response()->json($formattedResults);
});

Route::get('/test2', function() {
    $data = [
            
        [
            'month' => '2014',
            'total_count' => 70,
            
        ],
        [
            'month' => '2015',
            'total_count' => 180,
            
        ],
        [
            'month' => '2016',
            'total_count' => 105,
           
        ],
        [
            'month' => '2017',
            'total_count' => 250,
           
        ],
    ];

    // To return the data as a JSON response, use:
    return response()->json($data); 
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::get('/member/{member}', [MemberController::class, 'show'])->name('member.show');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::patch('/member', [MemberController::class, 'update'])->name('member.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/ayuda/create', [AyudaController::class, 'create'])->name('ayuda.create');
    Route::get('/ayuda', [AyudaController::class, 'index'])->name('ayuda.index');
    Route::post('/ayuda', [AyudaController::class, 'store'])->name('ayuda.store');
    Route::patch('/ayuda', [AyudaController::class, 'update'])->name('ayuda.update');
    Route::get('/api/chart-data', [ChartController::class, 'getChartData']);
});





require __DIR__ . '/auth.php';
