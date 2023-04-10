@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">文房具後進画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/bunbougus') }}">戻る</a>
        </div>
    </div>
</div>

<div style="text-align:right;">
    <form action="{{ route('bunbougu.update', $bunbougu->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="名前" value="{{ $bunbougu->name }}">
                </div>
                @error("name")
                <span style="color:red;">名前を20文字以内で入力してください</span>
                @enderror
            </div>
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input value="{{ $bunbougu->kakaku }}" type="text"
                        name="kakaku" class="form-control" placeholder="価格">
                </div>
                @error("kakaku")
                <span style="color:red;">価格を入力してください</span>
                @enderror
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <select name="bunrui" class="form-select">
                        <option>分類を選択してください</otion>
                            @foreach ($bunruis as $bunrui)
                                <option
                                    value="{{ $bunrui->id }}"
                                    @if($bunrui->id == $bunbougu->bunrui)
                                        selected
                                    @endif>
                                        {{ $bunrui->str }}
                                </otion>
                            @endforeach
                    </select>
                    @error("bunrui")
                    <span style="color:red;">入力してください</span>
                    @enderror
                </div>
            </div>

            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <textarea class="form-control" style="height:100px"
                        name="shosai" placeholder="詳細">{{ $bunbougu->shosai }}
                    </textarea>
                </div>
                @error("shosai")
                <span style="color:red;">詳細を140文字以内で入力してください</span>
                @enderror
            </div>
            <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection
