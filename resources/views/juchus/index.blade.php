<x-app-layout>
    <x-slot name="header">
        <div class="text-left">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                受注入力
            </div>
        </div>
    </x-slot>
    <div class="base my-3">
        <div class="row ">
            <div class="">
                <div class="col-lg-12">
                    @auth
                    ログイン者：{{$user_name}}
                    @endauth
                </div>
            </div>
            <div class="text-right">
                @auth
                <a href="{{ route('juchus.create') }}" class="btn btn-success">新規登録</a>
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
</x-app-layout>