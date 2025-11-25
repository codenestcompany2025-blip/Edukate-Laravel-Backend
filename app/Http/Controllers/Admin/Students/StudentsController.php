<?php

namespace App\Http\Controllers\Admin\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class StudentsController extends Controller
{
    function index()
    {
        return view('admin.students.index');
    }

    function getData(Request $request)
    {
        //dd($request->all());
        $students = Student::query();
        return DataTables::of($students)
            ->filter(function ($qur) use ($request) {
                if ($request->get('name')) {
                    $qur->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->get('date')) {
                    $qur->whereDate('date_of_birth', $request->get('date'));
                }
                if ($request->get('email')) {
                    $qur->where('email', 'like', '%' . $request->get('email') . '%');
                }
            })
            ->addIndexColumn()
            ->addColumn('gender', function ($qur) {
                if ($qur->gender == 'm') {
                    return '<span class="badge bg-info text-white">Male</span>';
                }
                return '<span class="badge text-white" style="background-color:#C74375;">Female</span>';
            })
            ->addColumn('profile_image', function ($qur) {
                if ($qur->profile_image) {
                    return '<img class="image-preview" src="' . asset('admin_dashboard/uploads/' . $qur->profile_image) . '" style="width:150px">';
                }
                return '-';
            })
            ->addColumn('date_of_birth', function ($qur) {
                if ($qur->date_of_birth) {
                    return Carbon::parse($qur->date_of_birth)->format('d/m/Y');
                }
                return '-';
            })
            ->addColumn('action', function ($qur) {
                $data_attr = '';
                $data_attr = 'data-id="' . $qur->id . '" ';
                $data_attr .= 'data-name="' . $qur->name . '" ';
                $data_attr .= 'data-email="' . $qur->email . '" ';
                $data_attr .= 'data-gender="' . $qur->gender . '" ';

                $action = '';
                $action .= '<div class="d-flex align-items-center gap-5 fs-6">';

                $action .= '<a ' . $data_attr . ' data-toggle="modal" data-target="#update-modal"
                            href="javascript:;" class="text-warning btn-update"
                            data-placement="bottom" title="Edit info" aria-label="Edit">
                            <i class="fas fa-edit"></i>
                            </a>';


                $action .= '<a data-id="' . $qur->id . '" data-url="' . route('admin.students.delete') . '" 
                            href="javascript:;" class="text-danger btn-delete" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Delete"
                            aria-label="Delete"><i class="fas fa-trash-alt"></i></a> ';

                $action .= '</div>';
                return $action;
            })

            ->rawColumns(['action', 'gender', 'profile_image'])
            ->make(true);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'gender' => ['required', 'in:m,f'],
            ]
        );

        $password = Str::random();

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
        ]);

        if($request->profile_image){
            $name = 'ProfileImage_' . time() . '_' . rand() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('admin_dashboard/uploads'), $name);
            $student->update([
                'profile_image' => $name,
            ]);
        }
        

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }


    function update(Request $request)
    {
       // dd($request->all());
        $student = Student::query()->findOrFail($request->id);
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'gender' => ['required', 'in:m,f'],
            ]
        );

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'date_of_birth' => $request->birth_date,
        ]);

        if($request->profile_image){
            $name = 'ProfileImage_' . time() . '_' . rand() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('admin_dashboard/uploads'), $name);
            $student->update([
                'profile_image' => $name,
            ]);
        }

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }

    function delete(Request $request)
    {
        // dd($request->all());
        $student = Student::query()->findOrFail($request->id);
        if ($student) {
            $student->delete();
        }
        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }
}
