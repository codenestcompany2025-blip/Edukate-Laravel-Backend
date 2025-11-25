<?php

namespace App\Http\Controllers\Admin\Instructors;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class InstructorsController extends Controller
{
    function index()
    {
        return view('admin.instructors.index');
    }

    function getData(Request $request)
    {
        //dd($request->all());
        $instructors = Instructor::query();
        return DataTables::of($instructors)
            ->filter(function ($qur) use ($request) {
                if ($request->get('name')) {
                    $qur->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->get('phone')) {
                    $qur->where('phone', $request->get('phone'));
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
            ->addColumn('qualification', function ($qur) {
                if ($qur->qualification == 'd') {
                    return '<span>Diploma</span>';
                } else if ($qur->qualification == 'b') {
                    return "<span>Bachelor’s</span>";
                } else if ($qur->qualification == 'm') {
                    return "<span>Master’s</span>";
                }
                return '<span>Doctorate</span>';
            })
            ->addColumn('action', function ($qur) {
                $data_attr = '';
                $data_attr = 'data-id="' . $qur->id . '" ';
                $data_attr .= 'data-name="' . $qur->name . '" ';
                $data_attr .= 'data-email="' . $qur->email . '" ';
                $data_attr .= 'data-major="' . $qur->major . '" ';
                $data_attr .= 'data-qual="' . $qur->qualification . '" ';
                $data_attr .= 'data-phone="' . $qur->phone . '" ';
                $data_attr .= 'data-gender="' . $qur->gender . '" ';
                $data_attr .= 'data-salary="' . $qur->salary . '" ';

                $action = '';
                $action .= '<div class="d-flex align-items-center gap-5 fs-6">';

                $action .= '<a ' . $data_attr . ' data-toggle="modal" data-target="#update-modal"
                            href="javascript:;" class="text-warning btn-update"
                            data-placement="bottom" title="Edit info" aria-label="Edit">
                            <i class="fas fa-edit"></i>
                            </a>';


                $action .= '<a data-id="' . $qur->id . '" data-url="' . route('admin.instructors.delete') . '" 
                            href="javascript:;" class="text-danger btn-delete" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Delete"
                            aria-label="Delete"><i class="fas fa-trash-alt"></i></a> ';

                $action .= '</div>';
                return $action;
            })

            ->rawColumns(['action', 'gender', 'qualification'])
            ->make(true);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'major' => ['required', 'string', 'max:255'],
                'qual' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'in:m,f'], // adjust values as needed
                'salary' => ['required', 'numeric', 'min:0'],
                'phone' => ['required', 'string', 'min:8'],
            ]
        );

        $password = Str::random();

        Instructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'major' => $request->major,
            'qualification' => $request->qual,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }


    function update(Request $request)
    {
        //dd($request->all());
        $instructor = Instructor::query()->findOrFail($request->id);
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'major' => ['required', 'string', 'max:255'],
                'qual' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'in:m,f'], // adjust values as needed
                'salary' => ['required', 'numeric', 'min:0'],
                'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+]*)$/', 'min:8'],

            ]
        );

        $instructor->update([
            'name' => $request->name,
            'email' => $request->email,
            'major' => $request->major,
            'qualification' => $request->qual,
            'gender' => $request->gender,
            'salary' => $request->salary,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }

    function delete(Request $request)
    {
        // dd($request->all());
        $instructor = Instructor::query()->findOrFail($request->id);
        if ($instructor) {
          $instructor->delete();
        }
        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }
}
