@extends('layouts.app')

@section('content')
@include('header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>新規登録完了</h1>
                </div>
                <div class ="data">
                    ようこそ<br>
                    登録完了お疲れ様です。
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection
