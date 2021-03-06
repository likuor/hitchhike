@extends('app')

@section('title', 'スポット更新')

@include('nav')

@section('content')
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">
                        @include('error_card_list')
                        <div class="card-text">
                            <form method="POST" action="{{ route('spots.update', ['spot' => $spot->id]) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @include('spots.form')
                                <button type="submit" class="btn btn-primary btn-block">更新する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
