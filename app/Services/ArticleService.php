<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;

class ArticleService
{

    public function store(array $data, User $user): void
    {
        $article = Article::create($data);

        $user->articles()->attach($article);
    }

    public function update(array $data, Article $article): void
    {
        $article->fill($data);
        $article->save();
    }
}