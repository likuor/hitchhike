@csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ $spot->title ?? old('title') }}">
</div>
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="8" placeholder="詳細や検索ワードを入力">{{ $spot->body ?? old('body') }}</textarea>
</div>

<div class="form-group">
    <label>緯度経度（地図をクリックすると詳細な場所を指定できます）</label>
    <p>現在地：<span id="address"></span></p>
    <div id="map" style="width:100%;height:400px;"></div>
    <br>
    <div class="row">
        <div class="col-6">
            <input id="lat" type="text" name="latitude" class="form-control" value="{{ $spot->latitude ?? old('latitude') }}" placeholder="緯度" readonly>
        </div>
        <div class="col-6">
            <input id="lng" type="text" name="longitude" class="form-control" value="{{ $spot->longitude ?? old('longitude') }}" placeholder="経度" readonly>
        </div>
    </div>
    <script src="{{ asset('/js/formmap.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_api') }}&callback=initMap" async defer></script>
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
    <label>市区町村</label>
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
