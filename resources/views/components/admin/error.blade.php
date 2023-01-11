<div {{ $attributes->merge(['class' => 'text-right mt-2']) }}>
    @error($name)
        <span class="text-danger">- {{ $message }}</span>
    @enderror
</div>
