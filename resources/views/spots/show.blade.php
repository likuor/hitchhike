@extends('app')

@section('title', '記事詳細')

@section('content')
    @include('nav')
    <div class="container">
        @include('spots.card')
        <br>

        <div class="card">
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
