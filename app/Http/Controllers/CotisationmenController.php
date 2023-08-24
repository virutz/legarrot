<?php

namespace App\Http\Controllers;
use App\Models\Exercice;
use App\Models\Cotisationmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotisationmenController extends Controller
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

        $cotisationmens = Cotisationmen::latest()->paginate(10);
        return view('rg_admin.droitmensuel', compact('cotisationmens','exercices'))
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
            Cotisationmen::create($request->all());
    
            return redirect()
            ->route('droitmensueladd')
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
    public function update(Request $request, Cotisationmen $cotisationmens)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $cotisationmens = Cotisationmen::find($request->hidden_id);
        $cotisationmens->name = $request->name;
        $cotisationmens->status = $request->status;

        $cotisationmens->save();
        return redirect()
        ->route('droitmensuelupdate')
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
