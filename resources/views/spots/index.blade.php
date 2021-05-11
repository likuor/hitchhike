@extends('app')

@section('title', '場所一覧')

@section('content')
@include('nav')

    <div class="container">
        @foreach($spots as $spot)
            @include('spots.card')
        @endforeach
        {{ $spots->links() }}
    </div>

@endsection
