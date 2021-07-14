@extends('app')

@section('title', $user->name . 'のフォロー中')

@section('content')
    @include('nav')
    <div class="container" style="margin-top:100px;">
        @include('users.user')
        @include('users.tabs', ['hasSpots' => false, 'hasLikes' => false])
        @foreach($followings as $person)
        @include('users.person')
        @endforeach
    </div>
@endsection
