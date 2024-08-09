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
        $ayudas = Ayuda::orderBy('description')->paginate(50); // Adjust the number (15) based on how many items per page you want

        // Return a view with the paginated members
        return view('adminwrap.ayuda.index', compact('ayudas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminwrap.ayuda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ayuda_name' => 'required|string',
        ]);

        $ayuda = new Ayuda();
        $ayuda->description = $request->input('ayuda_name');
        $ayuda->save();

        return redirect()->back()->with('success', $ayuda->description . ' created successfully.');
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
        return view('adminwrap.ayuda.edit', compact('ayuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ayuda $ayuda)
    {
        $validated = $request->validate([
            'ayuda_name' => 'required|string|max:255',
        ]);

        $ayuda = Ayuda::findOrFail($ayuda->id);
        $ayuda->description = $request->input('ayuda_name');
        $ayuda->save();

        return redirect()->back()->with('success', 'Ayuda updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ayuda $ayuda)
    {

        $ayuda = Ayuda::findOrFail($ayuda->id);
        $deleted_ayuda = $ayuda->description;
        $ayuda->delete();
        return redirect()->back()->with('success', $deleted_ayuda . ' deleted successfully.');
    }
}
