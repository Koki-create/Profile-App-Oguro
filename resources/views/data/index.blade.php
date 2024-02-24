<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <title>profile-edit</title>
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
        <section class="month-section">
            <select name="month" class="month-pulldown">
                <option value="2" selected>2月</option>
                <option value="1">1月</option>
                <option value="12">12月</option>
            </select>
        </section>
        <section class="category-section">
            <h2 class="section-title">バックエンド</h2>
            <div class="add-item-button-container">
            <!-- <form action="{{ route('data.add') }}" method="get"> -->
                @csrf
                <button type="button" class="add-item-button">項目を追加する</button>
            </form>

            </div>
            <div class="skills-item">
                <label for="ruby">Ruby</label>
                <select id="ruby" name="ruby">
                    <option value="40" selected>40</option>
                    <!-- 他の選択肢を追加 -->
                </select>
                <button type="submit" class="save-button">学習時間を保存する</button>
                <button type="submit" class="delete-button">削除する</button>
            </div>
        </section>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
</body>
</html>