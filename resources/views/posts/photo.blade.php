<ul class="row" style="list-style: none;">
    @foreach ($postsr as $post)

            <li class="col-2" style="max-width:100%"><img src="/storage/{!! e($post->image_url) !!}"  width="200" height="200"></li>

    @endforeach
</ul>
{{ $postsr->render('pagination::bootstrap-4') }}