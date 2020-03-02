<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lotto;

class LottolaoController extends Controller
{
    public function index()
    {
        // dd(Lotto::orderBy('id','desc')->first());
        return view('lotto_lao.index', ['lottos' => Lotto::orderBy('id','desc')->get()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lotto_lao_at' => 'required',
        ]);
        $lotto = new Lotto;
        $lotto->lotto_lao_at = $request->input('lotto_lao_at');
        $lotto->lotto_lao = $request->input('lotto_lao');
        $lotto->save();
        return redirect('/lotto_lao')->with('success','Success! lotto lao saved.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('lotto_lao.edit', ['lotto' => Lotto::where('id',$id)->first()]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'lotto_lao_at' => 'required',
        ]);

        $lotto = Lotto::find($id);
        $lotto->lotto_lao_at = $request->input('lotto_lao_at');
        $lotto->lotto_lao = $request->input('lotto_lao');
        $lotto->save();
        return redirect('/lotto_lao')->with('success','Success! lotto updated.');
    }

    public function destroy($id)
    {
        //
    }
}
