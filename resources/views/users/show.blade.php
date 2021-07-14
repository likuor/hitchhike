@extends('app')

@section('title', $user->name)

@section('content')
    @include('nav')
    <div class="container" style="margin-top:100px;">
        @include('users.user')
        @include('users.tabs', ['hasSpots' => true, 'hasLikes' => false])
        @foreach($spots as $spot)
        @include('spots.card')
        @endforeach
    </div>
@endsection
