<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\courseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseEnrollmentController extends Controller
{


    public function enroll($userID, $courseID)
    {



        $course = Course::find($courseID);
        $courseID = $course->id;
        courseEnrollment::create([

            'courseID' => $courseID,
            'studentID' => $userID
        ]);
    }

    public function getEnrolledcourses($userID)
    {


        $courses = DB::select('SELECT b.name FROM course_enrollments AS a
                    INNER JOIN Course AS b ON a.courseID = b.id
                    WHERE a.studentID = ?',[$userID]
                    );

           return $courses;
    }
}
