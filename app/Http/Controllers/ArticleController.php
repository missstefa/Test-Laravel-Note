<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleStoreRequest $request)
    {
        $data = $request->validated();

        $this->articleService->store($data);

        return redirect('/');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
}
