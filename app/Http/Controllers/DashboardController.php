<?php

namespace App\Http\Controllers;

use App\Models\accordian;
use App\Models\Comment;
use App\Models\contact;
use App\Models\hoverContent;
use App\Models\Like;
use App\Models\odel;
use App\Models\Page;
use App\Models\Post;
use App\Models\Posts;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // $name=$user->name;
        $numberOfPosts = Post::count();


        return response()->view('pages.admin.dashboard', [
            'user' => $user,
            'posts' => $numberOfPosts,

        ]);
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(odel $odel)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(odel $odel)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, odel $odel)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(odel $odel)
    // {
    //     //
    // }


    ################ For Home Page Content ###########################

    // public function homePage()
    // {
    //     return view('layouts.dashboard');
    //     // return view('pages.org-pages.home-manage', ['slides' => $this->slides, 'hover' => $this->hoverContent]);
    // }

    public function homePage()
    {
        $accordians     = accordian::paginate(5);       // or ->get()
        $hoverContents  = hoverContent::paginate(5);
        $slides         = Slide::paginate(5);

        return view('pages.org-pages.home-manage', compact('accordians', 'hoverContents', 'slides'));
    }

    public function home()
    {
        $data = Page::all();
        return view('pages.org.home', ['data' => $data]);
    }
    public function about()
    {
        $data = Page::all();
        return view('pages.org.about', ['data' => $data]);
    }

    public function activities()
    {
        $data = Page::all();
        $posts = Post::where('activities', '=', '1')->get();
        return view('pages.org.activities', ['data' => $data, 'posts' => $posts]);
    }
    public function team()
    {
        $data = Page::all();
        $team = Team::all();
        return view('pages.org.team', ['data' => $data, 'team' => $team]);
    }
    public function contact()
    {
        $data = Page::all();
        $numbers = contact::all();
        return view('pages.org.contact', ['data' => $data, 'numbers' => $numbers]);
    }


    // public function show($page)
    // {
    //     // Validate the page name to ensure it's one of the allowed pages
    //     $allowedPages = ['home', 'about', 'activities', 'team'];
    //     if (!in_array($page, $allowedPages)) {
    //         abort(404); // Return a 404 error if the page is not allowed
    //     }

    //     // Fetch data (if needed)
    //     $data = Page::all();

    //     // Dynamically load the view based on the page name
    //     return view("pages.org.{$page}", ['data' => $data]);
    // }
}
