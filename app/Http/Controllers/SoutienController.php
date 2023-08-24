<?php

namespace App\Http\Controllers;
use App\Models\Exercice;
use App\Models\Soutien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoutienController extends Controller
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

        $soutiens = Soutien::latest()->paginate(0);
        return view('rg_admin.droitsoutien', compact('soutiens','exercices'))
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
            'montant' => 'required',
            'exercice_id' => 'required',
            'status' => 'required'
            ]);
            Soutien::create($request->all());
    
            return redirect()
            ->route('droitsoutienadd')
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
    public function update(Request $request, Soutien $soutiens)
    {
        $request->validate([
            'name' => 'required',
            'montant' => 'required',
            'status' => 'required'
        ]);
        $soutiens = Soutien::find($request->hidden_id);
        $soutiens->name = $request->name;
        $soutiens->montant = $request->montant;
        $soutiens->status = $request->status;

        $soutiens->save();
        return redirect()
        ->route('droitsoutienupdate')
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
