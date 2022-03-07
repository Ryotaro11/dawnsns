@extends('layouts.login')

@section('content')
<br><br><br><br><br><br><br><br><br>

<div id="row">
  <!-- ●ログインユーザーの画像 -->
  <h2><img class="icon" src="{{'images/'.$userimage}}"></h2>
  <form action="/create" method="post">
    {{ csrf_field() }}

    <input class="newPost" type="text" name="newPost" placeholder="何をつぶやこうか…？" maxlength="25">
    <input class="tubuyaki" type="image" src="images/post.png">
  </form>

</div>
<div class="line"></div>
<br>
<br>
<div>
  <table class="table table-hover">
    <tr>
      <th></th>
      <!-- <th>投稿者</th>
      <th>投稿内容</th>
      <th>投稿日時</th> -->
      <th></th>
      <th></th>
    </tr>
    @foreach ($list as $list)
    <tr class="tr">
      <span></span>
      <!-- ●投稿者の画像 -->
      <td><img class="icon" src="{{'images/'. $list->images}}"></td>
      <td class="username">{{ $list->username }}さん</td>
      <td class="post">{{ $list->posts }}</td>
      <td class="created_at">{{ $list->created_at }}</td>
      <!-- if($投稿の変数->user_id,Auth::id()->id) -->
      @if($list->user_id == Auth::id())
      <td><a class="btn1 btn-primary modalopen" href="" data-target="modal{{$list->id}}"><input type="image" src="images/edit.png" class="btn1"></a></td>
      <td>
        <a class="btn12" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          <div class="img_container">
            <img src="images/trash.png" class="" alt="">
            <img src="images/trash_h.png" class="active" alt="">
          </div>
        </a>
      </td>
      @endif

    </tr>

    <!-- 編集画面 -->
    <div class="modal-main js-modal" id="modal{{$list->id}}">
      <div class="inner">
        <div class="inner-content">
          {{ Form::open(['url' => '/post/update']) }}
          <div class="form-group">
            <br>
            {{ Form::hidden('id', $list->id) }}
            {{Form::input('text', 'upPost', $list->posts, ['required', 'class' => 'form-control' ,'maxlength' => '200'],) }}
          </div>
          <!-- Form::input(引数type="", name="", value="",  -->
          <div class="update_remark"></div>
          <br>
          <p3>※文字の入力は200字まで</p3>
          <button type="submit" class="btn2 btn-primary pull-right">
            <input type="image" src="images/edit.png">
          </button>
        </div>
        {{ Form::close() }}
      </div>
    </div>
</div>
@endforeach
</table>
</div>
@endsection