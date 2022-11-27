<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function course(){
        return $this->hasOne(Course::class);
    }
}
