<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UserComplaintNotification;

class ComplaintsController extends Controller
{
    public function index(){
        $onProcess = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->whereIn('complaints.complaint_status', ['Pending', 'In Review']) 
            ->orderBy('complaints.created_at', 'desc')
            ->get();
        
        $resolved = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->where('complaints.complaint_status', 'Resolved') 
            ->orderBy('complaints.created_at', 'desc') // Sort by created_at in descending order
            ->get();

        $escalated = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->where('complaints.complaint_status', 'Escalated') 
            ->orderBy('complaints.created_at', 'desc') // Sort by created_at in descending order
            ->get();

            $rejected = DB::table('complaints')
            ->join('users', 'complaints.user_id', '=', 'users.id')
            ->select('complaints.*', 'users.firstname', 'users.lastname', 'users.email')
            ->where('complaints.complaint_status', 'Rejected')
            ->orderBy('complaints.created_at', 'desc') // Sort by created_at in descending order
            ->get();

        return view('admin.complaints')
            ->with('onProcesses', $onProcess)
            ->with('resolves', $resolved)
            ->with('escalates', $escalated)
            ->with('rejects', $rejected);
    }

    public function submitComplain(Request $request){
        // dd($request->all());
        $request->validate([
            'complaint_title' => 'required|string|max:255',
            'date_occured' => 'required|date|before_or_equal:today',
            'complaint_address' => 'required|string|max:255',
            'complaint_details' => 'required|string',
        ]);
        $user = Auth::user();
        if($user->status == 'unverified'){
            return back()->with('error', 'You need to verify your account first');
        }
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

        return view('user.services.complaint-edit')->with('complaint', $complaint);
    }
    public function updateComplaintDetails(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
    
        $validator = Validator::make($request->all(), [
            'complaint_title' => 'required|string|max:255',
            'complaint_address' => 'required|string|max:255',
            'date_occured' => 'required|date',
            'complaint_details' => 'required|string',
            'note' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Prepare the data for update
        $data = [
            'complaint_title' => $request->input('complaint_title'),
            'complaint_address' => $request->input('complaint_address'),
            'date_occured' => $request->input('date_occured'),
            'complaint_details' => $request->input('complaint_details'),
            'complaint_additional_message' => $request->input('note'),
        ];
    
        // Handle the complaint image upload
        if ($request->hasFile('complaint_image')) {
            // Store the new image and update the path in the data array
            $imagePath = $request->file('complaint_image')->store('complaints', 'public');
            $data['complaint_image'] = $imagePath;
    
            // Optionally, delete the old image if needed
            if ($complaint->complaint_image) {
                Storage::disk('public')->delete($complaint->complaint_image);
            }
        }
        $complaint->update($data);

        return redirect()->route('complaint.form')->with('success', 'Complaint updated successfully.');
    }
    

    public function updateComplaintStatus(Request $request, $id){
        $complaint = Complaint::findOrFail($id);

        $complaint->complaint_additional_message = $request->input('note');
        $complaint->complaint_status = $request->input('complaint_status');
        $complaint_additional_message = $request->input('additional_message');
        $complaintStatus = $complaint->complaint_status;
        $notificationType = 'Complaint';
        $complaint->user->notify(new UserComplaintNotification($notificationType, $complaint_additional_message, $complaintStatus));
        $complaint->save();

        return redirect()->route('admin.complaint')->with('success', 'Complaint status updated successfully!');
    }

    public function destroy(string $id){
        $data = Complaint::find($id);
        $data->delete();

        return back()->with('success', 'Your complaint has been successfully canceled.');
    }

}
