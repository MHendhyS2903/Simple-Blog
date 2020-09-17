<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'label';
    protected $primaryKey ='labelID';

    protected $fillable = ['nama'];

    public function label(){
    	return $this->hasMany('App\Home', 'labelID');
    }
}
