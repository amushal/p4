@extends('layouts.app')

@section('title')
    Add Contact
@endsection

@section('page-header')
    Add Contact
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'contacts.store', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}

            @include('contacts.contactFormInputs')

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script src="/js/custom.js"></script>
@endsection