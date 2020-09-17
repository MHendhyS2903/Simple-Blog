<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Message;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    // use Message;

    protected $table = 'users';
    protected $primaryKey ='id';

    protected $fillable = ['name', 'email', 'password', 'jenis_kelamin', 'alamat', 'status'];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function user(){
        return $this->hasMany('App\Post', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'id');
    }
}
