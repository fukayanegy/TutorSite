@extends('footer')

@section('content')
<div class="container">
    <div class="profile-section">
        <h2>プロフィール新規作成</h2>
        <div class="back-link">
            <a href="{{ route('profile.index')}}">戻る</a>
        </div>
    </div>

    <div class="form-section">
        <form action="{{ route('myprofile.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="catchphrase">キャッチフレーズ</label>
                <input type="text" id="catchphrase" name="catchphrase" placeholder="キャッチフレーズ">
                @error('catchphrase')
                <span class="error-message">キャッチフレーズを入力してください</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo">プロフィール写真</label>
                <input type="text" id="photo" name="photo" placeholder="プロフィール写真">
                @error('photo')
                <span class="error-message">プロフィール写真を入力してください</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="personal_name">本名</label>
                <input type="text" id="personal_name" name="personal_name" placeholder="本名">
                @error('personal_name')
                <span class="error-message">本名を入力してください</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="personal_gender">性別</label>
                <input type="text" id="personal_gender" name="personal_gender" placeholder="性別">
                @error('personal_gender')
                <span class="error-message">性別を入力してください</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="personal_birthyear">誕生年</label>
                <input type="text" id="personal_birthyear" name="personal_birthyear" placeholder="誕生年">
                @error('personal_birthyear')
                <span class="error-message">誕生年を入力してください</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="personal_address">住所</label>
                <input type="text" id="personal_address" name="personal_address" placeholder="住所">
                @error('personal_address')
                <span class="error-message">住所を入力してください</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">電話番号</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="電話番号">
                @error('phone_number')
                <span class="error-message">電話番号を入力してください</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="self_introduction">自己紹介</label>
                <textarea id="self_introduction" name="self_introduction" placeholder="自己紹介"></textarea>
                @error('self_introduction')
                <span class="error-message">自己紹介を入力してください</span>
                @enderror
            </div>

            <div class="submit-button">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 8px;
    }

    .profile-section {
        margin-bottom: 20px;
    }

    .back-link a {
        color: #007bff;
        text-decoration: none;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
    }

    .error-message {
        color: red;
        font-size: 0.8em;
        margin-top: 5px;
        display: block;
    }

    .submit-button {
        text-align: center;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
