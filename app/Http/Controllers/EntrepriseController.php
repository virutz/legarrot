<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Region;
use App\Models\Section;
use App\Models\Adhtuteur;
use App\Models\Adhenfant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adlogout()
    {
        return view('rg_admin.connexion');
    }
     public function dashboard()
    {
        $entreprises = Entreprise::where('status','=','1')->get();
        $cptentreprise = $entreprises->count();

        $regions = Region::where('status','=','1')->get();
        $cptregion = $regions->count();

        $sections = Section::where('status','=','1')->get();
        $cptsection = $sections->count();

        $adhtuteurs = Adhtuteur::where('status','=','1')->get();
        $cptadhtuteurv = $adhtuteurs->count();

        $adhenfants = Adhenfant::where('status','=','1')->get();
        $cptadhenfantv = $adhenfants->count();

        $adhtuteurs = Adhtuteur::where('status','<>','1')->get();
        $cptadhtuteurm = $adhtuteurs->count();

        $adhenfants = Adhenfant::where('status','<>','1')->get();
        $cptadhenfantm = $adhenfants->count();

    
        return view('rg_admin.home', compact('cptentreprise','cptregion','cptsection','cptadhtuteurv','cptadhenfantv','cptadhtuteurm','cptadhenfantm'));
    }
    
     public function index()
    {
        $entreprises = Entreprise::latest()->paginate(10);
        return view('rg_admin.entreprise', compact('entreprises'))
        ->with('i', (request()->input('page', 1) - 1) * 10);

        $regions = DB::table('regions')->select('id','name')
        ->join('entreprises','regions.entreprise_id','=','entreprise.id')
        ->where('entreprises.status', '=', '1')
        ->orderBy('regions.name','ASC')
        ->get();

        $sections = DB::table('sections')->select('id','name')
        ->join('regions','sections.region_id','=','section.id')
        ->join('entreprises','regions.entreprise_id','=','entreprise.id')
        ->where('regions.status', '=', '1')
        ->orderBy('sections.name','ASC')
        ->get();
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
            'name' => 'required',
            'nameabrv' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'status' => 'required',
            ]);
            Entreprise::create($request->all());

            return redirect()
            ->route('entrepriseadd')
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

    public function update(Request $request, Entreprise $entreprises)
    {
    $request->validate([
        'name' => 'required',
        'nameabrv' => 'required',
        'phone1' => 'required',
        'phone2' => 'required',
        'status' => 'required',
    ]);
    $entreprises = Entreprise::find($request->hidden_id);
    $entreprises->name = $request->name;
    $entreprises->nameabrv = $request->nameabrv;
    $entreprises->phone1 = $request->phone1;
    $entreprises->phone2 = $request->phone2;
    $entreprises->status = $request->status;

    $entreprises->save();
    return redirect()
    ->route('entrepriseupdate')
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
