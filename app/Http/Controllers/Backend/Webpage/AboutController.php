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

        // $organisation= (Auth::user()-> organisationemployee()->first()->organisation()->first());

        // $about = $organisation->about()->get();
        $about = About::with('user', 'aboutpics', 'organisation')
                        ->where('abouts.user_id', Auth::user()->id)
                        ->get();
        // dd($about);
        return response()-> json([
        'about' => $about,
        ], 200);
    }

    public function abouts()
    {

        $about = About::with('about', 'aboutpics')
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
        $user = Auth::user();
        $organisation= (Auth::user()-> organisationemployee()->first()->organisation()->first());

        $about->organisation_id = $organisation ->id;
        $about->user_id = $user ->id;
        //bureau
        // $burueau= (Auth::user()-> bureauemployee()->first()->bureau()->first());
        // $about->bureau_id = $bureau ->id;
        // $about->user_id = $user ->id;
        //processing photo nme and size

        $strpos = strpos($request->front_image, ';'); //positionof image name semicolon
        $sub = substr($request->front_image, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;

        $file = $request->file('front_image');
        $S_Path = public_path()."/assets/organisation/img/website/frontimage/small";
        $M_Path = public_path()."/assets/organisation/img/website/frontimage/medium";
        $L_Path = public_path()."/assets/organisation/img/website/frontimage/large";
            $img = Image::make($request->front_image);
//            $img->crop(300, 150, 25, 25);
            $img ->resize(100, 100)->save($S_Path.'/'.$name);
            $img ->resize(250, 250)->save($M_Path.'/'.$name);
            $img ->resize(500, 500)->save($L_Path.'/'.$name);
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
