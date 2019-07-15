@if (count($ramens) > 0)
    <ul class="list-unstyled">
        @foreach ($ramens as $ramen)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($ramen->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $ramen->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route('ramens.show', '詳細', ['id' => $ramen->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $ramens->render('pagination::bootstrap-4') }}
@endif