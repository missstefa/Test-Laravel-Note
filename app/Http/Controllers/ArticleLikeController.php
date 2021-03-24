<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleLikeController extends Controller
{
    public function store(Request $request, Article $article)
    {
        if ($article->likedBy($request->user())) {
            return response(null, 409);
        }
        $article->likes()->create(['user_id' => $request->user()->id,]);

        return back();
    }

    public function destroy(Request $request, Article $article)
    {
        $request->user()->likes()->where('article_id', $article->id)->delete();

        return back();
    }
}

