@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Create Post</div> --}}

                <div class="card-body">
                    <h4 class="mt-0 header-title">My Posts</h4>
                    @if(count($user_posts) > 0)
                    <table id="datatable" class="table table-bordered table-responsive" style="border-collapse: collapse; border-spacing: 0;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($user_posts as $post)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$post->title}}</td>
                            <td>{!! substr(strip_tags($post->description), 0, 50) !!} {!! strlen(strip_tags($post->description)) > 50 ? "..." : ""!!}</td>
                            <td>{{date("D, M j, Y h:ia", strtotime($post->created_at))}}</td>
                            <td>
                                <button class="btn btn-primary btn-sm">
                                    <a href="{{ route('post.show', $post->id)}}" class="text-white">
                                        View
                                    </a>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>

                    @else
                        <h4 class="mt-0 text-danger">You have no post yet</h4>
                    @endif

                    <div class="pagination">
                        {{$user_posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
