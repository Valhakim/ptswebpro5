<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
// Muhammad Fadel FH
class StudentController extends Controller
{
    public function index()
    {
        $students=Student::All();
        return view('student.index', compact('students'));
    }
    
    public function create()
    {
        return view('student/create');
    }
    
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        
        Student::create($request->all());

        return redirect()->route('student.index')->with('success', 'Berhaslil menambahkan.');
    }

    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success','Berhasil mengupdate');
    }
    
    public function destroy(Student $student)
    {
        $student->delete();
    
        return redirect()->route('student.index')->with('success','Berhasil menghapus');
    }
}