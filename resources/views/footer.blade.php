<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tutors</title>
    <style>
        .link-list {
            display: none;
        }

        .link:hover .link-list,
        .link:focus .link-list {
            display: block;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: Arial, sans-serif;
        }

        ul {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            list-style: none;
        }

        ul li {
            margin-right: 10px;
        }

        ul li a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        ul li a:hover {
            color: #007bff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="{{ route('client_home')}}">家庭教師を依頼したい</a></li>
        <li><a href="{{ route('tutor_home')}}">家庭教師の仕事をしたい</a></li>
        <li><a href="#">パッケージを探す</a></li>
        <li><a href="#">お知らせ</a></li>
        <li><a href="#">メッセージ</a></li>
        @auth
        <li><a href="{{ route('mypage')}}">マイページ</a></li>
        <li><a href="#">ログアウト</a></li>
        @endauth
    </ul>
    <div class="container">
        <h1>@yield('content')</h1>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
