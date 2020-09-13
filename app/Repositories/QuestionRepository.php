<?php

namespace App\Repositories;

use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function get()
    {
        return Question::with('category')->orderBy('category_id')->latest()->paginate(10);
    }

    public function save($request, $user_id)
    {
        $new_question = new Question;
        $new_question->question = $request->question;
        $new_question->option_one = $request->option_one;
        $new_question->option_two = $request->option_two;
        $new_question->option_three = $request->option_three;
        $new_question->option_four = $request->option_four;
        $new_question->category_id = $request->category_id;
        $new_question->user_id = $user_id;
        return $new_question->save();
    }

    public function update($request, $question_id)
    {
        $new_question = Question::findOrFail($question_id);
        $new_question->question = $request->question;
        $new_question->option_one = $request->option_1;
        $new_question->option_two = $request->option_2;
        $new_question->option_three = $request->option_3;
        $new_question->option_four = $request->option_4;
        $new_question->category_id = $request->category_id;
        $new_question->user_id = auth()->user()->id;
        return $new_question->save();
    }

    public function delete($question_id)
    {
        $question = Question::findOrFail($question_id);
        return $question->delete();
    }

    public function countUserQuestions($user_id)
    {
        return Question::where('user_id', $user_id)->count();
    }
}