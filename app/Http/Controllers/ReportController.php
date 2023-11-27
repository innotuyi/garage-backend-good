<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
     


    public function getStudents() {

        return DB::select('SELECT count(*) as count FROM users where role = ?', ['student']);

    }

    public function getCourses() {

        return DB::select('SELECT count(*) as count FROM Course');
    }


    public function getEnrolles() {

         return DB::select('SELECT count(*) as count FROM course_enrollments');
        

    }
}
