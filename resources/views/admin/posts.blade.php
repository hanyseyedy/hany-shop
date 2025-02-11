@extends('layouts.admin')

@section('title', 'Manage Posts')

@section('content')
    <h1>Manage Posts</h1>
    <a href="{{ url('/admin/posts/create') }}" class="btn btn-success mb-3">Add New Post</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ url('/admin/posts/' . $post->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/admin/posts/' . $post->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
