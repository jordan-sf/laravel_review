@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New account') }}</div>

                <div class="card-body">
                    <form action="{{ route('accounts.store') }}" method="POST">
                        @csrf
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
                        <div class="form-group">
                            <label for="name">{{__('account Name')}}</label>
                            <input required minlength="10" maxlength="60" value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="{{__('account Name')}}">
                            <small id="nameHelp" class="form-text text-muted">Minimum of 10 and maximum of 60 characters.</small>
                        </div>
                        <div class="form-group">
                            <label for="city">{{ __('City') }}</label>
                            <input required minlength="2" maxlength="255" value="{{ old('city') }}" type="text" class="form-control" name="city" id="city" placeholder="{{ __('City') }}">
                        </div>
                        <div class="form-group">
                            <label for="state">{{ __('State') }}</label>
                            <select required name="state" id="state" class="form-control custom-select">
                                <option value="" hidden>Select a US State</option>
                                @foreach($states as $state)
                                    <option @if (old('state') == $state->abbr) selected="selected" @endif value="{{ $state->abbr }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_start">Start Date</label>
                            <input required name="date_start" id="date_start" type="date" class="form-control" value="{{ old('date_start') }}" />
                        </div>
                        <div class="form-group">
                            <label for="date_end">End Date</label>
                            <input required name="date_end" id="date_end" type="date" class="form-control" value="{{ old('date_end') }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create account') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
