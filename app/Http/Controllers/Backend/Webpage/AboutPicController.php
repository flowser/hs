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
        //
    }
    public function organisations()
    {
        //
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
            // 'about_image1' => 'required',
            // 'about_image2' => 'required',
            // 'about_image3' => 'required',
            // 'about_image4' => 'required',
            'about_image5' => 'required',
            'about_image6' => 'required',
        ]);

        $aboutpic = new AboutPic();
        //getting Organisation $user, about_id
        $user = Auth::user();
        $organisation= (Auth::user()-> organisationemployee()->first()->organisation()->first());
        $about_id = $organisation->about()->first();

        $aboutpic->about_id = $about_id ->id;
        $aboutpic->user_id = $user ->id;

        //image 1
//         $strpos1 = strpos($request->about_image1, ';'); //positionof image name semicolon
//         $sub1 = substr($request->about_image1, 0, $strpos1);
//         $ex1 = explode('/', $sub1)[1];
//         $name1 = time().".".$ex1;

//         $S_Path1 = public_path()."/assets/organisation/img/website/aboutpics/small";
//         $M_Path1 = public_path()."/assets/organisation/img/website/aboutpics/medium";
//         $L_Path1 = public_path()."/assets/organisation/img/website/aboutpics/large";
//             $img1 = Image::make($request->about_image1);
// //            $img->crop(300, 150, 25, 25);
//             $img1 ->resize(100, 100)->save($S_Path1.'/'.$name1);
//             $img1 ->resize(250, 250)->save($M_Path1.'/'.$name1);
//             $img1 ->resize(500, 500)->save($L_Path1.'/'.$name1);

//         // return $r;
//         //end processing photo and size

//         //image 2
//         $strpos2 = strpos($request->about_image2, ';'); //positionof image name semicolon
//         $sub2 = substr($request->about_image2, 0, $strpos2);
//         $ex2 = explode('/', $sub2)[1];
//         $name2 = time().".".$ex2;

//         $S_Path2 = public_path()."/assets/organisation/img/website/aboutpics/small";
//         $M_Path2 = public_path()."/assets/organisation/img/website/aboutpics/medium";
//         $L_Path2 = public_path()."/assets/organisation/img/website/aboutpics/large";
//             $img2 = Image::make($request->about_image2);
// //            $img->crop(300, 150, 25, 25);
//             $img2 ->resize(100, 100)->save($S_Path2.'/'.$name2);
//             $img2 ->resize(250, 250)->save($M_Path2.'/'.$name2);
//             $img2 ->resize(500, 500)->save($L_Path2.'/'.$name2);


//         //end processing photo and size

//         //image 3
//         $strpos3 = strpos($request->about_image3, ';'); //positionof image name semicolon
//         $sub3 = substr($request->about_image3, 0, $strpos3);
//         $ex3 = explode('/', $sub3)[1];
//         $name3 = time().".".$ex3;

//         $S_Path3 = public_path()."/assets/organisation/img/website/aboutpics/small";
//         $M_Path3 = public_path()."/assets/organisation/img/website/aboutpics/medium";
//         $L_Path3 = public_path()."/assets/organisation/img/website/aboutpics/large";
//             $img3 = Image::make($request->about_image3);
// //            $img->crop(300, 150, 25, 25);
//             $img3 ->resize(100, 100)->save($S_Path3.'/'.$name3);
//             $img3 ->resize(250, 250)->save($M_Path3.'/'.$name3);
//             $img3 ->resize(500, 500)->save($L_Path3.'/'.$name3);
//         // $aboutpic->about_image3 = $name3;
//         //end processing photo and size

//         //image 4
//         $strpos4 = strpos($request->about_image4, ';'); //positionof image name semicolon
//         $sub4 = substr($request->about_image4, 0, $strpos4);
//         $ex4 = explode('/', $sub4)[1];
//         $name4 = time().".".$ex4;

//         $S_Path4 = public_path()."/assets/organisation/img/website/aboutpics/small";
//         $M_Path4 = public_path()."/assets/organisation/img/website/aboutpics/medium";
//         $L_Path4 = public_path()."/assets/organisation/img/website/aboutpics/large";
//             $img4 = Image::make($request->about_image4);
// //            $img->crop(300, 150, 25, 25);
//             $img4 ->resize(100, 100)->save($S_Path4.'/'.$name4);
//             $img4 ->resize(250, 250)->save($M_Path4.'/'.$name4);
//             $img4 ->resize(500, 500)->save($L_Path4.'/'.$name4);
//         // $aboutpic->about_image4 = $name;
//         //end processing photo and size

//         //image 5
        $strpos5 = strpos($request->about_image5, ';'); //positionof image name semicolon
        $sub5 = substr($request->about_image5, 0, $strpos5);
        $ex5 = explode('/', $sub5)[1];
        $name5 = time().".".$ex5;

        $S_Path5 = public_path()."/assets/organisation/img/website/aboutpics/small";
        $M_Path5 = public_path()."/assets/organisation/img/website/aboutpics/medium";
        $L_Path5 = public_path()."/assets/organisation/img/website/aboutpics/large";
            $img5 = Image::make($request->about_image5);
//            $img->crop(300, 150, 25, 25);
            $img5 ->resize(100, 100)->save($S_Path5.'/'.$name5);
            $img5 ->resize(250, 250)->save($M_Path5.'/'.$name5);
            $img5 ->resize(500, 500)->save($L_Path5.'/'.$name5);
        // $aboutpic->about_image5 = $name5;
        //end processing photo and size

        //image 6
        $strpos6 = strpos($request->about_image6, ';'); //positionof image name semicolon
        $sub6 = substr($request->about_image6, 0, $strpos6);
        $ex6 = explode('/', $sub6)[1];
        $name6 = time().".".$ex6;

        $S_Path6 = public_path()."/assets/organisation/img/website/aboutpics/small";
        $M_Path6 = public_path()."/assets/organisation/img/website/aboutpics/medium";
        $L_Path6 = public_path()."/assets/organisation/img/website/aboutpics/large";
            $img6 = Image::make($request->about_image6);
//            $img->crop(300, 150, 25, 25);
            $img6 ->resize(100, 100)->save($S_Path6.'/'.$name6);
            $img6 ->resize(250, 250)->save($M_Path6.'/'.$name6);
            $img6 ->resize(500, 500)->save($L_Path6.'/'.$name6);

        //end processing photo and size

        $aboutpic->about_image6 = $name6;
        $aboutpic->about_image5 = $name5;
        // $aboutpic->about_image4 = $name4;
        // $aboutpic->about_image4 = $name3;
        // $aboutpic->about_image2 = $name2;
        // $aboutpic->about_image1 = $name1;
        $aboutpic->save();
        return $aboutpic;
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
