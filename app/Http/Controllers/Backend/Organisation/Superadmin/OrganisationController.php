<?php

namespace App\Http\Controllers\Backend\Organisation\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Organisation\Organisation;
use Propaganistas\LaravelPhone\PhoneNumber;

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


        $organisation = Organisation::
        with('country', 'county', 'constituency', 'ward','organisationemployees','organisationdirectors')
                                    ->where('organisations.id', $orgemployee->id )
                                    // ->where('organisations.id', $orgadirector->id)
                                    ->get();
        // return $organisation;
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
     * OrganisationInfo
     */
    public function verifyOrganisationInfo (Request $request)
    {
        $this->validate($request,[
                'name'    => 'required|min:2|max:50',
                'organisation_email' => 'required|email|max:255|unique:organisations',
                'phone' => 'phone:AUTO,MOBILE',
                'landline'=> 'phone:AUTO,MOBILE', //FIXED_LINE
                'website'=> 'required|min:2|max:50',
                'address'=> 'required|digits_between:1,20',
                'country_id'=> 'required',
                'county_id'=> 'required',
                'constituency_id'=> 'required',
                'ward_id'=> 'required',
       ]);
    }
    public function verifyDirectorInfo (Request $request)
    {
        $this->validate($request,[
            'director_first_name'  =>  'required',
            'director_last_name'  =>  'required',
            'email'  =>  'required|email|max:255|unique:users',
            'director_password'  =>  'required',
            'director_phone'  =>  'phone:AUTO,MOBILE',
            'director_landline'  =>  'phone:AUTO,MOBILE',
            'director_id_no'  =>  'required|digits_between:7,10',
            'director_address'  =>  'required|digits_between:1,20',
            'director_country_id'  =>  'required',
            'director_county_id'  =>  'required',
            'director_constituency_id'  =>  'required',
            'director_ward_id'  =>  'required',
            // 'director_passport_image'  =>  'required',
            // 'frontside_director_id_photo'  =>  'required',
            // 'backside_director_id_photo'  =>  'required',
       ]);
    }
    public function updateverifyOrganisationInfo (Request $request)
    {
        $this->validate($request,[
                'name'    => 'sometimes|required|min:2|max:50',
                'organisation_email' => 'required|email|max:255|organisation_email,'.$organisation->id,
                'phone' => 'phone:AUTO,MOBILE',
                'landline'=> 'phone:AUTO,MOBILE', //FIXED_LINE
                'website'=> 'sometimes|required|min:2|max:50',
                'address'=> 'sometimes|required|digits_between:1,20',
                'country_id'=> 'sometimes|required',
                'county_id'=> 'sometimes|required',
                'constituency_id'=> 'sometimes|required',
                'ward_id'=> 'sometimes|required',
       ]);
    }
    public function updateverifyDirectorInfo (Request $request)
    {
        $this->validate($request,[
            'director_first_name'  =>  'sometimes|required',
            'director_last_name'  =>  'sometimes|required',
            'email'  =>  'required|email|max:255|unique:users',
            'director_password'  =>  'sometimes|required',
            'director_phone'  =>  'phone:AUTO,MOBILE',
            'director_landline'  =>  'phone:AUTO,MOBILE',
            'director_id_no'  =>  'sometimes|required|digits_between:7,10',
            'director_address'  =>  'sometimes|required|digits_between:1,20',
            'director_country_id'  =>  'sometimes|required',
            'director_county_id'  =>  'sometimes|required',
            'director_constituency_id'  =>  'sometimes|required',
            'director_ward_id'  =>  'sometimes|required',
            // 'director_passport_image'  =>  'required',
            // 'frontside_director_id_photo'  =>  'required',
            // 'backside_director_id_photo'  =>  'required',
       ]);
    }
    public function store(Request $request)
    {
        return $request;
// return $request ->phone;


        $organisation = new Organisation();
        $organisation->name = $request ->name;
        $organisation->email = $request ->email;
        $organisation->phone = PhoneNumber::make($request->phone);
        $organisation->landline = PhoneNumber::make($request->landline);
        $organisation->website = $request ->website;
        $organisation->address = $request ->address;
        $organisation->active = true;
        $organisation->country_id = $request ->country_id;
        $organisation->county_id = $request ->county_id;
        $organisation->constituency_id = $request ->constituency_id;
        $organisation->ward_id = $request ->ward_id;

        // $organisation->logo = $request ->logo;
        //processing logo nme and size
        $strpos = strpos($request->logo, ';'); //positionof image name semicolon
        $sub = substr($request->logo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;


        $Path = public_path()."/assets/organisation/img/logo";
            $img = Image::make($request->logo);
            $img ->save($Path.'/'.$name);
        $organisation->logo = $name;
        //end processing logo and size
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
        // return $id;
        $orgemployee= Auth::user()-> organisationemployee()->first()->organisation()->first();
        // return $organisation;

        $organisation = Organisation::with('country', 'county', 'constituency', 'ward','organisationemployees','organisationdirectors')
                                    // ->where('organisations.id', $orgemployee->id )
                                    // ->where('organisations.id', $orgadirector->id)
                                    ->find($id);
        // dd($organisation);
        return response()-> json([
            'organisation' => $organisation,
        ], 200);
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
        return $request;

        $organisation->name = $request ->name;
        $organisation->email = $request ->email;
        $organisation->phone = PhoneNumber::make($request->phone);
        $organisation->landline = PhoneNumber::make($request->landline);
        $organisation->website = $request ->website;
        $organisation->address = $request ->address;
        $organisation->active = true;
        $organisation->country_id = $request ->country_id;
        $organisation->county_id = $request ->county_id;
        $organisation->constituency_id = $request ->constituency_id;
        $organisation->ward_id = $request ->ward_id;

        // $organisation->logo = $request ->logo;
        //getting previous logo
        $currentLogo =  $organisation->logo;

         //processing logo nme and size
        if($request->logo != $currentLogo){
            $Path = public_path()."/assets/organisation/img/logo";

            $S_currentLogo = $Path. $currentLogo;
            //deleting if exists
                if(file_exists($S_currentLogo)){
                    @unlink($S_currentLogo);
                }
                $strpos = strpos($request->logo, ';'); //positionof image name semicolon
                $sub = substr($request->logo, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name = time().".".$ex;

               $img = Image::make($request->logo);
                    $img ->save($Path.'/'.$name);
                //end processing logo and size

        }else{//$request->logo = $currentLogo
            $name = $organisation->logo;
        }
        $organisation->logo = $name;
        $organisation->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organisation = Organisation::findOrFail($id);
        //image inline with this organisation
        $Path = public_path()."/assets/organisation/img/logo";;

        $S_image = $Path. $organisation->logo;

        if(file_exists($S_image)){
            @unlink($S_image);
        }
        $organisation->delete();
    }
}
