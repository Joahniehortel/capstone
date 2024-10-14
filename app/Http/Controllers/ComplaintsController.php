<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ComplaintsController extends Controller
{
    public function index(){
        $onProcess = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->whereIn('complaints.complaint_status', ['Pending', 'In Review']) 
            ->get();
        
        $resolved = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->where('complaints.complaint_status', 'Resolved') 
            ->get();

        $escalated = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->where('complaints.complaint_status', 'Escalated') 
            ->get();

        $rejected = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->where('complaints.complaint_status', 'Rejected') 
            ->get();

        return view('admin.complaints')
            ->with('onProcesses', $onProcess)
            ->with('resolves', $resolved)
            ->with('escalates', $escalated)
            ->with('rejects', $rejected);
    }

    public function submitComplain(Request $request){
        $request->validate([
            'complaint_title' => 'required|string|max:255',
            'complaint_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'date_occured' => 'required|date|before_or_equal:today',
            'complaint_address' => 'required|string|max:255',
            'complaint_details' => 'required|string',
        ]);
    
        $imagePath = null;

        if($request->hasFile('complaint_image')){
            $image = $request->file('complaint_image');
            $imagePath = $image->store('complaints', 'public');
        }
        Complaint::create([
            'complaint_title' => $request->input('complaint_title'),
            'complaint_image' => $imagePath,
            'complaint_status' => 'Pending',
            'date_occured' => $request->input('date_occured'),
            'complaint_address' => $request->input('complaint_address'),
            'complaint_detail' => $request->input('complaint_details'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->back()->with('success', 'Complaint successfully submitted');
    }
    public function editComplaintDetails($id = null){
        $complaint = $id ? Complaint::findOrFail($id) : null;

        return view('user.services.complaint')->with('complaint', $complaint);
    }
    public function updateComplaintDetails(Request $request, $id)
    {  
        $complaint = Complaint::findOrFail($id);
        
        $data = [
            'complaint_title' => $request->input('complaint_title'),
            'complaint_address' => $request->input('complaint_address'),
            'date_occured' => $request->input('date_occured'),
            'complaint_details' => $request->input('complaint_details'),
        ];
    
        if ($request->hasFile('complaint_image')) {
            // Store the uploaded image and get the path
            $imagePath = $request->file('complaint_image')->store('complaints', 'public');
            $data['complaint_image'] = $imagePath;
        }
        $complaint->update($data);
        return redirect()->route('home')->with('success', 'Complaint updated successfully');
    }
    

    public function updateComplaintStatus(Request $request, $id){
        $complaint = Complaint::findOrFail($id);

        $complaint->complaint_status = $request->input('complaint_status');

        $complaint->save();

        return redirect()->route('admin.complaint')->with('success', 'Complaint status updated successfully!');
    }
}
