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
            <select name="month" id="month-select" class="month-pulldown">
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
            <div class="category-header">
                <h3>バックエンド</h3>
                <form action="{{ route('data.showAdd') }}" method="get">
                    <input type="hidden" name="category" value="バックエンド">
                    <input type="hidden" name="month" class="month-hidden" value="">
                    <button type="submit" class="submit-button">項目を追加する</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>項目名</th>
                        <th>学習時間</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ruby</td>
                        <td><input type="number" id="ruby" name="ruby" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                    <tr>
                        <td>Rails</td>
                        <td><input type="number" id="rails" name="rails" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                    <tr>
                        <td>MySQL</td>
                        <td><input type="number" id="mysql" name="mysql" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="category-section">
            <div class="category-header">
                <h3>フロントエンド</h3>
                <form action="{{ route('data.showAdd') }}" method="get">
                    <input type="hidden" name="category" value="フロントエンド">
                    <input type="hidden" name="month" class="month-hidden" value="">
                    <button type="submit" class="submit-button">項目を追加する</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>項目名</th>
                        <th>学習時間</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>HTML</td>
                        <td><input type="number" id="html" name="html" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                    <tr>
                        <td>CSS</td>
                        <td><input type="number" id="css" name="css" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="category-section">
            <div class="category-header">
                <h3>インフラ</h3>
                <form action="{{ route('data.showAdd') }}" method="get">
                    <input type="hidden" name="category" value="インフラ">
                    <input type="hidden" name="month" class="month-hidden" value="">
                    <button type="submit" class="submit-button">項目を追加する</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>項目名</th>
                        <th>学習時間</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Heroku</td>
                        <td><input type="number" id="heroku" name="heroku" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                    <tr>
                        <td>AWS</td>
                        <td><input type="number" id="aws" name="aws" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                    <tr>
                        <td>Firebase</td>
                        <td><input type="number" id="firebase" name="firebase" min="0"></td>
                        <td><button type="submit" class="save-button">学習時間を保存する</button></td>
                        <td><button type="submit" class="delete-button">削除する</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const monthSelect = document.getElementById('month-select');
            monthSelect.addEventListener('change', function() {
                const monthValue = monthSelect.value;
                // querySelectorAllを使用して、クラス名が'month-hidden'のすべてのinput要素を取得し、valueを更新
                document.querySelectorAll('.month-hidden').forEach(function(input) {
                    input.value = monthValue;
                });
            });
            // ページロード時に現在選択されている月の値を設定
            document.querySelector('.month-hidden').value = monthSelect.value;
        });
    </script>
</body>
</html>