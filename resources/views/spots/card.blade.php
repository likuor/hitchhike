<br>
<div class="card">
    <div class="card-body d-flex flex-row">
        <a href="{{ route('spots.show', ['spot' => $spot]) }}">
            <img src="{{ Storage::url($spot->image_file_name) }}" width="250px">
        </a>
    </div>


    <div class="card-body d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $spot->user->name]) }}" class="text-dark">
            <img src="{{ Storage::url($spot->user->image_profile) }}" width="50px" alt="">
        </a>
        <div>
            <div class="font-weight-bold">
                <a href="{{ route('users.show', ['name' => $spot->user->name]) }}" class="text-dark">
                    {{ $spot->user->name }}
                </a>
            </div>
            <div class="font-weight-lighter">
                {{ $spot->created_at->format('Y/m/d H:i') }}
            </div>
        </div>


        @if( Auth::id() === $spot->user_id )
            <!-- dropdown -->
            <div class="ml-auto card-text">
                <div class="dropdown">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button type="button" class="btn btn-link text-muted m-0 p-2">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('spots.edit', ['spot' => $spot]) }}">
                            <i class="fas fa-pen mr-1"></i>記事を更新する
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $spot->id }}">
                            <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                        </a>
                    </div>
                </div>
            </div>
            <!-- dropdown -->

            <!-- modal -->
            <div id="modal-delete-{{ $spot->id }}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('spots.destroy', ['spot' => $spot]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                {{ $spot->title }}を削除します。よろしいですか？
                            </div>
                            <div class="modal-footer justify-content-between">
                                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                <button type="submit" class="btn btn-danger">削除する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal -->
            @else
            <div class="card-body d-flex flex-row">
                <a class="btn btn-primary ml-auto" href="{{ route('comments.create' , ['spot' => $spot]) }}">
                    コメント
                </a>
            </div>
        @endif
    </div>

    <div class="card-body">
        <h5 class="card-title">{{ $spot->title }}</h5>
        <p class="card-text">
        {!! nl2br(e( $spot->body )) !!}
        </p>
    </div>

    <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
        <spot-like
            :initial-is-liked-by='@json($spot->isLikedBy(Auth::user()))'
            :initial-count-likes='@json($spot->count_likes)'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('spots.like', ['spot' => $spot]) }}"
        >
        </spot-like>
        </div>
    </div>
</div>
