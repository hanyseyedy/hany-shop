@extends('layouts.admin')

@section('content')
    <h2>ایجاد پست جدید</h2>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <label for="title">عنوان:</label>
        <input type="text" name="title" required>

        <label for="content">محتوا:</label>
        <textarea name="content" required></textarea>

        <button type="submit">افزودن پست</button>
    </form>
@endsection
