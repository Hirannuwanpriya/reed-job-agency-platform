@extends('layouts.app')

{{--@auth('web')--}}
    {{--@extends('layouts.app_admin')--}}
{{--@endauth--}}

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

                    Show cv
                    <p>{{ $cv->id }}</p>
                    <p>{{ $cv->user->name }}</p>
                    <p>{{ $cv->name }}</p>
                    <p>{{ $cv->user->email }}</p>
                    <p>{{ $cv->mobile }}</p>
                    <p>{{ $cv->website }}</p>

                    <a href="{{url('/curriculum-vitae/generate/'. $cv->id)}}" class="btn btn-primary">Generate Cv</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
