<?php

namespace App\Http\Controllers;

use App\Models\activities;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd('hello world');           // Get paginated contacts to display
        $data = Post::where('activities', '=', '1')->paginate();
        // $data = Post::all();
        // dd(array($data));
        // Return a view with the data
        return view('pages.org-pages.activities-manage', compact('data'));
    }


    // public function updatePagePosts(Request $request)
    // {
    //     $validator = validator($request->all(), [
    //         'post_id' => 'required|exists:posts,id',
    //     ]);
    //     if (!$validator->fails()) {
    //         $page->posts()->attach($request->post_id);
    //         return response()->json(['status' => true, 'message' => 'updated successfully'], 200);
    //     } else {
    //         return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(activities $activities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Ensure you're not validating 'name' if it doesn't exist in the model.
        $validated = $request->validate([
            'activities' => 'required|boolean',
            // Remove 'name' if it's not part of your table
        ]);

        // Perform the update
        $post->update(['activities' => true]);

        return response()->json([
            'status' => true,
            'message' => 'Added Successfully'
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activities $activities)
    {
        //
    }
}
