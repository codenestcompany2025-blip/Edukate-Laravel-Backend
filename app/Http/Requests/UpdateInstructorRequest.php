<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInstructorRequest extends FormRequest
{
    public function authorize()
    {
        // Allow all users for now, or add role-based logic if needed
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'email'         => ['required','email',Rule::unique('instructors')->ignore($this->route('instructor')->id)],
            'major'         => 'required|string|max:255',
            'qualification' => 'required|in:d,b,m,dr',
            'salary'        => 'required|numeric|min:0',
            'gender'        => 'required|in:m,f',
            'password'      => 'nullable|string|min:6',
        ];
    }
}
