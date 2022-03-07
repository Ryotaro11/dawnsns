@extends('layouts.logout')

@section('content')
<br>
<br>
{!! Form::open() !!}
<br>
<br>
<h2 style="color:#ffffff">新規ユーザー登録</h2>
<br>
<br>
{{ Form::label('ユーザー名') }}
<br>
@if($errors->has('username'))
{{$errors->first('username')}}
@endif
{{ Form::text('username',null,['class' => 'input']) }}

<!-- <input class="input" name="username" type="text"> -->
<br>
<br>
{{ Form::label('メールアドレス') }}
<br>
@if($errors->has('mail'))
{{$errors->first('mail')}}
@endif
{{ Form::text('mail',null,['class' => 'input']) }}
<br>
<br>
{{ Form::label('パスワード') }}
<br>
@if($errors->has('password'))
{{$errors->first('password')}}
@endif
{{ Form::password('password',['class' => 'input']) }}

<br>
<br>
{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
<br>
<br>
{{ Form::submit('Register',['class' => 'logininput']) }}
<br>
<br>
<p><a href="/login">ログイン画面へ戻る</a></p>
<br>
<br>
{!! Form::close() !!}


@endsection