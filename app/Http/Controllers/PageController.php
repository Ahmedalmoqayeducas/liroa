<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::withCount('posts')->paginate(5);
        return view('pages.org-pages.read', ['data' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:expertise,projects'
        ]);

        $page = Page::create([
            'name' => $request->name,
            'type' => $request->type
        ]);

        return response()->json([
            'success' => true,
            'message' => $page ? 'Created Successfully' : 'Creation Failed'
        ], $page ? 200 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $pageId)
    {

        $page = Page::findOrFail($pageId);
        $data = $page->posts()->orderBy('id')->get();
        return view('pages.org-pages.show', compact('data'));
    }

    /**
     * User-facing display of the page.
     */


    /**
     * Show form for editing page posts.
     */
    public function editPagePosts(Page $page)
    {
        $posts = Post::all();
        $pagePosts = $page->posts;

        $posts->each(function ($post) use ($pagePosts) {
            $post->assigned = $pagePosts->contains($post);
        });

        return view('pages.org-pages.page-posts', compact('posts', 'page'));
    }

    /**
     * Update page posts relationship.
     */
    public function updatePagePosts(Request $request, Page $page)
    {
        $validator = validator($request->all(), [
            'post_id' => 'required|exists:posts,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        $page->posts()->syncWithoutDetaching([$request->post_id]);
        return response()->json([
            'success' => true,
            'message' => 'Updated successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            'type' => 'required|in:expertise,projects'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        $updated = $page->update([
            'name' => $request->name,
            'type' => $request->type
        ]);

        return response()->json([
            'success' => (bool)$updated,
            'message' => $updated ? 'Updated Successfully' : 'Update Failed'
        ], $updated ? 200 : 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json([
            'success' => true,
            'message' => 'Page moved to trash successfully'
        ], 200);
    }

    public function trash()
    {
        $trashedPages = Page::onlyTrashed()->paginate(5);
        return view('pages.org-pages.trash', ['data' => $trashedPages]);
    }

    public function restore($id)
    {
        $page = Page::onlyTrashed()->findOrFail($id);
        $page->restore();

        return redirect()->route('pages.trash')
            ->with('success', 'Page restored successfully');
    }

    public function forceDelete($id)
    {
        $page = Page::onlyTrashed()->findOrFail($id);
        $page->forceDelete();

        return redirect()->route('pages.trash')
            ->with('success', 'Page permanently deleted');
    }
}
