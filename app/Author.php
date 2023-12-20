<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
    public function books(){
        return $this->hasMany('App\Book');
    }
}
