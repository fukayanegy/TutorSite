@extends('footer')

@section('content')
<div class="container">
    <div class="section">
        <div class="profile-link">
            <a href="#">プロフィールを充実させる</a>
        </div>
    </div>
    <div class="section">
        <h3>ランクアップする方法</h3>
    </div>
    <div class="section">
        <h3>簡単利用ガイド</h3>
        <div class="guide-links">
            <a href="#">パッケージを作る</a>
            <a href="#">仕事を探す</a>
        </div>
    </div>
    <div class="section">
        <h3 class="sub-heading"><a href="#">スキルを追加する</a></h3>
        <h3 class="sub-heading"><a href="#">資格を追加する</a></h3>
    </div>
    <div class="section">
        <h3>相談フォーム</h3>
        <div class="iframe-container">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSck9eA3KptVeut0yfqrGaJUuE3o7KU4QQYB3kBtmuzHayrpRQ/viewform?embedded=true" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
        </div>
    </div>
</div>
@endsection

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .section {
        margin-bottom: 30px;
    }

    .profile-link a {
        display: block;
        margin-bottom: 10px;
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }

    .profile-link a:hover {
        color: #007bff;
    }

    h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .sub-heading a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }

    .sub-heading a:hover {
        color: #007bff;
    }

    .guide-links a {
        display: block;
        margin-bottom: 5px;
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }

    .guide-links a:hover {
        color: #007bff;
    }

    .iframe-container {
        position: relative;
        overflow: hidden;
        padding-top: 56.25%;
    }

    .iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
</style>
