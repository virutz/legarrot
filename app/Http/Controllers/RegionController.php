<?php

namespace App\Http\Controllers;
use App\Models\Entreprise;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = DB::table('entreprises')->select('id','name')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $regions = Region::latest()->paginate(10);
        return view('rg_admin.region', compact('regions','entreprises'))
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
            'nameabrv' => 'required',
            'entreprise_id' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'status' => 'required',
            ]);
            Region::create($request->all());
    
            return redirect()
            ->route('regionadd')
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
    public function update(Request $request, Region $regions)
    {
    $request->validate([
        'name' => 'required',
        'nameabrv' => 'required',
        'entreprise_id' => 'required',
        'phone1' => 'required',
        'phone2' => 'required',
        'status' => 'required'
    ]);
    $regions = Region::find($request->hidden_id);
    $regions->name = $request->name;
    $regions->nameabrv = $request->nameabrv;
    $regions->entreprise_id = $request->entreprise_id;
    $regions->phone1 = $request->phone1;
    $regions->phone2 = $request->phone2;
    $regions->status = $request->status;

    $regions->save();
    return redirect()
    ->route('regionupdate')
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
