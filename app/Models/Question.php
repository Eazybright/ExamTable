<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
