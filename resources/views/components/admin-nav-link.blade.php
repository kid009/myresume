@props(['route', 'icon'])

@php
    // ตรวจสอบว่า URL ปัจจุบันตรงกับ Route นี้ไหม
    $active = request()->routeIs($route);

    // เลือกคลาสตามสถานะ Active
    $classes = $active
                ? 'flex items-center px-4 py-3 text-white bg-indigo-600 rounded-md transition-colors duration-200'
                : 'flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-md transition-colors duration-200';
@endphp

<a href="{{ Route::has($route) ? route($route) : '#' }}" {{ $attributes->merge(['class' => $classes]) }}>

    <svg class="w-5 h-5 mr-3 {{ $active ? 'text-white' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        @if($icon == 'home')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        @elseif($icon == 'user')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        @elseif($icon == 'collection')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
        @else
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        @endif
    </svg>

    <span class="font-medium">{{ $slot }}</span>
</a>
