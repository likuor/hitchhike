@extends('app')

@section('title', 'スポット投稿')

@include('nav')

@section('content')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">
                        @include('error_card_list')
                        <div class="card-text">
                            <form method="POST" action="{{ route('spots.store') }}" enctype="multipart/form-data">
                                @include('spots.form')
                                <button type="submit" class="btn btn-primary btn-block">投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
