<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * users
     *
     * @return void
     */
    public function users() {
        $data = User::all();
        $posts = [];
        if(!empty($data)) {
            foreach($data as $key => $val) {
                $posts[$val->id] = Blog::where('user_id', $val->id)->get();
            }
        }
        return view('users', compact('data', 'posts'));
    }
}
