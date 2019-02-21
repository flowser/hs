<?php

namespace App\Http\Controllers\Backend\Organisation\Superadmin;

use Illuminate\Http\Request;
use App\Models\Standard\User;
use App\Models\Standard\Gender;
use App\Models\Standard\Position;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\Organisation\Organisation;

class OrgAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisation = Auth::user()->organisationemployees()->first();
        $admins = User::whereHas('organisationemployees', function($query) use($organisation)
                                {
                                  $query ->where('organisation_id', $organisation->id);
                                }
                            )
                            ->with('roles','permissions','organisationemployees', 'positions', 'countries', 'counties', 'constituencies', 'wards')
                            ->get();
        return response()-> json([
            'admins'=>$admins,
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
    public function verifyAdminInfo (Request $request)
    {
        $this->validate($request,[
            'first_name'  =>  'required',
            'last_name'  =>  'required',
            'email'  =>  'required|email|max:255|unique:users',
            'password'  =>  'required',
            'phone'  =>  'phone:AUTO,MOBILE',
            'landline'  =>  'phone:AUTO,MOBILE',
            'id_no'  =>  'required|digits_between:7,10',
            'address'  =>  'required|digits_between:1,20',
            // 'gender_id'  =>  'required',
            'country_id'  =>  'required',
            'county_id'  =>  'required',
            'constituency_id'  =>  'required',
            'ward_id'  =>  'required',
            'photo'  =>  'required',
            'id_photo_front'  =>  'required',
            'id_photo_back'  =>  'required',
       ]);
    }

    public function updateverifyAdminInfo (Request $request, $id)
    {
       $organisation = Organisation::find($id);
       $user = $organisation->organisationemployees()->first();

            $this->validate($request,[
                'admin_first_name'  =>  'sometimes|required',
                'admin_last_name'  =>  'sometimes|required',
                'email'=>'sometimes|required|string|email|max:191',
                'email' => 'required|email|max:191|unique:users,email,'.$user->id,
                // 'gender_id'  =>  'required',
                'admin_password'  =>  'sometimes|required',
                'admin_phone'  =>  'sometimes|phone:AUTO,MOBILE',
                'admin_landline'  =>  'sometimes|phone:AUTO,MOBILE',
                'admin_id_no'  =>  'sometimes|required|digits_between:7,10',
                'admin_address'  =>  'sometimes|required|digits_between:1,20',
                'admin_country_id'  =>  'sometimes|required',
                'admin_county_id'  =>  'sometimes|required',
                'admin_constituency_id'  =>  'sometimes|required',
                'admin_ward_id'  =>  'sometimes|required',
                // 'admin_passport_image'  =>  'required',
                // 'frontside_admin_id_photo'  =>  'required',
                // 'backside_admin_id_photo'  =>  'required',
           ]);

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'  =>  'required',
            'last_name'  =>  'required',
            'email'  =>  'required|email|max:255|unique:users',
            'password'  =>  'required',
            'phone'  =>  'phone:AUTO,MOBILE',
            'landline'  =>  'phone:AUTO,MOBILE',
            'id_no'  =>  'required|digits_between:7,10',
            'address'  =>  'required|digits_between:1,20',
            // 'gender_id'  =>  'required',
            'country_id'  =>  'required',
            'county_id'  =>  'required',
            'constituency_id'  =>  'required',
            'ward_id'  =>  'required',
            'photo'  =>  'required',
            'id_photo_front'  =>  'required',
            'id_photo_back'  =>  'required',
       ]);

        //geting organistion id
        $organisation= Auth::user()->organisationemployees()->first();
        if ($organisation){
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->active     = true;
            $user->confirmed  = true;
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            $user->user_type      = 'Organisation Admin';
            $user->password   = Hash::make($request->admin_password);

                $passport = $request->photo;
                if($passport){
                     //processing passport name
                     $ps_strpos = strpos($passport, ';'); //positionof image name semicolon
                     $ps_sub = substr($passport, 0, $ps_strpos);
                     $ps_ex = explode('/', $ps_sub)[1];
                     $ps_name = time().".".$ps_ex;

                     $ps_Path = public_path()."/assets/organisation/img/admins/passports";
                         $ps_img = Image::make($passport);
                         $ps_img ->save($ps_Path.'/'.$ps_name);
                     //end processing
                    $photo= $ps_name;
                }
                //admin Front side id image
                $frontside_id = $request->id_photo_front;
                if($frontside_id){
                     //processing front side id imagee
                     $fr_id_strpos = strpos($frontside_id, ';');
                     $fr_id_sub = substr($frontside_id, 0, $fr_id_strpos);
                     $fr_id_ex = explode('/', $fr_id_sub)[1];
                     $fr_id_name = time().".".$fr_id_ex;

                     $fr_id_Path = public_path()."/assets/organisation/img/admins/IDs/front";
                         $fr_id_img = Image::make($frontside_id);
                         $fr_id_img ->save($fr_id_Path.'/'.$fr_id_name);
                     //end processing
                    $id_photo_front = $fr_id_name;
                }
                $backside_id = $request->id_photo_back;
                if($backside_id){
                     //processing front side id imagee
                     $bs_id_strpos = strpos($backside_id, ';');
                     $bs_id_sub = substr($backside_id, 0, $bs_id_strpos);
                     $bs_id_ex = explode('/', $bs_id_sub)[1];
                     $bs_id_name = time().".".$bs_id_ex;

                     $bs_id_Path = public_path()."/assets/organisation/img/admins/IDs/back";
                         $bs_id_img = Image::make($backside_id);
                         $bs_id_img ->save($bs_id_Path.'/'.$bs_id_name);
                     //end processing
                    $id_photo_back = $bs_id_name;
                }
                $position_id = Position::find(1)->id;
                $gender_id = Gender::find(1)->id;
            if($user){
                Organisation::find($organisation->id)
                ->organisationemployees()
                ->save($user, [
                    'position_id'      => $position_id,
                    'gender_id'        => $gender_id,
                    'active'           => true,
                    'id_no'            => $request-> id_no,
                    'photo'            => $photo,
                    'id_photo_front'   => $id_photo_front,
                    'id_photo_back'    => $id_photo_back,
                    'about_me'         => $request-> about_me,
                    'phone'            => $request-> phone,
                    'landline'         => $request-> landline,
                    'address'          => $request-> address,
                    'country_id'       => $request-> country_id,
                    'county_id'        => $request-> county_id,
                    'constituency_id'  => $request-> constituency_id,
                    'ward_id'          => $request-> ward_id,
                ]);
            }
            $user->save();
        }
    }

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
        $organisation = Auth::user()->organisationemployees()->first();
        $admin = User::
                        with('roles','permissions','organisationemployees', 'positions', 'countries', 'counties', 'constituencies', 'wards')
                        ->find($id);
        return response()-> json([
            'admin'=>$admin,
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
