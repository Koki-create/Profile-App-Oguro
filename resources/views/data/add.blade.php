<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>profile-edit</title>
</head>
<body>
    <header class="custom-header">
        <h1><a href="{{ route('user.top') }}" style="color: white; text-decoration: none;">My Portfolio</a></h1>
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
                    <label for="data_item">項目名</label>
                    <input type="text" id="data_item" name="data_item" value="{{ old('data_item') }}">
                    @error('data_item')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="time">学習時間</label>
                    <input type="number" id="time" name="time" value="{{ old('time') }}">
                    <p>分単位で入力してください。</p>
                    @error('time')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="submit-button">追加する</button>
                <input type="hidden" name="userId" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                <input type="hidden" name="month" value="{{ $month }}">
                <input type="hidden" name="category" value="{{ $category }}">
            </form>
        <!-- モーダル開始 -->
        <div class="modal fade" id="completionModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(session()->has('create_complete'))
                        <p>{{ session('category') }}に{{ session('data_item') }}を<br>
                            {{ session('time') }}分で追加しました！</p>
                    @endif
                    <form action="{{ route('data.index') }}" method="get">
                        <button type="submit" class="submit-button">編集ページに戻る</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- モーダル終了 -->
        </section>
    </main>
    <footer class="custom-footer">
        <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
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