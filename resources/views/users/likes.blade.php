@extends('app')

@section('title', $user->name . 'のいいねしたスポット')

@section('content')
@include('nav')
    <div class="container" style="margin-top:100px;">
        @include('users.user')
        @include('users.tabs', ['hasSpots' => false, 'hasLikes' => true])
        @foreach($spots as $spot)
        @include('spots.card')
        @endforeach
    </div>
@endsection
