<x-admin-layout>

    <div class="create-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Add Access') }}</span>
        </h6>

        <form action="{{ route('admin.users.article-access.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Author') }}</label>
                <select class="select2 w-100" name="authors[]" multiple>
                    @foreach (\App\Models\User::isAuthor()->get() as $author)
                        <option value="{{ $author->id }}" @selected(in_array($author->id, $selected_authors)) >{{ $author->name }}</option>
                    @endforeach
                </select>
                <x-admin.error name="status" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
