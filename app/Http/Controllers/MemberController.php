<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    // Define the attributes that are mass assignable



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Retrieve paginated members from the database
         $members = Member::orderBy('lastname','asc')->orderBy('firstname','asc')->paginate(100); // Adjust the number (15) based on how many items per page you want

         // Return a view with the paginated members
         return view('adminwrap.member.index', compact('members'));

         // Alternatively, return JSON response for API
         // return response()->json($members);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Barangay $barangay)
    {
        //$barangays = Barangay::all();
        return view('adminwrap.member.create',compact('barangay')); // Ensure the view name matches the file name
    }

    public function changeStatus(Request $request, Member $member)
    {
        // Toggle status
        $member->status = !$member->status;
        $member->save();

        // Return the updated status
        return response()->json(['status' => $member->status]);
    }

    public function generateNewAsensoId() {
        //$lastId = Member::where('asenso_id', 'like', '')
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asenso_id' => 'required|string|unique:members,asenso_id',
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
    public function show($asenso_id)
    {
        //dd($member);
        $member = Member::with(['ayudas' => function ($query) {
            $query->orderBy('pivot_date_availed', 'desc');
        }])->where('asenso_id',$asenso_id)->first();

        if (!$member) {
            abort(404);
        }
        //dd($member);
       // if (Auth::check()) {
            return view('adminwrap.member.show',compact('member'));
       /*  } else {
            return view('adminwrap.member.guest', compact('member'));
        } */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('adminwrap.member.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'present_address' => 'required|string',
            'birthdate' => 'required|date|before:today',
            'mobile_no' => 'required|string',
            'contact_person' => 'required|string|max:255',
            'contact_address' => 'required|string|max:255',
            'contact_mobile' => 'required|string|max:255',
        ]);

        $member = Member::findOrFail($id);
        $member->lastname = $request->input('lastname');
        $member->firstname = $request->input('firstname');
        $member->middlename = $request->input('middlename');
        $member->present_address = $request->input('present_address');
        $member->birthdate = $request->input('birthdate');
        $member->birthplace = $request->input('birthplace');
        $member->sex = $request->input('sex');
        $member->civil_status = $request->input('civil_status');
        $member->blood_type = $request->input('blood_type');
        $member->position = $request->input('position');
        $member->profession = $request->input('profession');
        $member->email = $request->input('email');
        $member->mobile_no = $request->input('mobile_no');
        $member->contact_person = $request->input('contact_person');
        $member->contact_address = $request->input('contact_address');
        $member->contact_mobile = $request->input('contact_mobile');
        $member->save();

        return redirect()->back()->with('success', 'Member updated successfully.');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if(strlen($query) < 3) {
            return redirect()->route('member.index')->with('error', 'Search query must be at least 3 characters.');
        }

        $members = Member::where('lastname', 'LIKE', "%{$query}%")
                        ->orWhere('firstname', 'LIKE', "%{$query}%")
                        ->orWhere('asenso_id', 'LIKE', "%{$query}%")
                        ->paginate(50);

        return view('adminwrap.member.search', compact('members', 'query'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
