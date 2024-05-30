<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\facade\StudentFacade;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    protected $task;
    public function __construct()
    {
        $this->task = new Student();
    }

    public function index()
    {
        $response['tasks'] = StudentFacade::all();
        // dd($response);
        return view('pages.student.index')->with($response);
    }

    public function add( Request $request)
    {

        StudentFacade::add($request->all());
        


        return redirect()->back();
        // return redirect()->route('student');
    }

    public function delete($task_id)
    {
        StudentFacade::delete($task_id);
        return redirect()->back();
    }
    public function done($task_id)
    {
        StudentFacade::done($task_id);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['task'] = StudentFacade::get($request['task_id']);
        return view('pages.student.edit')->with($response);
    }

    public function update(Request $request, $task_id)
    {
        StudentFacade::update($request->all(),$task_id);
        return redirect()->back();

    }

}
