<form action="{{ route('admin.posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <label>عنوان پست</label>
    <input type="text" name="title" value="{{ $post->title }}" required>
    <label>محتوا</label>
    <textarea name="content" required>{{ $post->content }}</textarea>
    <button type="submit">ویرایش</button>
</form>
