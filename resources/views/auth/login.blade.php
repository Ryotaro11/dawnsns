@extends('layouts.logout')

@section('content')
<br>
<br>
{!! Form::open() !!}
<br>
<br>
<p class="welcome">DAWNSNSへようこそ</p>
<br>
<br>

{{ Form::label('e-mail') }}
<br>
{{ Form::text('mail',null,['class' => 'input']) }}
<!-- <input class="input" name="mail" type="text"> -->
<br>
<br>
{{ Form::label('password') }}
<br>
{{ Form::password('password',['class' => 'input']) }}
<br>
<br>
{{ Form::submit('LOGIN',['class' => 'logininput'])  }}
<!-- <input type="submit" value="LOGIN"> -->
<br>
<br>
<p><a class="n" style="color:#ffffff"  href="/register" >新規ユーザーの方はこちら</a></p>
<br>
<br>
{!! Form::close() !!}

@endsection