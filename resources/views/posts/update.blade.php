@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">

                    <h1 class="mt-0 header-title text-center">Edit - {{$post->title}}</h1>
                    <hr>

                    <form action="{{route('post.update', $post->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <div> 
                                <input type="text" id="title" name="title"
                                        class="form-control" required
                                        placeholder="Title...." value="{{$post->title}}"/>
                            </div>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                <textarea required class="form-control" rows="5" name="description" id="description">{{$post->description}}</textarea>
                            </div>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                       
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Update
                                </button>

                                <button type="submit" class="btn btn-danger waves-effect waves-light">
                                    <a href="{{route('post.show', $post->id)}}" class="text-white">
                                        Cancel
                                    </a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
