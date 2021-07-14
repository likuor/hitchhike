@extends('app')

@section('title', '場所一覧')

@section('content')
@include('nav')
<!-- Background image -->
<div
class="p-5 text-center bg-image"
style="
    background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.jpg');
    height: 400px;
    margin-top: 58px;
">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">Thumbup</h1>
                <h4 class="mb-3">ヒッチハイクスポットをシェアして、世界を駆け巡れ</h4>
                <a class="btn btn-outline-light btn-lg" href="#" role="button">詳細はこちら</a>
            </div>
        </div>
    </div>
</div>
<!-- Background image -->

<div class="container">
    @include('spots.map')

    @foreach($spots as $spot)
        @include('spots.card')
    @endforeach
    {{ $spots->links() }}
</div>

@endsection
