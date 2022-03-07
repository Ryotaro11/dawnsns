@extends('layouts.login')
@section('content')
<br><br><br><br><br><br><br><br><br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> <img class="icon1" src="images/{{$userlist->images}}">
        </div>
        <!--ユーザーごとの画像を掲載させたい  -->
        <div class="card-body">
          <form action="/profile" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <br>

            <p>UserName<input class="tt" name="username" type="text" value="{{$userlist->username}}"></P>
            <br>
            <p>MailAddress<input class="ss" name="mail" type="text" value="{{$userlist->mail}}"></p>
            <br>
            <p>Password<input class="uu" name="password" type="password" style="-webkit-text-security:disc;" value="{{$userlist->password}}"></p>
            <br>
            <p>new Password<input class="vv" name="newpassword" type="password"></p>
            <br>
            <br>Bio
            <div class="aa">

              <input class="ww" name="bionary" type="text" value="{{$userlist->bio}}">
              <!-- <textarea class="ww" name="bio" cols="40" rows="10" placeholder="自己紹介" value="{{$userlist->bio}}"></textarea> -->
            </div>
            <br> <br>

            <p>Icon Image<input class=" zz" name="newimage" type="file" placeholder="{{$user}}"></p>
            <br>

            <input class="btn3" type="submit" name="" src="" value="更新">
          </form>
          <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection