@extends('layouts.app')

@section('content')
<div class="container">
    <h1>مدیریت پست‌ها</h1>
    <a href="#" class="btn btn-primary mb-3">افزودن پست جدید</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان پست</th>
                <th>تاریخ انتشار</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at ? $post->created_at->format('Y-m-d') : '-' }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}">ویرایش</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    {{ $posts->links() }}
</div>
@endsection
