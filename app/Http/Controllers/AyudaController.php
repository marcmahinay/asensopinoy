<?php

namespace App\Http\Controllers;

use App\Models\Ayuda;
use Illuminate\Http\Request;

class AyudaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve paginated members from the database
        $ayudas = Ayuda::paginate(15); // Adjust the number (15) based on how many items per page you want

        // Return a view with the paginated members
        return view('adminwrap.ayuda.index', compact('ayudas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ayuda $ayuda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ayuda $ayuda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ayuda $ayuda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ayuda $ayuda)
    {
        //
    }
}
