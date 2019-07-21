<ul class="list-unstyled">
    @foreach ($postsr as $post)
        <li class="media mb-3">
            <!--<img class="mr-2 rounded" src="{{ Gravatar::src($post->user->email, 50) }}" alt="">-->
            <div class="media-body">
                <div>
                    <img class="mr-2 rounded" src="{{ Gravatar::src($post->user->email, 50) }}" alt="">
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user_id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">評価：{!! nl2br(e($post->fivestar)) !!}</p>
                    <p class="mb-0">レビュー：{!! nl2br(e($post->review)) !!}</p>

                </div>
                <div class="row">
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}

                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $postsr->render('pagination::bootstrap-4') }}