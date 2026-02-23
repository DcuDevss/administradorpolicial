@props(['active'])

@php
    // Cambios: mr-4 -> mr-1 (Reduce el espacio entre botones)
    $classes =
        $active ?? false
            ? 'inline-flex items-center justify-center float-right mr-1 px-2 py-2 bg-blue-400 border border-transparent rounded-md font-medium text-xs text-white uppercase tracking-normal hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition'
            : 'inline-flex items-center justify-center float-right mr-1 px-2 py-2 bg-blue-400 border border-transparent rounded-md font-medium text-xs text-white uppercase tracking-normal hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
