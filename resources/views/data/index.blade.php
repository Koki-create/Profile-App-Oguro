<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="/css/style.css" rel="stylesheet">
    <title>profile-edit</title>
</head>
<body>
    <header>
        <div class="header-content">
            <h1><a href="{{ route('user.top') }}" style="color: white; text-decoration: none;">My Portfolio</a></h1>
        </div>
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <button type="submit" class="button_white">ログアウト</button>
        </form>
    </header>
    <main>
        <section class="month-section">
            <form action="{{ route('data.index') }}" method="get">
                <select name="month" id="month-select" class="month-pulldown">
                    @php
                        $startMonth = $currentMonth - 2;
                        $endMonth = $currentMonth;
                        $selectedMonth = session('selectedMonth', $currentMonth);
                    @endphp

                    @for ($i = $startMonth; $i <= $endMonth; $i++)
                        @php
                            // 年をまたぐ場合、月の値を調整
                            $monthValue = $i;
                            if ($monthValue < 1) {
                                $monthValue += 12;
                            }
                        @endphp
                        <option value="{{ $monthValue }}" {{ $monthValue == $selectedMonth ? 'selected' : '' }}>
                            {{ $monthValue }}月
                        </option>
                    @endfor
                </select>
            </form>
        </section>
        <section class="category-section">
            <div class="category-header">
                <h3>バックエンド</h3>
                <form action="{{ route('data.showAdd') }}" method="get">
                    <input type="hidden" name="category" value="バックエンド">
                    <input type="hidden" name="month" class="month-hidden" value="{{ $selectedMonth }}">
                    <button type="submit" class="submit-button">項目を追加する</button>
                </form>
            </div>
            <div class="scrollable">
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
                        @foreach($data_b as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <form action="{{ route('data.update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" id="{{ $data->id }}" name="inputTime" min="0" value="{{ $data->time }}">
                                        <input type="hidden" name="dataId" value="{{ $data->id }}">
                                        <button type="submit" class="save-button">学習時間を保存する</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('data.delete') }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="dataId" value="{{ $data->id }}">
                                        <button type="submit" class="delete-button">削除する</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section class="category-section">
            <div class="category-header">
                <h3>フロントエンド</h3>
                <form action="{{ route('data.showAdd') }}" method="get">
                    <input type="hidden" name="category" value="フロントエンド">
                    <input type="hidden" name="month" class="month-hidden" value="{{ $selectedMonth }}">
                    <button type="submit" class="submit-button">項目を追加する</button>
                </form>
            </div>
            <div class="scrollable">
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
                        @foreach($data_h as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>
                                <form action="{{ route('data.update') }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="number" id="{{ $data->id }}" name="inputTime" min="0" value="{{ $data->time }}">
                                    <input type="hidden" name="dataId" value="{{ $data->id }}">
                                    <button type="submit" class="save-button">学習時間を保存する</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('data.delete') }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="dataId" value="{{ $data->id }}">
                                    <button type="submit" class="delete-button">削除する</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section class="category-section">
            <div class="category-header">
                <h3>インフラ</h3>
                <form action="{{ route('data.showAdd') }}" method="get">
                    <input type="hidden" name="category" value="インフラ">
                    <input type="hidden" name="month" class="month-hidden" value="{{ $selectedMonth }}">
                    <button type="submit" class="submit-button">項目を追加する</button>
                </form>
            </div>
            <div class="scrollable">
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
                        @foreach($data_i as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <form action="{{ route('data.update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" id="{{ $data->id }}" name="inputTime" min="0" value="{{ $data->time }}">
                                        <input type="hidden" name="dataId" value="{{ $data->id }}">
                                        <button type="submit" class="save-button">学習時間を保存する</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('data.delete') }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="dataId" value="{{ $data->id }}">
                                        <button type="submit" class="delete-button">削除する</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <!-- 編集完了モーダル開始 -->
        <div class="modal fade" id="updatedModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(session()->has('update_complete'))
                        <p>{{ session('data_item') }}の学習時間を保存しました！</p>
                        <form action="{{ route('data.index') }}" method="get">
                            <button type="submit" class="submit-button">編集ページに戻る</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- 編集完了モーダル終了 -->
        <!-- 削除完了モーダル開始 -->
        <div class="modal fade" id="deletedModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if(session()->has('delete_complete'))
                        <p>{{ session('data_item') }}を削除しました！</p>
                        <form action="{{ route('data.index') }}" method="get">
                            <button type="submit" class="submit-button">編集ページに戻る</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- 削除完了モーダル終了 -->
    </main>
    <footer class="custom-footer">
        <p>portfolio site</p>
    </footer>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const monthSelect = document.getElementById('month-select');
        monthSelect.addEventListener('change', function() {
            const monthValue = monthSelect.value;
            this.form.submit();
            // querySelectorAllを使用して、クラス名が'month-hidden'のすべてのinput要素を取得し、valueを更新
            document.querySelectorAll('.month-hidden').forEach(function(input) {
                input.value = monthValue;
            });

        });
        // ページロード時に現在選択されている月の値を全ての.month-hiddenに設定
        const initialMonthValue = monthSelect.value;
        document.querySelectorAll('.month-hidden').forEach(function(input) {
            input.value = monthSelect.value;
        });
        // モーダルの表示
        $(document).ready(function() {
            @if(session()->has('update_complete'))
                $('#updatedModal').modal('show');
            @endif
            @if(session()->has('delete_complete'))
                $('#deletedModal').modal('show');
            @endif

        });            
    });

    </script>
</body>
</html>