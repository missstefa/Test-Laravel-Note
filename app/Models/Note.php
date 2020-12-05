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
        'user_id'
    ];

    public function getFormatDateForIndex()
    {
        return Carbon::parse($this->created_at)->format('d F H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
