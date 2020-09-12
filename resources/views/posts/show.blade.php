@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row post-content">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->description !!}</p>
            <hr>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary px-5">
                            <a href="{{route('post.edit', $post->id)}}" class="text-white">
                                Edit
                            </a>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('post.destroy', $post->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-5">Delete</button>
                        </form>
                    </div><br />
                </div>
            </div>
        </div><hr>
    </div>
</div>
@endsection