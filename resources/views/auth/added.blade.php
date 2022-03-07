@extends('layouts.logout')

@section('content')

<br>
<br>
{!! Form::open() !!}

<body>
  <div class="form">
    <br>
    <br>
    <p class="name">{{$username->username}} さん</p1>
    <br>
    <br>

    <p>ようこそ！DAWNSNSへ！</p>
    <br>
    <br>
    <p>ユーザー登録が完了しました。</p>
    <br>
    <br>
    <p>さっそく、ログインをしてみましょう。</p>
    <br>
    <br>
    <p class="login" style="color:#ffffff"><a href="/login">ログイン画面へ</a></p>
    <br>
    <br>
  </div>
</body>
{!! Form::close() !!}

@endsection