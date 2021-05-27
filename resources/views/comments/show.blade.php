@if( $comment->spot_id === $spot->id )
    <div class="card">
        <div class="card-body d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
                <img src="{{ Storage::url($comment->user->image_profile) }}" width="50px" alt="">
            </a>
            <div>
                <div class="font-weight-bold">
                    <a href="{{ route('users.show', ['name' => $spot->user->name]) }}" class="text-dark">
                        {{ $comment->user->name }}
                    </a>
                </div>
                <div class="font-weight-lighter">
                    {{ $comment->created_at->format('Y/m/d H:i') }}
                </div>
                <div class="font-weight-bold">
                    {{ $comment->title }}
                </div>
                    {{ $comment->body }}
            </div>

            @if( Auth::id() === $comment->user_id )
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
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $comment->id }}">
                            <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                        </a>
                    </div>
                </div>
            </div>
            <!-- dropdown -->

            <!-- modal -->
            <div id="modal-delete-{{ $comment->id }}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                {{ $comment->title }}を削除します。よろしいですか？
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
            @endif
        </div>
    </div>
@endif
