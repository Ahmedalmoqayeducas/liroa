<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    public function index()
    {
        $slides = Slide::paginate(10);
        // return view('slides.index', compact('slides'));

        return view('slides.index', compact('slides'));
    }

    public function store(Request $request)
    {
        // You might store an actual file for image (like $request->file('image')->store('slides'))
        // But for now, let's assume "image" is just a string path or URL
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|string',
        ]);

        $slide = new Slide();
        $slide->title       = $request->title;
        $slide->description = $request->description;
        $slide->image       = $request->image; // or handle file upload
        $saved = $slide->save();

        if ($saved) {
            return response()->json([
                'status' => true,
                'message' => 'Slide created successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create slide.',
            ], 500);
        }
    }

    public function show($id)
    {
        $slide = Slide::findOrFail($id);
        return response()->json($slide);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|string',
        ]);

        $slide = Slide::findOrFail($id);
        $slide->title       = $request->title;
        $slide->description = $request->description;
        $slide->image       = $request->image; // or handle file upload
        $updated = $slide->save();

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Slide updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update slide.',
            ], 500);
        }
    }

    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $deleted = $slide->delete();

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Slide deleted successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete slide.',
            ], 500);
        }
    }
}
