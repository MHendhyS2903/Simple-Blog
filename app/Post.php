<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="post";
    protected $primaryKey ='postID';

    protected $fillable = ['judul', 'konten', 'labelID', 'id', 'foto'];

    public function post(){
        return $this->hasMany('App\Rating', 'postID');
    }

    public function label(){
    	return $this->belongsTo('App\Label', 'labelID');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'id');
    }
}
