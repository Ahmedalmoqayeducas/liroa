<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Goals;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function index()
    {
        $goals = Goals::latest()->paginate(10);
        return view('dashboard.goals.index', compact('goals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'required|string',
            'link' => 'required|url'
        ]);

        Goals::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Goal created successfully!'
        ]);
    }
    public function edit(Goals $goal)
    {
        return response()->json($goal);
    }
    public function update(Request $request, Goals $goal)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'required|string',
            'link' => 'required|url'
        ]);

        $goal->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Goal updated successfully!'
        ]);
    }

    public function destroy(Goals $goal)
    {
        $goal->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Goal deleted successfully!'
        ]);
    }
}
