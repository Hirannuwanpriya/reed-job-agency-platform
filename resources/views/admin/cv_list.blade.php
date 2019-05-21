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

                    You are in CV create!
                    <h1>Curriculum Vitae List</h1>
                        <a href="{{url('cv/generator')}}" class="btn btn-primary">Generate Cv</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
