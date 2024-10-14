<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.officials.official', ['officials' => Official::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.officials.add-official');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = '';
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'position' => 'required|in:Punong Barangay,Barangay Kagawad,SK Chairman,Barangay Secretary,Barangay Clerk,Barangay Record Keeper',
            'status' => 'required|in:active,inactive',
            'term_start' => 'required|date',
            'term_end' => 'required|date',
            'email' => 'required|email|max:255',
            'gender' => 'required|in:Male,Female',
            'contact_number' => 'required|string|max:15',
            'image' => 'nullable|image|max:2048',
        ]);
        
        $positionCount = Official::where('position', $validatedData['position'])->count();

        if ($validatedData['position'] === 'Punong Barangay' && $positionCount >= 1) {
            return redirect()->back()->withErrors(['position' => 'Only one Punong Barangay is allowed.']);
        } elseif ($validatedData['position'] === 'Barangay Kagawad' && $positionCount >= 7) {
            return redirect()->back()->withErrors(['position' => 'Only seven Barangay Kagawad are allowed.']);
        } elseif ($validatedData['position'] === 'SK Chairman' && $positionCount >= 1) {
            return redirect()->back()->withErrors(['position' => 'Only one SK Chairman is allowed.']);
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        Official::create($validatedData);

        return redirect()->back()->with('success', 'Official added successfully!');
    }
    public function show(Official $official)
    {

    }
    public function edit($id)
    {
        return view(
            'admin.officials.edit-official',
            [
                'official' => Official::findOrFail($id)
            ]
        );
    }
    public function update(Request $request, $id)
    {
        dd($request);
        $official = Official::findOrFail($id);
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'official_status' => 'required|string|in:active,inactive',
            'term_start' => 'required|date',
            'term_end' => 'required|date',
            'email' => 'required|email|max:255',
            'gender' => 'required|string|in:Male,Female',
            'contact_number' => 'required|string|max:15',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        dd($validatedData);
        $positionCount = Official::where('position', $validatedData['position'])
        ->where('id', '!=', $id) 
        ->count();

        if ($validatedData['position'] === 'Punong Barangay' && $positionCount >= 1) {
            return redirect()->back()->withErrors(['position' => 'Only one Punong Barangay is allowed.']);
        } elseif ($validatedData['position'] === 'Barangay Kagawad' && $positionCount >= 7) {
            return redirect()->back()->withErrors(['position' => 'Only seven Barangay Kagawad are allowed.']);
        } elseif ($validatedData['position'] === 'SK Chairman' && $positionCount >= 1) {
            return redirect()->back()->withErrors(['position' => 'Only one SK Chairman is allowed.']);
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            if ($official->image) {
                Storage::delete($official->image);
            }
            $validatedData['image'] = $imagePath;
        }

        $official->update($validatedData);

        return redirect()->route('admin.official')->with('success', 'Official details updated successfully!');
    }
    public function destroy($id)
    {
        $data = Official::find($id);

        $data->delete();

        return back()->with('success', "User successfully deleted.");
    }
}
