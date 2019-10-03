<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function board()
    {
        return $this->belongsTo('App\BoardMaster', 'board_master_id');
    }
}
