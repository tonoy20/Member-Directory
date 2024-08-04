<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
                    'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
                ]);

      
       
        // Save the model data
        $e = new Event();
        $path = "uploads/events";

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($path, $imageName);
            $e->image = $path . '/' . $imageName;
            // Delete the old image after successful update
        }
        $e->header = $request->header;
        $e->paragraph = $request->paragraph;
        $e->save();

        // Redirect to the events index view with a success message
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit',compact('event'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate request inputs
        $request->validate([
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        ]);
    
        // Find the event by ID
        $e = Event::findOrFail($id);
    
        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($e->image && file_exists(public_path($e->image))) {
                unlink(public_path($e->image));
            }
    
            // Upload new image
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move('uploads/events', $imageName);
            $e->image = 'uploads/events/' . $imageName;
        }
    
        // Update other fields
        $e->header = $request->header;
        $e->paragraph = $request->paragraph;
        $e->save();
    
        // Redirect to events index with success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the event by ID
        $event = Event::findOrFail($id);
    
        // Delete the event image from the server if it exists
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }
    
        // Delete the event record
        $event->delete();
    
        // Redirect to events index with success message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
    
}
