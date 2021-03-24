<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::query()
            ->withCount('likes')
            ->with('users')
            ->get();

        return view('welcome', ['articles' => $articles]);
    }
}
