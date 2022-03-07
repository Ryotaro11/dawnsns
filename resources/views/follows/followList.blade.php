@extends('layouts.login')

@section('content')
<br><br><br><br><br><br><br><br><br>
<div class="followlist">
  <div class="aaa">
    <p>Followlist</p>
  </div>
  <div class="bbb">
    @foreach($icon as $icon)
    <a href="/yourprofile/{{ $icon->id }}">
      <img class="follow_icon" src="{{asset('images/'. $icon->images)}}">
    </a>
    @endforeach
  </div>
</div>
<div class="line"></div>

@foreach ($list as $list)
<table class="table table-hover">
  <div class="ccc">
    <tr class="tr">
      <td><a href="/yourprofile/{{ $list->id }}"><img class="icon" src="{{'images/'. $list->images}}"></a></td>
      <td class="username">{{ $list->username }}さん</td>
      <td class="post">{{ $list->posts }}</td>
      <td class="created_at">{{ $list->created_at }}</td>
    </tr>
  </div>
</table>

@endforeach

@endsection