@extends('layouts.app')

@section('content')
    @include('ramens.ramens', ['ramens' => $ramens])
@endsection