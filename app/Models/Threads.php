<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;





    protected $fillable = [
        'name',
        'email',
        'password',
        'score' ,
        'flag'
    ];





    public function Channel(){
        return $this->belongsTo(Channel::class);
    }


    public function User(){
        return $this->belongsTo(User::class);   
    }

    public function Answers(){
        return $this->hasMany(User::class);   
    }




}
