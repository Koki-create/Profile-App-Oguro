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
            <h1><a href="{{ route('user.top') }}" style="color: white; text-decoration: none;">My Portfolio</a></h1>
        </div>
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <button type="submit" class="button_white">ログアウト</button>
        </form>
    </header>
    <main>
    <div class="profile">
        <div class="profile-image">
            @if (\Illuminate\Support\Facades\Auth::user()->image)
            <img src="{{ asset('storage/' . \Illuminate\Support\Facades\Auth::user()->image) }}" alt="プロフィール画像">
            @else
            <div class="default-profile-image"></div>
            @endif
            <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
        </div>
        <div class="profile-info">
        <h2>自己紹介</h2>
        <p>{{\Illuminate\Support\Facades\Auth::user()->introduction}}</p>
        <form action="{{ route('user.showEdit') }}" method="get">
            @csrf
            <button type="submit" class="submit-button profile-edit-button">自己紹介を編集する</button>
        </form>
        </div>
    </div>
    <div class="chart">
        <h2>学習チャート</h2>
        <form action="{{ route('data.index') }}" method="get" class="form-chart">
            @csrf
            <button type="submit" class="submit-button">編集する</button>
        </form>
    <canvas id="myBarChart"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    
    <script>
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['先々月', '先月', '今月'],
        datasets: [
            {
            label: 'バックエンド',
            data: [{{ $data_b_beforePrevious }}, {{ $data_b_previous }}, {{ $data_b_current }}],
            backgroundColor: "rgb(254,178,194)"
            },{
            label: 'フロントエンド',
            data: [{{ $data_h_beforePrevious }}, {{ $data_h_previous }}, {{ $data_h_current }}],
            backgroundColor: "rgb(255,207,164)"
            },{
            label: 'インフラ',
            data: [{{ $data_i_beforePrevious }}, {{ $data_i_previous }}, {{ $data_i_current }}],
            backgroundColor: "rgb(254,229,175)"
            }
        ]
        },
        options: {
        title: {
            display: true,
            text: 'Chart.js Bar Chart'
        },
        scales: {
            yAxes: [{
            ticks: {
                suggestedMax: 100,
                suggestedMin: 0,
                stepSize: 10,
                callback: function(value, index, values){
                return  value
                }
            }
            }]
        },
        }
    });
    </script>
    </div>
    </main>
    <footer>
        <p>portfolio site</p>
    </footer>
</body>
</html>