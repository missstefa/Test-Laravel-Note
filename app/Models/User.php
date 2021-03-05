<?php

namespace App\Models;

use DateTime;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth',
        'full_name',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'datetime'
    ];

    public function getAgeAttribute()
    {
        $birthDay = $this->birth;
        $today = new Datetime(date('m.d.y'));
        $diff = $today->diff($birthDay);
        return $diff->y;
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'userable');
    }

    public function notes()
    {
        return $this->morphedByMany(Note::class, 'userable');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
