@extends('footer')

@section('content')
<div class="container">
    <div class="profile-section">
        <a href="{{ route('profile.edit')}}">プロフィールを編集する</a>
        <table class="profile-table">
            <tbody>
                <tr>
                    <td class="profile-field">キャッチフレーズ</td>
                    <td>{{ $profile->catchphrase}}</td>
                </tr>
                <tr>
                    <td class="profile-field">名前</td>
                    <td>{{ $profile->personal_name}}</td>
                </tr>
                <tr>
                    <td class="profile-field">性別</td>
                    <td>{{ $profile->personal_gender}}</td>
                </tr>
                <tr>
                    <td class="profile-field">生年月日</td>
                    <td>{{ $profile->personal_birthyear}}</td>
                </tr>
                <tr>
                    <td class="profile-field">住所</td>
                    <td>{{ $profile->personal_address}}</td>
                </tr>
                <tr>
                    <td class="profile-field">電話番号</td>
                    <td>{{ $profile->phone_number}}</td>
                </tr>
                <tr>
                    <td class="profile-field">自己紹介</td>
                    <td>{{ $profile->self_introduction}}</td>
                </tr>
            </tbody>
        </table>
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

    .profile-section {
        margin-bottom: 30px;
    }

    a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s;
    }

    a:hover {
        color: #0056b3;
    }

    .profile-table {
        width: 100%;
        border-collapse: collapse;
    }

    .profile-field {
        width: 200px;
        padding: 10px;
        font-weight: bold;
        vertical-align: top;
        border-bottom: 1px solid #ccc;
    }

    td {
        padding: 10px;
        vertical-align: top;
        border-bottom: 1px solid #ccc;
    }
</style>
