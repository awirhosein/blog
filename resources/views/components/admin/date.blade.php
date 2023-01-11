{{-- <span>{{ jdate($date)->format('d %b Y') }}</span> --}}
{{-- @isset($ago) --}}
    <span class="small">({{ jdate($date)->ago() }})</span>
{{-- @endisset --}}