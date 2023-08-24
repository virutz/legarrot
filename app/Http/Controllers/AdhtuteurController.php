<?php

namespace App\Http\Controllers;
use App\Models\Adhtuteur;
use App\Models\Exercice;
use App\Models\Entreprise;
use App\Models\Section;
use App\Models\Region;
use App\Models\Matrimoniale;
use App\Models\Pidentite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdhtuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercices = DB::table('exercices')->select('id','name')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $entreprises = DB::table('entreprises')->select('id','name', 'nameabrv')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $regions = DB::table('regions')->select('id','name', 'nameabrv')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $sections = DB::table('sections')->select('id','name', 'nameabrv')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $matrimoniales = DB::table('matrimoniales')->select('id','name','nameabrv')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $pidentites = DB::table('pidentites')->select('id','name')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

       $adhtuteurs = Adhtuteur::latest()->paginate(10);
        return view('rg_admin.adhtuteur', compact('adhtuteurs','entreprises','exercices','regions',
        'sections','matrimoniales','pidentites'))
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

        'exercice_id' => 'required',
        'section_id' => 'required',
        'adhtdatedebut' => 'required',
        'adhtname' => 'required',
        'adhtnamelast' => 'required',
        'adhtsexe' => 'required',
        'adhtdatenais' => 'required',
        'adhtlieunais' => 'required',
        'matrimoniale_id' => 'required',
        'adhprofname' => 'adhprofname',
        'adhtemail' => 'required|email',
        'adhtadresse' => 'required',
        'adhtphone1' => 'required',
        'adhtphone2' => 'required',
        'pidentite_id' => 'required',
        'adhtpnumero' => 'required',
        'status' => 'required'

        ]);
        Adhtuteur::create($request->all());

        return redirect()
        ->route('adhtuteuradd')
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
    public function update(Request $request, Adhtuteur $adhtuteurs)
    {
    $request->validate([
        'exercice_id' => 'required',
        'section_id' => 'required',
        'adhtdatedebut' => 'required',
        'adhtname' => 'required',
        'adhtnamelast' => 'required',
        'adhtsexe' => 'required',
        'adhtdatenais' => 'required',
        'adhtlieunais' => 'required',
        'matrimoniale_id' => 'required',
        'adhprofname' => 'required',
        'adhtemail' => 'required|email',
        'adhtadresse' => 'required',
        'adhtphone1' => 'required',
        'adhtphone2' => 'required',
        'pidentite_id' => 'required',
        'adhtpnumero' => 'required',
        'status' => 'required'
    ]);
    $adhtuteurs = Adhtuteur::find($request->hidden_id);

    $adhtuteurs->exercice_id = $request->exercice_id;
    $adhtuteurs->section_id = $request->section_id;
    $adhtuteurs->adhtdatedebut = $request->adhtdatedebut;
    $adhtuteurs->adhtname = $request->adhtname;
    $adhtuteurs->adhtnamelast = $request->adhtnamelast;
    $adhtuteurs->adhtsexe = $request->adhtsexe;
    $adhtuteurs->adhtdatenais = $request->adhtdatenais;
    $adhtuteurs->adhtlieunais = $request->adhtlieunais;
    $adhtuteurs->matrimoniale_id = $request->matrimoniale_id;
    $adhtuteurs->adhprofname = $request->adhprofname;
    $adhtuteurs->adhtemail = $request->adhtemail;
    $adhtuteurs->adhtadresse = $request->adhtadresse;
    $adhtuteurs->adhtphone1 = $request->adhtphone1;
    $adhtuteurs->adhtphone2 = $request->adhtphone2;
    $adhtuteurs->pidentite_id = $request->pidentite_id;
    $adhtuteurs->adhtpnumero = $request->adhtpnumero;
    $adhtuteurs->status = $request->status;
    

    $adhtuteurs->save();
    return redirect()
    ->route('adhtuteurupdate')
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
