<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'about' => 'required|string',
            'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4096', // increased max file size to 4MB
        ]);

        $about = new About();
        $about->header = $request->header;
        $about->about = $request->about;
        $about->mission_header = $request->mission_header;
        $about->mission_text = $request->mission_text;
        $about->vision_header = $request->vision_header;
        $about->vision_text = $request->vision_text;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $path = 'uploads/about';
            $imageFile->move($path, $imageName);
            $about->image = $path . '/' . $imageName;
        }

        $about->save();

        return redirect()->route('admin.about.index')
            ->with('success', 'About information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::find($id);

        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'about' => 'required|string',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4096', // increased max file size to 4MB
        ]);

        $about->header = $request->header;
        $about->about = $request->about;
        $about->mission_header = $request->mission_header;
        $about->mission_text = $request->mission_text;
        $about->vision_header = $request->vision_header;
        $about->vision_text = $request->vision_text;

        if ($request->hasFile('image')) {
            // Delete old image if exists
           
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $path = 'uploads/about';
            $imageFile->move($path, $imageName);
            $about->image = $path . '/' . $imageName;
        }

        $about->save();

        return redirect()->route('admin.about.index')
            ->with('success', 'About information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        // Delete associated image file
        if ($about->image && file_exists(public_path($about->image))) {
            unlink(public_path($about->image));
        }

        $about->delete();

        return redirect()->route('admin.about.index')
            ->with('success', 'About information deleted successfully.');
    }
}
