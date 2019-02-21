<?php

namespace App\Http\Controllers\Backend\Webpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Standard\Webservices\About;





class AboutController extends Controller
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
                $about = About::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = About::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = About::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = About::with('user', 'organisation')
                ->where('organisation_id', $organisation->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
            //bureau
            if (auth()->user()->hasRole('Bureau Director')) {
                $bureau= Auth::user()-> bureaudirectors()->first();
                $about = About::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
            if (auth()->user()->hasRole('Bureau Superadmin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                $about = About::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
            if (auth()->user()->hasRole('Bureau Admin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                $about = About::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
            if (auth()->user()->hasRole('Bureau Accountant')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                $about = About::with('user', 'bureau')
                ->where('bureau_id', $bureau->id)
                ->get();
                return response()-> json([
                    'about' => $about,
                ], 200);
            }
        }
    }

    public function abouts()
    {

        $abouts = About::with('about', 'aboutpics')
                        ->get();
        // dd($about);
        return response()-> json([
        'abouts' => $abouts,
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
            'why_choose_us' => 'required',
            'who_we_are' => 'required',
            'what_we_do' => 'required',
            // 'organisation_id' => 'required',
            // 'bureau_id' => 'required',
        ]);

        $about = new About();
        $about->title = $request ->title;
        $about->subtitle = $request ->subtitle;
        $about->why_choose_us = $request ->why_choose_us;
        $about->who_we_are = $request ->who_we_are;
        $about->what_we_do = $request ->what_we_do;

        //getting Organisation $user
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                 //then
                 $user = Auth::user();
                 $about->organisation_id = $organisation ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->organisation_id = $organisation ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->organisation_id = $organisation ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                //then
                $user = Auth::user();
                $about->organisation_id = $organisation ->id;
                $about->user_id = $user ->id;
            }
            //bureau
            if (auth()->user()->hasRole('Bureau Director')) {
                $bureau= Auth::user()-> bureaudirectors()->first();
                 //then
                 $user = Auth::user();
                 $about->bureau_id = $bureau ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Superadmin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->bureau_id = $bureau ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Admin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->bureau_id = $bureau ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Accountant')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                //then
                $user = Auth::user();
                $about->bureau_id = $bureau ->id;
                $about->user_id = $user ->id;
            }
        }

        $strpos = strpos($request->front_image, ';'); //positionof image name semicolon
        $sub = substr($request->front_image, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;

        $Path = public_path()."/assets/organisation/img/website/frontimage";
            $img = Image::make($request->front_image);
//            $img->crop(300, 150, 25, 25);
            $img ->save($Path.'/'.$name);
        $about->front_image = $name;
        //end processing photo and size
        $about->save();
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
        // $orgemployee= Auth::user()-> organisationemployeeusers()->first()->organisation()->first();
        // return $organisation;

        $about = About::with('organisation')
                                    ->find($id);
        // dd($organisation);
        return response()-> json([
            'about' => $about,
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
        // return $id;
        $about = About::findOrFail($id);
        $this->validate($request,[
            'title' => 'required|min:2',
            'subtitle' => 'required|min:2',
            'why_choose_us' => 'required',
            'who_we_are' => 'required',
            'what_we_do' => 'required',
            // 'organisation_id' => 'required',
            // 'bureau_id' => 'required',
        ]);

        $about->title = $request ->title;
        $about->subtitle = $request ->subtitle;
        $about->why_choose_us = $request ->why_choose_us;
        $about->who_we_are = $request ->who_we_are;
        $about->what_we_do = $request ->what_we_do;

        //getting Organisation $user
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                 //then
                 $user = Auth::user();
                 $about->organisation_id = $organisation ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->organisation_id = $organisation ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->organisation_id = $organisation ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                //then
                $user = Auth::user();
                $about->organisation_id = $organisation ->id;
                $about->user_id = $user ->id;
            }
            //bureau
            if (auth()->user()->hasRole('Bureau Director')) {
                $bureau= Auth::user()-> bureaudirectors()->first();
                 //then
                 $user = Auth::user();
                 $about->bureau_id = $bureau ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Superadmin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->bureau_id = $bureau ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Admin')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                 //then
                 $user = Auth::user();
                 $about->bureau_id = $bureau ->id;
                 $about->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Bureau Accountant')) {
                $bureau= Auth::user()-> bureauemployees()->first();
                //then
                $user = Auth::user();
                $about->bureau_id = $bureau ->id;
                $about->user_id = $user ->id;
            }
        }
        // $about->logo = $request ->logo;
        //getting previous logo
        $currentFront_image =  $about->front_image;

         //processing logo nme and size
        if($request->front_image != $currentFront_image){
            $Path = public_path()."/assets/organisation/img/website/frontimage";

            $S_currentFront_image = $Path. $currentFront_image;
            //deleting if exists
                if(file_exists($S_currentFront_image)){
                    @unlink($S_currentFront_image);
                }

                $strpos = strpos($request->front_image, ';'); //positionof image name semicolon
                $sub = substr($request->front_image, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name = time().".".$ex;

                $img = Image::make($request->front_image);
                $img ->save($Path.'/'.$name);

        }else{
            $name = $about->front_image;
        }
        $about->front_image = $name;
        $about->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        //image inline with this organisation
        $Path = public_path()."/assets/organisation/img/website/frontimage";

        $S_image = $Path. $about->logo;

        if(file_exists($S_image)){
            @unlink($S_image);
        }
        $about->delete();
    }
}
