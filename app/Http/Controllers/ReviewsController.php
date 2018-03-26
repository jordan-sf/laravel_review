<?php

namespace App\Http\Controllers;

use App\Thing;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewsController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.app')->with('status', 'Not implemented.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Thing $thing
     * @return \Illuminate\Http\Response
     */
    public function create(Thing $thing)
    {

        $max_characters_per_review = config('app.max_characters_per_review', 1000);
        return view('reviews.create', compact('thing', 'max_characters_per_review'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max = config('app.max_characters_per_review', 1000);
        $input = $request->validate(
            [
                'review'     => "required|min:20|max:$max",
                'rating'     => 'required|in:1,2,3,4,5',
                'name_first' => 'required|min:2|max:255',
                'name_last'  => 'required|min:2|max:255',
                'email'      => [
                    'required',
                    'email',
                    Rule::unique('reviews', 'email')->where(function ($query) use ($request) {
                        return $query->where('thing_id', $request->thing_id);
                    })
                ],
            ]);
        $input['thing_id'] = $request->thing_id;
        $review = Review::create($input);

        return redirect(route('reviews.show', $review))->with('status', 'Review published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $thing = $review->thing;
        return view('reviews.show', compact('review', 'thing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $max_characters_per_review = config('app.max_characters_per_review', 1000);
        $thing = $review->thing;
        return view('reviews.edit', compact('review', 'thing', 'max_characters_per_review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {

        $max = config('app.max_characters_per_review', 1000);
        $input = $request->validate(
            [
                'review'     => "required|min:20|max:$max",
                'rating'     => 'required|in:1,2,3,4,5',
                'name_first' => 'required|min:2|max:255',
                'name_last'  => 'required|min:2|max:255',
                'email'      => [
                    'required',
                    'email',
                    Rule::unique('reviews', 'email')->where(function ($query) use ($request) {
                        return $query->where('thing_id', $request->thing_id);
                    })
                ],
            ]);
        $input['thing_id'] = $request->thing_id;
        $review = Review::update($input);

        return redirect(route('reviews.show', $review))->with('status', 'Review updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        return view('layouts.app')->with('status', 'Not implemented.');
    }
}
