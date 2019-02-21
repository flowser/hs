<?php

namespace App\Http\Controllers\Backend\Webpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Standard\Webservices\About;
use App\Models\Standard\Webservices\Advert;



class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            //organisation
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                $advert = Advert::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $advert = Advert::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $advert = Advert::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $advert = Advert::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
            //bureau
            if (auth()->user()->hasRole('Bureau Director')) {
                $bureau= Auth::user()-> bureaudirectors()->first();
                $advert = Advert::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
            if (auth()->user()->hasRole('Bureau Superadmin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                $advert = Advert::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
            if (auth()->user()->hasRole('Bureau Admin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                $advert = Advert::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
            if (auth()->user()->hasRole('Bureau Accountant')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                $advert = Advert::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'advert' => $advert,
                ], 200);
            }
        }
    }
    public function organisations()//all adverts linked to organisation
    {
        $adverts = Advert::with('user', 'organisation')
                    // ->where('abouts.organisation_id', $organisation->id)
                    ->get();
        // dd($about);
        return response()-> json([
        'adverts' => $adverts,
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
        // return $request;
        $this->validate($request,[
            'title' => 'required|min:2',
            'subtitle' => 'required|min:2',
            'details' => 'required',
            // 'organisation_id' => 'required',
            // 'bureau_id' => 'required',
        ]);

        $advert = new Advert();
        $advert->title = $request ->title;
        $advert->subtitle = $request ->subtitle;
        $advert->details = $request ->details;


        //getting Organisation $user
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                 //then
                 $user = Auth::user();
                 $advert->organisation_id = $organisation ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->organisation_id = $organisation ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->organisation_id = $organisation ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                //then
                $user = Auth::user();
                $advert->organisation_id = $organisation ->id;
                $advert->user_id = $user ->id;
            }
            //bureau
            if (auth()->user()->hasRole('Bureau Director')) {
                $bureau= Auth::user()-> bureaudirectors()->first();
                 //then
                 $user = Auth::user();
                 $advert->bureau_id = $bureau ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Superadmin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->bureau_id = $bureau ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Admin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->bureau_id = $bureau ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Accountant')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                //then
                $user = Auth::user();
                $advert->bureau_id = $bureau ->id;
                $advert->user_id = $user ->id;
            }
        }

        $strpos = strpos($request->advert_image, ';'); //positionof image name semicolon
        $sub = substr($request->advert_image, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;

        $Path = public_path()."/assets/organisation/img/website/adverts";
            $img = Image::make($request->advert_image);
//            $img->crop(300, 150, 25, 25);
            $img ->save($Path.'/'.$name);
        $advert->advert_image = $name;
        //end processing photo and size
        $advert->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleadvert = Advert::find($id);
        // dd($organisation);
        return response()-> json([
            'singleadvert' => $singleadvert,
        ], 200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::find($id);
        // dd($organisation);
        return response()-> json([
            'advert' => $advert,
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
        $advert = Advert::findOrFail($id);
        $this->validate($request,[
            'title' => 'required|min:2',
            'subtitle' => 'required|min:2',
            'details' => 'required',
        ]);

        $advert->title = $request ->title;
        $advert->subtitle = $request ->subtitle;
        $advert->details = $request ->details;
        //getting Organisation $user, about_id
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                 //then
                 $user = Auth::user();
                 $advert->organisation_id = $organisation ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->organisation_id = $organisation ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->organisation_id = $organisation ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                //then
                $user = Auth::user();
                $advert->organisation_id = $organisation ->id;
                $advert->user_id = $user ->id;
            }
            //bureau
            if (auth()->user()->hasRole('Bureau Director')) {
                $bureau= Auth::user()-> bureaudirectors()->first();
                 //then
                 $user = Auth::user();
                 $advert->bureau_id = $bureau ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Superadmin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->bureau_id = $bureau ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Admin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $advert->bureau_id = $bureau ->id;
                 $advert->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Accountant')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                //then
                $user = Auth::user();
                $advert->bureau_id = $bureau ->id;
                $advert->user_id = $user ->id;
            }
        }
        $currentadvert_image =  $advert->advert_image;

         //processing advert_image nme and size
        if($request->advert_image != $currentadvert_image){
            $Path = public_path()."/assets/organisation/img/website/adverts";

            $currentAdvert_image = $Path. $currentadvert_image;
            //deleting if exists
                if(file_exists($currentAdvert_image)){
                    @unlink($currentAdvert_image);
                }
                $strpos = strpos($request->advert_image, ';'); //positionof image name semicolon
                $sub = substr($request->advert_image, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name = time().".".$ex;

                $img = Image::make($request->advert_image);
                $img ->save($Path.'/'.$name);

        }else{
            $name = $advert->advert_image;
        }
        $advert->advert_image = $name;
        $advert->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advert::findOrFail($id);
        //image inline with this organisation
        $Path = public_path()."/assets/organisation/img/website/adverts";

        $Advert_image = $Path. $advert->advert_image;

        if(file_exists($Advert_image)){
            @unlink($Advert_image);
        }
        $advert->delete();
    }
}
