<?php


namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CourseController
{
    public function store(Request $request){
        $teacher = new Teacher();
        $teachers = $teacher->find($request['teacher_id']);
        if (is_null($teachers)){
            return 'False';
        }
        $course = new Course();
        $course->name = $request['name'];
        $course->lectures = $request['lectures'];

//        return Course::create([
//            'name'=> $request['name'],
//            'lectures'=> $request['lectures'],
//            $teacher->course()->save()
//        ]);
        return $teacher->course()->save($course);
    }
}
