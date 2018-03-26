<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'review',
        'rating',
        'thing_id',
    ];

    /**
     * Get the review's author.
     */
    public function reviewer()
    {
        return $this->belongsTo('App\User')->firstOrFail();
    }

    /**
     * Get the review's thing.
     */
    public function thing()
    {
        return $this->belongsTo('App\Thing');
    }

    /**
     * Get either the version of the review text the site admin edited or else get the original review text.
     */
    public function getOptimizedTextAttribute()
    {
        return strlen($this->summarized_review) ? $this->summarized_review : $this->review;

    }

}
