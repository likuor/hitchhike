@extends('app')


@section('title', $user->name)

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">
                        @include('error_card_list')
                        <div class="card-text">
                            <form method="POST" action="{{ route('users.update', $user->name) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="customFile">プロフィール画像</label>
                                    <input type="file" class="form-control" id="customFile" name="image_profile" onchange="previewImage(this)"/>
                                </div>
                                <div>
                                    <img src="{{ Storage::url($user->image_profile) }}" id="preview" width="250px"/>
                                    <script src="{{ asset('/js/sample.js') }}"></script>
                                </div>

                                <div class="md-form">
                                    <label>名前</label>
                                    <input type="text" name="name" class="form-control" required readonly value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <textarea name="introduction" class="form-control" rows="8" placeholder="自己紹介">{{ $user->introduction ?? old('introduction') }}</textarea>
                                </div>
                                <div class="md-form">
                                    <label>Eメール</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email ?? old('email') }}">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">更新する</button>
                            </form>
                            <script src="{{ asset('/js/image_preview.js') }}"></script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
