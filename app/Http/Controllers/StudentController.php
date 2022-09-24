<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $names=Student::All();
        return view('students.index', compact('student'));
    }
    
    public function create()
    {
        return view('names/create');
    }
    
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        
        Student::create($request->all());

        return redirect()->route('name.index')->with('success', 'Berhaslil menambahkan.');
    }

    public function edit(Student $name)
    {
        return view('names.edit',compact('name'));
    }

    public function update(Request $request, Student $name)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        $name->update($request->all());
        return redirect()->route('name.index')->with('success','Berhasil mengupdate');
    }
    
    public function destroy(Student $name)
    {
        $name->delete();
    
        return redirect()->route('name.index')->with('success','Berhasil menghapus');
    }
}