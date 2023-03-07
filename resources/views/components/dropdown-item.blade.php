@props(['active' => false])

@php
    $classes  = 'block text-left px-3 leading-6 text-sm hover:bg-blue-500 focus:bg-blue-500 focus:text-white';
    if($active) $classes = $classes." bg-blue-500 text-white";
@endphp
<a {{ $attributes(['class' => $classes ]) }}>
    {{ $slot }}
</a>
