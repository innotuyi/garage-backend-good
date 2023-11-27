<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{


    public function courses()
    {

        try {
            $response = DB::select('SELECT * FROM Course');
            return response()->json($response);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
    }



    public function allBooks()
    {

        try {
            $response = DB::select('SELECT * FROM Course WHERE type= ?', ['pdf']);
            return response()->json($response);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
    }


    public function users()
    {

        try {
            $response = DB::select(
                'SELECT * FROM users
                 WHERE users.role = ?
                
                ', ['student']
            );
            return response()->json($response);
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
    }


    public function course($id)
    {

        $course = Course::find($id);
        return response()->json(["data" => $course]);
    }

    public function UploadCourse(Request $request)
    {
        $validator = $request->validate([
            'file_type' => 'required|in:pdf,video',
            'course' => 'required|mimetypes:application/pdf,video/avi,video/mpeg,video/mp4|max:50000',
        ]);

        $teacherRole = 'teacher';

        $teacher = User::where('id', $request->teacherID)
            ->where(function ($query) use ($teacherRole) {
                $query->where('role', 'admin')
                    ->orWhere('role', $teacherRole);
            })
            ->first();


        if ($teacher) {
            $file = $request->file('course');
            if ($file) {
                $originalName = $file->getClientOriginalName();
                $file->storeAs('public', $originalName);
            }

            return Course::create([
                'name' => $request->file('course')->getClientOriginalName(),
                'teacherID' => $teacher->id,
                'description' => $request->description,
                'type' => $request->file_type
            ]);
        } else {

            return response()->json('Teacher with ID does not exist');
        }
    }




    public function editCourse($id)
    {
    }
}
