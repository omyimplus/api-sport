<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Lotto;
class LottoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lotto $model)
    {

//        $model->orderBy('id','desc')->paginate(20);
        return view('lotto.index', ['lottos' => $model->orderBy('id','desc')->paginate(20)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'lotto_at' => 'required',
        ]);
        $lotto = new Lotto;
        $lotto->lotto_at = str_replace('/','-',$request->input('lotto_at'));
        $lotto->lotto1 = $request->input('lotto1');
        if ($request->input('lotto1closeup')) $lotto->lotto1closeup = getSix($request->input('lotto1closeup'));
        if ($request->input('lotto2')) $lotto->lotto2 = getSix($request->input('lotto2'));
        if ($request->input('lotto3')) $lotto->lotto3 = getSix($request->input('lotto3'));
        if ($request->input('lotto4')) $lotto->lotto4 = getSix($request->input('lotto4'));
        if ($request->input('lotto5')) $lotto->lotto5 = getSix($request->input('lotto5'));
        $lotto->lotto_front3 = $request->input('lotto_front3');
        $lotto->lotto_last3 = $request->input('lotto_last3');
        $lotto->lotto_last2 = $request->input('lotto_last2');
        $lotto->lotto_lao_at = $request->input('lotto_lao_at');
        $lotto->lotto_lao = $request->input('lotto_lao');
        $lotto->save();
        return redirect('/lotto')->with('success','Success! lotto saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('lotto.edit', ['lotto' => Lotto::where('id',$id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'lotto_at' => 'required',
        ]);
        if($request->hasFile('image')) $fileNameToStore=uploadImage($request->file('image'),'imgs');

        $lotto = Lotto::find($id);
        $lotto->lotto_at = str_replace('/','-',$request->input('lotto_at'));
        $lotto->lotto1 = $request->input('lotto1');
        if ($request->input('lotto1closeup')) $lotto->lotto1closeup = getSix($request->input('lotto1closeup'));
        if ($request->input('lotto2')) $lotto->lotto2 = getSix($request->input('lotto2'));
        if ($request->input('lotto3')) $lotto->lotto3 = getSix($request->input('lotto3'));
        if ($request->input('lotto4')) $lotto->lotto4 = getSix($request->input('lotto4'));
        if ($request->input('lotto5')) $lotto->lotto5 = getSix($request->input('lotto5'));
        $lotto->lotto_front3 = $request->input('lotto_front3');
        $lotto->lotto_last3 = $request->input('lotto_last3');
        $lotto->lotto_last2 = $request->input('lotto_last2');
        $lotto->lotto_lao_at = $request->input('lotto_lao_at');
        $lotto->lotto_lao = $request->input('lotto_lao');
        $lotto->save();
        return redirect('/lotto')->with('success','Success! lotto updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $y = Lotto::find($id);
        $y->delete();
        return redirect()->back()->with('success','Lotto ID:'.$id.' has been Removed.');  
    }
}
