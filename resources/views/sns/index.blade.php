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
    <h1>つぶやきアプリ</h1>
    <h2>投稿フォーム</h2>
        <form action="/create" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
            @error('tweet')
            <p style="color: red;">内容が入力されていません</p>
            @enderror
            <button type="submit">投稿</button>
        </form>
    <h2>投稿一覧</h2>
        <div>
        @foreach($tweets as $tweet)
            <details>
            <summary>{{ $tweet->id }}　{{ $tweet->content }}　{{ $tweet->created_at }}　{{ $tweet->updated_at }}　<a href="{{route('update.index',['tweetId'=>$tweet->id])}}">編集</a></summary>
            </details>
        @endforeach
        </div>
</body>
</html>
