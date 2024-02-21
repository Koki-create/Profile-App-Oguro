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
        <section class="signup-section">
            <h2>自己紹介を編集する</h2>
            <form action="{{ route('user.edit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="introduction">自己紹介文</label>
                    <textarea id="introduction" name="introduction">{{\Illuminate\Support\Facades\Auth::user()->introduction}}</textarea>
                    <p>50文字以上、200文字以下で入力してください</p>
                    @error('introduction')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">アバター画像</label>
                    <input type="file" id="image" name="image">
                </div>
                <button type="submit" class="submit-button">自己紹介を確定する</button>
            </form>
        </section>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
</body>
</html>