<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Edit User') }}</span>
        </h6>

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                <x-admin.error name="name" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Email') }}</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" disabled>
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Role') }}</label>
                <select class="form-control" name="role">
                    @foreach (\App\Models\User::ROLES as $role)
                        <option value="{{ $role }}" @selected($role == $user->role)>{{ __($role) }}</option>
                    @endforeach
                </select>
                <x-admin.error name="status" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
