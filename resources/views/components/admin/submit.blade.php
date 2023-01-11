@props(['title' => __('Save'), 'back' => false])

<hr>

<button type="submit" class="btn btn-dark position-relative px-5">
    <span>{{ $title }}</span>
</button>

@if ($back && back_url())
    <a href="{{ back_url() }}" class="btn btn-outline-danger">بازگشت</a>
@endif
