@extends('app')

@section('title', $user->name . 'のいいねしたスポット')

@section('content')
@include('nav')
    <div class="container">
        @include('users.user')
        @include('users.tabs', ['hasSpots' => false, 'hasLikes' => true])
        @foreach($spots as $spot)
        @include('spots.card')
        @endforeach
    </div>
@endsection
