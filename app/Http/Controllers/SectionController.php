<?php

namespace App\Http\Controllers;
use App\Models\Region;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = DB::table('regions')->select('id','name')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $sections = Section::latest()->paginate(10);
        return view('rg_admin.section', compact('sections','regions'))
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
            'region_id' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'status' => 'required',
            ]);
            Section::create($request->all());
    
            return redirect()
            ->route('sectionadd')
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
    public function update(Request $request, Section $sections)
    {
    $request->validate([
        'name' => 'required',
        'nameabrv' => 'required',
        'region_id' => 'required',
        'phone1' => 'required',
        'phone2' => 'required',
        'status' => 'required'
    ]);
    $sections = Section::find($request->hidden_id);
    $sections->name = $request->name;
    $sections->nameabrv = $request->nameabrv;
    $sections->region_id = $request->region_id;
    $sections->phone1 = $request->phone1;
    $sections->phone2 = $request->phone2;
    $sections->status = $request->status;

    $sections->save();
    return redirect()
    ->route('sectionupdate')
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
