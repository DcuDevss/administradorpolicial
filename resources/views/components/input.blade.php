@props(['disabled' => false])

{{-- AÑADIDO: 'text-gray-900' para asegurar que el texto de entrada sea negro/gris oscuro --}}
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-900',
]) !!}>
