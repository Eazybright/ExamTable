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

                    <h5>Welcome {{auth()->user()->name}}, You are logged in!</h5>

                    <h6> You have 
                        <a href="{{route('questions.index')}}">{{$question_count}}</a>
                         uploaded question(s).
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
