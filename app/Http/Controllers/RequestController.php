<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentRequest;
use Illuminate\Support\Facades\DB;
use App\Notifications\UserNotification;


class RequestController extends Controller
{
    public function index(){

        $document_requests = DB::table('document_requests')
        ->join('users', 'document_requests.user_id', '=', 'users.id') // Join the users table
        ->whereIn('document_requests.request_status', ['Pending', 'Processing']) // Filter by status
        ->select('document_requests.*', 'users.firstname', 'users.lastname', 'users.contact_no', 'users.email') // Select fields
        ->orderBy('document_requests.created_at', 'asc') // Sort by creation date
        ->get();
        $readyRequest = DB::table('document_requests')
        ->join('users', 'document_requests.user_id', '=', 'users.id')
        ->where('request_status', 'Ready for pick up') 
        ->select('document_requests.*', 'users.firstname', 'users.lastname') // Select desired fields
        ->get();

        $completed = DB::table('document_requests')
        ->join('users', 'document_requests.user_id', '=', 'users.id')
        ->select('document_requests.*', 'users.firstname', 'users.lastname', 'users.contact_no', 'users.email') // Select desired fields
        ->where('request_status', 'Completed') 
        ->get();

        $rejected = DB::table('document_requests')
        ->join('users', 'document_requests.user_id', '=', 'users.id')
        ->where('request_status', 'Rejected') 
        ->select('document_requests.*', 'users.firstname', 'users.lastname') // Select desired fields
        ->get();
        return view('admin.request')
        ->with('document_requests', $document_requests)
        ->with('readyRequest', $readyRequest)
        ->with('completed', $completed)
        ->with('rejected', $rejected);
    }   
    public function update(Request $request, $id) {
        $document_requests = DocumentRequest::where('id', $id)->first();
        $document_requests->request_status = $request->input('status');
        $document_requests->additional_message = $request->input('additional_message');
        $document_requests->save();

        $document_status = $document_requests['request_status'];
        $document_file_name = $document_requests['request_file_name'];
        $notification_type = 'Document Request';
        $additional_message = $request->input('additional_message');
        $document_requests->user->notify(new UserNotification($document_requests, $notification_type, $additional_message, $document_file_name, $document_status));
        return redirect()->route('admin.request')->with('success', 'Document request updated successfully.');
    }
    
    public function destroy($id){
        $documentRequest = DocumentRequest::findOrFail($id);
        $documentRequest->delete();

        return redirect()->back()->with('success', 'Document request deleted successfully.');
    }
}
