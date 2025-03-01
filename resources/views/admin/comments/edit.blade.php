@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>ویرایش کامنت</h1>
    <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">محتوای کامنت</label>
            <textarea name="content" class="form-control" rows="3" required>{{ $comment->content }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select name="approved" class="form-control">
                <option value="1" {{ $comment->approved ? 'selected' : '' }}>تأیید شده</option>
                <option value="0" {{ !$comment->approved ? 'selected' : '' }}>در انتظار تأیید</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
</div>
@endsection
