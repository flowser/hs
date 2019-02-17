<?php

namespace App\Http\Controllers\Backend\Webpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Standard\Webservices\ServiceFilter;

class ServiceFilterController extends Controller
{
    public function index()
    {
        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        if($service ==null){
             // $about = $organisation->about()->get();
            $servicefilter = ServiceFilter::with('user', 'service')
                        ->where('service_filters.service_id', $service)
                        ->get();
                return response()-> json([
                            'servicefilter' => $servicefilter,
                            ], 200);
        }else{
       // $about = $organisation->about()->get();
            $servicefilter = ServiceFilter::with('user', 'service')
                        ->where('service_filters.service_id', $service->id)
                        ->get();
                return response()-> json([
                            'servicefilter' => $servicefilter,
                            ], 200);
        }
    }
    public function organisations()//all servicefilters linked to organisation
    {
        $servicefilters = ServiceFilter::with('user', 'service')
                    // ->where('abouts.filter_id', $organisation->id)
                    ->get();
        // dd($about);
        return response()-> json([
        'servicefilters' => $servicefilters,
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

        $servicefilter = new ServiceFilter();
        $servicefilter->title = $request ->title;
        $servicefilter->details = $request ->details;
        $servicefilter->why = $request ->why;

        //getting Organisation $user
        $user = Auth::user();

        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        $servicefilter->service_id = $service->id;
        $servicefilter->user_id = $user ->id;
        //bureau
        // $burueau= (Auth::user()-> bureauemployee()->first()->bureau()->first());
        // $servicefilter->bureau_id = $bureau ->id;
        // $servicefilter->user_id = $user ->id;
        //processing photo nme and size

//         $strpos = strpos($request->servicefilter_image, ';'); //positionof image name semicolon
//         $sub = substr($request->servicefilter_image, 0, $strpos);
//         $ex = explode('/', $sub)[1];
//         $name = time().".".$ex;

//         $Path = public_path()."/assets/organisation/img/website/filters/servicefilters";
//             $img = Image::make($request->servicefilter_image);
// //            $img->crop(300, 150, 25, 25);
//             $img ->save($Path.'/'.$name);
//         $servicefilter->servicefilter_image = $name;
        //end processing photo and size
        $servicefilter->save();

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

        $singleservicefilter = ServiceFilter::with('user', 'service')
                                ->where('service_filters.service_id', $service->id)
                                ->find($id);
        // dd($organisation);
        return response()-> json([
            'singleservicefilter' => $singleservicefilter,
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

        $servicefilter = ServiceFilter::with('user', 'service')
                                ->where('service_filters.service_id', $service->id)
                                ->find($id);
        // dd($organisation);
        return response()-> json([
            'servicefilter' => $servicefilter,
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
        $servicefilter = ServiceFilter::findOrFail($id);
        $this->validate($request,[
            'title' => 'required|min:2',
            'details' => 'required|min:2',
            'why' => 'required',
        ]);

        $servicefilter->title = $request ->title;
        $servicefilter->details = $request ->details;
        $servicefilter->why = $request ->why;
        //getting Organisation $user, about_id
        $user = Auth::user();
        $organisation = (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = $organisation->services()->first();

        $servicefilter->service_id = $service->id;
        $servicefilter->user_id = $user ->id;

        // $currentservicefilter_image =  $servicefilter->servicefilter_image;

        //  //processing servicefilter_image nme and size
        // if($request->servicefilter_image != $currentservicefilter_image){
        //     $Path = public_path()."/assets/organisation/img/website/filters/servicefilters";

        //     $currentServicefilter_image = $Path. $currentservicefilter_image;
        //     //deleting if exists
        //         if(file_exists($currentServicefilter_image)){
        //             @unlink($currentServicefilter_image);
        //         }
        //         $strpos = strpos($request->servicefilter_image, ';'); //positionof image name semicolon
        //         $sub = substr($request->servicefilter_image, 0, $strpos);
        //         $ex = explode('/', $sub)[1];
        //         $name = time().".".$ex;

        //         $img = Image::make($request->servicefilter_image);
        //         $img ->save($Path.'/'.$name);

        // }else{
        //     $name = $servicefilter->servicefilter_image;
        // }
        // $servicefilter->servicefilter_image = $name;
        $servicefilter->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicefilter = ServiceFilter::findOrFail($id);
        //image inline with this organisation
        // $Path = public_path()."/assets/organisation/img/website/filters/servicefilters";

        // $Servicefilter_image = $Path. $servicefilter->servicefilter_image;

        // if(file_exists($Servicefilter_image)){
        //     @unlink($Servicefilter_image);
        // }
        $servicefilter->delete();
    }


}
