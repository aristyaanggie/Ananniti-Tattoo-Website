<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Dashboard' }} — {{ config('app.name', 'Ananniti Tattoo') }}</title>
    <meta name="description" content="Admin Portal for Ananniti Tattoo Bali">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #666666;
            transition: all 0.2s;
            text-decoration: none;
        }
        .sidebar-link:hover { background: #f5f5f5; color: #1a1a1a; }
        .sidebar-link.active { background: #1a1a1a; color: #ffffff; }
        .stat-card {
            background: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            padding: 24px;
            transition: border-color 0.2s;
        }
        .stat-card:hover { border-color: #cccccc; }
    </style>
</head>
<body class="antialiased bg-[#fafafa]">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-[#e5e5e5] transform -translate-x-full md:translate-x-0 transition-transform duration-200" x-data="{ open: false }">
            <div class="flex items-center gap-3 px-6 py-5 border-b border-[#e5e5e5]">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-[#0a0a0a]">
                    <span class="text-[10px] font-bold tracking-wider text-white">AT</span>
                </div>
                <span class="font-bold text-[15px] text-[#1a1a1a]" style="font-family: var(--font-heading);">Ananniti</span>
            </div>

            <nav class="px-4 py-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.content.index') }}" class="sidebar-link {{ request()->routeIs('admin.content.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                    Content
                </a>
                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"></path></svg>
                    Products
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="sidebar-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5a1.5 1.5 0 001.5-1.5V5.25a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v14.25a1.5 1.5 0 001.5 1.5z"></path></svg>
                    Portfolio
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="sidebar-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"></path></svg>
                    Reviews
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path></svg>
                    Contacts
                </a>
                {{-- Settings with submenu --}}
                <div x-data="{ settingsOpen: false }">
                    <button @click="settingsOpen = !settingsOpen" class="sidebar-link w-full {{ request()->routeIs('admin.dashboard') && !request()->routeIs('admin.dashboard') ? '' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.21-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.728c-.293.21-.438.59-.438.924v.08c0 .333.146.713.438.924l1.003.728c.473.34.572.987.26 1.431l-1.296 2.247a1.125 1.125 0 01-1.37.49l-1.21-.456c-.355-.133-.751-.072-1.075.124a7.028 7.028 0 01-.22.127c-.331.183-.581.495-.645.87l-.213 1.28c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.063-.374-.313-.686-.645-.87a7.042 7.042 0 01-.22-.127c-.324-.196-.72-.257-1.075-.124l-1.21.456a1.125 1.125 0 01-1.37-.49l-1.296-2.247a1.728 1.528 0 01.26-1.431l1.003-.728c.293-.21.438-.59.438-.924v-.08c0-.333.146-.713.438-.924l-1.003-.728c-.473-.34-.572-.987-.26-1.431l1.296-2.247a1.125 1.125 0 011.37-.49l1.21.456c.355.133.751.072 1.075-.124.074-.04.147-.083.22-.127.331-.183.581-.495.645-.87l.213-1.281z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Settings
                        <svg class="w-4 h-4 ml-auto transition-transform duration-200" :class="settingsOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path></svg>
                    </button>
                    <div x-show="settingsOpen" x-collapse class="ml-6 mt-1 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link text-[13px]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a1.807 1.807 0 000-2.764L13.11 3.757a1.807 1.807 0 00-2.607.33L8.958 5.623M3 9.75v4.5A2.25 2.25 0 005.25 16.5h4.5"></path></svg>
                            Categories
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link text-[13px]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg>
                            Artists
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link text-[13px]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                            Audit Logs
                        </a>
                    </div>
                </div>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 px-4 py-4 border-t border-[#e5e5e5]">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link w-full text-left text-[#666666] hover:text-[#ef4444]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Mobile overlay --}}
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/50 z-40 md:hidden" x-cloak></div>

        {{-- Main Content --}}
        <div class="flex-1 md:ml-64">
            {{-- Top Bar --}}
            <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-sm border-b border-[#e5e5e5]">
                <div class="flex items-center justify-between px-6 py-4">
                    <button @click="open = !open" class="md:hidden p-2 -ml-2 text-[#666666]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path></svg>
                    </button>
                    <div>
                        <h1 class="text-lg font-bold text-[#1a1a1a]" style="font-family: var(--font-heading);">{{ $pageTitle ?? 'Dashboard' }}</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('home') }}" target="_blank" class="text-[13px] text-[#666666] hover:text-[#1a1a1a] transition-colors duration-200">View Site</a>
                        @auth
                            <div class="w-8 h-8 rounded-full bg-[#f5f5f0] flex items-center justify-center">
                                <span class="text-[11px] font-bold text-[#1a1a1a]">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        @endauth
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
