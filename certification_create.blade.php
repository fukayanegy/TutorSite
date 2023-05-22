@extends('footer')

@section('content')
<div>
    <h2 style="font-size:1rem;">資格を追加する</h2>
</div>
<div class="pull-right">
    <a href="{{ route('my_certification.index') }}">戻る</a>
</div>

<form action="{{ route('certification.store') }}" method="POST">
    @csrf
    <select name="genre">
        <option>資格の種類</otion>
        @foreach ($common_certifications as $common_certification)
            <option value="{{ $common_certification->id }}">{{ $common_certification->name }}</otion>
        @endforeach
    </select>
    @error('genre')
    <span style="color:red;">資格の種類を入力して下さい</span>
    @enderror
    <div>
        <input type="text" name="title" placeholder="資格名">
        @error('title')
        <span style="color:red;">資格の名前を入力して下さい</span>
        @enderror
    </div>
    <div>
        <textarea style="height:100px" name="detail" placeholder="詳細情報"></textarea>
        @error('detail')
        <span style="color:red;">詳細情報を入力してください</span>
        @enderror
    </div>
    <div>
        <button type="submit">登録</button>
    </div>
</form>
@endsection
