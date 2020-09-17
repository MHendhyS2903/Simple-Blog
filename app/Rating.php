<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table="rating";
    protected $primaryKey ='ratingID';

    protected $fillable = ['id', 'postID', 'komen', 'rateValue'];

    public function user(){
    	return $this->belongsTo('App\User', 'id');
    }

    public function post(){
    	return $this->belongsTo('App\Post', 'postID');
    }
}
