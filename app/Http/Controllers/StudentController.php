<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view ('student.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3',
            'grade'=>'required|min3'
        ]);
        Student::create([
            'name' => $request->get('name'),
            'grade' => $request->get('grade'),
        ]);
        return redirect()->back()->with('message', 'Data Berhasil di Buat');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|min3',
            'grade'=>'required|min3'
        ]);
        $student = Student::find($id);
        $student->name = $request->get('name');
        $student->grade = $request->get('grade');
        $student->save();
        return redirect()->route('student.index')->with('message', 'Data Berhasil di Update');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('message', 'Data Berhasil di Hapus');
    }
}
