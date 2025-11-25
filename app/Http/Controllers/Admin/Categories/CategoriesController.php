<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    function index()
    {
        return view('admin.categories.index');
    }

    function getData(Request $request)
    {
        //dd($request->all());
        $categories = Category::query();
        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('action', function ($qur) {
                $data_attr = '';
                $data_attr = 'data-id="' . $qur->id . '" ';
                $data_attr .= 'data-name="' . $qur->name . '" ';

                $action = '';
                $action .= '<div class="d-flex align-items-center gap-5 fs-6">';

                $action .= '<a ' . $data_attr . ' data-toggle="modal" data-target="#update-modal"
                            href="javascript:;" class="text-warning btn-update"
                            data-placement="bottom" title="Edit info" aria-label="Edit">
                            <i class="fas fa-edit"></i>
                            </a>';


                $action .= '<a data-id="' . $qur->id . '" data-url="' . route('admin.categories.delete') . '" 
                            href="javascript:;" class="text-danger btn-delete" data-toggle="tooltip"
                            data-placement="bottom" title="" data-original-title="Delete"
                            aria-label="Delete"><i class="fas fa-trash-alt"></i></a> ';

                $action .= '</div>';
                return $action;
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    function store(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
            ]
        );

        Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }


    function update(Request $request)
    {
        //dd($request->all());
        $category = Category::query()->findOrFail($request->id);
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
            ]
        );

        $category->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }

    function delete(Request $request)
    {
        // dd($request->all());
        $category = Category::query()->findOrFail($request->id);
        if ($category) {
          $category->delete();
        }
        return response()->json([
            'success' => 'تمت العملية بنجاح'
        ]);
    }
}
