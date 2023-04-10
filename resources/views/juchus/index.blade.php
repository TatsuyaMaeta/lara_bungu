@extends('app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="text-left">
            <h2 style="font-size:1rem;">
                文房具マスター
            </h2>
        </div>

        <div class="text-right">
            @auth
            <a href="{{ route('juchus.create') }}" class="btn btn-success">新規登録</a>
            @endauth
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @auth
        ログイン者：{{$user_name}}
        @endauth
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-1">
            <p>{{ $message }}</p>
        </div>
        @endif

    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>客先</th>
        <th>文房具</th>
        <th>個数</th>
        <th>状態</th>
        @auth
        <th>編集</th>
        <th>削除</th>
        <th>編集者</th>
        @endauth

    </tr>
    @foreach ($juchus as $juchu)
    <tr>
        <td style="text-align:right">{{ $juchu->id }}</td>
        <td style="text-align:right">{{ $juchu->kyakusaki_name }}</td>
        <td style="text-align:right">{{ $juchu->bunbougu_name }}</td>
        <td style="text-align:right">{{ $juchu->kosu }}</td>
        <td style="text-align:right">{{ $juchu->jotai }}</td>
        @auth
        <td style="text-align:center">
            <a class="btn btn-primary btn-sm" href="{{ route('juchus.edit',$juchu->id) }}">変更</a>
        </td>
        @endauth
        @auth
        <td style="text-align:center">
            <form action="{{ route('juchu.destroy',$juchu->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('削除しますか？');">削除</button>
            </form>
        </td>
        @endauth
        @auth
        <td>
            {{ $juchu->user_name }}
        </td>
        @endauth
    </tr>
    @endforeach
</table>

{!! $juchus->links('pagination::bootstrap-5') !!}
@endsection
