<x-admin-layout>
    <x-admin.index-header title="Articles" :create="route('admin.articles.create')" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($articles as $article)
                <tr>
                    <td class="font-weight-bold w-0">{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->author?->name }}</td>
                    <td>{{ __($article->status) }}</td>
                    <td class="text-left">
                        <x-admin.dropdown-menu
                            :edit="route('admin.articles.edit', $article)"
                            :delete="route('admin.articles.destroy', $article)"
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $articles->render() }}
    </div>
</x-admin-layout>
