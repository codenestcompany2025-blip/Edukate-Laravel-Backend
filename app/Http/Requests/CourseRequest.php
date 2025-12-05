<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
            'price'         => ['required', 'numeric', 'min:0'],
            'duration'      => ['nullable', 'numeric', 'min:0'],
            'skill_level'   => ['required', 'in:beginner,intermediate,advanced'],
            'image'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'instructor_id' => ['required', 'exists:instructors,id'],
            'category_id'   => ['required', 'exists:categories,id'],
        ];

    }
}
