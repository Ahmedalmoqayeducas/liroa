<?php

namespace App\Http\Controllers;

use App\Models\activities;
use App\Models\Post;
use DOMDocument;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = activities::orderBy('type')->paginate(6);
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

        return view('pages.Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mime:png,jpg,gif,jpeg|max:2048',
            'card_description' => 'required|string|max:500',
            'description' => 'required|string',
            'type' => 'required|in:news,insights',
        ]);
        $description = $request->description;
        $dom = new DOMDocument();

        libxml_use_internal_errors(true);
        $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING);
        // $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        $uploadPath = public_path('upload/activities');

        // إنشاء المجلدات إذا لم تكن موجودة
        if (!file_exists($uploadPath)) {
            if (!mkdir($uploadPath, 0755, true)) {
                throw new Exception("Failed to create directory: {$uploadPath}");
            }
        }

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);

                // إنشاء اسم فريد للملف
                $imageName = uniqid('img_') . '_' . time() . $key . '.png';
                $fullPath = $uploadPath . DIRECTORY_SEPARATOR . $imageName;

                $path = "activities/" . $imageName;
                Storage::disk('public')->put($path, $data);
                $img->setAttribute('src', Storage::url($path));

                // حفظ الصورة مع التحقق من الخطأ
                if (file_put_contents($fullPath, $data) === false) {
                    throw new Exception("Failed to save image: {$fullPath}");
                }

                // تحديث المسار النسبي للصورة
                $img->setAttribute('src', '/upload/activities/' . $imageName);
            }
        }
        $description = $dom->saveHTML();

        // Store thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $admin = Auth::user();
        activities::create([
            'title' => $validated['title'],
            'thumbnail' => $thumbnailPath,
            'card_description' => $validated['card_description'],
            'description' => $description,
            'type' => $validated['type'],
            'admin_id' => $admin->id,
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $activity =  activities::findOrFail($id);
        return view('pages.Posts.show', ['data' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $activity =  activities::findOrFail($id);
        return view('pages.Posts.edit', ['data' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activities $activity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'sometimes|image|max:2048',
            'card_description' => 'required|string|max:500',
            'description' => 'required|string',
            'type' => 'required|in:news,insights',
        ]);

        // Process description images
        $description = $request->description;
        $dom = new DOMDocument();

        libxml_use_internal_errors(true);

        $dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING);
        $images = $dom->getElementsByTagName('img');
        $uploadPath = public_path('upload/activities');

        // إنشاء المجلدات إذا لم تكن موجودة
        if (!file_exists($uploadPath)) {
            if (!mkdir($uploadPath, 0755, true)) {
                throw new Exception("Failed to create directory: {$uploadPath}");
            }
        }

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);

                // إنشاء اسم فريد للملف
                $imageName = uniqid('img_') . '_' . time() . $key . '.png';
                $fullPath = $uploadPath . DIRECTORY_SEPARATOR . $imageName;

                $path = "activities/" . $imageName;
                Storage::disk('public')->put($path, $data);
                $img->setAttribute('src', Storage::url($path));

                // حفظ الصورة مع التحقق من الخطأ
                if (file_put_contents($fullPath, $data) === false) {
                    throw new Exception("Failed to save image: {$fullPath}");
                }

                // تحديث المسار النسبي للصورة
                $img->setAttribute('src', '/upload/activities/' . $imageName);
            }
        }
        $description = $dom->saveHTML();

        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/uploads/activities/" . time() . $key . ".png";
                file_put_contents(public_path() . $image_name, $data);
                $img->setAttribute('src', $image_name);
            }
        }
        $description = $dom->saveHTML();

        // Handle thumbnail update
        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($activity->thumbnail);
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        $activity->update([
            'title' => $validated['title'],
            'thumbnail' => $validated['thumbnail'] ?? $activity->thumbnail,
            'card_description' => $validated['card_description'],
            'description' => $description,
            'type' => $validated['type'],
        ]);

        return redirect()->route('activities.show', $activity)->with('success', 'Activity updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activities $activities)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($activities->description, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');


            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $deleted =   $activities->delete();
        return response()->json(
            ['status' => true, 'message' => $deleted > 0 ? 'Deleted Successfully' : 'Deleted Failed'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    public function slidable($activities)
    {
        $activities = activities::find($activities);
        if ($activities->slidable == 0) {
            $updated = $activities->update(['slidable' => true]);
            return response()->json([
                'status' => (bool) $updated,
                'message' => $updated ? 'Added To Slide Successfully' : 'Addition Failed'
            ], $updated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            $updated = $activities->update(['slidable' => false]);
            return response()->json([
                'status' => (bool) $updated,
                'message' => $updated ? 'Remove From Slide Successfully' : 'Remoming Failed'
            ], $updated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }
    }
}
