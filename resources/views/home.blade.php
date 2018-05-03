@extends('layouts.app')

@section('title')
    MyContacts
@endsection

@section('page-header')
    MyContacts
@endsection

@section('page-content')

    @if (Auth::check())
        <h2>Welcome back {{ Auth::user()->name }}!</h2>
    @endif
    <p class="lead">
        Don't lose your contact list. MyContacts is a simple, secure online access to your contacts list.
    </p>
    <p class="lead">
        Tag, group, organize your contacts and much more.
    </p>
    <p class="lead">
        A great way to find and restore contacts to your phone!
    </p>

    @if (Auth::guest())
        <p><a class="btn btn-lg btn-success" href="{{ route('login') }}" role="button">Get started</a></p>
    @endif

@endsection
