@csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ $comment->title ?? old('title') }}">
</div>
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="8" placeholder="本文">{{ $comment->body ?? old('body') }}</textarea>
</div>
<div class="form-group">
    <label class="form-label" for="customFile">画像</label>
    <input type="file" class="form-control" id="customFile" name="image" onchange="previewImage(this)" />
</div>
<img id="preview" width="250px">
<script src="{{ asset('/js/image_preview.js') }}"></script>

<button type="submit" class="btn btn-primary btn-block">投稿する</button>
