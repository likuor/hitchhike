@if( $comment->spot_id === $spot->id )
    <div class=card>
        <div class="card-body d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
                <img src="{{ Storage::url($comment->user->image_profile) }}" width="50px" alt="">
            </a>
            <div>
                <div class="font-weight-bold">
                    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
                        {{ $comment->user->name }}
                    </a>
                </div>
                <div class="font-weight-lighter">
                    {{ $comment->created_at->format('Y/m/d H:i') }}
                </div>
                <div class="font-weight-bold">
                    {{ $comment->title }}
                </div>
                    @if($comment->image)
                        <a href="" class="text-dark">
                            <img src="{{ Storage::url($comment->image) }}" width="150px">
                        </a>

                    @endif
                    {{ $comment->body }}
            </div>

            @if( Auth::id() === $comment->user_id )
            <div class="ml-auto card-text">
                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $comment->id }}">
                    <i class="fas fa-trash-alt mr-1"></i>
                </a>
            </div>

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
                                ”{{ $comment->title }}”のコメントを削除します。よろしいですか？
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
