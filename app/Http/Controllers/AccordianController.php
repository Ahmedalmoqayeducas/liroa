<?php

namespace App\Http\Controllers;

use App\Models\Accordian;
use Illuminate\Http\Request;

class AccordianController extends Controller
{
    public function index()
    {
        $accordians = Accordian::paginate(10);
        // return view('accordians.index', compact('accordians'));

        return view('accordians.index', compact('accordians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $acc = new Accordian();
        $acc->title       = $request->title;
        $acc->description = $request->description;
        $saved = $acc->save();

        if ($saved) {
            return response()->json([
                'status' => true,
                'message' => 'Accordion created successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create accordion.',
            ], 500);
        }
    }

    public function show($id)
    {
        $acc = Accordian::findOrFail($id);
        return response()->json($acc);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $acc = Accordian::findOrFail($id);
        $acc->title       = $request->title;
        $acc->description = $request->description;
        $updated = $acc->save();

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Accordion updated successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update accordion.',
            ], 500);
        }
    }

    public function destroy($id)
    {
        $acc = Accordian::findOrFail($id);
        $deleted = $acc->delete();

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Accordion deleted successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete accordion.',
            ], 500);
        }
    }
}
