<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Repositories\Interfaces\PostRepositoryInterface;

class HomeController extends Controller
{
    // protected $post_repo;

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
        // $user_id = auth()->user()->id;
        // $post_count = $this->post_repo->countUserPost($user_id);
        return view('home');
    }
}
