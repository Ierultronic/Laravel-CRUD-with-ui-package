@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                        Welcome to user Dashboard
                    {{ __('You are logged in!') }}<br>
                    <td><a type="button" class="btn btn-primary" href="ListUser">List All Users</a></td>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
