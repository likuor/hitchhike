<div class="card" style="margin-top:20px;">
    <div id="result" class="card-body">
        <p><button class="btn btn-primary btn-lg btn-block" onclick="getMyPlace()">現在位置を取得</button></p>
        <div id="address"></div>
        <div id="map" style="width:100%;height:400px;"></div>

        <script src="{{ asset('/js/current_location.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_api') }}&callback=initMap" async defer></script>
    </div>
</div>
