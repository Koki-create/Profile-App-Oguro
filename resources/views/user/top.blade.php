<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <title>top</title>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>My Portfolio</h1>
        </div>
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <button type="submit" class="button_white">ログアウト</button>
        </form>
    </header>
    <main>
    <div class="profile">
        <div class="profile-image">
            @if (\Illuminate\Support\Facades\Auth::user()->image)
            <img src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->image) }}" alt="プロフィール画像">
            @else
                <img src="/images/initial-image.png" alt="プロフィール画像">
            @endif
            <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
        </div>
        <div class="profile-info">
        <h2>自己紹介</h2>
        <p>{{\Illuminate\Support\Facades\Auth::user()->introduction}}</p>
        <form action="{{ route('user.showEdit') }}" method="get">
            @csrf
            <button type="submit" class="submit-button profile-edit-button">自己紹介を編集する</button>
        </form>
        </div>
    </div>
    <div class="chart">
        <h2>学習チャート</h2>       
        <button type="submit" class="submit-button">編集する</button>
    </div>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
</body>
</html>