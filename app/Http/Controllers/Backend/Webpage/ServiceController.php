<?php

namespace App\Http\Controllers\Backend\Webpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Standard\Webservices\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $organisation= (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());

        // $about = $organisation->about()->get();
        $service = Service::with('user', 'organisation')
                        ->where('services.organisation_id', $organisation->id)
                        ->get();
            return response()-> json([
                            'service' => $service,
                            ], 200);
    }
    public function organisations()//all services linked to organisation
    {
        $services = Service::with('user', 'organisation')
                    // ->where('abouts.organisation_id', $organisation->id)
                    ->get();
        // dd($about);
        return response()-> json([
        'services' => $services,
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
            'service_title' => 'required|min:2',
            'service_details' => 'required',
            // 'organisation_id' => 'required',
            // 'bureau_id' => 'required',
        ]);

        $service = new Service();
        $service->title = $request ->title;
        $service->service_title = $request ->service_title;
        $service->service_details = $request ->service_details;

        //getting Organisation $user
        $user = Auth::user();
        $organisation= (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());

        $service->organisation_id = $organisation ->id;
        $service->user_id = $user ->id;
        //bureau
        // $burueau= (Auth::user()-> bureauemployee()->first()->bureau()->first());
        // $service->bureau_id = $bureau ->id;
        // $service->user_id = $user ->id;
        //processing photo nme and size

        $strpos = strpos($request->service_image, ';'); //positionof image name semicolon
        $sub = substr($request->service_image, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time().".".$ex;

        $Path = public_path()."/assets/organisation/img/website/services";
            $img = Image::make($request->service_image);
//            $img->crop(300, 150, 25, 25);
            $img ->save($Path.'/'.$name);
        $service->service_image = $name;
        //end processing photo and size
        $service->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organisation= (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $singleservice = Service::with('user', 'organisation')
                                ->where('services.organisation_id', $organisation->id)
                                ->find($id);
        // dd($organisation);
        return response()-> json([
            'singleservice' => $singleservice,
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
        $organisation= (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());
        $service = Service::with('user', 'organisation')
                                ->where('services.organisation_id', $organisation->id)
                                ->find($id);
        // dd($organisation);
        return response()-> json([
            'service' => $service,
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
        $service = Service::findOrFail($id);
        $this->validate($request,[
            'title' => 'required|min:2',
            'service_title' => 'required|min:2',
            'service_details' => 'required',
        ]);

        $service->title = $request ->title;
        $service->service_title = $request ->service_title;
        $service->service_details = $request ->service_details;
        //getting Organisation $user, about_id
        $user = Auth::user();
        $organisation= (Auth::user()-> organisationemployeeusers()->first()->organisation()->first());

        $service->organisation_id = $organisation ->id;
        $service->user_id = $user ->id;

        $currentservice_image =  $service->service_image;

         //processing service_image nme and size
        if($request->service_image != $currentservice_image){
            $Path = public_path()."/assets/organisation/img/website/services";

            $currentService_image = $Path. $currentservice_image;
            //deleting if exists
                if(file_exists($currentService_image)){
                    @unlink($currentService_image);
                }
                $strpos = strpos($request->service_image, ';'); //positionof image name semicolon
                $sub = substr($request->service_image, 0, $strpos);
                $ex = explode('/', $sub)[1];
                $name = time().".".$ex;

                $img = Image::make($request->service_image);
                $img ->save($Path.'/'.$name);

        }else{
            $name = $service->service_image;
        }
        $service->service_image = $name;
        $service->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        //image inline with this organisation
        $Path = public_path()."/assets/organisation/img/website/services";

        $Service_image = $Path. $service->service_image;

        if(file_exists($Service_image)){
            @unlink($Service_image);
        }
        $service->delete();
    }


}
