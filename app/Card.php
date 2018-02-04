<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'level',
        'board_id',
    ];
    public function board(){
        return $this->belongsTo('App\User');
    }

    public function sites(){
        return $this->hasMany('App\Site');
    }
}
