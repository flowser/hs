<?php

namespace App\Http\Controllers\Backend\Webpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Standard\Webservices\AboutPic;


class AboutPicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                $about = $organisation->about()->first();
                $aboutpic =  AboutPic::with('user','about')
                ->where('about_id', $about->id)
                ->get();
                return response()-> json([
                    'aboutpic' => $aboutpic,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                $aboutpic =  AboutPic::with('user','about')
                ->where('about_id', $about->id)
                ->get();
                return response()-> json([
                    'aboutpic' => $aboutpic,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                $aboutpic =  AboutPic::with('user','about')
                ->where('about_id', $about->id)
                ->get();
                return response()-> json([
                    'aboutpic' => $aboutpic,
                ], 200);
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                $aboutpic =  AboutPic::with('user','about')
                ->where('about_id', $about->id)
                ->get();
                return response()-> json([
                    'aboutpic' => $aboutpic,
                ], 200);
            }
        }
    }

    public function aboutpics()
    {

        $aboutpics = AboutPic::with('user', 'about')
                        ->get();
        // dd($about);
        return response()-> json([
        'aboutpics' => $aboutpics,
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $aboutpic = new AboutPic();
        //getting Organisation $user, about_id
        $aboutpic->title = $request ->title;
        $aboutpic->description = $request ->description;

        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                $about = $organisation->about()->first();
                 //then
                 $user = Auth::user();
                 $aboutpic->about_id = $about ->id;
                 $aboutpic->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                 //then
                 $user = Auth::user();
                 $aboutpic->about_id = $about ->id;
                 $aboutpic->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                 //then
                 $user = Auth::user();
                 $aboutpic->about_id = $about ->id;
                 $aboutpic->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                //then
                $user = Auth::user();
                $aboutpic->about_id = $about ->id;
                $aboutpic->user_id = $user ->id;
            }
        }

        $strpos = strpos($request->image, ';'); //positionof image name semicolon
        $sub = substr($request->image, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;

        $Path = public_path()."/assets/organisation/img/website/aboutpics";
            $img = Image::make($request->image);
            $img ->save($Path.'/'.$name);
        $aboutpic->image = $name;
        //end processing photo

        $aboutpic->save();
        // return $aboutpic;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleaboutpic = AboutPic::with('user','about')
                                    ->find($id);
        // dd($organisation);
        return response()-> json([
            'singleaboutpic' => $singleaboutpic,
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
        $aboutpic = AboutPic::with('about')
                                    ->find($id);
        // dd($organisation);
        return response()-> json([
            'aboutpic' => $aboutpic,
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

        $aboutpic = AboutPic::findOrFail($id);
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);

        $aboutpic->title = $request ->title;
        $aboutpic->description = $request ->description;
        //getting Organisation $user, about_id
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                $about = $organisation->about()->first();
                 //then
                 $user = Auth::user();
                 $aboutpic->about_id = $about ->id;
                 $aboutpic->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                 //then
                 $user = Auth::user();
                 $aboutpic->about_id = $about ->id;
                 $aboutpic->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                 //then
                 $user = Auth::user();
                 $aboutpic->about_id = $about ->id;
                 $aboutpic->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $about = $organisation->about()->first();
                //then
                $user = Auth::user();
                $aboutpic->about_id = $about ->id;
                $aboutpic->user_id = $user ->id;
            }
        }

        $currentimage =  $aboutpic->image;

         //processing logo nme and size
        if($request->image != $currentimage){
            $Path = public_path()."/assets/organisation/img/website/aboutpics";

            $S_currentimage = $Path. $currentimage;
            //deleting if exists
                if(file_exists($S_currentimage)){
                    @unlink($S_currentimage);
                }
                $strpos = strpos($request->image, ';'); //positionof image name semicolon
                $sub = substr($request->image, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name = time().".".$ex;

                $img = Image::make($request->image);
                $img ->save($Path.'/'.$name);

        }else{
            $name = $aboutpic->image;
        }
        $aboutpic->image = $name;
        $aboutpic->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutpic = AboutPic::findOrFail($id);
        //image inline with this organisation
        $Path = public_path()."/assets/organisation/img/website/aboutpics";

        $S_image = $Path. $aboutpic->logo;

        if(file_exists($S_image)){
            @unlink($S_image);
        }
        $aboutpic->delete();
    }
}
