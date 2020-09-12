@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 ml-5">
            <h1>All Categories</h1>
        
            <table class="table table-responsive table-hover">gi
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                @if(isset($categories))
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <tbody>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger', 'type' => 'button'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tbody>
                        @endforeach
                    @endif
                @endif
            </table>
        </div>{{-- end of col-8 --}}

        <div class="col-md-3">
            <div class="well spacing-top">
                {!! Form::open(['route' => 'category.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
                @csrf
                    <h2>New Category</h2>
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        
                    {{ Form::submit('Add Category', ['class' => 'btn btn-info spacing-top', 'role' => 'button'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection