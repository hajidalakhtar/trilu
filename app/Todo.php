<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function board()
    {
        return $this->belongsTo('App\Board', 'board_id');
    }
}
