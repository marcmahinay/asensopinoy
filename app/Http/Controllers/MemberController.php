<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Barangay;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Define the attributes that are mass assignable



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Retrieve paginated members from the database
         $members = Member::paginate(15); // Adjust the number (15) based on how many items per page you want

         // Return a view with the paginated members
         return view('layouts.member.index', compact('members'));

         // Alternatively, return JSON response for API
         // return response()->json($members);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangays = Barangay::all();
        return view('layouts.member.create',compact('barangays')); // Ensure the view name matches the file name
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'birthdate' => 'required|date',
            'mobile_no' => 'required|string|max:20',
            'barangay_id' => 'required|exists:barangays,id',
        ]);

        $member = Member::create($request->all());

        return redirect()->route('member.index',$member->id)->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //dd($member);
        return view('layouts.member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
