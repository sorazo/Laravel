<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    //「１対多」の「1」側 → メソッド名は単数形でbelongsToを使う
    public function author(){
        return $this->belongsTo('App\Author');
    }
}
