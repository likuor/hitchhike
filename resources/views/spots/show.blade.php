@extends('app')

@section('title', '記事詳細')

@section('content')
    @include('nav')
    <div class="container" style="margin-top:100px;">
        @include('spots.card')
        <br>

        <div class="card">
            <div class="card-body">
                <div id="map" style="height:400px">
                        <script>
                            const lat = '{{$lat}}';
                            const lng = '{{$lng}}';
                        </script>
                        <script src="{{ asset('/js/each_spot_map.js') }}"></script>
                        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_api') }}&callback=initMap" async defer></script>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title m-0">
                    コメント {{ $count_comments }}
                </h4>
            </div>
            @foreach($comments as $comment)
                @include('comments.show')
            @endforeach
        </div>

    </div>
@endsection
