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
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                $service = $organisation->services()->first();
                if($service ==null){
                    // $about = $organisation->about()->get();
                    $servicefilter = ServiceFilter::with('user', 'service')
                    ->where('service_id', $service)
                    ->get();
                    return response()-> json([
                        'servicefilter' => $servicefilter,
                    ], 200);
                }else{
                        $servicefilter =  Servicefilter::with('user','service')
                        ->where('service_id', $service->id)
                        ->get();
                        return response()-> json([
                            'servicefilter' => $servicefilter,
                        ], 200);
                }
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->services()->first();
                if($service ==null){
                    // $about = $organisation->about()->get();
                    $servicefilter = ServiceFilter::with('user', 'service')
                    ->where('service_id', $service)
                    ->get();
                    return response()-> json([
                        'servicefilter' => $servicefilter,
                    ], 200);
                }else{
                        $servicefilter =  Servicefilter::with('user','service')
                        ->where('service_id', $service->id)
                        ->get();
                        return response()-> json([
                            'servicefilter' => $servicefilter,
                        ], 200);
                }
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->services()->first();
                if($service ==null){
                    // $about = $organisation->about()->get();
                    $servicefilter = ServiceFilter::with('user', 'service')
                    ->where('service_id', $service)
                    ->get();
                    return response()-> json([
                        'servicefilter' => $servicefilter,
                    ], 200);
                }else{
                        $servicefilter =  Servicefilter::with('user','service')
                        ->where('service_id', $service->id)
                        ->get();
                        return response()-> json([
                            'servicefilter' => $servicefilter,
                        ], 200);
                }
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->services()->first();
                if($service ==null){
                    // $about = $organisation->about()->get();
                    $servicefilter = ServiceFilter::with('user', 'service')
                    ->where('service_id', $service)
                    ->get();
                    return response()-> json([
                        'servicefilter' => $servicefilter,
                    ], 200);
                }else{
                        $servicefilter =  Servicefilter::with('user','service')
                        ->where('service_id', $service->id)
                        ->get();
                        return response()-> json([
                            'servicefilter' => $servicefilter,
                        ], 200);
               }
            }
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
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                $service = $organisation->service()->first();
                 //then
                 $user = Auth::user();
                 $servicefilter->service_id = $service ->id;
                 $servicefilter->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->service()->first();
                 //then
                 $user = Auth::user();
                 $servicefilter->service_id = $service ->id;
                 $servicefilter->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->service()->first();
                 //then
                 $user = Auth::user();
                 $servicefilter->service_id = $service ->id;
                 $servicefilter->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->service()->first();
                //then
                $user = Auth::user();
                $servicefilter->service_id = $service ->id;
                $servicefilter->user_id = $user ->id;
            }
        }
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

        $singleservicefilter = ServiceFilter::find($id);
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

        $servicefilter = ServiceFilter::find($id);
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
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $organisation= Auth::user()-> organisationdirectors()->first();
                $service = $organisation->service()->first();
                 //then
                 $user = Auth::user();
                 $servicefilter->service_id = $service ->id;
                 $servicefilter->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Superadmin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->service()->first();
                 //then
                 $user = Auth::user();
                 $servicefilter->service_id = $service ->id;
                 $servicefilter->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Admin')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->service()->first();
                 //then
                 $user = Auth::user();
                 $servicefilter->service_id = $service ->id;
                 $servicefilter->user_id = $user ->id;
            }
            if (auth()->user()->hasRole('Organisation Accountant')) {
                $organisation= Auth::user()-> organisationemployees()->first();
                $service = $organisation->service()->first();
                //then
                $user = Auth::user();
                $servicefilter->service_id = $service ->id;
                $servicefilter->user_id = $user ->id;
            }
        }
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
