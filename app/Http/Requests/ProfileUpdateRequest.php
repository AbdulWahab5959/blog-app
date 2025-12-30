<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    // In app/Http/Requests/ProfileUpdateRequest.php
public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        'avatar' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
        'remove_avatar' => ['nullable', 'boolean'],
        'age' => ['nullable', 'integer', 'min:13', 'max:120'], // Consistent with your blade input
        'country' => ['nullable', 'string', 'max:100'],
    ];
}

public function messages(): array
{
    return [
        'avatar.image' => 'The avatar must be an image.',
        'avatar.max' => 'The avatar may not be greater than 2MB.',
        'avatar.mimes' => 'The avatar must be a file of type: jpg, jpeg, png, gif.',
        'age.integer' => 'Age must be a number.',
        'age.min' => 'Age must be at least 13.',
        'age.max' => 'Age must be less than 120.',
    ];
    }
}