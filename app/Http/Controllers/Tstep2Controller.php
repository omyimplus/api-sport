<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Tstep2;
use Auth;
class Tstep2Controller extends Controller
{
    public function index()
    {
        if(Auth::user()->level == 1 || Auth::user()->level >= 100) {
            $tstep=Tstep2::take(8)->get();
            $switch = ($tstep->count() < 8) ? 'on':'off';
                
            return view('tstep2.index', ['tstep2' => $tstep,'buttonAdd'=>$switch]);
        }
        else abort(403, 'Unauthorized action.');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'team1' => 'required',
            'team2' => 'required',
        ]);
        $tstep = new Tstep2;
        //dd($request->input('team2'));
        $tstep->uid = Auth::user()->id;
        $tstep->team1 = $request->input('team1');
        $tstep->team2 = $request->input('team2');
        $tstep->team1w = $request->input('team1w');
        $tstep->team2w = $request->input('team2w');
       
        $tstep->save();
        return redirect('/tstep2')->with('success','Success! New TededStep has been Created.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('tstep2.edit', ['tstep' => Tstep2::where('id',$id)->first()]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'team1' => 'required',
            'team2' => 'required',
        ]);
        $ts = Tstep2::find($id);
        $ts->uid = $ts->uid;
        $ts->team1 = $request->input('team1');
        $ts->team2 = $request->input('team2');
        $ts->team1w = $request->input('team1w');
        $ts->team2w = $request->input('team2w');
        $ts->save();
        return redirect('/tstep2')->with('success','Success! TededStep2 has been updated.');
    }
    public function destroy($id)
    {
        //
    }
}
