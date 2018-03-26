<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <section class="card">
                <div class="card-header"><b>{{ $account->city }}, {{ $account->state }}</b></div>

                <div class="card-body">

                    <h3><a href="{{ route('accounts.show', $account->id) }}">{{ $account->name }}</a></h3>
                    @include('accounts.partials.date_info')
                    @include('accounts.partials.stats',  ['rating' => $account->rating])
                    <div class="reviews_snippet">
                        @foreach($account->reviews_snippet as $review)
                            <blockquote>
                                <div class="review">
                                    <p class="collapse" id="collapseSummary">
                                        {{ $review->optimized_text }}
                                    </p>
                                    {{--<a class="collapsed" data-toggle="collapse" href="#collapseSummary" aria-expanded="false" aria-controls="collapseSummary"></a>--}}
                                </div>
                                <i>&ndash; <a href="{{ route('reviews.show', $review) }}">{{ $review->reviewer()->safe_display_name }}</a></i>
                                (<span class="review_date">{{ $review->created_at->diffForHumans() }}</span>)
                            </blockquote>
                        @endforeach
                    </div>
                    <p><a class="btn btn-primary btn-sm" href="{{ route('create_review_with_account', $account) }}" role="button">New Review</a></p>
                </div>
            </section>
        </div>
    </div>
</div>
