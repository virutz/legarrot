<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Gerant;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GerantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = DB::table('sections')->select('id','name')
        ->where('status', '=', '1')
        ->orderBy('name','ASC')
        ->get();

        $roles = DB::table('roles')->select('id','name')
        ->where('id', '<', '4')
        ->orderBy('name','ASC')
        ->get();

        $profiles = DB::table('profiles')->select('id','name')
        ->where('id', '<', '3')
        ->orderBy('name','ASC')
        ->get();
/*
        $gerantts = DB::table('gerants')->select('gerants.id','gerants.name', 'gerants.namelast')
        ->join('roles','gerants.role_id','=','roles.id')
        ->join('profiles','gerants.profile_id','=','profiles.id')
        ->join('sections','gerants.section_id','=','sections.id')
        ->orderBy('gerants.name','ASC')
        ->get();
*/
        $gerants = Gerant::latest()->paginate(10);
        return view('rg_admin.gerant', compact('gerants','sections','roles','profiles'))
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
            'namelast' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'profile_id' => 'required',
            'role_id' => 'required',
            'section_id' => 'required',
            'pricesms' => '20',
            'volumesms' => 'required',
            'status' => 'required'
            ]);
            Gerant::create($request->all());
    
            return redirect()
            ->route('gerantadd')
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
    public function update(Request $request, Gerant $gerants)
    {
    $request->validate([
        'name' => 'required',
        'namelast' => 'required',
        'phone1' => 'required',
        'phone2' => 'required',
        'profile_id' => 'required',
        'role_id' => 'required',
        'section_id' => 'required',
        'pricesms' => '20',
        'volumesms' => 'required',
        'status' => 'required'
    ]);
    $gerants = Gerant::find($request->hidden_id);
    $gerants->name = $request->name;
    $gerants->namelast = $request->namelast;
    $gerants->profile_id = $request->profile_id;
    $gerants->phone1 = $request->phone1;
    $gerants->phone2 = $request->phone2;
    $gerants->role_id = $request->role_id;
    $gerants->section_id = $request->section_id;
    $gerants->volumesms = $request->volumesms;
    $gerants->status = $request->status;

    $gerants->save();
    return redirect()
    ->route('gerantupdate')
    ->with('success', 'Modification effectuée.');
    }

    public function update2(Request $request, Gerant $gerants)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'

    ]);
    $gerants = Gerant::find($request->hidden_id);
    $gerants->email = $request->email;
    $gerants->password = $request->password;
    
    $gerants->save();
    return redirect()
    ->route('gerantupdate2')
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
