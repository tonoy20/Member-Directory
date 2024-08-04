<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function api()
    {
        $members = MemberResource::collection(Member::all());
        return response()->json($members);
    }
    /**
     * Display a listing of the resource.
     */
    public function frotnendMembers()
    {
        $members = Member::where('status', 'approved')->orderBy('id', 'desc')->paginate(9); // Display 10 records per page

        return view('frontend.registerMember.index', compact('members'));
    }

    public function index()
    {
        $members = Member::paginate(10); // Display 10 records per page
        return view('backend.admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    
        $e = new Member;
        $e->name_bangla = $request->nameB;
        $e->name_english = $request->nameE;
        $e->upazilla = $request->upazilla;
        $e->profession = $request->profession;
        $e->blood_group = $request->b_grp;
        $e->school_name = $request->schoolname;
        $e->gender = $request->gender;
        $e->present_address = $request->presentAddress;
        $e->permanent_address = $request->permanentAddress;
        $e->fb_url = $request->fb_url;
        $e->reference = $request->reference;
        $e->phone_number = $request->phoneNumber;
        $e->email = $request->email;

        $path = "uploads/members";

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($path, $imageName);
            $e->image = $path . '/' . $imageName;
            // Delete the old image after successful update
        }

        $e->save();

        return redirect()->route('frontend.index')->with('success', 'your application sumitted successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('backend.admin.members.edit', compact('member'));
    }
    
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
    
        $request->validate([
            // Add your validation rules here
        ]);
    
        $member->name_bangla = $request->nameB;
        $member->name_english = $request->nameE;
        $member->upazilla = $request->upazilla;
        $member->profession = $request->profession;
        $member->blood_group = $request->b_grp;
        $member->school_name = $request->schoolname;
        $member->gender = $request->gender;
        $member->present_address = $request->presentAddress;
        $member->permanent_address = $request->permanentAddress;
        $member->fb_url = $request->fb_url;
        $member->reference = $request->reference;
        $member->phone_number = $request->phoneNumber;
        $member->email = $request->email;
    
        $path = "uploads/members";
    
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($member->image && file_exists(public_path($member->image))) {
                unlink(public_path($member->image));
            }
    
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($path, $imageName);
            $member->image = $path . '/' . $imageName;
        }
    
        $member->save();
    
        return redirect()->route('backend.registerMember.index')->with('success', 'Member updated successfully!');
    }
    
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
    
        // Delete the image if exists
        if ($member->image && file_exists(public_path($member->image))) {
            unlink(public_path($member->image));
        }
    
        $member->delete();
    
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
    


    public function changeStatus(Request $request)
    {
        $member = Member::findOrFail($request->member_id);
        $member->status = $request->status;
        $member->save();

        return response()->json(['success' => 'status updated successfully']);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');


        /* $x,$y y<data<x */

        // Perform search logic, for example:
        if ($search != '') {
            $members = Member::where('name_english', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('profession', 'like', '%' . $search . '%')
                ->orWhere('blood_group', 'like', '%' . $search . '%')
                ->orWhere('upazilla', 'like', '%' . $search . '%')
                ->orWhere('school_name', 'like', '%' . $search . '%')
                ->orWhere('phone_number', 'like', '%' . $search . '%')
                ->paginate(10);
        } else {
            $members = Member::all();
            $members-- > paginate(10);
        }


        // Load the updated table rows into a view and return it as HTML
        return response()->json($members);
    }

    public function details($id)
    {
        $member = Member::find($id);
        return view('frontend.registerMember.details', compact('member'));
    }
}
