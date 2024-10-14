<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents =  Resident::all();
        return view('admin.residents.residents')->with('residents', $residents);
    }

    public function create()
    {
        return view('admin.resident-add');
    }

    public function store(Request $request)
    {
        $resident_type = '';

        $validated = $request->validate([
            'image' => 'nullable|image|max:2048', // Optional image, max size 2MB
            'ice_fullname' => 'required|string|max:255',
            'ice_address' => 'required|string|max:255',
            'ice_relationship' => 'required|string|max:255',
            'ice_contactNumber' => 'required|numeric|digits_between:10,15',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'age' => 'required|integer|min:1',
            'birthPlace' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'address' => 'required|string|max:255',
            'purokNumber' => 'required|string|max:10',
            'totalHousehold' => 'required|integer|min:1',
            'voter' => 'required|string|in:Yes,No',
            'maritalStatus' => 'required|string|in:single,married,divorced,separated',
            'nationality' => 'required|string|max:255',
            'religion' => 'nullable|string|max:255',
            'pwd' => 'required|string|in:Yes,No',
            'ethnicity' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'MonthlyIncome' => 'nullable|numeric|min:0',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('residents', 'public');
            $validated['image'] = $imagePath;
        }
        Resident::create([$validated, $validated['occupation'] => $request->input('occupation')]);

        return redirect()->back()->with('success', 'Resident data stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('residents')->find($id);
        return view('admin.residents.resident.edit', ['resident' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('residents')->find($id);
        return view('admin.residents.resident-edit', ['resident' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Resident::findOrFail($id);

        $data->update($request->all());

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Resident::find($id);
        $data->delete();

        return back();
    }


}
