<?php

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CoursesController extends Controller
{
    function index()
    {
        $instructors = Instructor::all();
        $categories = Category::all();
        return view('admin.courses.index', compact('instructors', 'categories'));
    }

    function getData(Request $request)
    {
        $courses = Course::query();
        return DataTables::of($courses)
            ->filter(function ($qur) use ($request) {
                if ($request->get('name')) {
                    $qur->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->get('instructor')) {
                    $qur->where('instructor_id', $request->get('instructor'));
                }
                if ($request->get('category')) {
                    $qur->where('category_id', $request->get('category'));
                }
                if ($request->get('skill')) {
                    $qur->where('skill_level', $request->get('skill'));
                }
            })
            ->addIndexColumn()
            ->addColumn('skill_level', function ($qur) {
                if ($qur->skill_level == 'beginner') {
                    return '<span class="badge bg-info text-white" style="background-color:#28a745;">Beginner</span>';
                }
                if ($qur->skill_level == 'intermediate') {
                    return '<span class="badge bg-info text-white" style="background: color #e2f45eff;;">Intermediate</span>';
                }
                return '<span class="badge text-white" style="background-color:#dc3545;">Advanced</span>';
            })
            ->addColumn('instructor_id', function ($qur) {
                if ($qur->instructor_id) {
                    return $qur->instructor->name;
                }
                return 'not set yet';
            })
            ->addColumn('category_id', function ($qur) {
                if ($qur->category_id) {
                    return $qur->category->name;
                }
                return 'not set yet';
            })
            ->addColumn('image', function ($qur) {
                if ($qur->image) {
                    return '<img class="image-preview" src="' . asset('admin_dashboard/uploads/' . $qur->image) . '" style="width:150px">';
                }
                return '-';
            })
            ->addColumn('action', function ($qur) {
                $data_attr = '';
                $data_attr = 'data-id="' . $qur->id . '" ';
                $data_attr .= 'data-name="' . $qur->name . '" ';
                $data_attr .= 'data-description="' . $qur->description . '" ';
                $data_attr .= 'data-price="' . $qur->price . '" ';
                $data_attr .= 'data-skill-level="' . $qur->skill_level . '" ';
                $data_attr .= 'data-image="' . $qur->image . '" ';
                $data_attr .= 'data-instructor-id="' . $qur->instructor_id . '" ';
                $data_attr .= 'data-category-id="' . $qur->category_id . '" ';

                $action = '';
                $action .= '<div class="d-flex align-items-center gap-5 fs-6">';

                $action .= '<a ' . $data_attr . ' data-toggle="modal" data-target="#update-modal"
                            href="javascript:;" class="text-warning btn-update"
                            data-placement="bottom" title="Edit info" aria-label="Edit">
                            <i class="fas fa-edit"></i>
                            </a>';


                $action .= '<a data-id="' . $qur->id . '" data-url="' . route('admin.courses.delete') . '" 
                            href="javascript:;" class="text-danger btn-delete" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Delete"
                            aria-label="Delete"><i class="fas fa-trash-alt"></i></a> ';

                $action .= '</div>';
                return $action;
            })

            ->rawColumns(['action', 'image', 'skill_level'])
            ->make(true);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'price' => ['required', 'numeric', 'min:0'],
                'skill_level' => ['required', 'in:beginner,intermediate,advanced'],
                'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                'instructor_id' => ['required', 'exists:instructors,id'],
                'category_id' => ['required', 'exists:categories,id'],

            ]
        );


        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'skill_level' => $request->skill_level,
            'instructor_id' => $request->instructor_id,
            'category_id' => $request->category_id,
        ]);

        if ($request->image) {
            $name = 'Image_' . time() . '_' . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin_dashboard/uploads'), $name);
            $course->update([
                'image' => $name,
            ]);
        }

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }


    function update(Request $request)
    {
        //dd($request->all());
        $course = Course::query()->findOrFail($request->id);
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'price' => ['required', 'numeric', 'min:0'],
                'skill_level' => ['required', 'in:beginner,intermediate,advanced'],
                'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                'instructor_id' => ['required', 'exists:instructors,id'],
                'category_id' => ['required', 'exists:categories,id'],
            ]
        );

        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'skill_level' => $request->skill_level,
            'instructor_id' => $request->instructor_id,
            'category_id' => $request->category_id,
        ]);

        if ($request->image) {
            $name = 'Image_' . time() . '_' . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin_dashboard/uploads'), $name);
            $course->update([
                'image' => $name,
            ]);
            // dd($course);
        }

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }

    function delete(Request $request)
    {
        // dd($request->all());
        $course = Course::query()->findOrFail($request->id);
        if ($course) {
            $course->delete();
        }
        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }
}
