<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Article\{StoreRequest, UpdateRequest};

class ArticleController extends Controller
{
    public function index()
    {
        $query = $this->getArticleQuery();
        $articles = $query->latest()->paginate(config('custom.per_page'));

        return view('admin.pages.articles.index', compact('articles'), [
            'fields' => ['Title', 'Author', 'Status']
        ]);
    }

    public function create()
    {
        return view('admin.pages.articles.create');
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated() + ['author_id' => auth()->id()];

        if (Gate::allows('approve')) {
            $request->validate([
                'status' => ['required', Rule::in(Article::STATUS_TYPES)]
            ]);

            $validated['status'] = $request->status;
        }

        Article::create($validated);

        toast(__('msg.success.create'), 'success');

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        return view('admin.pages.articles.edit', compact('article'));
    }

    public function update(UpdateRequest $request, Article $article)
    {
        $validated = $request->validated();

        if (Gate::allows('approve')) {
            $request->validate([
                'status' => ['required', Rule::in(Article::STATUS_TYPES)]
            ]);

            $validated['status'] = $request->status;
        }

        $article->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect()->route('admin.articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }

    private function getArticleQuery()
    {
        $user = auth()->user();

        if ($user->is_author()) {
            $query = $user->articles();
        } else if ($user->is_assistant()) {
            $query = $user->article_access();
        } else {
            $query = Article::query();
        }

        return $query;
    }
}
