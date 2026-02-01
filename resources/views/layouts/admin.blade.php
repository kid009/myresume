<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - MyResume</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 font-sans antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"></div>

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-slate-900 transition-transform duration-300 ease-in-out lg:static lg:translate-x-0">

            <div class="flex items-center justify-center h-16 bg-slate-800 shadow-md">
                <span class="text-white text-2xl font-bold">My<span class="text-indigo-500">Resume</span></span>
            </div>

            <nav class="mt-5 px-4 space-y-1">

                <div class="pt-4 pb-2">
                    <p class="px-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">
                        Content Management
                    </p>
                </div>

                {{-- <x-admin-nav-link route="admin.hero" icon="user">
                    Hero Section
                </x-admin-nav-link>

                <x-admin-nav-link route="admin.skills" icon="lightning-bolt">
                    Skills
                </x-admin-nav-link> --}}

                <x-admin-nav-link route="admin.profile" icon="collection">
                    Portfolio
                </x-admin-nav-link>

            </nav>

            <div class="absolute bottom-0 w-full p-4 bg-slate-800 border-t border-slate-700">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <div
                            class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </p>
                        <livewire:auth.logout />
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex flex-1 flex-col overflow-hidden">

            <header class="flex items-center justify-between px-6 py-4 bg-white shadow-sm border-b">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <h2 class="text-xl font-semibold text-gray-800 ml-4 lg:ml-0">
                        {{ $title ?? 'Dashboard' }}
                    </h2>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if (session()->has('message'))
                    <div class="mb-4 rounded-md bg-green-50 p-4 border-l-4 border-green-400">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700 font-medium">
                                    {{ session('message') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>

    </div>

    <div x-data="{ show: false, message: '' }"
        x-on:show-toast.window="
        show = true;
        message = $event.detail.message; {{-- ✅ รับค่าจาก parameter ชื่อ message --}}
        setTimeout(() => show = false, 3000);
     "
        class="fixed bottom-5 right-5 z-50 pointer-events-none">

        <div x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2" style="display: none;"
            class="pointer-events-auto flex items-center w-full max-w-xs p-4 space-x-3 text-gray-500 bg-white rounded-lg shadow-lg border-l-4 border-green-500">

            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
            </div>

            <div class="ml-3 text-sm font-normal text-gray-800" x-text="message"></div>

            <button type="button" @click="show = false"
                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>

    @livewireScripts
</body>

</html>
