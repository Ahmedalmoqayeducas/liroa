<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\Goals;
use App\Models\Page;
use App\Models\Post;
use App\Models\Slide;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected function data()
    {
        $expertise = Page::where('type', '=', 'expertise')->get();
        $projects = Page::where('type', '=', 'projects')->get();

        $pages = ['expertise' => $expertise, 'projects' => $projects];
        return $pages;
    }
    public function homePage()
    {
        $slides = Slide::paginate(5);
        $goals = Goals::paginate(5);
        return view('pages.org-pages.home-manage', ['slides' => $slides, 'goals' => $goals]);
    }
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

    public function home()
    {
        $team = Team::paginate(4);
        $goals = Goals::all();
        return view('pages.org.home', ['data' => $this->data(), 'team' => $team, 'goals' => $goals]);
    }
    public function about()
    {
        return view('pages.org.about', ['data' => $this->data()]);
    }
    public function activities()
    {

        $posts = Post::where('activities', '=', '1')->get();
        return view('pages.org.activities', ['data' => $this->data(), 'posts' => $posts]);
    }
    public function team()
    {

        $team = Team::all();
        return view('pages.org.team', ['data' => $this->data(), 'team' => $team]);
    }
    public function contact()
    {

        $numbers = contact::where('type', '=', 'phone')->get();
        $emails = contact::where('type', '=', 'email')->get();
        $address = contact::where('type', '=', 'address')->get();
        return view('pages.org.contact', ['data' => $this->data(), 'numbers' => $numbers, 'emails' => $emails, 'address' => $address]);
    }
    public function createTransaction()
    {
        return view('pages.org.form', ['data' => $this->data()]);
    }


    public function userShow(int $pageId)
    {
        $page = Page::findOrFail($pageId);
        $posts = $page->posts()->orderBy('id')->get();
        if ($page['type'] == 'expertise') {

            return view(
                'pages.org.expertise',
                ['data' => $this->data(), 'posts' => $posts, 'page' => $page]
            );
        } elseif ($page['type'] == 'projects') {
            return view(
                'pages.org.staticPage',
                ['data' => $this->data(), 'posts' => $posts, 'page' => $page]
            );
        }
    }
}
