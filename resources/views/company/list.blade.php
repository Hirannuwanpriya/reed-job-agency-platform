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
                        @foreach ($companies as $company)
                            <p>This is user {{ $company->id }}</p>
                            <p>This is user {{ $company->name }}</p>
                            <a href="{{ url('/admin/company/edit/'. $company->id )}}" class="btn btn-primary">Edit Company</a>
                            <br>
                            <br>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
