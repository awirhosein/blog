@props([
    'name' => 'image',
    'image' => null,
])

<div class="input-group" dir="ltr">
    <input type="text" id="image-input" class="form-control" name="{{ $name }}" value="{{ old($name, $image) }}">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="image-btn">{{ __('Select') }}</button>
    </div>
</div>

<div class="row mt-4">
    <div class="col-3">
        <img src="{{ old($name, $image) }}" class="w-100 rounded" id="image-preview">
    </div>
</div>
