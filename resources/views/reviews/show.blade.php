@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <section class="card">
                <div class="card-header"><b>Review by {{ $review->reviewer_safe_display_name }}</b> (<span class="review_date">{{ $review->created_at->diffForHumans() }}</span>)</div>

                <div class="card-body">
                    <div>
                        <h3><a href="{{ route('accounts.show', $account->id) }}">{{ $account->name }}</a></h3>
                        <div>{{ $account->city }}, {{ $account->state }}</div>
                        @include('accounts.partials.date_info')
                    </div>
                    <div class="reviews">
                        <blockquote>
                            <div class="review">
                                <p>
                                    {{ $review->optimized_text }}
                                </p>
                            </div>
                        </blockquote>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
