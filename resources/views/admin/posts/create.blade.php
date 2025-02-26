<form action="{{ route('admin.posts.store') }}" method="POST">
    @csrf
    <label>عنوان پست</label>
    <input type="text" name="title" required>
    <label>محتوا</label>
    <textarea name="content" required></textarea>
    <button type="submit">ثبت</button>
</form>
