@extends('layouts.app')

@section('title')
    Welcome
@endsection

@section('page-content')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">

        <h1 class="display-4 font-weight-normal">Coming soon...
        </h1>
        <p class="lead font-weight-normal">With My Contacts you will always have a secure backup of your contact list.</p>
        <a class="btn btn-outline-secondary" href="{{ route('login') }}">Start</a>

    </div>


@endsection


