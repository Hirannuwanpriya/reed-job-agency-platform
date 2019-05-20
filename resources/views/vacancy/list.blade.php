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

                    You are in Vacancy create!
                    <h1>Vacancy List</h1>
                    <br>
                    <a href="{{url('admin/vacancy/add')}}" class="btn btn-primary">Add Vacancy</a>
                    <br>
                    <br>
                    <a href="{{url('admin/vacancy/edit/1')}}" class="btn btn-primary">Edit Vacancy</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
