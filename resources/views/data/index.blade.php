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
                @php
                    $startMonth = $currentMonth - 2;
                    $endMonth = $currentMonth;
                @endphp

                @for ($i = $startMonth; $i <= $endMonth; $i++)
                    @php
                        // 年をまたぐ場合、月の値を調整
                        $monthValue = $i;
                        if ($monthValue < 1) {
                            $monthValue += 12;
                        }
                    @endphp
                    <option value="{{ $monthValue }}" {{ $monthValue == $currentMonth ? 'selected' : '' }}>
                        {{ $monthValue }}月
                    </option>
                @endfor
            </select>
        </section>
        <section class="category-section">
            <h2 class="section-title">バックエンド</h2>
            <div class="add-item-button-container">
            <form action="{{ route('data.showAdd') }}" method="get">
                @csrf
                <input type="hidden" name="category" value="バックエンド">
                <button type="submit" class="add-item-button">項目を追加する</button>
            </form>

            </div>
            <div class="data-item">
                <label for="ruby">Ruby</label>
                <input type="number" id="ruby" name="ruby" min="0">
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