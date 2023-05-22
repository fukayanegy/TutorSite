@extends('footer')

@section('content')
    <h2>資格を編集する</h2>
    <a href="{{ route('my_certification.index') }}">戻る</a>

<form action="{{ route('certification.update', $certification->id) }}" method="POST">
    @method('PUT')
    @csrf
        <select name="genre">
            <option>資格の種類</otion>
            @foreach ($common_certifications as $common_certification)
                <option value="{{ $common_certification->id }}"@if($common_certification->id===$certification->genre) selected @endif>{{ $common_certification->name }}</otion>
            @endforeach
        </select>
        @error('genre')
        <span style="color:red;">資格の種類を入力して下さい</span>
        @enderror
        <div>
            <input type="text" name="title" value="{{ $certification->title }}" placeholder="資格名">
            @error('title')
            <span style="color:red;">資格の名前を入力して下さい</span>
            @enderror
        </div>
        <div>
            <textarea style="height:100px" name="detail" placeholder="詳細情報">{{ $certification->detail }}</textarea>
            @error('detail')
            <span style="color:red;">詳細情報を入力してください</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">登録</button>
</form>
@endsection
