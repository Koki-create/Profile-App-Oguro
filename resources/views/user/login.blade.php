<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <title>login</title>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>My Portfolio</h1>
        </div>
    </header>
    <main>
        <section class="signup-section">
            <h2>ログイン</h2>
            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password">
                </div>
                @if ($errors->any())
                     <p style="color: red;">メールアドレス、もしくはパスワードが間違っています</p>
                @endif                
                <button type="submit" class="submit-button">ログインする</button>
                <button type="submit" class="submit-button">新規登録する</button>
            </form>
        </section>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
</body>
</html>