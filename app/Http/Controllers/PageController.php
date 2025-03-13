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
        //
        $pages = Page::withCount('posts')->paginate('5');
        return view('pages.org-pages.read', ['data' => $pages]);
        // return view('pages.org-pages.read', ['data' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return route();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $page = new Page();
        $page->name = $request->input('name');
        $saved = $page->save();
        return response()->json(['status' => true, 'message' => $saved ? 'Created Successfully' : 'Created Failed'], $saved ? 200 : 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $pageId)
    {
        // Find the page by its ID (or fail with a 404 if not found)
        $page = Page::findOrFail($pageId);

        // Fetch related posts, ordered by id (ascending).
        // Rename to $data so the Blade can do @foreach($data as $element)
        $data = $page->posts()->orderBy('id')->get();

        // Return the Blade view 'pages.org-pages.show' with the $data collection
        return view('pages.org-pages.show', compact('data'));
    }
    public function userShow(int $pageId)
    {
        // Find the page by its ID (or fail with a 404 if not found)
        $page = Page::findOrFail($pageId);
        $data = Page::all();
        // Fetch related posts, ordered by id (ascending).
        // Rename to $data so the Blade can do @foreach($data as $element)
        $posts = $page->posts()->orderBy('id')->get();

        // Return the Blade view 'pages.org-pages.show' with the $posts collection
        return view('pages.org.staticPage', ['posts' => $posts, 'page' => $page, 'data' => $data]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    public function editPagePosts(Request $request, Page $page)
    {
        $posts = Post::all();
        $pagePosts = $page->posts;
        // dd($pagePosts);
        if (count($pagePosts) > 0) {
            foreach ($pagePosts as $pagePost) {
                foreach ($posts as $post) {
                    if ($pagePost->id == $post->id) {
                        $post->setAttribute('assigned', true);
                    }
                }
            }
        }


        return view('pages.org-pages.page-posts', ['posts' => $posts, 'page' => $page]);
    }
    public function updatePagePosts(Request $request, Page $page)
    {
        $validator = validator($request->all(), [
            'post_id' => 'required|exists:posts,id',
        ]);
        if (!$validator->fails()) {
            $page->posts()->attach($request->post_id);
            return response()->json(['status' => true, 'message' => 'updated successfully'], 200);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Page $page)
    // {
    //     //
    //     $validator = validator($request->all(), [
    //         'name' => 'required|string|min:3',
    //         // 'guard_name' => 'required|string|in:admin,user',
    //     ]);
    //     if (!$validator->fails()) {
    //         $page->name = $request->input('name');

    //         $updated = $page->save();
    //         return response()->json(['status' => true, 'message' => $updated ? "Updated Succefully" : "Updated Falied"], 200);
    //     } else {
    //         return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    //     $deletedRow = Page::destroy($id);
    //     // $deleted = $deletedRow > 0;
    //     return response()->json(['status' => $deletedRow > 0, 'message' => $deletedRow > 0 ? "Deleted Successfully" : "Deleted Failed"], $deletedRow > 0 ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    // }

    public function update(Request $request, Page $page)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
        ]);

        if (!$validator->fails()) {
            $page->name = $request->input('name');
            $updated = $page->save();

            return response()->json([
                'success' => true,
                'message' => $updated ? "Updated Successfully" : "Update Failed"
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => $validator->getMessageBag()->first()
            ], 400);
        }
    }

    public function destroy(string $id)
    {
        $deletedRow = Page::destroy($id);

        return response()->json([
            'success' => ($deletedRow > 0),
            'message' => ($deletedRow > 0) ? "Deleted Successfully" : "Delete Failed"
        ], ($deletedRow > 0) ? 200 : 400);
    }

    public function trash()
    {
        //
    }
}
