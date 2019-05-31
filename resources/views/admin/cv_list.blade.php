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
                        @foreach ($cvs as $cv)
                            <p>This is user {{ $cv->id }}</p>
                            <p>This is user {{ $cv->name }}</p>
                            <a href="{{ url('/admin/curriculum-vitae/'. $cv->id )}}" class="btn btn-primary">Show Cv</a>
                            <a href="{{url('/curriculum-vitae/generate/'. $cv->id)}}" class="btn btn-primary">Generate Cv</a>
                            <br>
                            <br>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
