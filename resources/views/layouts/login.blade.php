<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!--サイトのアイコン指定-->
  <link rel="icon" href="images/main_logo.png" sizes="16x16" type="image/png" />
  <link rel="icon" href="images/main_logo.png" sizes="32x32" type="image/png" />
  <link rel="icon" href="images/main_logo.png" sizes="48x48" type="image/png" />
  <link rel="icon" href="images/main_logo.png" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
  <header>
    <a href="/top">
      <!-- <img src="images/main_logo.png"> -->
      <img src="{{asset('images/main_logo.png')}}">
    </a>
    <div class="nav-wrapper">
      <div>
        <a style="color: #ffffff">{{$user}}さん</a>
        <span class="menu-trigger"></span>
      </div>
      <nav class="gnavi">
        <ul>
          <li class=""><a href="/top">ホーム</a></li>
          <li class=""><a href="/profile">プロフィール</a></li>
          <li class=""><a href="/logout">ログアウト</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div id="row">
    <div id="container">
      @yield('content')
    </div>
    <div id="side-bar">
      <br>
      <div id="confirm">
        <p1>{{$user}}さんの</p>
          <br>
          <div>
            <p2>フォロー数 {{$countFollow}} 名</p2>
          </div>
          <p class="btn5"><a href="/follow-list">フォローリスト</a></p>
          <br>
          <br>
          <div>
            <p2>フォロワー数 {{$countFollower}} 名</p2>
          </div>
          <p class="btn5"><a href="/follower-list">フォロワーリスト</a></p>
      </div>
      <br>
      <p2>ユーザー検索</p2>
      <p class="btn5"><a href="/search">ユーザー検索</a></p>
    </div>
  </div>
  <footer>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>