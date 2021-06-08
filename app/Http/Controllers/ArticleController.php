<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    private ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function create(): view
    {
        return view('articles.create');
    }

    public function store(ArticleStoreRequest $request)
    {
        $this->articleService->store($request->validated(), $request->user());

        return redirect('/');
    }

    public function show(Article $article): view
    {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
            return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article, ArticleUpdateRequest $request): view
    {
        $this->articleService->update($request->validated(), $article);

        return view('articles.show', ['article' => $article]);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}
