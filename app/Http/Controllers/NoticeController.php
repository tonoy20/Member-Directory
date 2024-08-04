<?php 

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::all();
        return view('admin.notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        ]);

        // Create a new notice
        $notice = new Notice();
        $path = "uploads/notices";

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $notice->image = $path . '/' . $imageName;
        }

        $notice->header = $request->header;
        $notice->paragraph = $request->paragraph;
        $notice->save();

        return redirect()->route('notices.index')->with('success', 'Notice created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notices.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $notice = Notice::findOrFail($id);
        $path = "uploads/notices";

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($notice->image && file_exists(public_path($notice->image))) {
                unlink(public_path($notice->image));
            }

            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $notice->image = $path . '/' . $imageName;
        }

        $notice->header = $request->header;
        $notice->paragraph = $request->paragraph;
        $notice->save();

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);

        // Delete the image if it exists
        if ($notice->image && file_exists(public_path($notice->image))) {
            unlink(public_path($notice->image));
        }

        $notice->delete();

        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
