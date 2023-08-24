<?php

namespace App\Http\Controllers;
use App\Models\Adhtuteur;
use App\Models\Adhbeneficiaire;
use App\Models\Pidentite;
use App\Models\Parente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdhbeneficiaireController extends Controller
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

        $pidentites = DB::table('pidentites')->select('id','name')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $parentes = DB::table('parentes')->select('id','name')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $adhbeneficiaires = Adhbeneficiaire::latest()->paginate(10);
        return view('rg_admin.adhbeneficiaire', compact('adhbeneficiaires','parentes','pidentites','adhtuteurs'))
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

        'adhtuteur_id'  => 'required',
        'parente_id' => 'required',
        'adhbname'  => 'required',
        'adhbnamelast'  => 'required',
        'adhbsexe'  => 'required',
        'adhbdatenais'  => 'required',
        'adhblieunais'  => 'required',
        'adhbphone1'  => 'required',
        'adhbphone2'  => 'required',
        'pidentite_id'  => 'required',
        'adhbpnumero'  => 'required',
        'status'  => 'required',
    
            ]);
            Adhbeneficiaire::create($request->all());
    
            return redirect()
            ->route('adhbeneficiaireadd')
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
    public function update(Request $request, Adhbeneficiaire $adhbeneficiaires)
    {
        $request->validate([

        'adhtuteur_id'  => 'required',
        'parente_id' => 'required',
        'adhbname'  => 'required',
        'adhbnamelast'  => 'required',
        'adhbsexe'  => 'required',
        'adhbdatenais'  => 'required',
        'adhblieunais'  => 'required',
        'adhbphone1'  => 'required',
        'adhbphone2'  => 'required',
        'pidentite_id'  => 'required',
        'adhbpnumero'  => 'required',
        'status'  => 'required'

        ]);
        $adhbeneficiaires = Adhbeneficiaire::find($request->hidden_id);
    
        $adhbeneficiaires->adhtuteur_id = $request->adhtuteur_id;
        $adhbeneficiaires->parente_id = $request->parente_id;
        $adhbeneficiaires->adhbname = $request->adhbname;
        $adhbeneficiaires->adhbnamelast = $request->adhbnamelast;
        $adhbeneficiaires->adhbsexe = $request->adhbsexe;
        $adhbeneficiaires->adhbdatenais = $request->adhbdatenais;
        $adhbeneficiaires->adhblieunais = $request->adhblieunais;
        $adhbeneficiaires->adhbphone1 = $request->adhbphone1;
        $adhbeneficiaires->adhbphone2 = $request->adhbphone2;
        $adhbeneficiaires->pidentite_id = $request->pidentite_id;
        $adhbeneficiaires->adhbpnumero = $request->adhbpnumero;
        $adhbeneficiaires->status = $request->status;
        
        $adhbeneficiaires->save();
        return redirect()
        ->route('adhbeneficiaireupdate')
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
