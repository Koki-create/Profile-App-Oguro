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
            <img src="path-to-image.png" alt="プロフィール画像">
        </div>
        <div class="profile-info">
        <h2>自己紹介</h2>
        <p>自分の趣味について情報をシェアする、自分の趣味に関連した人々と繋がる、自分の趣味に関連する人々を見つける、自分の趣味に関連する人々が見つける。</p>
        <button type="submit" class="submit-button">自己紹介を編集する</button>
        </div>
    </div>
    <div class="chart">
        <h2>学習チャート</h2>       
        <button type="submit" class="submit-button">編集する</button>
    </div>
    {{\Illuminate\Support\Facades\Auth::user()->name}}でログインしています。
    </main>
</body>
    <footer>
        <p>portfolio site</p>
    </footer>
</body>
</html>