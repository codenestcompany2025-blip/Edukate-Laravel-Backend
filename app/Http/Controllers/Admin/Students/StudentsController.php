<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        return view('dashboard.admin.students.index', compact('students'));
    }

    public function show(Student $student)
    {
        return view('dashboard.admin.students.show', compact('student'));
    }

    public function create()
    {
        return view('dashboard.admin.students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $name = null;

        if ($request->profile_img) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('profile_img')->getClientOriginalExtension();
            $request->file('profile_img')->move(public_path('uploads/images/students'), $name);
        }

        Student::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'profile_image' => $name,
            'date_of_birth' => $request->birth_date,
            'gender'        => $request->gender,
            'password'      => Hash::make($request->password),
        ]);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully!');
    }

    public function edit(Student $student)
    {
        return view('dashboard.admin.students.edit', compact('student'));
    }


    public function update(UpdateStudentRequest $request, Student $student)
    {
        //dd($request->all());

        $name = null;

        if ($request->profile_img) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('profile_img')->getClientOriginalExtension();
            $request->file('profile_img')->move(public_path('uploads/images/students'), $name);
        }

        $student->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'profile_image' => $name,
            'date_of_birth' => $request->birth_date,
            'gender'        => $request->gender,
        ]);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
