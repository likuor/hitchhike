<div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <a href="{{ route('spots.show', ['spot' => $spot]) }}">
                    <img
                    src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                    class="img-fluid"
                    />
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </a>
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
                            <a class="dropdown-item" href="{{ route("spots.edit", ['spot' => $spot]) }}">
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
                @endif
            </div>

            <div class="card-body">
                <h5 class="card-title">{{ $spot->title }}</h5>
                <p class="card-text">
                {!! nl2br(e( $spot->body )) !!}
                </p>
            </div>

        </div>