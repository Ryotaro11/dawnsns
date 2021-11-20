@extends('layouts.login')

@section('content')
<div id="row">
  <h2><img src="images/dawn.png"></h2>
  <form action="/create" method="post">
    {{ csrf_field() }}

    <input name="newPost" type="text" placeholder="何をつぶやこうか…？">
    <input type="image" src="images/post.png">
  </form>

</div>
<div>
  <table class="table table-hover">
    <tr>
      <th>投稿No</th>
      <th>投稿内容</th>
      <th>投稿日時</th>
      <th></th>
      <th></th>
    </tr>
    @foreach ($list as $list)
    <tr>
      <td>画像予定</td>
      <td>{{ $list->posts }}</td>
      <td>{{ $list->created_at }}</td>
      <td><a class="btn btn-primary modalopen" href="" data-target="modal{{$list->id}}"><input type="image" src="images/edit.png"></a></td>
      <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          <div class="img_container">
            <a href="#" class="rollover">
              <input type="image" src="images/trash.png" class="trash" alt="">
              <input type="image" src="images/trash_h.png" class="trash_h" alt="">
            </a>
          </div>
        </a></td>
    </tr>
    <div class="modal-main js-modal" id="modal{{$list->id}}">
      <div class="inner">
        <div class="inner-content">
          {{ Form::open(['url' => '/post/update']) }}
          <div class="form-group">
            {{ Form::hidden('id', $list->id) }}
            {{Form::input('text', 'upPost', $list->posts, ['required', 'class' => 'form-control'],) }}
          </div>
          <!-- Form::input(引数type="", name="", value="",  -->
          <div class="update_remark">
            <p>編集画面が表示されると、選択された投稿内容が初期から入っているように最大200文字までとする
            </p>
            <button type="submit" class="btn btn-primary pull-right">
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
