<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{

    protected $fillable = [
        'name',
        'city',
        'state',
        'date_start',
        'date_end',
    ];

    /**
     * Get the thing's reviews.
     */
    public function reviews()
    {
        return $this->hasMany('App\Review')->orderByDesc('created_at');
    }

    /**
     * Get the thing's reviews.
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getReviewsSnippetAttribute()
    {
        return $this->reviews()->limit(2)->get();
    }


    /**
     * Get the thing's calculated rating.
     */
    public function getRatingAttribute()
    {
        // this is only a mock, but if it were not, calculate the actual Bayesian value using a few db queries, and possibly cache it on the Thing
        //(WR) = (v ÷ (v+m)) × R + (m ÷ (v+m)) × C

        // R = average for the movie (mean) = (Rating)
        // v = number of votes for the movie = (votes)
        // m = minimum votes required to be listed in the Top 250 (currently 1300)
        // C = the mean vote across the whole report (currently 6.8)

        $R = $this->reviews()->avg('rating');
        $v = $this->reviews()->count('rating');
        $m = 1;
        $C = Review::avg('rating');

        $bayesian_rating = ( ($v/($v + $m)) * $R) + ( ($m / ( $v + $m)) * $C);
        return $v > 0 ? $bayesian_rating : 0;
    }


    /**
     * @param string $email
     * @return bool
     */
    public function has_reviews_with_email_address(string $email) {

        return $this->reviews()->where(['email' => $email])->exists();
    }
}
