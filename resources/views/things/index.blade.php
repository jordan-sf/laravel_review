@extends('layouts.app')

@section('subheader')
    <a class="btn btn-outline-success btn-sm" href="{{ route('accounts.create') }}" role="button">New account</a>
@endsection

@section('content')
    @each('accounts.partials.each', $accounts, 'account', 'accounts.empty')
@endsection
