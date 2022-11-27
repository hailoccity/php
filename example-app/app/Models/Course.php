<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'lectures',
    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
