@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-light text-base text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
