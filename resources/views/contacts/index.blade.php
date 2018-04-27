@extends('layouts.app')

@section('page-header')
    <a href="{{ route('contacts.add') }}" type="button" class="btn btn-sm btn-success">Add Contact</a>
@endsection

@section('page-content')
    @include('flash::message')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Contact List
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th style="width: 25%">Name</th>
                                <th>Description</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->id?$contact->id:''}}</td>
                                    <td>{{$contact->name?$contact->name:''}}</td>
                                    <td>{{$contact->description?$contact->description:''}}</td>
                                    <td>
                                        <a href="{{route('contacts.edit', [$contact->id])}}"
                                           title="Edit"
                                           class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a type="button"
                                           class="btn btn-default btn-sm"
                                           title="Delete"
                                           data-toggle="modal"
                                           data-target="#deleteModal{{ $contact->id }}"><i class="fa fa-trash"></i></a>
                                        <div id="deleteModal{{ $contact->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button"
                                                                class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Confirm Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Delete contact?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                                class="btn btn-default pull-left"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                                                        {!! Form::submit('Yes', ['class' => 'btn btn-success btn-flat']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries
                            <span class="pull-right">{{ $contacts->setPath('')->appends($_GET)->links() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection