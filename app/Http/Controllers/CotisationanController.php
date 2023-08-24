<?php

namespace App\Http\Controllers;
use App\Models\Exercice;
use App\Models\Cotisationan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CotisationanController extends Controller
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

        $cotisationans = Cotisationan::latest()->paginate(10);
        return view('rg_admin.droitannuel', compact('cotisationans','exercices'))
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
            'status' => 'required',
            ]);
            Cotisationan::create($request->all());
    
            return redirect()
            ->route('droitannueladd')
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
    public function update(Request $request, Cotisationan $cotisationans)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $cotisationans = Cotisationan::find($request->hidden_id);
        $cotisationans->name = $request->name;
        $cotisationans->status = $request->status;

        $cotisationans->save();
        return redirect()
        ->route('droitannuelupdate')
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
