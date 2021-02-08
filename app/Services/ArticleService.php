<?php


namespace App\Services;


use App\Models\Article;

class ArticleService
{

    public function store(array $data): void
    {
        Article::create($data);
    }

    public function update(array $data, Article $article): void
    {
        $article->fill($data);
        $article->save();
    }
}