<x-admin-layout>

    <div class="create-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Add Article') }}</span>
        </h6>

        <form action="{{ route('admin.articles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="text-muted">{{ __('Title') }}</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                <x-admin.error name="title" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Content') }}</label>
                <textarea id="" name="content">{{ old('content') }}</textarea> {{-- tinymce-editor --}} 
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Image') }}</label>
                <x-admin.file-manager.input />
            </div>

            @can('approve')
                <div class="form-group">
                    <label class="text-muted">{{ __('Status') }}</label>
                    <select class="form-control" name="status">
                        @foreach (\App\Models\Article::STATUS_TYPES as $status)
                            <option value="{{ $status }}" @selected($status == old('status'))>{{ __($status) }}</option>
                        @endforeach
                    </select>
                    <x-admin.error name="status" />
                </div>
            @endcan

            <x-admin.submit back />
        </form>
    </div>

    <x-slot name="script">
        <x-admin.tinymce-config />
        <x-admin.file-manager.script />
    </x-slot>

</x-admin-layout>
