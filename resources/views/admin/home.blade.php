@extends('layouts.admin')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6">
    <div class="text-center">
        <div class="inline-flex items-center justify-center w-14 h-14 rounded-lg bg-[#0a0a0a] mb-6">
            <span class="text-sm font-bold tracking-wider text-white">AT</span>
        </div>
        <h1 class="text-2xl font-bold text-[#1a1a1a] mb-2" style="font-family: var(--font-heading);">Welcome, {{ auth()->user()->name }}</h1>
        <p class="text-[14px] text-[#666666] mb-8">Backend is ready.</p>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="px-6 py-2.5 bg-[#fafafa] border border-[#e5e5e5] text-[13px] font-medium text-[#666666] rounded-lg hover:bg-[#f0f0f0] hover:text-[#1a1a1a] transition-colors duration-200">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection
