<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts= Post::orderBy('id','desc')->take(8)->get();
        $postsOther= Post::orderBy('id','desc')->take(15)->skip(4)->get();
        $topPosts= Post:: orderByViews()->take(10)->get();
        return view('home',compact('posts','postsOther','topPosts'));
    }
}
