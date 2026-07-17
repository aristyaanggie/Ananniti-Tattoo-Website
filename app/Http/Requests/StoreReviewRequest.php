<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'max:255'],
            'artist_id' => ['required', 'exists:artist_profiles,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'content' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'country' => ['nullable', 'string', 'max:100'],
            'tattoo_style' => ['nullable', 'string', 'max:100'],
            'is_featured' => ['boolean'],
            'is_visible' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Customer name is required.',
            'customer_name.max' => 'Customer name must not exceed 255 characters.',
            'artist_id.required' => 'Please select an artist.',
            'artist_id.exists' => 'Selected artist does not exist.',
            'rating.required' => 'Rating is required.',
            'rating.integer' => 'Rating must be a whole number.',
            'rating.min' => 'Rating must be at least 1.',
            'rating.max' => 'Rating must not exceed 5.',
            'content.required' => 'Review content is required.',
            'photo.image' => 'Photo must be an image file.',
            'photo.mimes' => 'Photo must be JPG, JPEG, PNG, or WebP.',
            'photo.max' => 'Photo must not exceed 5MB.',
        ];
    }
}
