<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\QuestionRepositoryInterface;

class HomeController extends Controller
{
    protected $question_repo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QuestionRepositoryInterface $question_repo)
    {
        $this->middleware('auth');
        $this->question_repo = $question_repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $question_count = $this->question_repo->countUserQuestions($user_id);
        return view('home', compact('question_count'));
    }
}
