@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if(count($posts) > 0)
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td>Title</td>
                            <td>Body</td>
                            <td>Date</td>
                            <td width="130px">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{Str::limit($post->body, 80)}}</td>
                            <td>{{$post->date}}</td>
                            <td>
                                <a href="{{ route('post.form', $post->_id)}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('post.delete', $post->_id)}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
