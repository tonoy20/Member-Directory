<?php

namespace App\Http\Controllers;

use App\Models\Carosel;
use Illuminate\Http\Request;

class CaroselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carosels = Carosel::all();
     
        return view('admin.carosels.index',compact('carosels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carosels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       $request->validate([
        'image1' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        'image2' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        'image3' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
    ]);
        

        $carosel = new Carosel();
        $path = "uploads/carosels";

  
        if ($request->hasFile('image1')) {
            $imageFile = $request->file('image1');
            $imageName = time() . '_1.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $carosel->image1 = $path . '/' . $imageName;
        }

        if ($request->hasFile('image2')) {
            $imageFile = $request->file('image2');
            $imageName = time() . '_2.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $carosel->image2 = $path . '/' . $imageName;
        }

        if ($request->hasFile('image3')) {
            $imageFile = $request->file('image3');
            $imageName = time() . '_3.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $carosel->image3 = $path . '/' . $imageName;
        }

        $carosel->save();

        return redirect()->route('carosels.index')->with('success', 'Carousel item created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Carosel $carosel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $carosel = Carosel::findOrFail($id);
    return view('admin.carosels.edit', compact('carosel'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image1' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        'image2' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        'image3' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:4048',
        ]);
    
        $carosel = Carosel::findOrFail($id);
        $path = "uploads/carosels";
    
        if ($request->hasFile('image1')) {
            // Delete old image if exists
            if ($carosel->image1 && file_exists(public_path($carosel->image1))) {
                unlink(public_path($carosel->image1));
            }
    
            $imageFile = $request->file('image1');
            $imageName = time() . '_1.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $carosel->image1 = $path . '/' . $imageName;
        }
    
        if ($request->hasFile('image2')) {
            // Delete old image if exists
            if ($carosel->image2 && file_exists(public_path($carosel->image2))) {
                unlink(public_path($carosel->image2));
            }
    
            $imageFile = $request->file('image2');
            $imageName = time() . '_2.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $carosel->image2 = $path . '/' . $imageName;
        }
    
        if ($request->hasFile('image3')) {
            // Delete old image if exists
            if ($carosel->image3 && file_exists(public_path($carosel->image3))) {
                unlink(public_path($carosel->image3));
            }
    
            $imageFile = $request->file('image3');
            $imageName = time() . '_3.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path($path), $imageName);
            $carosel->image3 = $path . '/' . $imageName;
        }
    
        $carosel->save();
    
        return redirect()->route('carosels.index')->with('success', 'Carousel item updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carosel = Carosel::findOrFail($id);
    
        // Delete the images if they exist
        if ($carosel->image1 && file_exists(public_path($carosel->image1))) {
            unlink(public_path($carosel->image1));
        }
    
        if ($carosel->image2 && file_exists(public_path($carosel->image2))) {
            unlink(public_path($carosel->image2));
        }
    
        if ($carosel->image3 && file_exists(public_path($carosel->image3))) {
            unlink(public_path($carosel->image3));
        }
    
        $carosel->delete();
    
        return redirect()->route('carosels.index')->with('success', 'Carousel item deleted successfully.');
    }
    
}
