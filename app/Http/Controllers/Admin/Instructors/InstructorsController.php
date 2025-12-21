<?php

namespace App\Http\Controllers\Admin\Instructors;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorsController extends Controller
{

    public function index()
    {
        $instructors = Instructor::paginate(5);
        return view('dashboard.admin.instructors.index', compact('instructors'));
    }

    public function show(Instructor $instructor)
    {
        return view('dashboard.admin.instructors.show', compact('instructor'));
    }

    public function create()
    {
        return view('dashboard.admin.instructors.create');
    }

    public function store(StoreInstructorRequest $request)
    {
        $name = null;

        if ($request->profile_img) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('profile_img')->getClientOriginalExtension();
            $request->file('profile_img')->move(public_path('uploads/images/instructors'), $name);
        }

        $instructor = Instructor::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'major'         => $request->major,
            'qualification' => $request->qualification,
            'salary'        => $request->salary,
            'gender'        => $request->gender,
            'password'      => Hash::make($request->password),
        ]);

        $instructor->image()->create([
            'url' => $name,
        ]);

        return redirect()->route('admin.instructors.index')
            ->with('success', 'Instructor created successfully!');
    }

    public function edit(Instructor $instructor)
    {
        return view('dashboard.admin.instructors.edit', compact('instructor'));
    }


    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        //dd($request->all());

        $instructor->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'major'         => $request->major,
            'qualification' => $request->qualification,
            'salary'        => $request->salary,
            'gender'        => $request->gender,
            /*  // Only update password if provided
            'password'      => $request->filled('password') ? bcrypt($request->password) : $instructor->password, */
        ]);

        if ($request->profile_img) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('profile_img')->getClientOriginalExtension();
            $request->file('profile_img')->move(public_path('uploads/images/instructors'), $name);

            $instructor->image()->updateOrCreate(
                [], // match condition (empty means "first related record")
                ['url' => $name]
            );
        }

        return redirect()->route('admin.instructors.index')
            ->with('success', 'Instructor updated successfully!');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('admin.instructors.index')
            ->with('success', 'Instructor deleted successfully!');
    }
}
