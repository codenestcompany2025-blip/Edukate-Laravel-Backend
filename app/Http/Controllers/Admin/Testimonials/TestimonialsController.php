<?php

namespace App\Http\Controllers\Admin\Testimonials;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(5);
        return view('dashboard.admin.testimonials.index', compact('testimonials'));
    }


    public function create()
    {
        return view('dashboard.admin.testimonials.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'student_name'   => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'comment'        => ['required', 'string'],
            'img'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        $name = null;

        if ($request->img) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->file('img')->move(public_path('uploads/images/testimonials'), $name);
        }

        $testimonial = Testimonial::create($request->only(['student_name', 'specialization', 'comment']));

        $testimonial->image()->create([
            'url' => $name,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully!');
    }


    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.admin.testimonials.edit', compact('testimonial'));
    }


    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'student_name'   => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'comment'        => ['required', 'string'],
        ]);

        if ($request->img) {
            $name = 'Edukate' . '_' . time() . '_' . rand() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->file('img')->move(public_path('uploads/images/testimonials'), $name);

            $testimonial->image()->updateOrCreate(
                [], // match condition (empty means "first related record")
                ['url' => $name]
            );
        }

        $testimonial->update($request->only(['student_name', 'specialization', 'comment']));

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully!');
    }
}
