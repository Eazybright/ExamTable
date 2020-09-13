<?php

namespace App\Repositories;

use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
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
}