<?php

namespace App\Http\Controllers;
use App\Models\Exercice;
use App\Models\Cotisationadh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CotisationadhController extends Controller
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
        ->get();

        $cotisationadhs = Cotisationadh::latest()->paginate(10);
        return view('rg_admin.droitadhesion', compact('cotisationadhs','exercices'))
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
            'name' => 'required',
            'exercice_id' => 'required',
            'status' => 'required'
            ]);
            Cotisationadh::create($request->all());
    
            return redirect()
            ->route('droitadhesionadd')
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
    public function update(Request $request, Cotisationadh $cotisationadhs)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $cotisationadhs = Cotisationadh::find($request->hidden_id);
        $cotisationadhs->name = $request->name;
        $cotisationadhs->status = $request->status;

        $cotisationadhs->save();
        return redirect()
        ->route('droitadhesionupdate')
        ->with('success', 'Modification effecuée.');
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
