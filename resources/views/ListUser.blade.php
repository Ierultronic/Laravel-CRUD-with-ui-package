@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ __('List of all users') }}</b></div>
                <div class="card-body">
                @if(Session::has('success_add'))
            <div class="alert alert-success">{{Session::get('success_add')}}</div>
            @endif
            @if(Session::has('success_update'))
                <div class="alert alert-success">{{Session::get('success_update')}}</div>
                @endif
                @if(Session::has('success_delete'))
                <div class="alert alert-success">{{Session::get('success_delete')}}</div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <table class="table table-bordered data-table">
                <thead>
                <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody> 
                <!-- to list all users existed -->
                @foreach($users as $lists)
                <tr>
                    <td>{{$lists->id}}</td>
                        <td>{{$lists->name}}</td>
                        <td>{{$lists->email}}</td>
                        <td><a type="button" class="btn btn-info" href="{{url('EditUser/'.$lists->id)}}">Edit</a> <a type="button" class="btn btn-warning" href="{{url('deleteUser/'.$lists->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                    <tr>
                    <td></td>
                        <td></td>
                        <td></td>
                        <td><a type="button" class="btn btn-info" href="/AddUser">Add Another User</a></td>
                    </tr> 
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
