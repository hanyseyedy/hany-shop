@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>مدیریت کامنت‌ها</h1>
    <table class="table">
        <thead>
            <tr>
                <th>کاربر</th>
                <th>کامنت</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->approved ? 'تأیید شده' : 'در انتظار تأیید' }}</td>
                <td>
                    @if(!$comment->approved)
                    <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-success btn-sm">تأیید</button>
                    </form>
                    @endif
                    <a href="{{ route('admin.comments.edit', $comment) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $comments->links() }}
</div>
@endsection
