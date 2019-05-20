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

                    You are in Company!

                    <h1>Company List</h1>
                    <a href="{{url('admin/company/add')}}" class="btn btn-primary">Add Company</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
