@extends('layouts.app')

@section('title')
    Welcome
@endsection

@section('page-content')

        {{--<div class="col-6">
            <div class="panel">
                <div class="panel-body">
--}}
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Don't lose your contact list</h1>
            <p class="lead font-weight-normal">With My Contacts you will always have a secure backup of your contact list.</p>
            <a class="btn btn-outline-secondary" href="{{ route('login') }}">Start</a>
        </div>
        <div class="product-device box-shadow d-none d-md-block"></div>
        <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    </div>
        {{--        </div>
            </div>
        </div>--}}
@endsection


