<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::where('user_id',Auth::user()->id)->get();
        return view('students/index',compact('students'));
    }

    public function create()
    {
        return view('students/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students|max:255',
            'roll_no' => 'required|unique:students',
            'course' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $request['user_id'] = Auth::user()->id ;
        Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Student $student)
    {
        return view('students/edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course' => 'required',
            'roll_no' => 'required|unique:students,roll_no,' . $student->id,
        ]);
        $student->update($request->all());

        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
