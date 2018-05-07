@extends('layouts.app')

@section('title')
    Contacts
@endsection

@section('page-header')
    <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary">Add Contact</a>
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
                                <th style="width: 15%">Name</th>
                                <th>email</th>

                                <th style="width: 12%">Mobile</th>
                                <th style="width: 12%">Home</th>

                                <th style="width: 25%">Address</th>
                                <th style="width: 10%">City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Group</th>

                                <th style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->id?$contact->id:''}}</td>
                                    <td>{{$contact->name?$contact->name:''}}</td>
                                    <td>{{$contact->email?$contact->email:''}}</td>
                                    <td>{{$contact->mobile_phone?$contact->mobile_phone:''}}</td>
                                    <td>{{$contact->home_phone?$contact->home_phone:''}}</td>
                                    <td>{{$contact->address?$contact->address:''}}</td>
                                    <td>{{$contact->city?$contact->city:''}}</td>
                                    <td>{{$contact->state?$contact->state:''}}</td>
                                    <td>{{$contact->zip?$contact->zip:''}}</td>
                                    <td>{{$contact->group->getName()?$contact->group->getName():''}}</td>
                                    <td>
                                        <a href="{{route('contacts.edit', [$contact->id])}}"
                                           title="Edit"
                                           class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-default btn-sm"
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