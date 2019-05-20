@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are in User list!
                    <h1>User List</h1>
                    <br>
                    <a href="{{url('admin/user/add')}}" class="btn btn-primary">Add User</a>
                    <br>
                    <br>
                    <a href="{{url('admin/user/edit/1')}}" class="btn btn-primary">Edit User</a>
                    <br>
                    <br>
                    <a href="{{url('admin/user/activity')}}" class="btn btn-primary">User Activity</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
