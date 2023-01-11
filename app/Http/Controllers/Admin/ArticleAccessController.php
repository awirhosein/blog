<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleAccessController extends Controller
{
    public function edit(User $user)
    {
        $selected_authors = array_unique($user->article_access->pluck('author_id')->toArray());

        return view('admin.pages.users.article-access', compact('user', 'selected_authors'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate(['authors' => 'required']);

        $user->article_access()->sync($request->authors);

        toast(__('msg.success.update'), 'success');

        return redirect()->route('admin.users.index');
    }
}
