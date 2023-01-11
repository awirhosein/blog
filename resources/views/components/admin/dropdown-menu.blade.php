<div class="dropdown d-flex justify-content-end pointer">
    <i class="fas fa-ellipsis-vertical px-2" style="font-size:20px" data-toggle="dropdown" class="pointer"></i>

    <div class="dropdown-menu mt-2 p-0">
        @isset($access)
            <a href="{{ $access }}" class="text-dark w-100 d-flex align-items-center p-2 pr-3">
                <i class="fa-duotone fa-stars"></i>
                <span class="mr-3" style="font-size:14px">{{ hybrid_trans('Access Articles') }}</span>
            </a>

            <div class="dropdown-divider m-0"></div>
        @endisset

        @isset($edit)
            <a href="{{ $edit }}" class="text-dark w-100 d-flex align-items-center p-2 pr-3">
                <i class="fa-duotone fa-pen-to-square"></i>
                <span class="mr-3" style="font-size:14px">{{ __('Edit') }}</span>
            </a>

            <div class="dropdown-divider m-0"></div>
        @endisset

        @isset($delete)
            <form action="{{ $delete }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="w-100 d-flex align-items-center confirm-delete m-0 p-2 pr-3">
                    <i class="fa-duotone fa-trash-can"></i>
                    <span class="mr-3" style="font-size:14px">{{ __('Delete') }}</span>
                </div>
            </form>
        @endisset
    </div>
</div>
