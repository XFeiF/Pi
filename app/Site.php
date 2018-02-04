<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'url',
        'logo',
        'level',
        'card_id'
    ];
    public function card(){
        return $this->belongsTo('App\Card');
    }
}
