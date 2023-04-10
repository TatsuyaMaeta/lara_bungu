<?php

namespace App\Http\Controllers;

use App\Models\Juchu;
use App\Models\Bunbougu;
use App\Models\Jotai;
use App\Models\Kyakusaki;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuchuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $juchus = Juchu::select([
            'j.id',
            'j.kyakusaki_id',
            'j.bunbougu_id',
            'j.kosu',
            'j.jotai',
            'j.user_id',
            'k.name as kyakusaki_name',
            'b.name as bunbougu_name',
            'u.name as user_name',
            'jt.name as jotai'       //受注テーブルの状態がjotaiテーブルのidとマッチしたものを持ってきている
        ])
            ->from('juchus as j')
            ->join('kyakusakis as k', function ($join) {
                $join->on('j.kyakusaki_id', '=', 'k.id');
            })
            ->join('bunbougus as b', function ($join) {
                $join->on('j.bunbougu_id', '=', 'b.id');
            })
            ->join('users as u', function ($join) {
                $join->on('j.user_id', '=', 'u.id');
            })
            ->join('jotais as jt', function ($join) {
                $join->on('j.jotai', '=', 'jt.id');
            })
            ->orderBy('j.id', 'DESC')
            ->paginate(5);

        if (isset(Auth::user()->name)) {
            // 下のbunbougusは$bunbougusの変数の$がないだけ
            return view("juchus.index", compact('juchus'))
                ->with('user_name', Auth::user()->name)
                ->with('page_id', request()->page)
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return view("juchus.index", compact('juchus'))
                ->with('page_id', request()->page)
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bunbougus = Bunbougu::all();
        $kyakusakis = Kyakusaki::all();

        return view('juchus.create', compact('bunbougus'))
            ->with('bunbougus', $bunbougus)
            ->with('kyakusakis', $kyakusakis);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kyakusaki_id' => 'required|integer',
            'bunbougu_id' => 'required|integer',
            'kosu' => 'required|integer|min:1|max:12',
        ]);

        // storeは新しくデータをtableに登録するのでnew Juchuする必要がある
        $juchu = new Juchu;
        $juchu->kyakusaki_id = $request->input(['kyakusaki_id']);
        $juchu->bunbougu_id = $request->input(['bunbougu_id']);
        $juchu->kosu = $request->input(['kosu']);
        $juchu->jotai = 1;
        $juchu->user_id = Auth::user()->id;
        $juchu->save();
        return redirect()->route('juchus.index')
            ->with('success', '受注登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juchu  $juchu
     * @return \Illuminate\Http\Response
     */
    public function show(Juchu $juchu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juchu  $juchu
     * @return \Illuminate\Http\Response
     */
    public function edit(Juchu $juchu)
    {
        $bunbougus = Bunbougu::all();
        $kyakusakis = Kyakusaki::all();
        return view('juchus.edit', compact('juchu'))
            ->with('bunbougus', $bunbougus)
            ->with('kyakusakis', $kyakusakis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juchu  $juchu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juchu $juchu)
    {
        $request->validate([
            'kyakusaki_id' => 'required|integer',
            'bunbougu_id' => 'required|integer',
            'kosu' => 'required|integer|min:1|max:12',
        ]);
        $juchu->kyakusaki_id = $request->input(['kyakusaki_id']);
        $juchu->bunbougu_id = $request->input(['bunbougu_id']);
        $juchu->kosu = $request->input(['kosu']);
        $juchu->jotai = 1;
        $juchu->user_id =
            Auth::user()->id;
        $juchu->save();

        return redirect()->route('juchus.index')
            ->with('success', '受注入力を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juchu  $juchu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juchu $juchu)
    {
        $juchu->delete();
        return redirect()->route('juchus.index')
            ->with('success', '受注ID: ' . $juchu->id . 'を削除しました');
    }
}
