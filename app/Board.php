<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function todo()
    {
        return $this->belongsTo('App\Todo', 'board_id');
    }
}
