<div class="d-flex">
    <div>
        <span class="font-weight-bold" style="font-size:22px">{{ __($title) }}</span>
    </div>
    
    @isset($create)
        <div class="pr-2">
            <a href="{{ $create }}" class="btn btn-sm btn-outline-info">
                <span style="font-size:12px">{{ __('Add') }}</span>
            </a>
        </div>
    @endisset
</div>