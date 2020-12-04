<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'is_important'
    ];

    public function getFormatDateForIndex()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('d F H:i');
    }

}
