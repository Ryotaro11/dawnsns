@extends('layouts.login')
@section('content')

<br><br><br><br><br><br><br><br><br>

<div id="search_form">
  <form action="/search" method="post" target="searchword" id="form">
    {{ csrf_field() }}
    <input type="search" name="search" placeholder="ユーザー" size="50" value="@if (isset($search)) {{ $search }} @endif" class="search">

    <input type="image" src="images/magnifying_glass.png" width="30" height="30" alt="検索" class="searchbtn" onclick="displayFormData()">
  </form>
  @if (isset($keyword))
  <br>
  検索ワード:{{ $keyword }}
  @endif
</div>
<br>
<br>
@foreach($userlist as $userlist)
<div class="list">
  <img class="icon" src="{{'images/'.$userlist->images}}">
  <a2>
    <div class="center1">
      {{$userlist->username}}
    </div>
  </a2>

  <a class="center2">
    <!-- 1.コントローラーでwhereで情報を絞ってゲットする
      2.if文でfolllowsテーブルのin_array() -->

    <!-- followsテーブルのfollowerカラムに自分のidがあったときはフォローをはずす、ないときはフォローする -->
    @if(in_array($userlist->id,array_column( $following,'follow')))
    <button type="submit" class="unfollow">
      <a href="{{$userlist->id}}/unfollow">フォローをはずす
      </a>
    </button>
    @else
    <button type="submit" class="follow">
      <a href="{{$userlist->id}}/follow">フォローする</a>
    </button>
    @endif
  </a>
</div>

@endforeach

@endsection