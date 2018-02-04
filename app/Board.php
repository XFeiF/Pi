<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'level',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cards(){
        return $this->hasMany('App\Card');
    }
}
