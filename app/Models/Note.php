<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'is_important',
        'image'
    ];

    public function getFormatDateForIndex()
    {
        return Carbon::parse($this->created_at)->format('d F H:i');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }

    public function user()
    {
        return $this->users->first();
    }

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}
