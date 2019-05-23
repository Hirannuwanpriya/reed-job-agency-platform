@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are in Company Edit!
                        <p>This is user {{ $company->id }}</p>
                        <p>This is user {{ $company->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
