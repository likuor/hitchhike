@csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ $spot->title ?? old('title') }}">
</div>
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="8" placeholder="本文">{{ $spot->body ?? old('body') }}</textarea>
</div>
<div class="form-group">
    <label>都道府県</label>
    <select name="prefecture" class="form-control">
        @foreach($prefectures as $key => $value)
            <option value="{{ $key }}" {{ ($spot->prefecture == $key ? 'selected='.$key : null) }}>{{$value}}</option>
        @endforeach
    </select>
</div>
<!-- 都道府県を入力したら動的に変更する -->
<div class="md-form">
    <label>区市町村</label>
    <input type="text" name="city" class="form-control" value="{{ $spot->city ?? old('city') }}">
</div>
<div class="md-form">
    <label>番地</label>
    <input type="text" name="street" class="form-control" value="{{ $spot->street ?? old('street') }}">
</div>
<!--  -->
<div class="form-group">
    <label class="form-label" for="customFile">画像</label>
    <input type="file" class="form-control" id="customFile" name="image_file_name[][photo]" onchange="previewImage(this)" multiple/>
</div>
@foreach($spot->getSpotImages as $image)
    <img src="{{ Storage::url($image->path) }}" width="250px" id="preview" alt="">
@endforeach

<script src="{{ asset('/js/image_preview.js') }}"></script>
