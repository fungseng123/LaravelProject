<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class AdminController extends Controller
{
    public function index(){
        $enquiries = Enquiry::all(); 
        return view('admin.enquiries.index', compact('enquiries'));

    }

    public function reply(Request $request, $id){
        $enquiry =Enquiry::findorFail($id);
        $enquiry->admin_reply=$request->input('admin_reply');
        $enquiry->save();
        return redirect()->route('admin.enquiries.show', $id)
        ->with('success', 'Reply submitted successfully.');


    }

    public function adminShow($id) {
        $enquiry = Enquiry::findOrFail($id);
        
        // mark as viewed
        if (!$enquiry->viewed_by_admin) {
            $enquiry->update(['viewed_by_admin' => true]);
        }
    
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    $enquiries = \App\Models\Enquiry::where('name', 'like', "%{$query}%")
        ->orWhere('email', 'like', "%{$query}%")
        ->orWhere('question', 'like', "%{$query}%")
        ->orWhere('admin_reply', 'like', "%{$query}%")
        ->get();

    return view('admin.enquiries.search', compact('enquiries', 'query'));
}

    
}
