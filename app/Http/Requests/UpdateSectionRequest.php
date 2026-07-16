<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'is_visible' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Section title is required.',
            'title.max' => 'Title must not exceed 255 characters.',
            'subtitle.max' => 'Subtitle must not exceed 255 characters.',
            'image.image' => 'Image must be an image file.',
            'image.mimes' => 'Image must be a JPG, JPEG, PNG, or WebP file.',
            'image.max' => 'Image must not exceed 5MB.',
            'is_visible.required' => 'Please select a visibility status.',
        ];
    }
}
