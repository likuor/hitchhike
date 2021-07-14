@extends('app')

@section('title', 'コメント')

@include('nav')

@section('content')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">
                        @include('error_card_list')
                        <div class="card-text">
                            <form method="POST" action="{{ route('comments.store' , ['spot_id' => $spot->id]) }}" enctype="multipart/form-data">
                                @include('comments.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
