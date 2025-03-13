<?php

namespace App\Http\Controllers;

use App\Models\HoverContent;
use Illuminate\Http\Request;

class HoverContentController extends Controller
{
    public function index()
    {
        $hovers = HoverContent::paginate(10);
        // return view('hovers.index', compact('hovers'));
        // or JSON:
        // return response()->json($hovers);

        return view('hovers.index', compact('hovers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $hover = new HoverContent();
        $hover->content = $request->content;
        $saved = $hover->save();

        if ($saved) {
            return response()->json([
                'status' => true,
                'message' => 'Hover content created successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create hover content.',
            ], 500);
        }
    }

    public function show($id)
    {
        $hover = HoverContent::findOrFail($id);
        return response()->json($hover);
        // or view('hovers.show', compact('hover'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $hover = HoverContent::findOrFail($id);
        $hover->content = $request->content;
        $updated = $hover->save();

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Hover content updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update hover content.',
            ], 500);
        }
    }

    public function destroy($id)
    {
        $hover = HoverContent::findOrFail($id);
        $deleted = $hover->delete();

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Hover content deleted successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete hover content.',
            ], 500);
        }
    }
}
