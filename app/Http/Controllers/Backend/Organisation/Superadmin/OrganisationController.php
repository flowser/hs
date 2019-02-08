<?php

namespace App\Http\Controllers\Backend\Organisation\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Organisation\Organisation;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orgadirector= Auth::user()-> organisationdirector()->first()->organisation()->first();
        $orgemployee= Auth::user()-> organisationemployee()->first()->organisation()->first();
        // return $organisation;

        $organisation = Organisation::with('country', 'county', 'town', 'organisationemployees','organisationdirectors')
                                    ->where('organisations.id', $orgemployee->id )
                                    // ->where('organisations.id', $orgadirector->id)
                                    ->get();
        // dd($organisation);
        return response()-> json([
            'organisation' => $organisation,
        ], 200);
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
        $this->validate($request,[
            'name'    => 'required|min:2|max:50',
            'email'=> 'required|min:2|max:50',
            'phone' => 'required|min:2|max:50',
            'landline'=> 'required|min:2|max:50',
            'website'=> 'required|min:2|max:50',
            'address'=> 'required|min:2|max:50',
            'country_id'=> 'required',
            'county_id'=> 'required',
            'town_id'=> 'required',
        ]);

        $organisation = new Organisation();
        $organisation->name = $request ->name;
        $organisation->email = $request ->email;
        $organisation->phone = $request ->phone;
        $organisation->landline = $request ->landline;
        $organisation->website = $request ->website;
        $organisation->address = $request ->address;
        $organisation->active = true;
        $organisation->country_id = $request ->country_id;
        $organisation->county_id = $request ->county_id;
        $organisation->town_id = $request ->town_id;

        // $organisation->logo = $request ->logo;
        //processing photo nme and size
        $strpos = strpos($request->logo, ';'); //positionof image name semicolon
        $sub = substr($request->logo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;

        $file = $request->file('logo');
        $S_Path = public_path()."/assets/organisation/img/logo/small";
        $M_Path = public_path()."/assets/organisation/img/logo//medium";
        $L_Path = public_path()."/assets/organisation/img/logo/large";
            $img = Image::make($request->logo);
//            $img->crop(300, 150, 25, 25);
            $img ->resize(100, 100)->save($S_Path.'/'.$name);
            $img ->resize(250, 250)->save($M_Path.'/'.$name);
            $img ->resize(500, 500)->save($L_Path.'/'.$name);
        $organisation->logo = $name;
        //end processing photo and size
        $organisation->save();
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
