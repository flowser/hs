<?php

namespace App\Http\Controllers\Backend\Webpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Standard\Webservices\ExtraService;
use App\Models\Standard\Webservices\ServiceFilter;

class ExtraServiceController extends Controller
{
    public function index()
    {
        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        // return $service;
        if($service == null){
            $extraservice = ExtraService::with('user', 'service')
                        ->where('extra_services.service_id', $service)
                        ->get();
            return response()-> json([
                            'extraservice' => $extraservice,
                            ], 200);

        }else{
            // $about = $organisation->about()->get();
            $extraservice = ExtraService::with('user', 'service')
                        ->where('extra_services.service_id', $service->id)
                        ->get();
            return response()-> json([
                        'extraservice' => $extraservice,
                        ], 200);
        }

    }
    public function organisations()//all extraservices linked to organisation
    {
        $extraservices = ExtraService::with('user', 'service')
                    // ->where('abouts.service_id', $organisation->id)
                    ->get();
        // dd($about);
        return response()-> json([
        'extraservices' => $extraservices,
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
            'title' => 'required|min:2',
            'details' => 'required|min:2',
            'why' => 'required',
        ]);

        $extraservice = new ExtraService();
        $extraservice->title = $request ->title;
        $extraservice->details = $request ->details;
        $extraservice->why = $request ->why;

        //getting Organisation $user
        $user = Auth::user();

        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        $extraservice->service_id = $service ->id;
        $extraservice->user_id = $user ->id;
        //bureau
        // $burueau= (Auth::user()-> bureauemployee()->first()->bureau()->first());
        // $extraservice->bureau_id = $bureau ->id;
        // $extraservice->user_id = $user ->id;
        //processing photo nme and size

//         $strpos = strpos($request->extraservice_image, ';'); //positionof image name semicolon
//         $sub = substr($request->extraservice_image, 0, $strpos);
//         $ex = explode('/', $sub)[1];
//         $name = time().".".$ex;

//         $Path = public_path()."/assets/organisation/img/website/services/extraservices";
//             $img = Image::make($request->extraservice_image);
// //            $img->crop(300, 150, 25, 25);
//             $img ->save($Path.'/'.$name);
//         $extraservice->extraservice_image = $name;
        //end processing photo and size
        $extraservice->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        $singleextraservice = ExtraService::with('user', 'service')
                                ->where('extra_services.service_id', $service->id)
                                ->find($id);
        // dd($organisation);
        return response()-> json([
            'singleextraservice' => $singleextraservice,
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
        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        $extraservice = ExtraService::with('user', 'service')
                                ->where('extra_services.service_id', $service->id)
                                ->find($id);
        // dd($organisation);
        return response()-> json([
            'extraservice' => $extraservice,
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
        $extraservice = ExtraService::findOrFail($id);
        $this->validate($request,[
            'title' => 'required|min:2',
            'details' => 'required|min:2',
            'why' => 'required',
        ]);

        $extraservice->title = $request ->title;
        $extraservice->details = $request ->details;
        $extraservice->why = $request ->why;
        //getting Organisation $user, about_id
        $user = Auth::user();
        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        $extraservice->service_id = $service ->id;
        $extraservice->user_id = $user ->id;

        // $currentextraservice_image =  $extraservice->extraservice_image;

        //  //processing extraservice_image nme and size
        // if($request->extraservice_image != $currentextraservice_image){
        //     $Path = public_path()."/assets/organisation/img/website/services/extraservices";

        //     $currentExtraservice_image = $Path. $currentextraservice_image;
        //     //deleting if exists
        //         if(file_exists($currentExtraservice_image)){
        //             @unlink($currentExtraservice_image);
        //         }
        //         $strpos = strpos($request->extraservice_image, ';'); //positionof image name semicolon
        //         $sub = substr($request->extraservice_image, 0, $strpos);
        //         $ex = explode('/', $sub)[1];
        //         $name = time().".".$ex;

        //         $img = Image::make($request->extraservice_image);
        //         $img ->save($Path.'/'.$name);

        // }else{
        //     $name = $extraservice->extraservice_image;
        // }
        // $extraservice->extraservice_image = $name;
        $extraservice->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extraservice = ExtraService::findOrFail($id);
        //image inline with this organisation
        // $Path = public_path()."/assets/organisation/img/website/services/extraservices";

        // $Extraservice_image = $Path. $extraservice->extraservice_image;

        // if(file_exists($Extraservice_image)){
        //     @unlink($Extraservice_image);
        // }
        $extraservice->delete();
    }






}
