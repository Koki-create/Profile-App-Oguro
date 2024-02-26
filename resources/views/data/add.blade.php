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
        <section class="signup-section">
            <h2>{{ $category }}に項目を追加</h2>
            <form action="{{ route('data.create') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="data-item">項目名</label>
                    <input type="text" id="data-item" name="data-item"></input>
                    @error('data-item')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="time">学習時間</label>
                    <input type="text" id="time" name="time">
                    <p>分単位で入力してください。</p>
                </div>
                <button type="submit" class="submit-button">追加する</button>
                <input type="hidden" name="userId" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                <input type="hidden" name="month" value="{{ $month }}">
                <input type="hidden" name="category" value="{{ $category }}">
            </form>
        <div class="modal" tabindex="-1" role="dialog" id="completionModal">
        <div class="modal-dialog" role="document">
            <div class="modal-body">
                <p>{カテゴリー名}に{項目名}を{学習時間}分で追加しました！</p>
            </div>
            <form action="{{ route('data.index') }}" method="get">
                <button type="button" class="submit-button" data-dismiss="modal">編集ページに戻る</button>
            </form>
            </div>
        </div>
        </div>
        </section>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
    <script>
        $(document).ready(function() {
            // セッション変数が設定されているか確認
            @if (session('create_complete'))
            // モーダルを表示
            $('#completionModal').modal('show');
            @endif
        });
    </script>
</body>
</html>