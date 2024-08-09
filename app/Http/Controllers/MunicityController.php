<?php

namespace App\Http\Controllers;

use App\Models\Municity;
use Illuminate\Http\Request;

class MunicityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municities = Municity::orderBy('name')->get();
        return view('adminwrap.municity.index',compact('municities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminwrap.municity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'municity_name' => 'required|string',
        ]);

        $municity = new Municity();
        $municity->name = $request->input('municity_name');
        $municity->save();

        return redirect()->back()->with('success', 'City/Municipality created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Municity $municity)
    {
        return view('adminwrap.municity.show-barangay',compact('municity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municity $municity)
    {
        //$municity = Municity::findOrFail($id);
        return view('adminwrap.municity.edit', compact('municity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Municity $municity)
    {
        $validated = $request->validate([
            'municity_name' => 'required|string|max:255',
        ]);

        $municity = Municity::findOrFail($municity->id);
        $municity->name = $request->input('municity_name');
        $municity->save();

        return redirect()->back()->with('success', 'City/Municipality name updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municity $municity)
    {
        //
    }
}
