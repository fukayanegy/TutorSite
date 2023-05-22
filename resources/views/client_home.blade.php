@extends('footer')

@section('content')
<div class="container">
    <div class="section">
        <h3>カテゴリーから探す</h3>
        <ul class="category-list">
            <li><a href="#">国語</a></li>
            <li><a href="#">数学</a></li>
            <li><a href="#">英語</a></li>
            <li><a href="#">理科</a></li>
            <li><a href="#">社会</a></li>
            <li><a href="#">情報</a></li>
        </ul>
    </div>
    <div class="section">
        <h3>簡単利用ガイド</h3>
        <div class="guide-links">
            <a href="#">新規依頼作成</a>
            <a href="#">提案を探す</a>
        </div>
    </div>
    <div class="section">
        <h3>目的はなんですか？</h3>
        <ul class="purpose-list">
            <li>
                <div class="link">
                    <a href="#">小学生</a>
                    <ul class="link-list">
                        <li><a href="#">小学校(一般)</a></li>
                        <li><a href="#">中学受験</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="link">
                    <a href="#">中学生</a>
                    <ul class="link-list">
                        <li><a href="#">中学校(一般)</a></li>
                        <li><a href="#">高校受験</a></li>
                        <li><a href="#">中学校(中高一貫)</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="link">
                    <a href="#">高校生</a>
                    <ul class="link-list">
                        <li><a href="#">高校(一般)</a></li>
                        <li><a href="#">大学受験(私立文系)</a></li>
                        <li><a href="#">大学受験(私立理系)</a></li>
                        <li><a href="#">大学受験(国立文系)</a></li>
                        <li><a href="#">大学受験(国立理系)</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="link">
                    <a href="#">その他</a>
                    <ul class="link-list">
                        <li><a href="#">大学教養</a></li>
                        <li><a href="#">リカレント教育</a></li>
                    </ul>
                </div>
            </li>
        </ul>
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

    h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul li {
        margin-bottom: 5px;
    }

    .category-list li a,
    .purpose-list li .link a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }

    .category-list li a:hover,
    .purpose-list li .link a:hover {
        color: #007bff;
    }

    .link-list {
        display: none;
    }

    .link:hover .link-list,
    .link:focus .link-list {
        display: block;
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

