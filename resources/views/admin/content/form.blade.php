@extends('layouts.admin')

@section('content')
<div class="max-w-[900px] mx-auto" x-data="{
    imagePreview: '{{ $section->image ? asset($section->image) : '' }}',
    handleImage(e) {
        const file = e.target.files[0];
        if (file) {
            this.imagePreview = URL.createObjectURL(file);
        }
    }
}">

    {{-- Header --}}
    <div class="mb-8">
        <a href="{{ route('admin.content.index') }}" class="inline-flex items-center gap-1.5 text-[13px] text-[#999999] hover:text-[#1a1a1a] transition-colors duration-200 mb-4">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
            Back to Content
        </a>
        <h2 class="text-xl font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">{{ $pageTitle }}</h2>
        <p class="text-[13px] text-[#999999] mt-1">Update the content for the <strong>{{ $section->title }}</strong> section.</p>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-[#f0fdf4] border border-[#bbf7d0] rounded-xl text-[14px] text-[#166534]">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-6 px-4 py-3 bg-[#fef2f2] border border-[#fecaca] rounded-xl text-[14px] text-[#991b1b]">
            <p class="font-medium mb-1">Please fix the following errors:</p>
            <ul class="list-disc list-inside text-[13px]">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.content.update', $section) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-8">

            {{-- Section Info --}}
            <div class="bg-[#f5f5f0] border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-[#1a1a1a] flex items-center justify-center">
                        <span class="text-[10px] font-bold text-white tracking-wider uppercase">{{ substr($section->slug, 0, 2) }}</span>
                    </div>
                    <div>
                        <p class="text-[14px] font-semibold text-[#1a1a1a]">{{ $section->title }}</p>
                        <p class="text-[12px] text-[#999999]">Slug: {{ $section->slug }}</p>
                    </div>
                </div>
            </div>

            {{-- Basic Fields --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">Content</h3>
                <div class="space-y-5">
                    <div>
                        <label for="title" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $section->title) }}" required
                            class="w-full px-4 py-3 bg-[#fafafa] border {{ $errors->has('title') ? 'border-[#ef4444]' : 'border-[#e5e5e5]' }} rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#999999] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200" />
                        @error('title')
                            <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="subtitle" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Subtitle</label>
                        <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $section->subtitle) }}"
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#999999] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200"
                            placeholder="Optional subtitle" />
                    </div>
                    <div>
                        <label for="description" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Description</label>
                        <textarea id="description" name="description" rows="5"
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#999999] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 resize-none"
                            placeholder="Section description content...">{{ old('description', $section->description) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Image --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">Image</h3>
                <div>
                    <input type="file" name="image" accept="image/jpeg,image/png,image/webp" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer" id="image-input" x-on:change="handleImage($event)" />
                    <label for="image-input" class="block border-2 border-dashed border-[#e5e5e5] rounded-xl p-8 text-center hover:border-[#cccccc] transition-colors duration-200 cursor-pointer" :class="imagePreview ? 'border-[#1a1a1a]/20' : ''">
                        <template x-if="imagePreview">
                            <div class="relative">
                                <img :src="imagePreview" class="w-full h-48 object-cover rounded-lg" alt="Image preview" />
                                <button type="button" @click="imagePreview = ''; document.getElementById('image-input').value = ''" class="absolute top-2 right-2 w-6 h-6 bg-[#1a1a1a] text-white rounded-full flex items-center justify-center text-[12px] hover:bg-[#333333]">&times;</button>
                            </div>
                        </template>
                        <template x-if="!imagePreview">
                            <div>
                                <svg class="w-8 h-8 mx-auto text-[#cccccc] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5a1.5 1.5 0 001.5-1.5V5.25a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v14.25a1.5 1.5 0 001.5 1.5z"></path></svg>
                                <p class="text-[13px] text-[#666666] font-medium">Drop image here</p>
                                <p class="text-[12px] text-[#999999] mt-1">or click to upload</p>
                                <p class="text-[11px] text-[#cccccc] mt-2">JPG, PNG, WebP &bull; Max 5MB</p>
                            </div>
                        </template>
                    </label>
                    @error('image')
                        <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Visibility --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">Visibility</h3>
                <div class="flex flex-col sm:flex-row gap-4">
                    <label class="flex items-center gap-3 px-5 py-3 border border-[#e5e5e5] rounded-xl cursor-pointer hover:border-[#1a1a1a] transition-colors duration-200 has-[:checked]:border-[#1a1a1a] has-[:checked]:bg-[#fafafa]">
                        <input type="radio" name="is_visible" value="1" {{ old('is_visible', $section->is_visible ? '1' : '0') == '1' ? 'checked' : '' }} class="w-4 h-4 text-[#1a1a1a] border-[#e5e5e5] focus:ring-[#1a1a1a]" />
                        <span class="text-[14px] text-[#1a1a1a] font-medium">Visible</span>
                    </label>
                    <label class="flex items-center gap-3 px-5 py-3 border border-[#e5e5e5] rounded-xl cursor-pointer hover:border-[#1a1a1a] transition-colors duration-200 has-[:checked]:border-[#1a1a1a] has-[:checked]:bg-[#fafafa]">
                        <input type="radio" name="is_visible" value="0" {{ old('is_visible', $section->is_visible ? '1' : '0') == '0' ? 'checked' : '' }} class="w-4 h-4 text-[#1a1a1a] border-[#e5e5e5] focus:ring-[#1a1a1a]" />
                        <span class="text-[14px] text-[#1a1a1a] font-medium">Hidden</span>
                    </label>
                </div>
            </div>

            {{-- Bottom Actions --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 pb-8">
                <a href="{{ route('admin.content.index') }}" class="text-[14px] text-[#666666] hover:text-[#1a1a1a] transition-colors duration-200">Cancel</a>
                <button type="submit"
                    class="px-6 py-2.5 bg-[#1a1a1a] text-white text-[14px] font-semibold rounded-lg hover:bg-[#333333] transition-colors duration-200">
                    Save Changes
                </button>
            </div>

        </div>
    </form>

</div>
@endsection
