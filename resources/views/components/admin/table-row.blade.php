@props(['fields'])

<tr {{ $attributes->merge() }}>
    <th>#</th>
    @foreach ($fields as $field)
        <th>{{ __($field) }}</th>
    @endforeach
    <th></th>
</tr>
