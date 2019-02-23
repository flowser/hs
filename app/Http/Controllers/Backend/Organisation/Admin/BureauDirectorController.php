<?php

namespace App\Http\Controllers\Backend\Organisation\Admin;

use Illuminate\Http\Request;
use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use App\Models\Standard\Gender;
use App\Models\Standard\Position;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class BureauDirectorController extends Controller
{
    public function index()
    {
        // $bureau = Auth::user()->bureauemployees()->first();
        $directors = User::with('roles','permissions','bureaudirectors', 'positions', 'countries', 'counties', 'constituencies', 'wards')
                            ->get();
        return response()-> json([
            'directors'=>$directors,
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
    public function verifyDirectorInfo (Request $request)
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

    public function updateverifyDirectorInfo (Request $request, $id)
    {
       $bureau = Bureau::find($id);
       $user = $bureau->bureaudirectors()->first();

            $this->validate($request,[
                'director_first_name'  =>  'sometimes|required',
                'director_last_name'  =>  'sometimes|required',
                // 'email'=>'sometimes|required|string|email|max:191',
                'email' => 'required|email|max:191|unique:users,email,'.$user->id,
                // 'gender_id'  =>  'required',
                'director_password'  =>  'sometimes|required',
                'director_phone'  =>  'sometimes|phone:AUTO,MOBILE',
                'director_landline'  =>  'sometimes|phone:AUTO,MOBILE',
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

    public function store(Request $request, $id)
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
        $bureau= Bureau::find($id);
        if ($bureau){
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->active     = true;
            $user->confirmed  = true;
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            $user->user_type      = 'Bureau Director';
            $user->password   = Hash::make($request->director_password);

            $user->assignRole('Bureau Director');
            $user ->givePermissionTo('View Backend', 'View All');

                $passport = $request->photo;
                if($passport){
                     //processing passport name
                     $ps_strpos = strpos($passport, ';'); //positionof image name semicolon
                     $ps_sub = substr($passport, 0, $ps_strpos);
                     $ps_ex = explode('/', $ps_sub)[1];
                     $ps_name = time().".".$ps_ex;

                     $ps_Path = public_path()."/assets/bureau/img/directors/passports";
                         $ps_img = Image::make($passport);
                         $ps_img ->save($ps_Path.'/'.$ps_name);
                     //end processing
                    $photo= $ps_name;
                }
                //director Front side id image
                $frontside_id = $request->id_photo_front;
                if($frontside_id){
                     //processing front side id imagee
                     $fr_id_strpos = strpos($frontside_id, ';');
                     $fr_id_sub = substr($frontside_id, 0, $fr_id_strpos);
                     $fr_id_ex = explode('/', $fr_id_sub)[1];
                     $fr_id_name = time().".".$fr_id_ex;

                     $fr_id_Path = public_path()."/assets/bureau/img/directors/IDs/front";
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

                     $bs_id_Path = public_path()."/assets/bureau/img/directors/IDs/back";
                         $bs_id_img = Image::make($backside_id);
                         $bs_id_img ->save($bs_id_Path.'/'.$bs_id_name);
                     //end processing
                    $id_photo_back = $bs_id_name;
                }
                $position_id = Position::find(1)->id;
                $gender_id = Gender::find(1)->id;
            if($user){
                $bureau->bureaudirectors()->save($user, [
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

    public function view($id)
    {
        $director = Bureau:: with(
         'position', 'countries', 'counties', 'constituencies', 'wards')
         ->find($id)->bureaudirectors()->first();
        return response()-> json([
            'director'=>$director,
        ], 200);
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

        $director = User::with('roles','permissions','bureaudirectors')
                            ->find($id);
        return response()-> json([
            'director'=>$director,
        ], 200);


        // $director = User::
        //                 with('roles','permissions','bureaudirectors')
        //                 ->find($id);
        // return response()-> json([
        //     'director'=>$director,
        // ], 200);
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
        $this->validate($request,[
            'first_name'  =>  'required',
            'last_name'  =>  'required',
            'email'  =>  'required|email|max:255|unique:users',
            'email'  =>  'required|email|max:255|unique:users,email,'.$id,
            'password'  =>  'sometimes|required',
            'phone'  =>  'phone:AUTO,MOBILE',
            'landline'  =>  'phone:AUTO,MOBILE',
            'id_no'  =>  'required|digits_between:7,10',
            'address'  =>  'required|digits_between:1,20',
            // 'gender_id'  =>  'required',
            'country_id'  =>  'required',
            'county_id'  =>  'required',
            'constituency_id'  =>  'required',
            'ward_id'  =>  'required',
            'photo'  =>  'sometimes|required',
            'id_photo_front'  =>  'sometimes|required',
            'id_photo_back'  =>  'sometimes|required',
       ]);

        //geting organistion id

            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->active     = true;
            $user->confirmed  = true;
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            $user->user_type      = 'Bureau Director';
            $user->password   = Hash::make($request->director_password);

            $user->assignRole('Bureau Director');
            $user ->givePermissionTo('View Backend', 'View All');

                //getting previous photo
                $currentPassport = $user->bureaudirectors()->first()->pivot->photo;
                // return $currentPassport;
                //processing photo nme and size
                if($request->photo != $currentPassport){
                    $ps_Path = public_path()."/assets/bureau/img/directors/passports/";

                    $S_currentPassport = $ps_Path. $currentPassport;
                    //deleting if exists
                        if(file_exists($S_currentPassport)){
                            @unlink($S_currentPassport);
                        }
                        $passport = $request->photo;

                        $ps_strpos = strpos($passport, ';'); //positionof image name semicolon
                        $ps_sub = substr($passport, 0, $ps_strpos);
                        $ps_ex = explode('/', $ps_sub)[1];
                        $ps_name = time().".".$ps_ex;

                         $ps_img = Image::make($passport);
                         $ps_img ->save($ps_Path.'/'.$ps_name);
                     //end processing
                    $photo= $ps_name;
                }else{
                    $photo = $user->bureaudirectors()->first()->pivot->photo;
                }
               //front side id
               $currentFrontside_id = $user->bureaudirectors()->first()->pivot->id_photo_front;
                // return $currentFrontside_id;
                //processing id_photo_front nme and size
                if($request->id_photo_front != $currentFrontside_id){
                    $fr_id_Path = public_path()."/assets/bureau/img/directors/IDs/front/";

                    $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                    // return $S_currentFrontside_id;
                    //deleting if exists
                        if(file_exists($S_currentFrontside_id)){
                            @unlink($S_currentFrontside_id);
                        }
                        $frontside_id = $request->id_photo_front;

                        $fr_id_strpos = strpos($frontside_id, ';');
                        $fr_id_sub = substr($frontside_id, 0, $fr_id_strpos);
                        $fr_id_ex = explode('/', $fr_id_sub)[1];
                        $fr_id_name = time().".".$fr_id_ex;

                        $fr_id_img = Image::make($frontside_id);
                        $fr_id_img ->save($fr_id_Path.'/'.$fr_id_name);
                     //end processing
                        $id_photo_front = $fr_id_name;
                }else{
                    $id_photo_front = $user->bureaudirectors()->first()->pivot->id_photo_front;
                }

                //backside id
                $currentBackside_id = $user->bureaudirectors()->first()->pivot->id_photo_back;
                // return $currentBackside_id;
                //processing id_photo_back nme and size
                if($request->id_photo_back != $currentBackside_id){
                    $bs_id_Path = public_path()."/assets/bureau/img/directors/IDs/back/";

                    $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                    // return $S_currentBackside_id;
                    //deleting if exists
                        if(file_exists($S_currentBackside_id)){
                            @unlink($S_currentBackside_id);
                        }
                        $backside_id = $request->id_photo_back;

                        $bs_id_strpos = strpos($backside_id, ';');
                        $bs_id_sub = substr($backside_id, 0, $bs_id_strpos);
                        $bs_id_ex = explode('/', $bs_id_sub)[1];
                        $bs_id_name = time().".".$bs_id_ex;

                        $bs_id_img = Image::make($backside_id);
                        $bs_id_img ->save($bs_id_Path.'/'.$bs_id_name);
                     //end processing
                        $id_photo_back = $bs_id_name;
                }else{
                    $id_photo_back = $user->bureaudirectors()->first()->pivot->id_photo_back;
                }

                $position_id = Position::find(1)->id;
                $gender_id = Gender::find(1)->id;

                $bureau= User::find($id)->bureaudirectors()->first();

            if($user){
                $bureau ->bureaudirectors()->updateExistingPivot($user->id, [
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $bureau = $user->bureaudirectors()->first();
             $currentPassport = $user->bureaudirectors()->first()->pivot->photo;
                 $ps_Path = public_path()."/assets/bureau/img/directors/passports/";
                 $S_currentPassport = $ps_Path. $currentPassport;
                     if(file_exists($S_currentPassport)){
                         @unlink($S_currentPassport);
                     }

            //front side id
            $currentFrontside_id = $user->bureaudirectors()->first()->pivot->id_photo_front;
                 $fr_id_Path = public_path()."/assets/bureau/img/directors/IDs/front/";
                 $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                     if(file_exists($S_currentFrontside_id)){
                         @unlink($S_currentFrontside_id);
                     }

             //backside id
             $currentBackside_id = $user->bureaudirectors()->first()->pivot->id_photo_back;
                 $bs_id_Path = public_path()."/assets/bureau/img/directors/IDs/back/";
                 $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                     if(file_exists($S_currentBackside_id)){
                         @unlink($S_currentBackside_id);
                     }
        }
        $bureau->bureaudirectors()->detach($id);
        $user->delete();
    }


}
