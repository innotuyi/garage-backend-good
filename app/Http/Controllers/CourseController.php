<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    

    public function courses() {

        try {
            $reponse = Course::all();

         return response()->json($reponse);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }

    }

    public function course ($id) {

        $course = Course::find($id);
        return response()->json(["data"=>$course]);
    }

    public function UploadCourse(Request $request) {



        $validator = $request->validate([
            'file_type' => 'required|in:pdf,video',
            'course' => 'required|mimetypes:application/pdf,video/avi,video/mpeg,video/mp4|max:50000',
        ]);            
        $file = $request->file('course');        
        if ($file) {
            $originalName = $file->getClientOriginalName();
            $file->storeAs('public', $originalName);
        }
    
        return Course::create([
            'name' => $request->file('course')->getClientOriginalName(),
            'type' =>$request->file_type
        ]);

    }

    public function editCourse($id) {

    }
  
}