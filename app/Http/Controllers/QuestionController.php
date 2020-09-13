<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\QuestionRepositoryInterface;

class QuestionController extends Controller
{
    protected $category_repo;
    protected $question_repo;

    public function __construct(CategoryRepositoryInterface $category_repo,
                                QuestionRepositoryInterface $question_repo)
    {
        $this->category_repo = $category_repo;
        $this->question_repo = $question_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category_repo->get();
        return view('questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'string|required',
            'category_id' => 'numeric|required',
            'option_one' => 'string|required',
            'option_two' => 'string|required',
            'option_three' => 'string|required',
            'option_four' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                        'data' => ['error' => json_encode($validator->errors())]
                    ], 422);
        }

        $user_id = auth()->user()->id;
        $save_question = $this->question_repo->save($request, $user_id);
        
        if($save_question == true){
            return response()->json([
                        'status' => true,
                        'message' => 'Question saved successfully'
                    ], 200);
        }
        return response()->json([
                    'status' => false,
                    'message' => 'An error occurred. Question not saved. Please try again'
                ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
