@if (count($ramens) > 0)
    <ul class="list-unstyled">
            <?php $k = 1;?>
        @foreach ($ramens as $ramen)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($ramen->id, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        <?php echo $k."位";?>
                        {{ $ramen->name }}　評価平均：{{ $ramen->avg }}
                    </div>
                    <div>
                        <p>{!! link_to_route('ramens.show', '詳細', ['id' => $ramen->id]) !!}</p>
                    </div>
                </div>
            </li>
            <?php $k++; ?>
        @endforeach
        
    </ul>
    {{ $ramens->render('pagination::bootstrap-4') }}
@endif