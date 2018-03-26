<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_first', 'name_last', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the reviews by this reviewer.
     */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * Get the things the reviewer created.
     */
    public function things_created()
    {
        return $this->hasMany('App\Thing', 'creator_id');
    }

    /**
     * Get the reviewer's name with the just the last initial (for privacy reasons)
     */
    public function getSafeDisplayNameAttribute()
    {
        return sprintf('%s %s.', $this->name_first, mb_strtoupper(mb_substr($this->name_last, 0, 1)));

    }
}
