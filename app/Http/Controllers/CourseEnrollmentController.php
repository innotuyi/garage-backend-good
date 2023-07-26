<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\courseEnrollment;
use Illuminate\Http\Request;

class CourseEnrollmentController extends Controller
{
    

    public function enroll($id) {

        $course = Course::find($id);
        $courseID = $course->id;

        // $userID = auth()->user()->id;

       
        return courseEnrollment::create([

            'courseID'=>$courseID,
            'studentID'=>1
        ]);

        


        
    }
}
