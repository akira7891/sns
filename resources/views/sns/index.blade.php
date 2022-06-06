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

        @auth
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
        @endauth

        <h2>投稿一覧</h2>
            <div>
            @if(session('feedback.success'))
            <p style="color: green">{{session('feedback.success')}}</p>
            @endif
            @foreach($tweets as $tweet)
                <details>
                <summary>ユーザーid{{ $tweet->user_id }}　ユーザー名{{ $tweet->user->name }}　{{ $tweet->id }}回目の投稿　{{ $tweet->content }}　作成日時{{ $tweet->created_at }}　更新日時{{ $tweet->updated_at }}　<a href="{{route('update.index',['tweetId'=>$tweet->id])}}">編集</a>　<a href="{{route('delete',['tweetId'=>$tweet->id])}}">削除</a></summary>
                </details>
            @endforeach
            </div>

</body>
</html>
