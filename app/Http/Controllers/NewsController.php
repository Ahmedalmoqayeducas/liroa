<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Date;

class NewsController extends Controller
{
    public function local()
    {
        $data = Post::where('type', '=', 'local')->paginate(4);
        return view('pages.thread', ['type'=>'local','data' => $data]);
    }
    public function international()
    {
        $data = Post::where('type', '=', 'international')->paginate(4);
        return view('pages.thread', ['type'=>'international','data' => $data]);
    }
    public function sport()
    {
        $data = Post::where('type', '=', 'sport')->paginate(4);
        return view('pages.thread', ['type'=>'sport','data' => $data]);
    }
    public function details($id){
        $data=Post::findOrFail($id);


        return view('pages.details',['data'=>$data]);
    }
    public function index()
    {
       $local= Post::where('type','=','local')->paginate(3);
       $sport= Post::where('type','=','sport')->paginate(4);
       $international= Post::where('type','=','international')->paginate(3);
       //make an operation to find the resent three posts
       $date=Date::yesterday();
    //    $resent= Post::whereDate('created_at','>',$date)->paginate(3);
       $resent = Post::latest('created_at')->take(3)->get();
       return response()->view('pages.first',[
            'local'=>$local,
            'international'=>$international,
            'sport'=>$sport,
            'resent'=>$resent,
        ]);

    }

}
