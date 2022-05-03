<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return View::make('courses')->with(array('courses' => Course::with(['user'])->get()));
    }

    public function delete(Request $request)
    {
        if (Course::where('id', $request->id)->delete()) {
            return redirect()->back(); 
        }
    }

    public function getCourse(Request $request)
    {
        return View::make('course')->with(array('course' => Course::where('id', $request->id)->first()));
    }

    public function store(CourseRequest $request) 
    {   
        $request->validated();

        $course = new Course;
        $course->user_id = Auth::user()->id;
        $course->title = $request->title;
        $course->description = $request->description;
        
        if ($request->hasFile('course_img')) {
            $course->img_src = $request->course_img->store('course_img', 'public');
        }
        
        if ($request->hasFile('course_doc')) {
            $course->file_path = $request->course_doc->store('course_docs', 'public');
        }

        if ($course->save()) {
            return redirect()->back(); 
        } else {

        }
    }
}
