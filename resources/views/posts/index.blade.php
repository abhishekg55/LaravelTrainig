@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @can('create post')
                    <a href="" class="btn btn-primary">Add Post</a>
                @endcan
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->description }}</td>
                                <td>
                                    @can('edit post')
                                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                    @endcan
                                    @can('delete post')
                                        <a href="{{ route('posts.delete', $post->id) }}">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
