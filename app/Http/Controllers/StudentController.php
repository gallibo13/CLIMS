<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Section;
use App\Models\Section_Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('sections')->get();
        return view('admin.students.index' , ['Students' => $students]);
    }
    public function addpage()
    {
        $sections = Section::all();
        return view('admin.students.insert' , ['Sections' => $sections]);
    }
    public function store(Request $request)
    {
        $student = new Student();
        $student->firstname = $request->firstname;
        $student->middlename = $request->middlename;
        $student->lastname = $request->lastname;
        $student->address = $request->address;
        $student->contact = $request->contact;
        $student->birthday = $request->birthdate;
        $student->sex = $request->sex;
        $student->yearlevel = $request->yearlevel;
        $student->status = 'Active';
        $student->idnumber = $request->idnumber;
        $student->save();

        $student->sections()->attach( $request->section);

        return back()->with('message' , 'New Student Added.');
    }
}
