@extends('app')

@section('title', '場所一覧')

@section('content')
@include('nav')

    <div class="container">
        @foreach($spots as $spot)
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img
                src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                class="img-fluid"
                />
                <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </a>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ $spot->title }}</h5>
                <p class="card-text">
                {!! nl2br(e( $spot->body )) !!}
                </p>
            </div>

            <div class="card-body d-flex flex-row">
                <i class="fas fa-user-circle fa-3x mr-1"></i>
                <div>
                    <div class="font-weight-bold">
                        {{ $spot->user->name }}
                    </div>
                    <div class="font-weight-lighter">
                        {{ $spot->created_at->format('Y/m/d H:i') }}
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
@endsection
