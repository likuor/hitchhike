@extends('app')

@section('title', $user->name . 'のフォロワー')

@section('content')
    @include('nav')
    <div class="container" style="margin-top:100px;">
        @include('users.user')
        @include('users.tabs', ['hasSpots' => false, 'hasLikes' => false])
        @foreach($followers as $person)
        @include('users.person')
        @endforeach
    </div>
@endsection
