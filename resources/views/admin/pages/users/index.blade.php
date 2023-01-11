<x-admin-layout>
    <x-admin.index-header title="Users" :create="route('admin.users.create')" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($users as $user)
                <tr>
                    <td class="font-weight-bold w-0">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-left">
                        <x-admin.dropdown-menu
                            :access="route('admin.users.article-access.edit', $user)"
                            :edit="route('admin.users.edit', $user)"
                            :delete="route('admin.users.destroy', $user)"
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $users->render() }}
    </div>
</x-admin-layout>
