@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Review') }}</div>

                <div class="card-body">
                        <form action="{{ route('reviews.update', $review) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if(count($errors))
                           <div class="form-group">
                               <div class="alert alert-danger">
                                   <ul>
                                   @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                   @endforeach
                                   </ul>
                               </div>

                           </div>
                        @endif
                        <div>
                            <h3>{{ $account->name }}</h3>
                            @include('accounts.partials.date_info')
                        </div>
                        <div class="form-group">
                            <label for="name">{{__('Your Review')}}</label>
                            <textarea required class="form-control" name="review" id="review" aria-describedby="reviewHelp">{{ $review->review }}</textarea>
                            <small id="reviewHelp" class="form-text text-muted">Minimum of 20 and maximum of {{ config('app.max_characters_per_review') }} characters. Note: Site administrators may choose to publish a shortened version.</small>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="rating">{{ __('Rating') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_1" value="1" @if ( $review->rating == '1') selected="selected" @endif>
                                <label class="form-check-label" for="rating_1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_2" value="2" @if ( $review->rating == '2') selected="selected" @endif>
                                <label class="form-check-label" for="rating_2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_3" value="3" @if ( $review->rating == '3') selected="selected" @endif>
                                <label class="form-check-label" for="rating_3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_4" value="4" @if ( $review->rating == '4') selected="selected" @endif>
                                <label class="form-check-label" for="rating_4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_5" value="5" @if ( $review->rating == '5') selected="selected" @endif>
                                <label class="form-check-label" for="rating_5">5</label>
                            </div>
                        </div>
                        <input type="hidden" name="account_id" value="{{ $account->id }}">
                        <button type="submit" class="btn btn-primary">{{ __('Save Review') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
