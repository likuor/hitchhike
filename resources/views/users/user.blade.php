<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                <img width="50px" src="{{ Storage::url($user->image_profile) }}" alt="">
            </a>
            @if( Auth::id() !== $user->id )
                <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                >
                </follow-button>
            @else
                <a class="ml-auto" href="{{ route('users.edit', ['name' => $user->name]) }}">
                    <button class="btn btn-primary btn-sm">プロフィールを編集</button>
                </a>
            @endif
        </div>
        <div class="card-text font-weight-bold">
            <h4>
                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                    {{ $user->name }}
                </a>
            </h4>
        </div>
    </div>
    <div class="card-body">
        <div class="card-text">
            <h5 class="card-title m-0">
                {{ $user->introduction }}
            </h5>
        </div>
    </div>
    <div class="card-body">
        <div class="card-text">
            <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted">
                {{ $user->count_followings }} フォロー
            </a>
            <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
                {{ $user->count_followers }} フォロワー
            </a>
        </div>
    </div>
</div>
