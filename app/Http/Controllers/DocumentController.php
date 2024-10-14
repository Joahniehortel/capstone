<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class DocumentController extends Controller
{
    public function index(){
        return view("user.services.request", ['documents' => Document::all()]);
    }
    public function documentRequest(Request $request){
        $request->validate([
            'request_file_name' => 'required|string|max:255',
            'number_copies' => 'required|integer|min:1',
            'preferred_date' => 'required|date|after_or_equal:today',
            'request_purpose' => 'required|string|max:500',
        ]);
        $dateNow = Date::now();
        $dateNow->format('d-m-Y');
        
        if(!Auth::check()){
            return to_route('login');
        }
        $user = Auth::user();
        if($user->status == 'verified' && $user->contact_no != ''){
            DocumentRequest::create([
                'request_file_name' => $request->input('request_file_name'),
                'number_copies' => $request->input('number_copies'),
                'preferred_date' => $request->input('preferred_date'),
                'request_purpose' => $request->input('request_purpose'),
                'user_id' => $user->id,
                'date_requested' => $dateNow,
                'contact_no' => Auth::user()->contact_no
            ]);

            return to_route('user.request')->with('success', 'Document request submitted!');
        }elseif($user->status == 'verifying' || $user->status == 'unverified'){
            return to_route('user.request')->with('error-toast', 'Please verify your account first');
        }else{
            return to_route('user.request')->with('error-toast', 'Please add a contact number to your account.');
        }
    }
    public function documentRequestUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'number_copies' => 'required|integer|min:1',
            'preferred_date' => 'nullable|date',
            'request_purpose' => 'required|string|max:255',
        ]);
    
        $documentRequest = DocumentRequest::findOrFail($id);
    
        $documentRequest->number_copies = $validatedData['number_copies'];
        $documentRequest->preferred_date = $validatedData['preferred_date'];
        $documentRequest->request_purpose = $validatedData['request_purpose'];
    
        $documentRequest->save();
    
        return redirect()->back()->with('success', 'Document request updated successfully!');
    }
    
    public function documents(){
        return view('admin.document.document')->with('documents', value: Document::all());
    }
    public function store(Request $request){
        try {
            Document::create($request->all());
        } catch (\Exception $e) { 
            return redirect()->back()->with('error', 'Failed to add document. Please try again.');
        }
        return redirect()->back()->with('success', 'Document added successfully');
    }
    public function documentUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'file_name' => 'required|string|max:255',
            'file_details' => 'nullable|string',
        ]);
    
        $document = Document::findOrFail($id);
    
        $document->update([
            'file_name' => $validatedData['file_name'],
            'file_details' => $validatedData['file_details']
        ]);
    
        return redirect()->back()->with('success', 'Document updated successfully.');
    }   

    public function destroy($id){
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}
