@extends('layouts.app')

@section('content')
    <div class="row">
        <!--<aside class="col-sm-4">
            <div class="card">
                <div class="card-header">-->
                    <h3 class="col-md-12">{{ $ramen->name }}</h3>
                <!--</div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($ramen->name, 500) }}" alt="">
                </div>
            </div>
        </aside>-->
            
            @if (count($postsr) > 0)
                @include('posts.photo', ['postsr' => $postsr])
            @endif        
            
            <p class="col-md-12"></p>
        
        
        <h3 class="card-title col-md-2">口コミ</h3>
        <div class="offset-md-6 col-md-4">
            
            @if ($auth_user_post_count == 0)
            {!! link_to_route('posts.buzz', '投稿する', ['id' => $ramen->id], ['class' => 'btn btn-success']) !!}
            @endif
            
        </div>
        
        
            @if (count($postsr) > 0)
                @include('posts.postsr', ['postsr' => $postsr])
            @endif
        
        <h3 class="col-md-12">店舗情報</h3>
        <table class="table table-striped table-bordered">
    <tr>
        <th class="text-center">店舗名</th>
        <th class="text-center">{{ $ramen->name }}</th>
    </tr>
    <tr>
        <td>場所</td>
        <td class="text-center">{{ $ramen->city }}</td>
    </tr>
</table>
        
    </div>
@endsection