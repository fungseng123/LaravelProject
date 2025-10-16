<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    public function create(){
        $user = Auth::user();

    // Get enquiries that match logged-in user's name and email
    $enquiries = Enquiry::where('name', $user->name) ->where('email', $user->email)->orderBy('created_at', 'desc')->get();
    return view('enquiry.create', compact('enquiries'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'question' => 'required|string',
    ]);

    $enquiry = Enquiry::create([ // Link to logged-in user
        'name' => $request->name,
        'email' => $request->email,
        'question' => $request->question,
    ]);

    return redirect()->route('enquiries.show', $enquiry->id)->with('success', 'Enquiry submitted successfully.');
    }
    

public function update(Request $request, $id)
{
    $enquiry = Enquiry::findOrFail($id);
    if ($enquiry->viewed_by_admin) {
        return redirect()->back()->with('error', 'Cannot update a viewed enquiry.');
    }
    $enquiry->update($request->only(['name', 'email', 'question']));
    return redirect()->route('enquiries.show',$enquiry->id)->with('success', 'Enquiry updated successfully');
}

public function edit($id)
{
    $enquiry = Enquiry::findOrFail($id);
    if ($enquiry->viewed_by_admin) {
        return redirect()->route('enquiries.show',$enquiry->id)->with('You can only view now, please make other request');
    }
    return view('enquiry.edit', compact('enquiry'));
}

public function destroy($id)
{
    $enquiry = Enquiry::findOrFail($id);
    if ($enquiry->viewed_by_admin) {
        return redirect()->back()->with('error', 'Cannot delete a viewed enquiry. Please create a new one.');
    }
    $enquiry->delete();
    return redirect()->route('enquiry.create')->with('success', 'Delete successfully');
}


    public function show($id) {
        $enquiry = Enquiry::findOrFail($id);
        return view('enquiry.show', compact('enquiry'));
    }
    
    
}

