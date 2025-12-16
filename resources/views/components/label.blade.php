@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-200']) }}>
    {{-- MODIFICACIÓN: Cambiamos text-gray-700/900 por text-gray-200 (gris claro) --}}
    {{ $value ?? $slot }}
</label>
