@extends('layouts.admin')

@section('title', 'Manage Comments')

@section('content')
    <h1>Manage Comments</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Approved</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->approved ? 'Yes' : 'No' }}</td>
                    <td>
                        <form action="{{ url('/admin/comments/' . $comment->id . '/approve') }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ url('/admin/comments/' . $comment->id) }}" method="POST" class="d-inline-block">
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
