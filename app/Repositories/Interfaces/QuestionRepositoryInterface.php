<?php

namespace App\Repositories\Interfaces;

interface QuestionRepositoryInterface
{
    public function get();

    public function save($request, $user_id);

    public function update($request, $question_id);

    public function delete($question_id);

    public function countUserQuestions($user_id);
}