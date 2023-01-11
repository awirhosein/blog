<x-admin-layout>

    <div class="create-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Add User') }}</span>
        </h6>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                <x-admin.error name="name" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Email') }}</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                <x-admin.error name="email" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Password') }}</label>
                <input type="password" class="form-control" name="password" required>
                <x-admin.error name="password" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control" name="password_confirmation" required>
                <x-admin.error name="password_confirmation" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Role') }}</label>
                <select class="form-control" name="role">
                    @foreach (\App\Models\User::ROLES as $role)
                        <option value="{{ $role }}">{{ __($role) }}</option>
                    @endforeach
                </select>
                <x-admin.error name="status" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
