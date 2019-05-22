@extends('layouts.app')

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

                    You are logged in!

                        @foreach ($cvs as $cv)
                            <p>This is user {{ $cv->id }}</p>
                            <p>This is user {{ $cv->name }}</p>
                            <a href="{{ url('/curriculum-vitae/'. $cv->id )}}" class="btn btn-primary">Show Cv</a>
                            <br>
                            <br>
                        @endforeach

                    <a href="{{url('/curriculum-vitae/add')}}" class="btn btn-primary">Add Cv</a>
                    <br>
                    <br>
                    <a href="{{url('/curriculum-vitae/edit')}}" class="btn btn-primary">Edit Cv</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
