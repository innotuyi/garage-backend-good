<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseEnrollmentController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ReportController;
use App\Models\courseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/forgot', [AuthController::class, 'resetPassword']);

Route::get('/courses', [CourseController::class, 'courses']);

Route::get('/courses/books', [CourseController::class, 'allBooks']);

Route::get('/users', [CourseController::class, 'users']);

Route::get('/course/{id}', [CourseController::class, 'course']);

Route::post('/upload', [CourseController::class, 'uploadCourse']);

Route::post('/enroll/{userID}/{courseID}', [CourseEnrollmentController::class, 'enroll']);

Route::get('/allEnrolled', [CourseEnrollmentController::class, 'AllEnrolledcourses']);

Route::get('/enrolled-course/{userID}', [CourseEnrollmentController::class, 'getEnrolledcourses']);

Route::get('/report/students', [ReportController::class, 'getStudents']);

Route::get('/report/courses', [ReportController::class, 'getCourses']);

Route::get('/report/ernrol', [ReportController::class, 'getEnrolles']);


Route::post('/payment', [paymentController::class,'makePayment']);

Route::get('/test', function(){

    return 'test';
});




