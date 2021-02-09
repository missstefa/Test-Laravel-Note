<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    const LIMITSHORTBODY = 150;

    protected $fillable = [
        'title',
        'body',
        'url',
        'meta',
    ];

    public function getShortBodyAttribute()
    {
        return Str::limit($this->body, Article::LIMITSHORTBODY );
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
