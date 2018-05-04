@extends('layouts.app')

@section('title')
    Edit Contact
@endsection

@section('page-header')
    Edit Contact
@endsection

@section('page-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($contact, ['method' => 'PATCH', 'route' => ['contacts.update', $contact->id], 'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}

            @include('contacts.contactFormInputs')

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script src="/js/custom.js"></script>
@endsection