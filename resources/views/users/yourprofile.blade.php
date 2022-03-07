@extends('layouts.login')
@section('content')
<br><br><br><br><br><br><br><br><br>

<div class="">
  {{ csrf_field() }}

  <div class="">
    <div class="">
      <div class="">
        <div class="card-header"> <img class="icon1" src="{{asset('images/'. $yourname->images)}}">
        </div>
        <!--ユーザーごとの画像を掲載させたい  -->
        <div class="card-body">
          <br>
          <p>UserName<input class="tt" name="username" type="text" value="{{$yourname->username}}"></P>
          <br>
          <br>Bio
          <div class="aa">
            <input class="ww" name="bionary" type="text" value="{{$yourname->bio}}">
          </div>
          <br>
          @if(in_array($yourname->id,array_column( $follow_btn,'follow')))
          <button type="submit" class="unfollow_1">
            <a href="{{$yourname->id}}/unfollow">フォローをはずす
            </a>
          </button>
          @else
          <button type="submit" class="follow_1">
            <a href="{{$yourname->id}}/follow">フォローする</a>
          </button>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="line"></div>
  <br>
  @foreach ($yourpost as $yourpost)
  <table class="table table-hover">
    <div class="ccc">
      <tr class="tr">
        <td><img class="icon" src="{{asset('images/'. $yourpost->images)}}"></td>
        <td class="username">{{ $yourpost->username }}さん</td>
        <td class="post">{{ $yourpost->posts }}</td>
        <td class="created_at">{{ $yourpost->created_at }}</td>
      </tr>
    </div>
  </table>


  @endforeach

  @endsection