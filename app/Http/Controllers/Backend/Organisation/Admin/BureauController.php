<?php

namespace App\Http\Controllers\Backend\Organisation\Admin;

use Illuminate\Http\Request;
use App\Models\Bureau\Bureau;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function BureauList()
    {
        $organisation = Auth::user()->organisationemployees()->first();
        // return $organisation;

        // $bureaus = Bureau::with('bureaudirectors')->get();
        // return $bureaus;

        $bureaus = Bureau::
        whereHas('bureaudirectors', function($query) use($organisation)
                                {
                                  $query ->where('organisation_id', $organisation->id);
                                }
                            )
                            ->with('bureaudirectors', 'positions', 'countries', 'counties',
                             'constituencies', 'wards', 'country', 'county', 'constituency', 'ward')
                            ->get();
        return response()-> json([
            'bureaus' => $bureaus,
        ], 200);
    }
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
