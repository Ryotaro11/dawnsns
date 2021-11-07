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
      <td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>
      <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
