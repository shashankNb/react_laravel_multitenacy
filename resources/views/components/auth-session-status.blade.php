@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-info']) }}>
        {{ $status }}
    </div>
@endif
