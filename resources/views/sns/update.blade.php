<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
<h1>つぶやきを編集する</h1>
<div>
    <a href="/">< 戻る</a>
    <p>投稿フォーム</p>
    <form action="/update/{{$tweetId}}" method="post">
        @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        @csrf
        <label for="tweet-content">つぶやき</label>
        <span>140文字まで</span>
        <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力">{{ $tweet->content }}</textarea>
        @error('tweet')
        <p style="color: red;">編集内容が入力されていません</p>
        @enderror
        <button type="submit">編集</button>
    </form>
</div>
</body>
</html>