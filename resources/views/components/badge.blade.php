@props(['textColor','bgColor'])
@php
    $textColor = match ($textColor) {
        'gray' => 'text-gray-800',
        'blue' => 'text-blue-800',
        'red' => 'text-red-800',
        'yellow' => 'text-yellow-800',
        'white' => 'text-white',
        default => 'text-gray-800',
    };

    $bgColor = match ($bgColor) {
        'gray' => 'bg-gray-500',
        'blue' => 'bg-blue-500',
        'red' => 'bg-red-500',
        'green' => 'bg-green-500',
        'yellow' => 'bg-yellow-500',
        default => 'bg-gray-500',
    };
@endphp

<button {{ $attributes }} class="{{$textColor}} {{$bgColor}} rounded-xl px-3 py-1 text-base"> {{$slot}}</button>
