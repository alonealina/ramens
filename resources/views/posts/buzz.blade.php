@extends('layouts.app')

@section('content')


    <h1>ラーメンレビュー作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($post, ['route' => 'posts.store']) !!}
                <div class="form-group">
                    {!! Form::label('fivestar', '評価:') !!}
                    {!! Form::selectRange('fivestar', 1,5,1, ['class' => 'form-control']) !!}
                    {!! Form::label('review', 'メッセージ:') !!}
                    {!! Form::text('review', null, ['class' => 'form-control']) !!}
                    {!! Form::label('image_url', '画像:') !!}
                    {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
                    {!! Form::hidden('ramen_id',$ramen_id) !!}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection