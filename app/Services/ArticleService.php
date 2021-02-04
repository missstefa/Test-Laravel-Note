<?php


namespace App\Services;


use App\Models\Article;

class ArticleService
{

    public function store(array $data): void
    {
        Article::create($data);
    }
}