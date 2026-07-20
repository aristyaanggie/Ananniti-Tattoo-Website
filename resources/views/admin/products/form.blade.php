@extends('layouts.admin')

@section('content')
<div class="max-w-[900px] mx-auto" x-data="{
    thumbnailPreview: '{{ $product && $product->thumbnail ? asset('storage/' . $product->thumbnail) : '' }}',
    galleryPreviews: {{ Js::from($product && $product->galleries ? $product->galleries->map(fn($g) => ['id' => $g->id, 'url' => asset('storage/' . $g->image)])->toArray() : []) }},
    galleryCounter: 0,
    handleThumbnail(e) {
        const file = e.target.files[0];
        if (file) {
            this.thumbnailPreview = URL.createObjectURL(file);
        }
    },
    handleGallery(e) {
        const files = e.target.files;
        for (let i = 0; i < files.length; i++) {
            this.galleryCounter++;
            this.galleryPreviews.push({
                id: 'new_' + this.galleryCounter,
                url: URL.createObjectURL(files[i]),
                file: files[i]
            });
        }
        e.target.value = '';
    },
    handleGalleryDrop(e) {
        const files = e.dataTransfer.files;
        for (let i = 0; i < files.length; i++) {
            if (files[i].type.startsWith('image/')) {
                this.galleryCounter++;
                this.galleryPreviews.push({
                    id: 'new_' + this.galleryCounter,
                    url: URL.createObjectURL(files[i]),
                    file: files[i]
                });
            }
        }
    },
    removeGalleryImage(index) {
        this.galleryPreviews.splice(index, 1);
    },
    clearAllGallery() {
        this.galleryPreviews = this.galleryPreviews.filter(p => typeof p.id === 'number');
    },
    async deleteGalleryImage(id, index) {
        const token = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
        try {
            const response = await fetch('{{ url('/admin/products/gallery') }}/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                },
            });
            if (response.ok) {
                this.galleryPreviews.splice(index, 1);
            }
        } catch (e) {
            console.error('Failed to delete gallery image:', e);
        }
    },
    async submitProductForm(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        formData.delete('gallery');

        for (const preview of this.galleryPreviews) {
            if (preview.file) {
                formData.append('gallery[]', preview.file);
            }
        }

        const token = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': token },
                redirect: 'manual',
            });

            if (response.redirected) {
                window.location.href = response.url;
            } else if (response.ok) {
                window.location.href = '{{ route('admin.products.index') }}';
            } else {
                const html = await response.text();
                document.open();
                document.write(html);
                document.close();
            }
        } catch (err) {
            document.querySelector('[type=submit]')?.click();
        }
    }
}">

    {{-- Header --}}
    <div class="mb-8">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-1.5 text-[13px] text-[#999999] hover:text-[#1a1a1a] transition-colors duration-200 mb-4">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
            Back to Products
        </a>
        <h2 class="text-xl font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">{{ $pageTitle }}</h2>
        <p class="text-[13px] text-[#999999] mt-1">Fill in the details below to {{ $product ? 'update' : 'create' }} a product.</p>
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

    <form method="POST" action="{{ $product ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data" @submit.prevent="submitProductForm">
        @csrf
        @if($product)
            @method('PUT')
        @endif

        <div class="space-y-8">

            {{-- Section 1: Basic Information --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">Basic Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Product Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required autofocus
                            class="w-full px-4 py-3 bg-[#fafafa] border {{ $errors->has('name') ? 'border-[#ef4444]' : 'border-[#e5e5e5]' }} rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#777777] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200"
                            placeholder="e.g. Wireless Tattoo Machine" />
                        @error('name')
                            <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Slug</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug ?? '') }}"
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#777777] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200"
                            placeholder="auto-generated" />
                        <p class="text-[11px] text-[#999999] mt-1.5">Leave blank to auto-generate from name.</p>
                    </div>
                    <div>
                        <label for="category_id" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Category</label>
                        <select id="category_id" name="category_id" required
                            class="w-full px-4 py-3 bg-[#fafafa] border {{ $errors->has('category_id') ? 'border-[#ef4444]' : 'border-[#e5e5e5]' }} rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 appearance-none cursor-pointer">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="badge_id" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Badge</label>
                        <select id="badge_id" name="badge_id"
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 appearance-none cursor-pointer">
                            <option value="">No badge</option>
                            @foreach($badges as $badge)
                                <option value="{{ $badge->id }}" {{ old('badge_id', $product->badge_id ?? '') == $badge->id ? 'selected' : '' }}>
                                    {{ $badge->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Section 2: Pricing --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">Pricing</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="price" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Price</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[14px] text-[#999999]">{{ config('ananniti.payment.currency_symbol', 'Rp') }}</span>
                            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price ?? '0.00') }}" required
                                class="w-full pl-8 pr-4 py-3 bg-[#fafafa] border {{ $errors->has('price') ? 'border-[#ef4444]' : 'border-[#e5e5e5]' }} rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200"
                                placeholder="0.00" />
                        </div>
                        @error('price')
                            <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="stock_quantity" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Stock</label>
                        <input type="number" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity ?? '0') }}" required
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200"
                            placeholder="0" />
                    </div>
                    <div>
                        <label for="minimum_stock" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Minimum Stock</label>
                        <input type="number" id="minimum_stock" name="minimum_stock" value="{{ old('minimum_stock', $product->minimum_stock ?? '5') }}" required
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200"
                            placeholder="5" />
                        <p class="text-[11px] text-[#999999] mt-1.5">Alert when stock falls below this number.</p>
                    </div>
                </div>
            </div>

            {{-- Section 3: Description --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">Description</h3>
                <div>
                    <label for="description" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Product Description</label>
                    <textarea id="description" name="description" rows="6"
                        class="w-full px-4 py-3 bg-[#fafafa] border {{ $errors->has('description') ? 'border-[#ef4444]' : 'border-[#e5e5e5]' }} rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#777777] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 resize-none"
                        placeholder="Describe the product features, specifications, and benefits...">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Section 4: Images --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-8" style="font-family: var(--font-heading);">Images</h3>

                {{-- Thumbnail Upload --}}
                <div class="mb-8">
                    <label class="block text-[13px] font-medium text-[#1a1a1a] mb-3">Thumbnail</label>
                    <div class="relative max-w-sm">
                        <input type="file" name="thumbnail" accept="image/jpeg,image/png,image/webp" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10" id="thumbnail-input" x-on:change="handleThumbnail($event)" />
                        <label for="thumbnail-input" class="block border-2 border-dashed border-[#e5e5e5] rounded-xl p-6 text-center hover:border-[#cccccc] transition-colors duration-200 cursor-pointer" :class="thumbnailPreview ? 'border-[#1a1a1a]/20' : ''">
                            <template x-if="thumbnailPreview">
                                <div class="relative">
                                    <img :src="thumbnailPreview" class="w-full h-40 object-cover rounded-lg" alt="Thumbnail preview" />
                                    <button type="button" @click="thumbnailPreview = ''; document.getElementById('thumbnail-input').value = ''" class="absolute top-2 right-2 w-6 h-6 bg-[#1a1a1a] text-white rounded-full flex items-center justify-center text-[12px] hover:bg-[#333333]">&times;</button>
                                </div>
                            </template>
                            <template x-if="!thumbnailPreview">
                                <div>
                                    <svg class="w-8 h-8 mx-auto text-[#cccccc] mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5a1.5 1.5 0 001.5-1.5V5.25a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v14.25a1.5 1.5 0 001.5 1.5z"></path></svg>
                                    <p class="text-[13px] text-[#666666] font-medium">Drop image here</p>
                                    <p class="text-[12px] text-[#999999] mt-1">or click to upload</p>
                                    <p class="text-[11px] text-[#cccccc] mt-1.5">JPG, PNG, WebP &bull; Max 20MB</p>
                                </div>
                            </template>
                        </label>
                    </div>
                    @error('thumbnail')
                        <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gallery Upload --}}
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <label class="text-[13px] font-medium text-[#1a1a1a]">Gallery</label>
                        <span class="text-[13px] font-semibold text-[#1a1a1a]" x-show="galleryPreviews.length > 0">
                            <span x-text="galleryPreviews.length"></span> <span x-text="galleryPreviews.length === 1 ? 'Photo' : 'Photos'"></span> Selected
                        </span>
                    </div>

                    {{-- Drop Zone --}}
                    <div class="relative" x-on:dragover.prevent x-on:drop.prevent="handleGalleryDrop($event)">
                        <input type="file" name="gallery[]" accept="image/jpeg,image/png,image/webp" multiple class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10" id="gallery-input" x-on:change="handleGallery($event)" />
                        <label for="gallery-input" class="block border-2 border-dashed border-[#e5e5e5] rounded-xl p-10 text-center hover:border-[#cccccc] hover:bg-[#fafafa] transition-all duration-200 cursor-pointer">
                            <svg class="w-10 h-10 mx-auto text-[#cccccc] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5a1.5 1.5 0 001.5-1.5V5.25a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v14.25a1.5 1.5 0 001.5 1.5z"></path></svg>
                            <p class="text-[14px] text-[#1a1a1a] font-semibold mb-1">Drop Product Images Here</p>
                            <p class="text-[13px] text-[#666666] mb-3">or Click to Browse</p>
                            <div class="flex items-center justify-center gap-2 flex-wrap">
                                <span class="inline-block px-2 py-0.5 text-[10px] font-medium text-[#666666] bg-[#f5f5f0] rounded">JPG</span>
                                <span class="inline-block px-2 py-0.5 text-[10px] font-medium text-[#666666] bg-[#f5f5f0] rounded">PNG</span>
                                <span class="inline-block px-2 py-0.5 text-[10px] font-medium text-[#666666] bg-[#f5f5f0] rounded">WEBP</span>
                                <span class="text-[11px] text-[#999999] mx-1">&bull;</span>
                                <span class="text-[11px] text-[#999999]">Multiple Images</span>
                                <span class="text-[11px] text-[#999999] mx-1">&bull;</span>
                                <span class="text-[11px] text-[#999999]">Max 20MB Each</span>
                            </div>
                        </label>
                    </div>
                    @error('gallery')
                        <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                    @enderror
                    @error('gallery.*')
                        <p class="text-[12px] text-[#ef4444] mt-1.5">{{ $message }}</p>
                    @enderror

                    {{-- Action Bar --}}
                    <div class="flex items-center justify-between mt-5" x-show="galleryPreviews.length > 0">
                        <button type="button" @click="document.getElementById('gallery-input').click()" class="inline-flex items-center gap-1.5 text-[13px] font-medium text-[#1a1a1a] hover:text-[#666666] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                            Add More Images
                        </button>
                        <button type="button" @click="clearAllGallery()" class="inline-flex items-center gap-1.5 text-[13px] font-medium text-[#ef4444] hover:text-[#b91c1c] transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Clear All
                        </button>
                    </div>

                    {{-- Gallery Preview Grid --}}
                    <div class="mt-5" x-show="galleryPreviews.length > 0">
                        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3">
                            <template x-for="(img, index) in galleryPreviews" :key="img.id">
                                <div class="relative group aspect-square">
                                    <img :src="img.url" class="w-full h-full object-cover rounded-lg border border-[#e5e5e5]" alt="Gallery preview" loading="lazy" />
                                    <button type="button" @click="typeof img.id === 'number' ? deleteGalleryImage(img.id, index) : removeGalleryImage(index)" class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-[#ef4444] text-white rounded-full flex items-center justify-center text-[10px] shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-150 hover:bg-[#b91c1c]">&times;</button>
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/50 to-transparent rounded-b-lg p-1.5 opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                        <p class="text-[9px] text-white font-medium truncate" x-text="'#' + (index + 1)"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 5: Status --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">Status</h3>
                <div class="flex flex-col sm:flex-row gap-4">
                    <label class="flex items-center gap-3 px-5 py-3 border border-[#e5e5e5] rounded-xl cursor-pointer hover:border-[#1a1a1a] transition-colors duration-200 has-[:checked]:border-[#1a1a1a] has-[:checked]:bg-[#fafafa]">
                        <input type="radio" name="is_visible" value="1" {{ old('is_visible', $product->is_visible ?? '1') == '1' ? 'checked' : '' }} class="w-4 h-4 text-[#1a1a1a] border-[#e5e5e5] focus:ring-[#1a1a1a]" />
                        <span class="text-[14px] text-[#1a1a1a] font-medium">Published</span>
                    </label>
                    <label class="flex items-center gap-3 px-5 py-3 border border-[#e5e5e5] rounded-xl cursor-pointer hover:border-[#1a1a1a] transition-colors duration-200 has-[:checked]:border-[#1a1a1a] has-[:checked]:bg-[#fafafa]">
                        <input type="radio" name="is_visible" value="0" {{ old('is_visible', $product->is_visible ?? '1') == '0' ? 'checked' : '' }} class="w-4 h-4 text-[#1a1a1a] border-[#e5e5e5] focus:ring-[#1a1a1a]" />
                        <span class="text-[14px] text-[#1a1a1a] font-medium">Draft</span>
                    </label>
                </div>
            </div>

            {{-- Section 6: SEO --}}
            <div class="bg-white border border-[#e5e5e5] rounded-2xl p-6 md:p-8">
                <h3 class="text-[15px] font-bold text-[#1a1a1a] mb-6" style="font-family: var(--font-heading);">SEO</h3>
                <div class="space-y-5">
                    <div>
                        <label for="meta_title" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Meta Title</label>
                        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $product->meta_title ?? '') }}"
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#777777] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200"
                            placeholder="SEO title for search engines" />
                    </div>
                    <div>
                        <label for="meta_description" class="block text-[13px] font-medium text-[#1a1a1a] mb-2">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="3"
                            class="w-full px-4 py-3 bg-[#fafafa] border border-[#e5e5e5] rounded-xl text-[14px] text-[#1a1a1a] placeholder:text-[#777777] focus:outline-none focus:border-[#1a1a1a] transition-colors duration-200 resize-none"
                            placeholder="Brief description for search engines">{{ old('meta_description', $product->meta_description ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Bottom Actions --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 pb-8">
                <a href="{{ route('admin.products.index') }}" class="text-[14px] text-[#666666] hover:text-[#1a1a1a] transition-colors duration-200">Cancel</a>
                <div class="flex items-center gap-3">
                    <button type="submit" name="status" value="draft"
                        class="px-6 py-2.5 border border-[#e5e5e5] text-[14px] font-medium text-[#666666] rounded-lg hover:bg-[#fafafa] hover:text-[#1a1a1a] transition-colors duration-200">
                        Save Draft
                    </button>
                    <button type="submit" name="status" value="publish"
                        class="px-6 py-2.5 bg-[#1a1a1a] text-white text-[14px] font-semibold rounded-lg hover:bg-[#333333] transition-colors duration-200">
                        Publish Product
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
