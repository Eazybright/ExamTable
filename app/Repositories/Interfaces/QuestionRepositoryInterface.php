<?php

namespace App\Repositories\Interfaces;

interface QuestionRepositoryInterface
{
    public function save($request, $user_id);
}