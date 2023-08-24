<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\Adhtuteur;
use App\Models\Adhenfant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdhenfantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adhtuteurs = DB::table('adhtuteurs')->select('id','adhtname','adhtnamelast')
        ->where('status', '=', '1')
        ->orderBy('adhtname','ASC')
        ->get();

        $exercices = DB::table('exercices')->select('id','name')
        ->where('status', '=', '1')
        ->get();

        $adhenfants = Adhenfant::latest()->paginate(10);
        return view('rg_admin.adhenfant', compact('adhenfants','exercices','adhtuteurs'))
        ->with('i', (request()->input('page', 1) - 1) * 10);

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
        $request->validate([

        'exercice_id'  => 'required',
        'adhtuteur_id' => 'required',
        'adhdatedebut' => 'required',
        'adhname' => 'required',
        'adhnamelast' => 'required',
        'adhsexe' => 'required',
        'adhdatenais' => 'required',
        'adhlieunais' => 'required',
        'adhphone1' => 'required',
        'adhphone2' => 'required',
        'status' => 'required',
    ]);
        Adhenfant::create($request->all());

        return redirect()
        ->route('adhenfantadd')
        ->with('success', 'Insertion effectuée.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adhenfant $adhenfants)
    {
        $request->validate([
        'exercice_id'  => 'required',
        'adhtuteur_id' => 'required',
        'adhdatedebut' => 'required',
        'adhname' => 'required',
        'adhnamelast' => 'required',
        'adhsexe' => 'required',
        'adhdatenais' => 'required',
        'adhlieunais' => 'required',
        'adhphone1' => 'required',
        'adhphone2' => 'required',
        'status' => 'required'
        ]);
        $adhenfants = Adhenfant::find($request->hidden_id);
    
        $adhenfants->exercice_id = $request->exercice_id;
        $adhenfants->adhtuteur_id = $request->adhtuteur_id;
        $adhenfants->adhdatedebut = $request->adhdatedebut;
        $adhenfants->adhname = $request->adhname;
        $adhenfants->adhnamelast = $request->adhnamelast;
        $adhenfants->adhsexe = $request->adhsexe;
        $adhenfants->adhdatenais = $request->adhdatenais;
        $adhenfants->adhlieunais = $request->adhlieunais;
        $adhenfants->adhphone1 = $request->adhphone1;
        $adhenfants->adhphone2 = $request->adhphone2;
        $adhenfants->status = $request->status;
        
        $adhenfants->save();
        return redirect()
        ->route('adhenfantupdate')
        ->with('success', 'Modification effectuée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
