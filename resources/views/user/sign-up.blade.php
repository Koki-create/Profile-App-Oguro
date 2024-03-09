<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <title>sign up</title>
</head>
<body>
    <header>
        <div class="header-content">
            <h1>My Portfolio</h1>
        </div>
        <form action="{{ route('user.showLogin') }}" method="get">
            <button type="submit" class="button_white">ログイン</button>
        </form>
    </header>
    <main>
        <section class="signup-section">
            <h2>新規登録</h2>
            <form action="{{ route('user.create') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password">
                    @error('password')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="submit-button">登録する</button>
            </form>
        </section>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
</body>
</html>