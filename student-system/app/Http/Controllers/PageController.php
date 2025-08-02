<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $name = "Kelvin";
        return view('home', ['name' => $name]);
    }

    public function showForm()
    {
        return view('register');
    }
    public function handleForm(Request $request)
    {


        // Validation (basic)
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
        ]);

        // Save to database
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        return view('thanks', ['name' => $student->name, 'email' => $student->email]);

    }

    public function listStudents()
    {
        $students = Student::all(); // get all students from DB
        return view('students', ['students' => $students]);
    }



}
