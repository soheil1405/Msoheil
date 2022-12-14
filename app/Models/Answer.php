<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
        'score' ,
        'flag'
    ];











    public function User(){
        return $this->belongsTo(User::class);
    } 
    public function Thread(){
        return $this->belongsTo(Thread::class);
    } 








}
