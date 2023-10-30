@extends('layouts.app')
@include('header')
@section('content')
<div>
        <h1>パスワードリセットが完了しました</h1>

        <a href="{{ route('login') }}">TOPへ</a>
    </div>
@include('footer')
@endsection