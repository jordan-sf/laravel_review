@extends('layouts.app')

@section('subheader')
    <a class="btn btn-outline-success btn-sm" href="{{ route('accounts.create') }}" role="button">New account</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <section class="card">
                <div class="card-header"><b>{{ $account->city }}, {{ $account->state }}</b></div>

                <div class="card-body">

                    <h1>{{ $account->name }}</h1>
                    @include('accounts.partials.date_info')
                    @include('accounts.partials.stats',  ['rating' => $account->rating])
                    <p class="mt-2"><a class="btn btn-primary" href="{{ route('create_review_with_account', $account) }}" role="button">New Review</a></p>
                    <hr>
                    <div class="reviews">
                        @foreach($account->reviews as $review)
                            <blockquote>
                                <div class="review">
                                    <p>
                                        {{ $review->optimized_text }}
                                    </p>
                                </div>
                                <i>&ndash; <a href="{{ route('reviews.show', $review) }}">{{ $review->reviewer_safe_display_name }}</a></i>
                                (<span class="review_date">{{ $review->created_at->diffForHumans() }}</span>)
                            </blockquote>
                        @endforeach
                    </div>
                    <p><a class="btn btn-primary" href="{{ route('create_review_with_account', $account) }}" role="button">New Review</a></p>
                    {{--<p><a class="btn btn-primary" href="{{ route('accounts.edit', $account) }}" role="button">Edit</a></p>--}}
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
