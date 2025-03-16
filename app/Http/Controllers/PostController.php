<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscriber;
use App\Notifications\NewPostNotification;
use DOMDocument;
// use DOMElement\removeAttributeNode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
// use \DOMElement\removeAttribute;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Post::paginate('8');

        return view('pages.Posts.read', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $description = $request->description;

        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time() . $key . ".png";
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();
        $admin = Auth::user();
        $post =    Post::create([
            'title' => $request->title,
            'description' => $description,
            'admin_id' => $admin->id,
        ]);


        return to_route('posts.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    { 
        return view('pages.Posts.show', ['data' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //

        return view('pages.Posts.edit', ['data' => $post]);
    }
    public function updateActivitiesPost(Request $request, Post $post)
    {
        // $post->update(['activities' => 1]);
        $post->update(['activities' => true]);
        return response()->json(
            ['status' => true, 'message' =>  'Added Successfully'],
            200
        );
    }
    public function DeleteActivitiesPost(Request $request, Post $post)
    {
        // $post->update(['activities' => 1]);
        $post->update(['activities' => false]);
        return response()->json(
            ['status' => true, 'message' =>  'Removed Successfully'],
            200
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $description = $request->description;

        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            // Check if the image is a new one
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {

                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $description = $dom->saveHTML();

        $post->update([
            'title' => $request->title,
            'description' => $description
        ]);
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //

        $dom = new DOMDocument();
        $dom->loadHTML($post->description, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');


            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $deleted =   $post->delete();
        return response()->json(
            ['status' => true, 'message' => $deleted > 0 ? 'Deleted Successfully' : 'Deleted Failed'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);

        if ($post) {
            $post->restore();
            return response()->json(['status' => true, 'message' => 'Post restored successfully'], Response::HTTP_OK);
        }

        return response()->json(['status' => false, 'message' => 'Post not found'], Response::HTTP_NOT_FOUND);
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate('8');

        return response()->view('pages.Posts.trash', ['data' => $posts]);
    }





    public function forceDelete($id)
    {
        $post = Post::withTrashed()->find($id);

        if ($post) {
            // حذف الصور المرتبطة
            $dom = new DOMDocument();
            $dom->loadHTML($post->description, 9);
            $images = $dom->getElementsByTagName('img');

            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');
                $path = Str::of($src)->after('/');
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            $post->forceDelete();
            return response()->json(['status' => true, 'message' => 'Post permanently deleted'], Response::HTTP_OK);
        }

        return response()->json(['status' => false, 'message' => 'Post not found'], Response::HTTP_NOT_FOUND);
    }
}
