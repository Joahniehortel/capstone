<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.announcement.announcement', ['announcements' => Announcement::all()]);
    }

    public function viewIndex()
    {
        $announcements = Announcement::all();
    
        $truncatedAnnouncements = [];
    
        foreach ($announcements as $announcement) {
            $truncatedAnnouncements[] = [
                'id' => $announcement->id,
                'title' => $announcement->title, 
                'truncated_content' => Str::words(strip_tags($announcement->content), 60, '...')
            ];
        }
        return view('user.announcement', [
            'truncatedAnnouncements' => $truncatedAnnouncements,
            'announcements' => $announcements
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcement.add-announcement');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        if($request->hasFile('image'))
        {
            $image = $request->file('image')->store('announcements', 'public');
        }
        else{
            $image = null;
        }
        Announcement::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $image
        ]);
        return to_route('admin.announcement.create')->with('success', 'Announcement created successfully!');;
    }
    // public function upload(Request $request)
    // {
    //     if ($request->hasFile('upload')) {
    //         $file = $request->file('upload');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $filePath = $file->storeAs('uploads', $filename, 'public');

    //         $url = asset('storage/' . $filePath);

    //         return redirect('announcement')->with('url', $url);
    //     }
    //     return;
    // }
    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.announcement.edit-announcement',[
            'announcement' => Announcement::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);
    
    $announcement = Announcement::findOrFail($id);
    $image = null;
    if ($request->hasFile('image_path')) {
 
        $image = $request->file('image_path')->store('announcements', 'public');
    }

    $announcement->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'image_path' => $image ?? $announcement->image_path 
    ]);

    return redirect()->route('admin.announcement')->with('success', 'Announcement updated successfully!');
}

    
    public function destroy($id)
    {   
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcement')->with('success', 'Announcement deleted successfully.');
    }
}
