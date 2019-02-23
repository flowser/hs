<template>
  <div class="container-fluid mt-5">
      <!-- Main content -->
        <div class="col-md-12">
                <!-- Widget: user widget style 1 -->
                <!-- <div v-if="Bureau.length <1" class="card-tools"> -->
                <!-- <div  class="card-tools"> -->
                    <!-- <button class="btn btn-success" @click.prevent="newBureauModal()" >Add Bureau -->
                        <!-- <i class="fas fa-plus fw"></i> -->
                    <!-- </button> -->
                <!-- </div> -->
                <div class="card card-widget widget-user" >
                   <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white" style="background: url('assets/bureau/img/background/background-1.jpg')
                    center center;width:100%;height:300px">
                    <div class="clearfix">
                                <span class="float-left">
                                    <h3 class="widget-user-username">{{Bureau.name}}</h3>
                                    <h5 class="widget-user-desc bg-green" style="margin-bottom:0">Phone: {{Bureau.phone}}, <span>{{Bureau.landline}}</span> </h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0">P.O. Box {{Bureau.address}},</h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0" v-if="Bureau.ward">{{Bureau.ward.name}} Ward,
                                        <span v-if="Bureau.constituency">{{Bureau.constituency.name}} Constituency,</span>
                                    </h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0" v-if="Bureau.county">{{Bureau.county.name}} County,
                                         <span v-if="Bureau.country"> {{Bureau.country.name}}</span>
                                    </h5>
                                </span>
                                <span class="float-right">
                                    <h5 class="widget-user-desc" style="margin-bottom:0">{{Bureau.email}}</h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0">{{Bureau.website}}</h5>
                                    <!-- <p style="margin-bottom:-0.5em">
                                        <small class="text-muted">Updated By: {{bureau.user.full_name}}</small>
                                    </p> -->
                                    <p style="margin-bottom:0.25em">
                                        <small class="text-muted">Last updated On: {{Bureau.updated_at | dateformat}}</small>
                                    </p>
                                    <a href=""  @click.prevent="editBureauModal(Bureau.id)">
                                            <i class="fa fa-edit red"> Edit</i>
                                    </a>
                                    /
                                    <a href=""  @click.prevent="deleteBureau(Bureau.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="card-footer" style="padding-top:0px; margin-top: 60px;">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">3,200</h5>
                                            <span class="description-header green " >Twitter Followers</span>
                                            <div class="card-tools">
                                                <button class="btn btn-info" style="background-color: purple; color: #fff" >Follow us
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">13,000</h5>
                                            <span class="description-header green">Facebook Followers</span>
                                            <div class="card-tools">
                                                <button class="btn btn-info " style="background-color: purple; color: #fff">Follow us
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">3544</h5>
                                            <span class="description-header green">Linkedin Followers</span>
                                            <div class="card-tools">
                                                <button class="btn btn-info" style="background-color: purple; color: #fff" >Follow us
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                    </div>
                    <div class="widget-user-image" style="top:5px;">
                        <img :src="bureauLoadLogo(Bureau.logo)"  class="border-0" alt="" style="width:160px;">
                        <h3 class="card-title text-center text-white">{{Bureau.name}}</h3>

                    </div>
                </div>
                <!-- /.widget-user -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="card col-md">
                            <div class="card-header">
                               <h3 class="card-title">Bureau Directors Table</h3>
                                <div class="card-tools">
                                        <button class="btn btn-success"  @click.prevent="newDirectorModal(Bureau.id)">Add New Director
                                            <i class="fas fa-plus fw"></i>
                                        </button>
                                </div>
                            </div>
                            <div class="card-body">
                                 <div class="row" v-for="director in Bureau.bureaudirectors" :key="director.id">
                                    <div class="col" style="padding: 3px;">
                                        <img class="card-img-top" :src="directorLoadPassPhoto(director.pivot.photo)" style="width:100%" alt="Card image cap">
                                    </div>
                                    <div class="col" style="padding: 3px;">
                                        <img class="card-img-top" :src="directorLoadIDFrontPhoto(director.pivot.id_photo_front)" style="width:100%" alt="Card image cap"><br>
                                        <img class="card-img-top" :src="directorLoadIDBackPhoto(director.pivot.id_photo_back)" style="width:100%" alt="Card image cap">
                                    </div>
                                    <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                        <div>{{director.full_name}},</div>
                                        <div>
                                            {{director.position_name}},
                                            <span style="color:#9a009a;">
                                                {{Bureau.name}},
                                            </span>
                                        </div>
                                        <div> ID: ,<span style="color:#9a009a;">{{director.pivot.id_no}}</span>,
                                            Phone: <span style="color:#9a009a;">{{director.pivot.phone}},</span>
                                        </div>
                                        <div>
                                            Mail: <span style="color:#9a009a;">{{director.email}},</span>
                                        </div>
                                            <div>P. O. Box , <span style="color:#9a009a;">{{director.pivot.address}}</span>,
                                            </div>
                                        <div>
                                            <span style="color:#9a009a;">{{director.ward_name}}</span> ward,
                                            <span style="color:#9a009a;">{{director.constituency_name}}</span> constituency,
                                        </div>
                                        <div >
                                            <span style="color:#9a009a;">{{director.county_name}}</span> county,
                                            <span style="color:#9a009a;">{{director.country_name}},</span>
                                        </div>
                                         <div class="clearfix" style="font-weight:bold;font-size:0.9em;">
                                            <span class="float-left" style="margin-bottom:-0.5em" >
                                                <div style="margin-bottom:0.25em"> Updated at:
                                                    <span style="color:#9a009a;">{{director.created_at | dateformat}} </span>
                                                </div>
                                            </span>
                                            <span class="float-right">
                                                <a href=""  @click.prevent="editDirectorModal(director.user_id)">
                                                    <i class="fa fa-edit blue"></i>
                                                </a>
                                                /
                                                <a href=""  @click.prevent="deleteDirector(director.user_id)">
                                                    <i class="fa fa-trash red"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md">
                            <div class="card-header">
                                <h3 class="card-title">Bureau Admins Table</h3>
                                <div class="card-tools">
                                        <button class="btn btn-success"  @click.prevent="newAdminModal()">Add New Admin
                                            <i class="fas fa-plus fw"></i>
                                        </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div :v-if="Bureau.bureauadmins.length = null">
                                     <div>
                                         <span style="color:#9a009a;"> Currently there no Adminstration Users added
                                              to this Bureau, kindly add if they exist</span>
                                     </div>

                                </div>
                                <div :v-if="Bureau.bureauadmins.length != null">
                                    <div class="row" v-for="admin in Bureau.bureauadmins" :key="admin.id">
                                        <div class="col" style="padding: 3px;">
                                            <img class="card-img-top" :src="adminLoadPassPhoto(admin.pivot.photo)" style="width:100%" alt="Card image cap">
                                        </div>
                                        <div class="col" style="padding: 3px;">
                                            <img class="card-img-top" :src="adminLoadIDFrontPhoto(admin.pivot.id_photo_front)" style="width:100%" alt="Card image cap"><br>
                                            <img class="card-img-top" :src="adminLoadIDBackPhoto(admin.pivot.id_photo_back)" style="width:100%" alt="Card image cap">
                                        </div>
                                        <div style="font-weight:bold;font-size:0.7em;min-width:210px;max-width:400px;margin-top:4px;padding-top:4px;font-style: italic ">
                                            <div>{{admin.full_name}},</div>
                                            <div>
                                                {{admin.position_name}},
                                                <span style="color:#9a009a;">
                                                    {{Bureau.name}},
                                                </span>
                                            </div>
                                            <div> ID: ,<span style="color:#9a009a;">{{admin.pivot.id_no}}</span>,
                                                Phone: <span style="color:#9a009a;">{{admin.pivot.phone}},</span>
                                            </div>
                                            <div>
                                                Mail: <span style="color:#9a009a;">{{admin.email}},</span>
                                            </div>
                                                <div>P. O. Box , <span style="color:#9a009a;">{{admin.pivot.address}}</span>,
                                                </div>
                                            <div>
                                                <span style="color:#9a009a;">{{admin.ward_name}}</span> ward,
                                                <span style="color:#9a009a;">{{admin.constituency_name}}</span> constituency,
                                            </div>
                                            <div >
                                                <span style="color:#9a009a;">{{admin.county_name}}</span> county,
                                                <span style="color:#9a009a;">{{admin.country_name}},</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2">

                        <ul class="nav nav-pills">
                        <!-- <li class="nav-item">
                            <a href="#email_configuration" class="nav-link" data-toggle="tab"
                                title="Email Configuration" aria-expanded="true">
                                <i class="fa fa-envelope red"> Email Settings</i>
                            </a>
                            </li> -->
                        <li class="nav-item">
                            <a href="#about_us" class="nav-link" data-toggle="tab"
                                title="About Us Pages" aria-expanded="true">
                                <i class="fa fa-newspaper red">About Us Page </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#about_pics" class="nav-link" data-toggle="tab"
                                title="About Pics" aria-expanded="true">
                                <i class="fa fa-newspaper red">About Pics </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#services" class="nav-link" data-toggle="tab"
                                title="Services Pages" aria-expanded="true">
                                <i class="fa fa-newspaper red">Services Page </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#extraservices" class="nav-link" data-toggle="tab"
                                title="Services Pages" aria-expanded="true">
                                <i class="fa fa-newspaper red">Extra Services Page </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#servicefilters" class="nav-link" data-toggle="tab"
                                title="Services Pages" aria-expanded="true">
                                <i class="fa fa-newspaper red">Service Filters Page </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#adverts" class="nav-link" data-toggle="tab"
                                title="Adverts Pages" aria-expanded="true">
                                <i class="fa fa-newspaper red">AdvertsPage </i>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#payment_configuration" class="nav-link" data-toggle="tab"
                                title="Payment Configuration" aria-expanded="true">
                                <i class="fa fa-money-bill-alt red">Payment Setting</i>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="#sms_configuration" class="nav-link" data-toggle="tab"
                                title="SMS Configuration" aria-expanded="true">
                                <i class="fa fa-sms red">SMS Setting</i>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="#social_configuration" class="nav-link" data-toggle="tab"
                                title="Social Configuration" aria-expanded="true">
                                <i class="fa fa-cogs red">Social Setting</i>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="#sms_configuration" class="nav-link" data-toggle="tab"
                                title="SMS Configuration" aria-expanded="true">
                                <i class="fa fa-crosshairs red">Theme Setting</i>
                            </a>
                        </li> -->
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="about_us">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#general_configuration">About Us Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newAboutModal()" >Add About Us
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <!-- about us -->
                                     <div v-for="about in About" :key="about.id">
                                        <div class="card" >
                                            <div class="row">
                                                <div class="col-md-4" >
                                                    <div class="card-body">
                                                        <img :src="aboutLoadFrontImage(about.front_image)" alt="" width="250px" >
                                                    </div>
                                                </div>
                                                <div class="col-md-8 " >
                                                    <div class="card text-white bg-danger" >
                                                            <div class="card-header">
                                                                <h5 class="card-title text-center">{{about.title}}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <h6 class="card-subtitle mb-2 text-muted text-center">{{about.subtitle}}</h6>
                                                                <h5 class="card-title text-center">Why Choose US</h5>
                                                                <p class="card-text">{{about.why_choose_us}}</p>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6" >
                                                    <div class="card text-white bg-info" >
                                                        <div class="card-header">
                                                        <h5 class="card-title text-center">Who We Are</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">{{about.why_choose_us}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" >
                                                    <div class="card text-white bg-success mb-3" >
                                                        <div class="card-header">
                                                            <h5 class="card-title text-center">What We Do</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">{{about.what_we_do}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <a href="" class="card-link" @click.prevent="editAboutModal(about.id)">
                                                         <i class="fa fa-edit blue"> Edit</i>
                                                    </a>
                                                    <!-- <a href="" class="card-link" @click.prevent="deleteAbout(about.id)">
                                                        <i class="fa fa-trash red"></i>
                                                    </a> -->
                                                </div>
                                                <div class="float-left">
                                                    <a href="#about_us" class="card-link">Updated BY: {{about.user.full_name}}</a>
                                                    <a href="#about_us" class="card-link">Updated On: {{about.updated_at | dateformat}}</a>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="tab-pane" id="about_pics">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#general_configuration">About Pics Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newAboutPicsModal()" >Add New About US Pictures
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <!-- about us -->
                                    <div class="card" >
                                        <!-- about pic -->
                                        <div class="row ">
                                            <div  v-for="aboutpic in AboutPic" :key="aboutpic.id" class="col-md-3 d-flex">
                                                <div class="card flex-fill" >
                                                            <img class="card-img-top " :src="aboutLoadImage(aboutpic.image)" style="width:100%;height:150px;">
                                                        <div class="card-body" >
                                                            <h5 class="card-title">{{aboutpic.title}}</h5>
                                                            <p style="margin-bottom:-0.5em" class="card-text">{{aboutpic.description | sortlength(80, "...") }}</p>
                                                        </div>
                                                            <router-link  :to="`/aboutimage/${aboutpic.id}`" class="pull-right">Read More <i class="icon-angle-right"></i></router-link>
                                                        <div class="clearfix">
                                                            <span class="float-left" style="margin-bottom:-0.5em" >
                                                                <p style="margin-bottom:-0.5em">
                                                                    <small class="text-muted">Updated By: {{aboutpic.user.full_name}}</small>
                                                                </p>
                                                                <p style="margin-bottom:0.25em">
                                                                    <small class="text-muted">On: {{aboutpic.updated_at | dateformat}}</small>
                                                                </p>
                                                            </span>
                                                            <span class="float-right">
                                                                <a href=""  @click.prevent="editAboutPicsModal(aboutpic.id)">
                                                                    <i class="fa fa-edit blue"></i>
                                                                </a>
                                                                /
                                                                <a href=""  @click.prevent="deleteAboutPics(aboutpic.id)">
                                                                    <i class="fa fa-trash red"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pagination" style="padding: 0px;margin: 0px;">
                                                        <!-- {{ $fulltime_courses->links()}} -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="services">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#advert">Service Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newServiceModal()" >Add new Service
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                         <!-- service -->

                                            <div class="row ">
                                                 <div  v-for="service in Service" :key="service.id" class="col-md-3 d-flex">
                                                    <div class="card flex-fill" >
                                                            <img class="card-img-top " :src="serviceLoadImage(service.service_image)" style="width:100%;height:150px;">
                                                        <div class="card-body" >
                                                                <h5 class="card-title text-center">{{service.title}}</h5>
                                                            <h6 class="card-title text-center">{{service.service_title}}</h6>
                                                            <p style="margin-bottom:-0.5em" class="card-text">{{service.service_details | sortlength(80, "...") }}</p>
                                                        </div>
                                                            <router-link  :to="`/service/${service.id}`" class="pull-right blue">Read More <i class="icon-angle-right"></i></router-link>
                                                        <div class="clearfix">
                                                            <span class="float-left" style="margin-bottom:-0.5em" >
                                                                <p style="margin-bottom:-0.5em">
                                                                    <small class="text-muted">Updated By: {{service.user.full_name}}</small>
                                                                </p>
                                                                <p style="margin-bottom:0.25em">
                                                                    <small class="text-muted">On: {{service.updated_at | dateformat}}</small>
                                                                </p>
                                                            </span>
                                                            <span class="float-right">
                                                                <a href=""  @click.prevent="editServiceModal(service.id)">
                                                                    <i class="fa fa-edit blue"></i>
                                                                </a>
                                                                /
                                                                <a href=""  @click.prevent="deleteService(service.id)">
                                                                    <i class="fa fa-trash red"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pagination" style="padding: 0px;margin: 0px;">
                                                        <!-- {{ $fulltime_courses->links()}} -->
                                                </ul>
                                            </div>
                                            <!--end service  -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="extraservices">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#advert">Extra Service Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newExtraServiceModal()" >Add new Extra Services
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                         <!-- extraservice -->
                                            <div class="row ">
                                                 <div  v-for="extraservice in ExtraService" :key="extraservice.id" class="col-md-3 d-flex">
                                                    <div class="card flex-fill" >
                                                            <!-- <img class="card-img-top " :src="extraserviceLoadImage(extraservice.extraservice_image)" style="width:100%;height:150px;"> -->
                                                        <div class="card-body" >
                                                                <h5 class="card-title text-center">{{extraservice.title}}</h5>
                                                            <h6 class="card-title text-center">{{extraservice.title}}</h6>
                                                            <p style="margin-bottom:-0.5em" class="card-text">{{extraservice.details | sortlength(80, "...") }}</p>
                                                            <p style="margin-bottom:-0.5em" class="card-text">{{extraservice.why | sortlength(80, "...") }}</p>
                                                        </div>
                                                            <router-link  :to="`/extraservice/${extraservice.id}`" class="pull-right blue">Read More <i class="icon-angle-right"></i></router-link>
                                                        <div class="clearfix">
                                                            <span class="float-left" style="margin-bottom:-0.5em" >
                                                                <p style="margin-bottom:-0.5em">
                                                                    <small class="text-muted">Updated By: {{extraservice.user.full_name}}</small>
                                                                </p>
                                                                <p style="margin-bottom:0.25em">
                                                                    <small class="text-muted">On: {{extraservice.updated_at | dateformat}}</small>
                                                                </p>
                                                            </span>
                                                            <span class="float-right">
                                                                <a href=""  @click.prevent="editExtraServiceModal(extraservice.id)">
                                                                    <i class="fa fa-edit blue"></i>
                                                                </a>
                                                                /
                                                                <a href=""  @click.prevent="deleteExtraService(extraservice.id)">
                                                                    <i class="fa fa-trash red"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pagination" style="padding: 0px;margin: 0px;">
                                                        <!-- {{ $fulltime_courses->links()}} -->
                                                </ul>
                                            </div>
                                            <!--end extraservice  -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="servicefilters">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#advert">Service Filter Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newServiceFilterModal()" >Add new Service Filters
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                         <!-- servicefilter -->
                                            <div class="row ">
                                                 <div  v-for="servicefilter in ServiceFilter" :key="servicefilter.id" class="col-md-3 d-flex">
                                                    <div class="card flex-fill" >
                                                            <!-- <img class="card-img-top " :src="servicefilterLoadImage(servicefilter.servicefilter_image)" style="width:100%;height:150px;"> -->
                                                        <div class="card-body" >
                                                                <h5 class="card-title text-center">{{servicefilter.title}}</h5>
                                                            <h6 class="card-title text-center">{{servicefilter.title}}</h6>
                                                            <p style="margin-bottom:-0.5em" class="card-text">{{servicefilter.details | sortlength(80, "...") }}</p>
                                                            <p style="margin-bottom:-0.5em" class="card-text">{{servicefilter.why | sortlength(80, "...") }}</p>
                                                        </div>
                                                            <router-link  :to="`/servicefilter/${servicefilter.id}`" class="pull-right blue">Read More <i class="icon-angle-right"></i></router-link>
                                                        <div class="clearfix">
                                                            <span class="float-left" style="margin-bottom:-0.5em" >
                                                                <p style="margin-bottom:-0.5em">
                                                                    <small class="text-muted">Updated By: {{servicefilter.user.full_name}}</small>
                                                                </p>
                                                                <p style="margin-bottom:0.25em">
                                                                    <small class="text-muted">On: {{servicefilter.updated_at | dateformat}}</small>
                                                                </p>
                                                            </span>
                                                            <span class="float-right">
                                                                <a href=""  @click.prevent="editServiceFilterModal(servicefilter.id)">
                                                                    <i class="fa fa-edit blue"></i>
                                                                </a>
                                                                /
                                                                <a href=""  @click.prevent="deleteServiceFilter(servicefilter.id)">
                                                                    <i class="fa fa-trash red"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pagination" style="padding: 0px;margin: 0px;">
                                                        <!-- {{ $fulltime_courses->links()}} -->
                                                </ul>
                                            </div>
                                            <!--end servicefilter  -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="adverts">
                                     <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#advert">Advert Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newAdvertModal()" >Add new Advert
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                         <!-- Advert -->
                                            <div class="row ">
                                                 <div  v-for="advert in Advert" :key="advert.id" class="col-md-3 d-flex">
                                                    <div class="card flex-fill" >
                                                            <img class="card-img-top " :src="advertLoadImage(advert.advert_image)" style="width:100%;height:150px;">
                                                        <div class="card-body" >
                                                            <h5 class="card-title text-center">{{advert.title}}</h5>
                                                            <h6 class="card-title text-center">{{advert.subtitle}}</h6>
                                                            <p style="margin-bottom:-0.5em" class="card-text">{{advert.details | sortlength(80, "...") }}</p>
                                                        </div>
                                                            <router-link  :to="`/advert/${advert.id}`" class="pull-right blue">Read More <i class="icon-angle-right"></i></router-link>
                                                        <div class="clearfix">
                                                            <span class="float-left" style="margin-bottom:-0.5em" >
                                                                <p style="margin-bottom:-0.5em">
                                                                    <small class="text-muted">Updated By: {{advert.user.full_name}}</small>
                                                                </p>
                                                                <p style="margin-bottom:0.25em">
                                                                    <small class="text-muted">On: {{advert.updated_at | dateformat}}</small>
                                                                </p>
                                                            </span>
                                                            <span class="float-right">
                                                                <a href=""  @click.prevent="editAdvertModal(advert.id)">
                                                                    <i class="fa fa-edit blue"></i>
                                                                </a>
                                                                /
                                                                <a href=""  @click.prevent="deleteAdvert(advert.id)">
                                                                    <i class="fa fa-trash red"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pagination" style="padding: 0px;margin: 0px;">
                                                        <!-- {{ $fulltime_courses->links()}} -->
                                                </ul>
                                            </div>
                                            <!--end Advert  -->


                                    </div>
                                </div>
                           </div>
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->
        </div>
        <!-- Role Modal -->
        <div class="modal fade " id="BureauModal" tabindex="-1" role="dialog" aria-labelledby="BureauModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form-wizard role="form" @on-complete="editmodeBureau ? updateBureau(bureauform.id) : addBureau ()" >
                            <h5 class="modal-title" v-show="editmodeBureau" id="BureauModalLabel">Update Bureau</h5>
                            <!-- <h5 class="modal-title" v-show="!editmodeBureau" id="BureauModalLabel">Add New Bureau & Director</h5> -->
                            <tab-content title="Bureau Details" icon="fa fa-building" :before-change="editmodeBureau ? validateBureauUpdate : validateBureau" >
                                {{bureauform.id}}
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="name" class="col-form-label"> Bureau Name</label>
                                        <input v-model="bureauform.name" type="text" name="name" placeholder="Bureau Name"
                                            class="form-control" :class="{ 'is-invalid': bureauform.errors.has('name') }" >
                                        <has-error style="color: #e83e8c" :form="bureauform" field="name"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bureau_email" class=" col-form-label">Email </label>
                                        <input v-model="bureauform.bureau_email" type="email" name="bureau_email" placeholder="Email Address"
                                            class="form-control" :class="{ 'is-invalid': bureauform.errors.has('bureau_email') }" >
                                        <has-error style="color: #e83e8c" :form="bureauform" field="bureau_email"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone" class="col-form-label"> Bureau Phone</label>
                                            <div>
                                                <vue-tel-input v-model="bureauform.phone" name="phone" @onInput="InputPhone"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('phone') }">
                                                </vue-tel-input>
                                                <has-error style="color: #e83e8c" :form="bureauform" field="phone"></has-error>
                                            </div>
                                            <div v-if="bureauform.phone" style="color: #e83e8c">
                                                <span>Is valid: <strong>{{phone3.isValid}}</strong>,&nbsp;</span>
                                                <span>Country: <strong>{{phone3.country}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="landline" class=" col-form-label">Landline</label>
                                            <vue-tel-input v-model="bureauform.landline" name="landline" @onInput="InputLandline"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('landline') }">
                                            </vue-tel-input>
                                            <has-error style="color: #e83e8c" :form="bureauform" field="landline"></has-error>

                                            <div v-if="bureauform.landline" style="color: #e83e8c">
                                                <span>Is valid: <strong>{{landline3.isValid}}</strong>,&nbsp;</span>
                                                <span>Country: <strong>{{landline3.country}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="website" class="col-form-label">Website</label>
                                        <input v-model="bureauform.website" type="text" name="website" placeholder="Website"
                                            class="form-control" :class="{ 'is-invalid': bureauform.errors.has('website') }" >
                                        <has-error style="color: #e83e8c" :form="bureauform" field="website"></has-error>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="address" class=" col-form-label">address</label>
                                        <input v-model="bureauform.address" type="text" name="Address" placeholder="Address"
                                            class="form-control" :class="{ 'is-invalid': bureauform.errors.has('address') }" >
                                        <has-error style="color: #e83e8c" :form="bureauform" field="address"></has-error>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-3">
                                        <label for="country_id">Select Country</label>
                                        <select class="form-control" @change="countryCounties(bureauform.country_id)"
                                        v-model="bureauform.country_id" :class="{ 'is-invalid': bureauform.errors.has('country_id') }">
                                                <option disabled value="">Select Country</option>
                                                <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                        </select>
                                            <has-error style="color: #e83e8c" :form="bureauform" field="country_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="county_id" class=" col-form-label">County</label>
                                        <select class="form-control" @change="countyConstituencies(bureauform.county_id)"
                                        v-model="bureauform.county_id" :class="{ 'is-invalid': bureauform.errors.has('county_id') }">
                                                <option disabled value="">Select County</option>
                                                <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                        </select>
                                        <has-error style="color: #e83e8c" :form="bureauform" field="county_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="constituency_id" class=" col-form-label">Constituency</label>
                                        <select class="form-control" @change="constituencyWards(bureauform.constituency_id)"
                                        v-model="bureauform.constituency_id" :class="{ 'is-invalid': bureauform.errors.has('constituency_id') }">
                                                <option disabled value="">Select County</option>
                                                <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                        </select>
                                        <has-error style="color: #e83e8c" :form="bureauform" field="constituency_id"></has-error>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ward_id" class="col-form-label"> Ward </label>
                                        <select class="form-control"
                                        v-model="bureauform.ward_id" :class="{ 'is-invalid': bureauform.errors.has('ward_id') }">
                                                <option disabled value="">Select Town</option>
                                                <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                        </select>
                                        <has-error style="color: #e83e8c" :form="bureauform" field="ward_id"></has-error>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-6">
                                        <label for="logo" class=" col-form-label">Bureau Logo</label><br>
                                            <input @change="bureauChangeLogo($event)" type="file" name="logo"
                                                :class="{ 'is-invalid': bureauform.errors.has('logo') }">
                                                <img v-show="editmodeBureau" :src="updateBureauLogo(bureauform.logo)" alt="" width="100%" >
                                                <img  v-show="!editmodeBureau" :src="bureauform.logo" alt="" width="100%" >
                                            <has-error style="color: #e83e8c" :form="bureauform" field="logo"></has-error>
                                    </div>
                                </div>
                            </tab-content>

                            <!-- <tab-content title="Bureau Director Info" :before-change="newBureauDirector ? validateDirectorUpdate : validateDirector">
                                <div v-show="newBureauDirector">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="director_first_name" class="col-form-label"> Director First Name</label>
                                            <input v-model="bureauform.director_first_name" type="text" name="first_name" placeholder="Director First Name"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('director_first_name') }" >
                                            <has-error style="color: #e83e8c" :form="bureauform" field="director_first_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="director_last_name" class=" col-form-label">director_Last Name </label>
                                            <input v-model="bureauform.director_last_name" type="director_last_name" name="director_last_name" placeholder="director_Last Name"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('director_last_name') }" >
                                            <has-error style="color: #e83e8c" :form="bureauform" field="director_last_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="bureauform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="bureauform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <input v-model="bureauform.director_password" type="password" id="director_password" placeholder="Director Password"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('director_password') }">
                                            <has-error :form="bureauform" field="password"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="director_phone" class="col-form-label"> Director Phone</label>
                                                <div>
                                                    <vue-tel-input v-model="bureauform.director_phone" name="director_phone" @onInput="DirectorInputPhone"
                                                    class="form-control" :class="{ 'is-invalid': bureauform.errors.has('director_phone') }">
                                                    </vue-tel-input>
                                                    <has-error style="color: #e83e8c" :form="bureauform" field="director_phone"></has-error>
                                                </div>
                                                <div v-if="bureauform.director_phone" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{director_phone1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{director_phone1.country}}</strong></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="director_landline" class=" col-form-label">Director Landline</label>
                                                <vue-tel-input v-model="bureauform.director_landline" name="director_landline" @onInput="DirectorInputLandline"
                                                    class="form-control" :class="{ 'is-invalid': bureauform.errors.has('director_landline') }">
                                                </vue-tel-input>
                                                <has-error style="color: #e83e8c" :form="bureauform" field="director_landline"></has-error>

                                                <div v-if="bureauform.director_landline" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{director_landline1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{director_landline1.country}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="director_id_no" class="col-form-label">Director ID no.</label>
                                            <input v-model="bureauform.director_id_no" type="text" name="director_id_no" placeholder="Director ID NO"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('director_id_no') }" >
                                            <has-error style="color: #e83e8c" :form="bureauform" field="director_id_no"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="director_address" class=" col-form-label">Director Address</label>
                                            <input v-model="bureauform.director_address" type="text" name="Address" placeholder="Director Address"
                                                class="form-control" :class="{ 'is-invalid': bureauform.errors.has('director_address') }" >
                                            <has-error style="color: #e83e8c" :form="bureauform" field="director_address"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="director_country_id">Select Country</label>
                                            <select class="form-control" @change="DirectorcountryCounties(bureauform.director_country_id)"
                                            v-model="bureauform.director_country_id" :class="{ 'is-invalid': bureauform.errors.has('director_country_id') }">
                                                    <option disabled value="">Select Country</option>
                                                    <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="bureauform" field="director_country_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="director_county_id" class=" col-form-label">County</label>
                                            <select class="form-control" @change="DirectorcountyConstituencies(bureauform.director_county_id)"
                                            v-model="bureauform.director_county_id" :class="{ 'is-invalid': bureauform.errors.has('director_county_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="bureauform" field="director_county_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="director_constituency_id" class=" col-form-label">Constituency</label>
                                            <select class="form-control" @change="DirectorconstituencyWards(bureauform.director_constituency_id)"
                                            v-model="bureauform.director_constituency_id" :class="{ 'is-invalid': bureauform.errors.has('director_constituency_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="bureauform" field="director_constituency_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="director_ward_id" class="col-form-label"> Ward </label>
                                            <select class="form-control"
                                            v-model="bureauform.director_ward_id" :class="{ 'is-invalid': bureauform.errors.has('director_ward_id') }">
                                                    <option disabled value="">Select Ward</option>
                                                    <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="bureauform" field="director_ward_id"></has-error>
                                        </div>


                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="director_passport_image" class=" col-form-label">Director PassPort Image</label><br>
                                                <input @change="bureauChangeDirectorPImage($event)" type="file" name="director_passport_image"
                                                    :class="{ 'is-invalid': bureauform.errors.has('director_passport_image') }">
                                                    <img v-show="editmodeBureau" :src="updateBureauDirectorPImage(bureauform.director_passport_image)" alt="" width="100%" >
                                                    <img  v-show="!editmodeBureau" :src="bureauform.director_passport_image" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="bureauform" field="director_passport_image"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="frontside_director_id_photo" class=" col-form-label">Director FrontSide ID Photo</label><br>
                                                <input @change="bureauChangeDirectorFIDPhoto($event)" type="file" name="frontside_director_id_photo"
                                                    :class="{ 'is-invalid': bureauform.errors.has('frontside_director_id_photo') }">
                                                    <img v-show="editmodeBureau" :src="updateBureauDirectorFIDPhoto(bureauform.frontside_director_id_photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeBureau" :src="bureauform.frontside_director_id_photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="bureauform" field="frontside_director_id_photo"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="backside_director_i_photod" class=" col-form-label">Director BackSide ID Photo</label><br>
                                                <input @change="bureauChangeDirectorBIDPhoto($event)" type="file" name="backside_director_id_photo"
                                                    :class="{ 'is-invalid': bureauform.errors.has('backside_director_id') }">
                                                    <img v-show="editmodeBureau" :src="updateBureauDirectorBIDPhoto(bureauform.backside_director_id_photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeBureau" :src="bureauform.backside_director_id_photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="bureauform" field="backside_director_id_photo"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </tab-content> -->
                            <tab-content title="Last step">
                                Bureau Information
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="name" class="col-form-label"> Bureau Name</label>
                                        <input v-model="bureauform.name" class="form-control" :readonly="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bureau_email" class=" col-form-label">Email </label>
                                        <input v-model="bureauform.bureau_email" class="form-control" :readonly="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone" class="col-form-label"> Bureau Phone</label>
                                            <div>
                                                <vue-tel-input v-model="bureauform.phone" class="form-control" :readonly="true">
                                                </vue-tel-input>
                                            </div>
                                            <div v-if="bureauform.phone" style="color: #e83e8c">
                                                <span>Is valid: <strong>{{phone1.isValid}}</strong>,&nbsp;</span>
                                                <span>Country: <strong>{{phone1.country}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="landline" class=" col-form-label">Landline</label>
                                            <vue-tel-input v-model="bureauform.landline" class="form-control" :readonly="true">
                                            </vue-tel-input>
                                            <div v-if="bureauform.landline" style="color: #e83e8c">
                                                <span>Is valid: <strong>{{landline1.isValid}}</strong>,&nbsp;</span>
                                                <span>Country: <strong>{{landline1.country}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="website" class="col-form-label">Website</label>
                                        <input v-model="bureauform.website" class="form-control" :readonly="true" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="address" class=" col-form-label">address</label>
                                        <input v-model="bureauform.address" class="form-control" :readonly="true" >
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-3">
                                        <label for="country_id" class=" col-form-label">Country</label>
                                        <select class="form-control" v-model="bureauform.country_id" :readonly="true">
                                                <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="county_id" class=" col-form-label">County</label>
                                        <select class="form-control" v-model="bureauform.county_id" :readonly="true">
                                                <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="constituency_id" class=" col-form-label">Constituency</label>
                                        <select class="form-control" v-model="bureauform.constituency_id" :readonly="true">
                                                <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ward_id" class="col-form-label"> Ward </label>
                                        <select class="form-control" v-model="bureauform.ward_id" :readonly="true">
                                                <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-6">
                                        <label for="logo" class=" col-form-label">Bureau Logo</label><br>
                                            <input type="file" name="logo" :readonly="true">
                                                <img v-show="editmodeBureau" :src="updateBureauLogo(bureauform.logo)" alt="" width="100%" >
                                                <img  v-show="!editmodeBureau" :src="bureauform.logo" alt="" width="100%" >
                                            <has-error style="color: #e83e8c" :form="bureauform" field="logo"></has-error>
                                    </div>
                                </div>
                            <!-- <div v-show="newBureauDirector">
                                Director Info
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="director_first_name" class="col-form-label"> Director First Name</label>
                                        <input v-model="bureauform.director_first_name" class="form-control" :readonly="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="director_last_name" class=" col-form-label">director_Last Name </label>
                                        <input v-model="bureauform.director_last_name" class="form-control" :readonly="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email" class=" col-form-label">Email </label>
                                        <input v-model="bureauform.email" class="form-control" :readonly="true">
                                    </div>
                                </div>
                                 <div class=" row">
                                     <div class="form-group col-md-4">
                                        <input v-model="bureauform.director_password" type="password" class="form-control" :readonly="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="director_phone" class="col-form-label"> Director Phone</label>
                                            <div>
                                                <vue-tel-input v-model="bureauform.director_phone" class="form-control" :readonly="true">
                                                </vue-tel-input>
                                            </div>
                                            <div v-if="bureauform.director_phone" style="color: #e83e8c">
                                                <span>Is valid: <strong>{{director_phone1.isValid}}</strong>,&nbsp;</span>
                                                <span>Country: <strong>{{director_phone1.country}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="director_landline" class=" col-form-label">Director Landline</label>
                                            <vue-tel-input v-model="bureauform.director_landline" class="form-control" :readonly="true">
                                            </vue-tel-input>
                                            <div v-if="bureauform.director_landline" style="color: #e83e8c">
                                                <span>Is valid: <strong>{{director_landline1.isValid}}</strong>,&nbsp;</span>
                                                <span>Country: <strong>{{director_landline1.country}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="director_id_no" class="col-form-label">Director ID no.</label>
                                        <input v-model="bureauform.director_id_no" class="form-control" :readonly="true">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="director_address" class=" col-form-label">Director Address</label>
                                        <input v-model="bureauform.director_address" class="form-control" :readonly="true">
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-3">
                                        <label for="director_country_id">Select Country</label>
                                        <select class="form-control" v-model="bureauform.director_country_id" >
                                                <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="director_county_id" class=" col-form-label">County</label>
                                        <select class="form-control" v-model="bureauform.director_county_id" :readonly="true">
                                            <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="director_constituency_id" class=" col-form-label">Constituency</label>
                                        <select class="form-control" v-model="bureauform.director_constituency_id" :readonly="true">
                                                <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="director_ward_id" class="col-form-label"> Ward </label>
                                        <select class="form-control" v-model="bureauform.director_ward_id" :readonly="true">
                                                <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="form-group col-md-4">
                                        <label for="director_passport_image" class=" col-form-label">Director PassPort Image</label><br>
                                            <input type="file" :readonly="true">
                                                <img v-show="editmodeBureau" :src="updateBureauDirectorPImage(bureauform.director_passport_image)" alt="" width="100%" >
                                                <img  v-show="!editmodeBureau" :src="bureauform.director_passport_image" alt="" width="100%" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="frontside_director_id_photo" class=" col-form-label">Director FrontSide ID Photo</label><br>
                                            <input  type="file" :readonly="true">
                                                <img v-show="editmodeBureau" :src="updateBureauDirectorFIDPhoto(bureauform.frontside_director_id_photo)" alt="" width="100%" >
                                                <img  v-show="!editmodeBureau" :src="bureauform.frontside_director_id_photo" alt="" width="100%" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="backside_director_i_photod" class=" col-form-label">Director BackSide ID Photo</label><br>
                                            <input type="file" :readonly="true">
                                                <img v-show="editmodeBureau" :src="updateBureauDirectorBIDPhoto(bureauform.backside_director_id_photo)" alt="" width="100%" >
                                                <img  v-show="!editmodeBureau" :src="bureauform.backside_director_id_photo" alt="" width="100%" >
                                    </div>
                                </div>
                             </div> -->
                            </tab-content>
                        </form-wizard>
                    </div>
                </div>
            </div>
        </div>
        <!-- Diector modal -->
        <div class="modal fade " id="DirectorModal" tabindex="-1" role="dialog" aria-labelledby="DirectorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="editmodeDirector ? updateDirector(directorform.id) : addDirector(directorform.bureau_id)" >
                        <div class="modal-body">
                            <h5 class="modal-title" v-show="editmodeDirector" id="DirectorModalLabel">Update Director</h5>
                            <h5 class="modal-title" v-show="!editmodeDirector" id="DirectorModalLabel">Add New Director</h5>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="first_name" class="col-form-label"> Director First Name</label>
                                            <input v-model="directorform.first_name" type="text" name="first_name" placeholder="Director First Name"
                                                class="form-control" :class="{ 'is-invalid': directorform.errors.has('first_name') }" >
                                            <has-error style="color: #e83e8c" :form="directorform" field="first_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name" class=" col-form-label">director_Last Name </label>
                                            <input v-model="directorform.last_name" type="director_last_name" name="last_name" placeholder="Director Last Name"
                                                class="form-control" :class="{ 'is-invalid': directorform.errors.has('last_name') }" >
                                            <has-error style="color: #e83e8c" :form="directorform" field="last_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="directorform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': directorform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="directorform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <input v-model="directorform.password" type="password" id="password" placeholder="Password"
                                                class="form-control" :class="{ 'is-invalid': directorform.errors.has('password') }">
                                            <has-error :form="directorform" field="password"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone" class="col-form-label"> Director Phone</label>
                                                <div>
                                                    <vue-tel-input v-model="directorform.phone" name="phone" @onInput="InputPhone"
                                                    class="form-control" :class="{ 'is-invalid': directorform.errors.has('phone') }">
                                                    </vue-tel-input>
                                                    <has-error style="color: #e83e8c" :form="directorform" field="phone"></has-error>
                                                </div>
                                                <div v-if="directorform.phone" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{phone1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{phone1.country}}</strong></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="landline" class=" col-form-label">Landline</label>
                                                <vue-tel-input v-model="directorform.landline" name="landline" @onInput="InputLandline"
                                                    class="form-control" :class="{ 'is-invalid': directorform.errors.has('landline') }">
                                                </vue-tel-input>
                                                <has-error style="color: #e83e8c" :form="directorform" field="landline"></has-error>

                                                <div v-if="directorform.landline" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{landline1.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{landline1.country}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="id_no" class="col-form-label">ID no.</label>
                                            <input v-model="directorform.id_no" type="text" name="id_no" placeholder="ID NO"
                                                class="form-control" :class="{ 'is-invalid': directorform.errors.has('id_no') }" >
                                            <has-error style="color: #e83e8c" :form="directorform" field="id_no"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="address" class=" col-form-label">Address</label>
                                            <input v-model="directorform.address" type="text" name="address" placeholder="Address"
                                                class="form-control" :class="{ 'is-invalid': directorform.errors.has('address') }" >
                                            <has-error style="color: #e83e8c" :form="directorform" field="country_id"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="country_id">Select Country</label>
                                            <select class="form-control" @change="countryCounties(directorform.country_id)"
                                            v-model="directorform.country_id" :class="{ 'is-invalid': directorform.errors.has('country_id') }">
                                                    <option disabled value="">Select Country</option>{{directorform.country_id}}
                                                    <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="directorform" field="country_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="county_id" class=" col-form-label">County</label>
                                            <select class="form-control" @change="countyConstituencies(directorform.county_id)"
                                            v-model="directorform.county_id" :class="{ 'is-invalid': directorform.errors.has('county_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="directorform" field="county_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="constituency_id" class=" col-form-label">Constituency</label>
                                            <select class="form-control" @change="constituencyWards(directorform.constituency_id)"
                                            v-model="directorform.constituency_id" :class="{ 'is-invalid': directorform.errors.has('constituency_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="directorform" field="constituency_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="ward_id" class="col-form-label"> Ward </label>
                                            <select class="form-control"
                                            v-model="directorform.ward_id" :class="{ 'is-invalid': directorform.errors.has('ward_id') }">
                                                    <option disabled value="">Select Ward</option>
                                                    <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="directorform" field="ward_id"></has-error>
                                        </div>

                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="photo" class=" col-form-label">Director PassPort Image</label><br>
                                                <input @change="directorChangePassPhoto($event)" type="file" name="photo"
                                                    :class="{ 'is-invalid': directorform.errors.has('photo') }">
                                                    <img v-show="editmodeDirector" :src="updateDirectorPassPhoto(directorform.photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeDirector" :src="directorform.photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="directorform" field="photo"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="id_photo_front" class=" col-form-label">Director FrontSide ID Photo</label><br>
                                                <input @change="directorChangeIDFrontPhoto($event)" type="file" name="id_photo_front"
                                                    :class="{ 'is-invalid': directorform.errors.has('id_photo_front') }">
                                                    <img v-show="editmodeDirector" :src="updateDirectorIDFrontPhoto(directorform.id_photo_front)" alt="" width="100%" >
                                                    <img  v-show="!editmodeDirector" :src="directorform.id_photo_front" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="directorform" field="id_photo_front"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="backside_i_photod" class=" col-form-label">BackSide ID Photo</label><br>
                                                <input @change="directorChangeIDBackPhoto($event)" type="file" name="id_photo_back"
                                                    :class="{ 'is-invalid': directorform.errors.has('backside_id') }">
                                                    <img v-show="editmodeDirector" :src="updateDirectorIDBackPhoto(directorform.id_photo_back)" alt="" width="100%" >
                                                    <img  v-show="!editmodeDirector" :src="directorform.id_photo_back" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="directorform" field="id_photo_back"></has-error>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeDirector" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeDirector" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Admin Modal -->
        <div class="modal fade " id="AdminModal" tabindex="-1" role="dialog" aria-labelledby="AdminModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="editmodeAdmin ? updateAdmin(adminform.id) : addAdmin(adminform.organisation_id)" >
                        <div class="modal-body">
                            <h5 class="modal-title" v-show="editmodeAdmin" id="AdminModalLabel">Update Admin</h5>
                            <h5 class="modal-title" v-show="!editmodeAdmin" id="AdminModalLabel">Add New Admin</h5>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="first_name" class="col-form-label"> Admin First Name</label>
                                            <input v-model="adminform.first_name" type="text" name="first_name" placeholder="Admin First Name"
                                                class="form-control" :class="{ 'is-invalid': adminform.errors.has('first_name') }" >
                                            <has-error style="color: #e83e8c" :form="adminform" field="first_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name" class=" col-form-label">admin_Last Name </label>
                                            <input v-model="adminform.last_name" type="admin_last_name" name="last_name" placeholder="Admin Last Name"
                                                class="form-control" :class="{ 'is-invalid': adminform.errors.has('last_name') }" >
                                            <has-error style="color: #e83e8c" :form="adminform" field="last_name"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email" class=" col-form-label">Email </label>
                                            <input v-model="adminform.email" type="email" name="email" placeholder="Email Address"
                                                class="form-control" :class="{ 'is-invalid': adminform.errors.has('email') }" >
                                            <has-error style="color: #e83e8c" :form="adminform" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <input v-model="adminform.password" type="password" id="password" placeholder="Password"
                                                class="form-control" :class="{ 'is-invalid': adminform.errors.has('password') }">
                                            <has-error :form="adminform" field="password"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone" class="col-form-label"> Admin Phone</label>
                                                <div>
                                                    <vue-tel-input v-model="adminform.phone" name="phone" @onInput="InputPhone"
                                                    class="form-control" :class="{ 'is-invalid': adminform.errors.has('phone') }">
                                                    </vue-tel-input>
                                                    <has-error style="color: #e83e8c" :form="adminform" field="phone"></has-error>
                                                </div>
                                                <div v-if="adminform.phone" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{phone2.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{phone2.country}}</strong></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="landline" class=" col-form-label">Landline</label>
                                                <vue-tel-input v-model="adminform.landline" name="landline" @onInput="InputLandline"
                                                    class="form-control" :class="{ 'is-invalid': adminform.errors.has('landline') }">
                                                </vue-tel-input>
                                                <has-error style="color: #e83e8c" :form="adminform" field="landline"></has-error>

                                                <div v-if="adminform.landline" style="color: #e83e8c">
                                                    <span>Is valid: <strong>{{landline2.isValid}}</strong>,&nbsp;</span>
                                                    <span>Country: <strong>{{landline2.country}}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="id_no" class="col-form-label">ID no.</label>
                                            <input v-model="adminform.id_no" type="text" name="id_no" placeholder="ID NO"
                                                class="form-control" :class="{ 'is-invalid': adminform.errors.has('id_no') }" >
                                            <has-error style="color: #e83e8c" :form="adminform" field="id_no"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="address" class=" col-form-label">Addresdddds</label>
                                            <input v-model="adminform.address" type="text" name="address" placeholder="Address"
                                                class="form-control" :class="{ 'is-invalid': adminform.errors.has('address') }" >
                                            <has-error style="color: #e83e8c" :form="adminform" field="country_id"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-3">
                                            <label for="country_id">Select Country</label>
                                            <select class="form-control" @change="countryCounties(adminform.country_id)"
                                            v-model="adminform.country_id" :class="{ 'is-invalid': adminform.errors.has('country_id') }">
                                                    <option disabled value="">Select Country</option>{{adminform.country_id}}
                                                    <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                            </select>
                                                <has-error style="color: #e83e8c" :form="adminform" field="country_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="county_id" class=" col-form-label">County</label>
                                            <select class="form-control" @change="countyConstituencies(adminform.county_id)"
                                            v-model="adminform.county_id" :class="{ 'is-invalid': adminform.errors.has('county_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="adminform" field="county_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="constituency_id" class=" col-form-label">Constituency</label>
                                            <select class="form-control" @change="constituencyWards(adminform.constituency_id)"
                                            v-model="adminform.constituency_id" :class="{ 'is-invalid': adminform.errors.has('constituency_id') }">
                                                    <option disabled value="">Select County</option>
                                                    <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="adminform" field="constituency_id"></has-error>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="ward_id" class="col-form-label"> Ward </label>
                                            <select class="form-control"
                                            v-model="adminform.ward_id" :class="{ 'is-invalid': adminform.errors.has('ward_id') }">
                                                    <option disabled value="">Select Ward</option>
                                                    <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                            </select>
                                            <has-error style="color: #e83e8c" :form="adminform" field="ward_id"></has-error>
                                        </div>

                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-4">
                                            <label for="photo" class=" col-form-label">Admin PassPort Image</label><br>
                                                <input @change="adminChangePassPhoto($event)" type="file" name="photo"
                                                    :class="{ 'is-invalid': adminform.errors.has('photo') }">
                                                    <img v-show="editmodeAdmin" :src="updateAdminPassPhoto(adminform.photo)" alt="" width="100%" >
                                                    <img  v-show="!editmodeAdmin" :src="adminform.photo" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="adminform" field="photo"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="id_photo_front" class=" col-form-label">Admin FrontSide ID Photo</label><br>
                                                <input @change="adminChangeIDFrontPhoto($event)" type="file" name="id_photo_front"
                                                    :class="{ 'is-invalid': adminform.errors.has('id_photo_front') }">
                                                    <img v-show="editmodeAdmin" :src="updateAdminIDFrontPhoto(adminform.id_photo_front)" alt="" width="100%" >
                                                    <img  v-show="!editmodeAdmin" :src="adminform.id_photo_front" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="adminform" field="id_photo_front"></has-error>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="backside_i_photod" class=" col-form-label">BackSide ID Photo</label><br>
                                                <input @change="adminChangeIDBackPhoto($event)" type="file" name="id_photo_back"
                                                    :class="{ 'is-invalid': adminform.errors.has('backside_id') }">
                                                    <img v-show="editmodeAdmin" :src="updateAdminIDBackPhoto(adminform.id_photo_back)" alt="" width="100%" >
                                                    <img  v-show="!editmodeAdmin" :src="adminform.id_photo_back" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="adminform" field="id_photo_back"></has-error>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeAdmin" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeAdmin" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade " id="AboutModal" tabindex="-1" role="dialog" aria-labelledby="AboutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeAbout" id="AboutModalLabel">Update About Us</h5>
                        <h5 class="modal-title" v-show="!editmodeAbout" id="AboutModalLabel">Add New About Us</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" @submit.prevent="editmodeAbout ? updateAbout(aboutform.id) : addAbout()" >
                        <div class="modal-body">
                            <div class=" row">
                                 <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input v-model="aboutform.title" type="text" name="title" placeholder="Title"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('title') }" >
                                    <has-error style="color: #e83e8c" :form="aboutform" field="title"></has-error>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="subtitle" class="col-form-label">subtitle</label>
                                    <input v-model="aboutform.subtitle" type="text" name="subtitle" placeholder="subtitle"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('subtitle') }" >
                                    <has-error style="color: #e83e8c" :form="aboutform" field="subtitle"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="why_choose_us" class="col-form-label">why_choose_us</label>
                                    <textarea v-model="aboutform.why_choose_us" type="text" name="why_choose_us" placeholder="why_choose_us"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('why_choose_us') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="aboutform" field="why_choose_us"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="who_we_are" class="col-form-label">who_we_are</label>
                                    <textarea v-model="aboutform.who_we_are" type="text" name="who_we_are" placeholder="who_we_are"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('who_we_are') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="aboutform" field="who_we_are"></has-error>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="what_we_do" class="col-form-label">what_we_do</label>
                                    <textarea v-model="aboutform.what_we_do" type="text" name="what_we_do" placeholder="what_we_do"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('what_we_do') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="aboutform" field="what_we_do"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="front_image" class=" col-form-label">About Us Front Image 6</label><br>
                                        <input @change="aboutChangeFrontImage($event)" type="file" name="front_image"
                                            :class="{ 'is-invalid': aboutform.errors.has('front_image') }">

                                            <img v-show="editmodeAbout" :src="updateAboutFrontImage(aboutform.front_image)" alt="" width="100%" >
                                            <img  v-show="!editmodeAbout" :src="aboutform.front_image" alt="" width="100%" >
                                        <has-error style="color: #e83e8c" :form="aboutform" field="front_image"></has-error>
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeAbout" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeAbout" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade " id="AboutPicsModal" tabindex="-1" role="dialog" aria-labelledby="AboutPicsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeAboutPics" id="AboutPicsModalLabel">Update About Us Pictures</h5>
                        <h5 class="modal-title" v-show="!editmodeAboutPics" id="AboutPicsModalLabel">Add New About Us Pics</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" @submit.prevent="editmodeAboutPics ? updateAboutPics(aboutpicsform.id) : addAboutPics ()" >
                        <div class="modal-body">
                            <div class=" row">
                                 <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input v-model="aboutpicsform.title" type="text" name="title" placeholder="Title"
                                        class="form-control" :class="{ 'is-invalid': aboutpicsform.errors.has('title') }" >
                                    <has-error style="color: #e83e8c" :form="aboutpicsform" field="title"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="description" class="col-form-label">Description</label>
                                   <textarea v-model="aboutpicsform.description" type="text" name="description" placeholder="description"
                                        class="form-control" :class="{ 'is-invalid': aboutpicsform.errors.has('description') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="aboutpicsform" field="description"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="image" class=" col-form-label">Bureau Image 1</label><br>
                                        <input @change="aboutChangeImage($event)" type="file" name="image"
                                            :class="{ 'is-invalid': aboutpicsform.errors.has('image') }">
                                            <img v-show="editmodeAboutPics" :src="updateAboutImage(aboutpicsform.image)" alt="" width="100%" >
                                            <img  v-show="!editmodeAboutPics" :src="aboutpicsform.image" alt="" width="100%" >
                                        <has-error style="color: #e83e8c" :form="aboutpicsform" field="image"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeAboutPics" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeAboutPics" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Service -->
        <div class="modal fade " id="ServiceModal" tabindex="-1" role="dialog" aria-labelledby="ServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeService" id="ServiceModalLabel">Update Service Us</h5>
                        <h5 class="modal-title" v-show="!editmodeService" id="ServiceModalLabel">Add New Service Us</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="editmodeService ? updateService(serviceform.id) : addService()" >
                        <div class="modal-body">
                            <div class=" row">
                                 <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input v-model="serviceform.title" type="text" name="title" placeholder="Title"
                                        class="form-control" :class="{ 'is-invalid': serviceform.errors.has('title') }" >
                                    <has-error style="color: #e83e8c" :form="serviceform" field="title"></has-error>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="service_title" class="col-form-label">Service Title</label>
                                    <input v-model="serviceform.service_title" type="text" name="service_title" placeholder="Service Title"
                                        class="form-control" :class="{ 'is-invalid': serviceform.errors.has('service_title') }" >
                                    <has-error style="color: #e83e8c" :form="serviceform" field="service_title"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="service_details" class="col-form-label">Service Details</label>
                                    <textarea v-model="serviceform.service_details" type="text" name="service_details" placeholder="Service details"
                                        class="form-control" :class="{ 'is-invalid': serviceform.errors.has('service_details') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="serviceform" field="service_details"></has-error>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="service_image" class=" col-form-label">Service Us Front Image 6</label><br>
                                        <input @change="serviceChangeImage($event)" type="file" name="service_image"
                                            :class="{ 'is-invalid': serviceform.errors.has('service_image') }">

                                            <img v-show="editmodeService" :src="updateServiceImage(serviceform.service_image)" alt="" width="100%" >
                                            <img  v-show="!editmodeService" :src="serviceform.service_image" alt="" width="100%" >
                                        <has-error style="color: #e83e8c" :form="serviceform" field="service_image"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeService" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeService" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Extraservice -->
        <div class="modal fade " id="ExtraServiceModal" tabindex="-1" role="dialog" aria-labelledby="ExtraServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeExtraService" id="ExtraServiceModalLabel">Update ExtraService Us</h5>
                        <h5 class="modal-title" v-show="!editmodeExtraService" id="ExtraServiceModalLabel">Add New ExtraService Us</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="editmodeExtraService ? updateExtraService(extraserviceform.id) : addExtraService()" >
                        <div class="modal-body">
                            <div class=" row">
                                 <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input v-model="extraserviceform.title" type="text" name="title" placeholder="Title"
                                        class="form-control" :class="{ 'is-invalid': extraserviceform.errors.has('title') }" >
                                    <has-error style="color: #e83e8c" :form="extraserviceform" field="title"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="details" class="col-form-label">Details</label>
                                    <textarea v-model="extraserviceform.details" type="text" name="details" placeholder="Details"
                                        class="form-control" :class="{ 'is-invalid': extraserviceform.errors.has('details') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="extraserviceform" field="details"></has-error>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="why" class="col-form-label">Why</label>
                                    <textarea v-model="extraserviceform.why" type="text" name="why" placeholder="Why"
                                        class="form-control" :class="{ 'is-invalid': extraserviceform.errors.has('why') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="extraserviceform" field="why"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeExtraService" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeExtraService" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Servicefilter -->
        <div class="modal fade " id="ServiceFilterModal" tabindex="-1" role="dialog" aria-labelledby="ServiceFilterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeServiceFilter" id="ServiceFilterModalLabel">Update ServiceFilter Us</h5>
                        <h5 class="modal-title" v-show="!editmodeServiceFilter" id="ServiceFilterModalLabel">Add New ServiceFilter Us</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="editmodeServiceFilter ? updateServiceFilter(servicefilterform.id) : addServiceFilter()" >
                        <div class="modal-body">
                            <div class=" row">
                                 <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input v-model="servicefilterform.title" type="text" name="title" placeholder="Title"
                                        class="form-control" :class="{ 'is-invalid': servicefilterform.errors.has('title') }" >
                                    <has-error style="color: #e83e8c" :form="servicefilterform" field="title"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="details" class="col-form-label">Details</label>
                                    <textarea v-model="servicefilterform.details" type="text" name="details" placeholder="Details"
                                        class="form-control" :class="{ 'is-invalid': servicefilterform.errors.has('details') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="servicefilterform" field="details"></has-error>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="why" class="col-form-label">Why</label>
                                    <textarea v-model="servicefilterform.why" type="text" name="why" placeholder="Why"
                                        class="form-control" :class="{ 'is-invalid': servicefilterform.errors.has('why') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="servicefilterform" field="why"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeServiceFilter" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeServiceFilter" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Advert -->
        <div class="modal fade " id="AdvertModal" tabindex="-1" role="dialog" aria-labelledby="AdvertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeAdvert" id="AdvertModalLabel">Update Advert Us</h5>
                        <h5 class="modal-title" v-show="!editmodeAdvert" id="AdvertModalLabel">Add New Advert Us</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" @submit.prevent="editmodeAdvert ? updateAdvert(advertform.id) : addAdvert()" >
                        <div class="modal-body">
                            <div class=" row">
                                 <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input v-model="advertform.title" type="text" name="title" placeholder="Title"
                                        class="form-control" :class="{ 'is-invalid': advertform.errors.has('title') }" >
                                    <has-error style="color: #e83e8c" :form="advertform" field="title"></has-error>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="subtitle" class="col-form-label">subtitle</label>
                                    <input v-model="advertform.subtitle" type="text" name="subtitle" placeholder="subtitle"
                                        class="form-control" :class="{ 'is-invalid': advertform.errors.has('subtitle') }" >
                                    <has-error style="color: #e83e8c" :form="advertform" field="subtitle"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="details" class="col-form-label">details</label>
                                    <textarea v-model="advertform.details" type="text" name="details" placeholder="details"
                                        class="form-control" :class="{ 'is-invalid': advertform.errors.has('details') }" >
                                    </textarea>
                                    <has-error style="color: #e83e8c" :form="advertform" field="details"></has-error>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="advert_image" class=" col-form-label">Advert Us Front Image 6</label><br>
                                        <input @change="advertChangeImage($event)" type="file" name="advert_image"
                                            :class="{ 'is-invalid': advertform.errors.has('advert_image') }">

                                            <img v-show="editmodeAdvert" :src="updateAdvertImage(advertform.advert_image)" alt="" width="100%" >
                                            <img  v-show="!editmodeAdvert" :src="advertform.advert_image" alt="" width="100%" >
                                        <has-error style="color: #e83e8c" :form="advertform" field="advert_image"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeAdvert" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeAdvert" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

  </div>
</template>

<script>

    export default {
        name:"SingleBureau",
        data(){
            return{
                newBureauDirector: false,
                editmodeBureau: false,
                bureauOutput:'',//view form data and confirm if is ok before submit
                bureauform: new Form({
                        id:'',
                        name:'',
                        bureau_email:'',
                        phone:'',
                        landline:'',
                        website:'',
                        address:'',
                        country_id:'',
                        county_id:'',
                        constituency_id:'',
                        ward_id:'',
                        logo:'',
                        // //director
                        // director_first_name:'',
                        // director_last_name:'',
                        // email:'',
                        // director_password:'',
                        // director_phone:'',
                        // director_landline:'',
                        // director_id_no:'',
                        // director_address:'',
                        // director_country_id:'',
                        // director_county_id:'',
                        // director_constituency_id:'',
                        // director_ward_id:'',
                        // director_passport_image:'',
                        // frontside_director_id_photo:'',
                        // backside_director_id_photo:'',
                }),
                newDirector: false,
                editmodeDirector: false,
                directorform: new Form({
                        id:'',
                        first_name:'',
                        last_name:'',
                        email:'',
                        password:'',
                        director_type:'',
                        permissions:[],
                        roles:[],
                        user_id:'',
                        bureau_id:'',
                        position_id:'',
                        photo:'',
                        active:'',
                        id_no:'',
                        id_photo_front:'',
                        id_photo_back:'',
                        about_me:'',
                        phone:'',
                        landline:'',
                        address:'',
                        country_id:'',
                        county_id:'',
                        constituency_id:'',
                        ward_id:'',
                }),
                newAdmin: false,
                editmodeAdmin: false,
                adminform: new Form({
                        id:'',
                        first_name:'',
                        last_name:'',
                        email:'',
                        password:'',
                        admin_type:'',
                        permissions:[],
                        roles:[],
                        user_id:'',
                        organisation_id:'',
                        position_id:'',
                        photo:'',
                        active:'',
                        id_no:'',
                        id_photo_front:'',
                        id_photo_back:'',
                        about_me:'',
                        phone:'',
                        landline:'',
                        address:'',
                        country_id:'',
                        county_id:'',
                        constituency_id:'',
                        ward_id:'',
                }),
                 //admin
                phone1:{
                        isValid: false,
                        country: undefined,
                },
                landline1:{
                        isValid: false,
                        country: undefined,
                },
                 //director
                phone2:{
                        isValid: false,
                        country: undefined,
                },
                landline2:{
                        isValid: false,
                        country: undefined,
                },
                //bureau
                phone3:{
                        isValid: false,
                        country: undefined,
                },
                landline3:{
                        isValid: false,
                        country: undefined,
                },

                editmodeAbout: false,
                aboutform: new Form({
                        id:'',
                        user_id:'',
                        bureau_id:'',
                        bureau_id:'',
                        title:'',
                        subtitle:'',
                        front_image:'',
                        why_choose_us:'',
                        who_we_are:'',
                        what_we_do:'',
                }),
                editmodeAboutPics: false,
                aboutpicsform: new Form({
                        id:'',
                        title:'',
                        description:'',
                        image:'',
                }),
                editmodeService: false,
                serviceform: new Form({
                        id:'',
                        title:'',
                        service_title:'',
                        service_details:'',
                        service_image:'',
                }),
                editmodeAdvert: false,
                advertform: new Form({
                        id:'',
                        title:'',
                        subtitle:'',
                        details:'',
                        advert_image:'',
                }),
                editmodeExtraService: false,
                extraserviceform: new Form({
                        id:'',
                        title:'',
                        details:'',
                        why:'',
                }),
                editmodeServiceFilter: false,
                servicefilterform: new Form({
                        id:'',
                        title:'',
                        details:'',
                        why:'',
                }),
            }
        },
        mounted() {
            this.loadCountries();
            this.loadCounties();
            this.loadConstituencies();///linked to methods and actions store
            this.loadWards();///linked to methods and actions store
            this.loadAbout();
            this.loadAboutPic();
            this.loadService();
            this.loadExtraService();
            this.loadServiceFilter();
            this.loadAdvert();
            this.singlebureau();
        },
        computed:{
            Countries(){
                return this.$store.getters.Countries
            },
            Counties(){
               return this.$store.getters.CountryCounties
            },
            Constituencies(){
               return this.$store.getters.CountyConstituencies
            },
            Wards(){
               return this.$store.getters.ConstituencyWards
            },
            Bureau(){
                console.log(this.$store.getters.Bureau)
               return this.$store.getters.Bureau//reminder to updater index
            },
            About(){
               return this.$store.getters.About
            },
            AboutPic(){
               return this.$store.getters.AboutPic
            },
            Service(){
               return this.$store.getters.Service
            },
            ExtraService(){
               return this.$store.getters.ExtraService
            },
            ServiceFilter(){
               return this.$store.getters.ServiceFilter
            },
            Advert(){
               return this.$store.getters.Advert
            },
        },
        methods:{
            singlebureau(){
                        console.log(this.$route.params.id)
                        this.$store.dispatch('BureauById', this.$route.params.id);   //action from index.js
                    },
            //Bureau verification
            validateBureau() {
                this.$Progress.start()
                return this.bureauform.post('/bureau/verify/info')
                    .then((response)=>{
                        return true;
                        toast({
                            type: 'success',
                            title: 'Bureau Info Verifed successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        toast({
                            type: 'error',
                            title: 'The Bureau Info failed Verification.'
                        })
                    })
            },
            //Director info verification
            validateDirector() {
                this.$Progress.start()
                this.bureauOutput = this.bureauform;  //append form data
                return this.bureauform.post('/bureau/verify/director')
                    .then((response)=>{
                        return true;
                        toast({
                            type: 'success',
                            title: 'Director Info Verifed successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        toast({
                            type: 'error',
                            title: 'The Director Info failed Verification.'
                        })
                    })
            },
            //Bureau verification
            validateBureauUpdate() {
                let id = this.bureauform.id;
                console.log('first',id);
                this.$Progress.start()
                return this.bureauform.patch('/bureau/updateverify/info/'+id)
                    .then((response)=>{
                        return true;
                        toast({
                            type: 'success',
                            title: 'Bureau update Info Verifed successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        toast({
                            type: 'error',
                            title: 'The Bureau update Info failed Verification.'
                        })
                    })
            },
            //Director info verification
            validateDirectorUpdate() {
                 let id = this.bureauform.id;
                console.log('mix me down',id);
                this.$Progress.start()
                // console.log('mis me down')
                // this.bureauOutput = this.bureauform;  //append form data
                return this.bureauform.patch('/bureau/updateverify/director/'+id)
                    .then((response)=>{
                        return true;
                        toast({
                            type: 'success',
                            title: 'Director Update Info Verifed successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        toast({
                            type: 'error',
                            title: 'The Director update Info failed Verification.'
                        })
                    })
            },
            //Bureau
            InputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.bureauform.phone = number;
            this.phone1.isValid = isValid;
            this.phone1.country = country && country.name;
            },
            InputLandline({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.bureauform.landline = number;
            this.landline1.isValid = isValid;
            this.landline1.country = country && country.name;
            },
            //Director
            DirectorInputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.bureauform.director_phone = number;
            this.director_phone1.isValid = isValid;
            this.director_phone1.country = country && country.name;
            },
            DirectorInputLandline({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.bureauform.director_landline = number;
            this.director_landline1.isValid = isValid;
            this.director_landline1.country = country && country.name;
            },
            countryCounties(country_id){
                console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            countyConstituencies(county_id){
                console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            constituencyWards(constituency_id){
                console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            DirectorcountryCounties(country_id){
                console.log(country_id);
                this.$store.dispatch('countrycounties', country_id);
            },
            DirectorcountyConstituencies(county_id){
                console.log(county_id);
                this.$store.dispatch('countyconstituencies', county_id);
            },
            DirectorconstituencyWards(constituency_id){
                console.log(constituency_id);
                this.$store.dispatch('constituencywards', constituency_id); //send to store to the action with id
            },
            loadCountries(){
                return this.$store.dispatch( "countries")//get all from roles.index
            },
            loadCounties(){
                return this.$store.dispatch( "countrycounties")//get all from counties.index
            },
            loadConstituencies(){
                return this.$store.dispatch( "countyconstituencies")//get all from counties.index
            },
            loadWards(){
                return this.$store.dispatch( "constituencywards")//get all from towns.index
            },
            loadAbout(){
                return this.$store.dispatch( "about")
            },
            loadAboutPic(){
                return this.$store.dispatch( "aboutpic")
            },
            loadAdvert(){
                return this.$store.dispatch( "advert")
            },
            loadService(){
                return this.$store.dispatch( "service")
            },
            loadExtraService(){
                return this.$store.dispatch( "extraservice")
            },
            loadServiceFilter(){
                return this.$store.dispatch( "servicefilter")
            },

            // //Bureau
            // newBureauModal(){
            //      this.editmodeBureau= false;
            //      this.bureauform.reset()
            //          $('#BureauModal').modal('show')
            // },
            editBureauModal(id){

                 this.editmodeBureau = true;
                 this.bureauform.reset()
                   console.log('edit bureauanisaton', id)
                    this.$Progress.start();
                      axios.get('/bureau/edit/'+id)
                        .then((response)=>{
                           $('#BureauModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Bureau data successfully'
                            })
                            this.bureauform.fill(response.data.bureau);
                            //get country id
                            this.bureauform.country_id = response.data.bureau.country.id;
                            //get county id using the country id
                            this.bureauform.county_id = response.data.bureau.county.id
                            this.$store.dispatch('countrycounties', response.data.bureau.country.id);
                            //get contituency using county id
                            this.bureauform.constituency_id = response.data.bureau.constituency.id
                            this.$store.dispatch('countyconstituencies', response.data.bureau.county.id);
                            //get ward usng constituency id
                            this.bureauform.ward_id = response.data.bureau.ward.id
                            this.$store.dispatch('constituencywards', response.data.bureau.constituency.id);

                            this.$Progress.finish();

                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#BureauModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            //bureau logo
            bureauChangeLogo(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.bureauform.logo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            bureauLoadLogo(logo_id){
                 if(logo_id){
                    return "assets/bureau/img/logo/"+logo_id;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            updateBureauLogo(bureauformlogo){
                console.log(bureauformlogo)
                let img = this.bureauform.logo;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.bureauform.logo;
                        }else{
                            if(bureauformlogo){
                                return "assets/bureau/img/logo/"+bureauformlogo;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },


            //director
            newDirectorModal(bureau_id){
                console.log(bureau_id)
                 this.editmodeDirector= false;
                 this.directorform.reset()
                 this.directorform.bureau_id;
                     $('#DirectorModal').modal('show')
            },
            //bureau director passposrt image
            directorLoadPassPhoto(directorpivot_photo){
                if(directorpivot_photo){
                    return "/assets/bureau/img/directors/passports/"+directorpivot_photo;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            //director passport photo
            directorChangePassPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.directorform.photo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateDirectorPassPhoto(directorform_bureaudirector_photo){
                // console.log(directorform_bureaudirector_photo)
                let img = this.directorform.photo;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.directorform.photo;
                        }else{
                            if(directorform_bureaudirector_photo){
                                return "assets/bureau/img/directors/passports/"+directorform_bureaudirector_photo;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            directorLoadIDFrontPhoto(directorpivot_id_photo_front){
                if(directorpivot_id_photo_front){
                    return "/assets/bureau/img/directors/IDs/front/"+directorpivot_id_photo_front;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            directorChangeIDFrontPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.directorform.id_photo_front =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateDirectorIDFrontPhoto(directorform_id_photo_front){
                let img = this.directorform.id_photo_front;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.directorform.id_photo_front;
                        }else{
                            if(directorform_id_photo_front){
                                return "assets/bureau/img/directors/IDs/front/"+directorform_id_photo_front;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            directorLoadIDBackPhoto(directorform_id_photo_back){
                if(directorform_id_photo_back){
                    return "/assets/bureau/img/directors/IDs/back/"+directorform_id_photo_back;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            directorChangeIDBackPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.directorform.id_photo_back =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateDirectorIDBackPhoto(directorform_id_photo_back){
                let img = this.directorform.id_photo_back;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.directorform.id_photo_back;
                        }else{
                            if(directorform_id_photo_back){
                                return "assets/bureau/img/directors/IDs/back/"+directorform_id_photo_back;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },





            //admin
            newAdminModal(){
                 this.editmodeAdmin= false;
                 this.adminform.reset()
                     $('#AdminModal').modal('show')
            },
            //bureau admin passposrt image
            adminLoadPassPhoto(adminpivot_photo){
                if(adminpivot_photo){
                    return "/assets/bureau/img/admins/passports/"+adminpivot_photo;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            //admin passport photo
            adminChangePassPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.adminform.photo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateAdminPassPhoto(adminform_bureauadmin_photo){
                // console.log(adminform_bureauadmin_photo)
                let img = this.adminform.photo;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                        //  console.log('its reall null')
                      }else{
                          if(img.length>100){
                            return this.adminform.photo;
                        }else{
                            if(adminform_bureauadmin_photo){
                                return "assets/bureau/img/admins/passports/"+adminform_bureauadmin_photo;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            adminLoadIDFrontPhoto(adminpivot_id_photo_front){
                if(adminpivot_id_photo_front){
                    return "/assets/bureau/img/admins/IDs/front/"+adminpivot_id_photo_front;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            adminChangeIDFrontPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.adminform.id_photo_front =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateAdminIDFrontPhoto(adminform_id_photo_front){
                let img = this.adminform.id_photo_front;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.adminform.id_photo_front;
                        }else{
                            if(adminform_id_photo_front){
                                return "assets/bureau/img/admins/IDs/front/"+adminform_id_photo_front;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            adminLoadIDBackPhoto(adminform_id_photo_back){
                if(adminform_id_photo_back){
                    return "/assets/bureau/img/admins/IDs/back/"+adminform_id_photo_back;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            adminChangeIDBackPhoto(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.adminform.id_photo_back =event.target.result
                            };
                        reader.readAsDataURL(file);
                }
            },
            updateAdminIDBackPhoto(adminform_id_photo_back){
                let img = this.adminform.id_photo_back;
                      if(img ==null){
                          return "/assets/bureau/img/website/empty.png";
                      }else{
                          if(img.length>100){
                            return this.adminform.id_photo_back;
                        }else{
                            if(adminform_id_photo_back){
                                return "assets/bureau/img/admins/IDs/back/"+adminform_id_photo_back;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
                      }

            },
            editDirectorModal(id){
                console.log(id)
                 this.editmodeDirector = true;
                 this.directorform.reset()
                    this.$Progress.start();
                      axios.get('/bureaudirector/edit/'+id)
                        .then((response)=>{
                           $('#DirectorModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Director data successfully'
                            })
                            console.log(response.data.director.bureaudirectors[0].pivot)
                            this.directorform.fill(response.data.director)
                            this.directorform.user_id = response.data.director.bureaudirectors[0].pivot.user_id
                            this.directorform.bureau_id = response.data.director.bureaudirectors[0].pivot.bureau_id
                            // // this.directorform.position_id = response.data.director.bureaudirectors[0].pivot.position_id
                            this.directorform.photo = response.data.director.bureaudirectors[0].pivot.photo
                            this.directorform.id_no = response.data.director.bureaudirectors[0].pivot.id_no
                            this.directorform.id_photo_front = response.data.director.bureaudirectors[0].pivot.id_photo_front
                            this.directorform.id_photo_back = response.data.director.bureaudirectors[0].pivot.id_photo_back
                            this.directorform.phone = response.data.director.bureaudirectors[0].pivot.phone
                            this.directorform.landline = response.data.director.bureaudirectors[0].pivot.landline
                            this.directorform.address = response.data.director.bureaudirectors[0].pivot.address

                        // //    //get country id
                            this.directorform.country_id = response.data.director.bureaudirectors[0].pivot.country_id
                            //get county id using the country id
                            this.directorform.county_id = response.data.director.bureaudirectors[0].pivot.county_id
                            this.$store.dispatch('countrycounties', response.data.director.bureaudirectors[0].pivot.country_id);
                            //get contituency using county id
                            this.directorform.constituency_id = response.data.director.bureaudirectors[0].pivot.constituency_id
                            this.$store.dispatch('countyconstituencies', response.data.director.bureaudirectors[0].pivot.county_id);
                            // //get ward usng constituency id
                            this.directorform.ward_id = response.data.director.bureaudirectors[0].pivot.ward_id
                            this.$store.dispatch('constituencywards', response.data.director.bureaudirectors[0].pivot.constituency_id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#DirectorModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            addDirector() {
                console.log(this.$route.params.id)
                this.$Progress.start();
                this.directorform.patch('/bureaudirector/'+this.$route.params.id)
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Director Created successfully'
                            })
                             this.$store.dispatch('BureauById', this.$route.params.id);
                            this.directorform.reset()
                            $('#DirectorModal').modal('hide')
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#DirectorModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateDirector(id){
                  console.log('update director')
                  this.$Progress.start();
                     this.directorform.patch('/bureaudirector/update/'+id)
                        .then(()=>{
                        this.$store.dispatch('BureauById', this.$route.params.id);
                         $('#DirectorModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Director Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            deleteDirector(id){
                Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                    //  console.log('delete director', id)
                        this.$Progress.start();
                        this.directorform.get('/bureaudirector/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Director Deleted successfully'
                            })
                             this.$store.dispatch('BureauById', this.$route.params.id);
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
                     }
                })
             },






            addBureau(){
                console.log('add Bureau new')
                this.$Progress.start();
                this.bureauform.post('/bureau')
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Bureau Created successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            $('#BureauModal').modal('hide')
                            this.bureauform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#BureauModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateBureau(id){
                  console.log('update bureauanisaton')
                  this.$Progress.start();
                     this.bureauform.patch('/singlebureau/update/'+id)
                        .then(()=>{
                            this.$store.dispatch('BureauById', id);
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                         $('#BureauModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'User Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            $('#BureauModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            deleteBureau(id){
                Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                    //  console.log('delete user', id)
                        this.$Progress.start();
                        this.bureauform.get('/bureau/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Bureau Deleted successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
                     }
                })
            },
            //About
            newAboutModal(){
                this.editmodeAbout = false;
                 this.aboutform.reset()
                     $('#AboutModal').modal('show')
            },
            editAboutModal(id){
                 this.editmodeAbout = true;
                 this.aboutform.reset()
                   console.log('edit about', id)
                    this.$Progress.start();
                      axios.get('/about/edit/'+id)

                        .then((response)=>{
                             console.log(response.data)
                           $('#AboutModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the About data successfully'
                            })
                            this.aboutform.fill(response.data.about)
                               this.$Progress.finish();
                        })
                        .catch(()=>{

                            //errors
                            $('#AboutModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                            this.$Progress.fail();
                        })
            },
            aboutChangeFrontImage(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.aboutform.front_image =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutLoadFrontImage(front_image_id){
                if(front_image_id){
                    return "/assets/bureau/img/website/frontimage/"+front_image_id;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            updateAboutFrontImage(aboutformfront_image){
                // console.log(aboutformfront_image, 'mixcv')
                let img = this.aboutform.front_image;
                      if(img.length>100){
                            console.log('bbbbmixcv')
                            return this.aboutform.front_image;
                        }else{
                            if(aboutformfront_image){
                                return "assets/bureau/img/website/frontimage/"+aboutformfront_image;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
            },
            addAbout() {
                console.log('add About new')
                this.$Progress.start();
                this.aboutform.post('/about')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'About Info Created successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            $('#AboutModal').modal('hide')
                            this.aboutform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#AboutModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateAbout(id){
                  console.log('update about')
                  this.$Progress.start();
                     this.aboutform.patch('/about/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                         $('#AboutModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'About Updated successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                             $('#AboutModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            //About pics
            newAboutPicsModal(){
                this.editmodeAboutPics = false;
                 this.aboutpicsform.reset()
                     $('#AboutPicsModal').modal('show')
            },
            editAboutPicsModal(id){
                 this.editmodeAboutPics = true;
                 this.aboutpicsform.reset()
                   console.log('edit aboutpic', id)
                    this.$Progress.start();
                      axios.get('/aboutpic/edit/'+id)
                        .then((response)=>{
                             console.log(response.data)
                           $('#AboutPicsModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the About data successfully'
                            })
                            this.aboutpicsform.fill(response.data.aboutpic)
                               this.$Progress.finish();
                        })
                        .catch(()=>{

                            //errors
                            $('#AboutPicsModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                            this.$Progress.fail();
                        })
            },
            aboutChangeImage(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.aboutpicsform.image =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutLoadImage(about_image_id){
                if(about_image_id){
                    return "/assets/bureau/img/website/aboutpics/"+about_image_id;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            updateAboutImage(about_image){
                // console.log(this.aboutpicsform.image)
                let img = this.aboutpicsform.image;
                      if(img.length>100){
                            return this.aboutpicsform.image;
                        }else{
                            if(about_image){
                                return "assets/bureau/img/website/aboutpics/"+about_image;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
            },
            addAboutPics(){
                console.log('add About pics new')
                this.$Progress.start();
                this.aboutpicsform.post('/aboutpic')
                    .then((response)=>{
                        $('#AboutPicsModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'aboutpics Created successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.aboutpicsform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        //errors
                            $('#AboutPicsModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                            })
                            this.$Progress.fail()
                    })
            },
            updateAboutPics(id){
                  console.log('update about')
                  this.$Progress.start();
                     this.aboutpicsform.patch('/aboutpic/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                         $('#AboutPicsModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'About Updated successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                             $('#AboutPicsModal').modal('show')
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            deleteAboutPics(id){
                Swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                    //  console.log('delete user', id)
                        this.$Progress.start();
                        this.aboutpicsform.get('/aboutpic/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'About Picture Deleted successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
                     }
                })
            },
            //Service
            newServiceModal(){
                this.editmodeService = false;
                 this.serviceform.reset()
                     $('#ServiceModal').modal('show')
            },
            editServiceModal(id){
                 this.editmodeService = true;
                 this.serviceform.reset()
                   console.log('edit service', id)
                    this.$Progress.start();
                      axios.get('/service/edit/'+id)

                        .then((response)=>{
                             console.log(response.data)
                           $('#ServiceModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Service data successfully'
                            })
                            this.serviceform.fill(response.data.service)
                               this.$Progress.finish();
                        })
                        .catch(()=>{
                            //errors
                            $('#ServiceModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                            this.$Progress.fail();
                        })
            },
            serviceChangeImage(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.serviceform.service_image =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            serviceLoadImage(image_id){
                if(image_id){
                    return "/assets/bureau/img/website/services/"+image_id;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            updateServiceImage(serviceformimage){
                // console.log(serviceformimage, 'mixcv')
                let img = this.serviceform.service_image;
                      if(img.length>100){
                            console.log('bbbbmixcv')
                            return this.serviceform.service_image;
                        }else{
                            if(serviceformimage){
                                return "assets/bureau/img/website/services/"+serviceformimage;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
            },
            addService() {
                console.log('add Service new')
                this.$Progress.start();
                this.serviceform.post('/service')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Service Info Created successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "service")
                            $('#ServiceModal').modal('hide')
                            this.serviceform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#ServiceModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateService(id){
                  console.log('update service')
                  this.$Progress.start();
                     this.serviceform.patch('/service/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "service")
                         $('#ServiceModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Service Updated successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                             $('#ServiceModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            //Extraservice
            newExtraServiceModal(){
                this.editmodeExtraService = false;
                 this.extraserviceform.reset()
                     $('#ExtraServiceModal').modal('show')
            },
            editExtraServiceModal(id){
                 this.editmodeExtraService = true;
                 this.extraserviceform.reset()
                   console.log('edit extraservice', id)
                    this.$Progress.start();
                      axios.get('/extraservice/edit/'+id)

                        .then((response)=>{
                             console.log(response.data)
                           $('#ExtraServiceModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Extraservice data successfully'
                            })
                            this.extraserviceform.fill(response.data.extraservice)
                               this.$Progress.finish();
                        })
                        .catch(()=>{
                            //errors
                            $('#ExtraServiceModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                            this.$Progress.fail();
                        })
            },
            //soon we can add images to extra services
            // extraserviceChangeImage(event){ //soonn we canaddimages too
            //  let file = event.target.files[0];
            //     if(file.size>1048576){
            //         Swal.fire({
            //                 type: 'error',
            //                 title: 'Oops...',
            //                 text: 'The File you are uploading is larger than 2mbs!',
            //                 // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
            //             })
            //     }else{
            //         let reader = new FileReader();
            //             reader.onload = event=> {
            //                 this.extraserviceform.extraservice_image =event.target.result
            //                     // console.log(event.target.result)
            //                 };
            //             reader.readAsDataURL(file);
            //     }
            // },
            // extraserviceLoadImage(image_id){
            //     if(image_id){
            //         return "/assets/bureau/img/website/extraservices/"+image_id;
            //     }else{
            //         return "/assets/bureau/img/website/empty.png";
            //     }
            // },
            // updateExtraserviceImage(extraserviceformimage){
            //     // console.log(extraserviceformimage, 'mixcv')
            //     let img = this.extraserviceform.extraservice_image;
            //           if(img.length>100){
            //                 console.log('bbbbmixcv')
            //                 return this.extraserviceform.extraservice_image;
            //             }else{
            //                 if(extraserviceformimage){
            //                     return "assets/bureau/img/website/extraservices/"+extraserviceformimage;
            //                 }else{
            //                     return "/assets/bureau/img/website/empty.png";
            //                 }
            //             }
            // },
            addExtraService() {
                console.log('add Extraservice new')
                this.$Progress.start();
                this.extraserviceform.post('/extraservice')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Extraservice Info Created successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "service")
                            this.$store.dispatch( "extraservice")
                            $('#ExtraServiceModal').modal('hide')
                            this.extraserviceform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#ExtraServiceModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateExtraService(id){
                  console.log('update extraservice')
                  this.$Progress.start();
                     this.extraserviceform.patch('/extraservice/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "service")
                            this.$store.dispatch( "extraservice")
                         $('#ExtraServiceModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Extraservice Updated successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                             $('#ExtraServiceModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            //Servicefilter
            newServiceFilterModal(){
                this.editmodeServiceFilter = false;
                 this.servicefilterform.reset()
                     $('#ServiceFilterModal').modal('show')
            },
            editServiceFilterModal(id){
                 this.editmodeServiceFilter = true;
                 this.servicefilterform.reset()
                   console.log('edit servicefilter', id)
                    this.$Progress.start();
                      axios.get('/servicefilter/edit/'+id)

                        .then((response)=>{
                             console.log(response.data)
                           $('#ServiceFilterModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Servicefilter data successfully'
                            })
                            this.servicefilterform.fill(response.data.servicefilter)
                               this.$Progress.finish();
                        })
                        .catch(()=>{
                            //errors
                            $('#ServiceFilterModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                            this.$Progress.fail();
                        })
            },
            //soon we can add images to service filters
            // servicefilterChangeImage(event){ //soonn we canaddimages too
            //  let file = event.target.files[0];
            //     if(file.size>1048576){
            //         Swal.fire({
            //                 type: 'error',
            //                 title: 'Oops...',
            //                 text: 'The File you are uploading is larger than 2mbs!',
            //                 // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
            //             })
            //     }else{
            //         let reader = new FileReader();
            //             reader.onload = event=> {
            //                 this.servicefilterform.servicefilter_image =event.target.result
            //                     // console.log(event.target.result)
            //                 };
            //             reader.readAsDataURL(file);
            //     }
            // },
            // servicefilterLoadImage(image_id){
            //     if(image_id){
            //         return "/assets/bureau/img/website/servicefilters/"+image_id;
            //     }else{
            //         return "/assets/bureau/img/website/empty.png";
            //     }
            // },
            // updateServicefilterImage(servicefilterformimage){
            //     // console.log(servicefilterformimage, 'mixcv')
            //     let img = this.servicefilterform.servicefilter_image;
            //           if(img.length>100){
            //                 console.log('bbbbmixcv')
            //                 return this.servicefilterform.servicefilter_image;
            //             }else{
            //                 if(servicefilterformimage){
            //                     return "assets/bureau/img/website/servicefilters/"+servicefilterformimage;
            //                 }else{
            //                     return "/assets/bureau/img/website/empty.png";
            //                 }
            //             }
            // },
            addServiceFilter() {
                console.log('add Servicefilter new')
                this.$Progress.start();
                this.servicefilterform.post('/servicefilter')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Servicefilter Info Created successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "filter")
                            this.$store.dispatch( "servicefilter")
                            $('#ServiceFilterModal').modal('hide')
                            this.servicefilterform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#ServiceFilterModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateServiceFilter(id){
                  console.log('update servicefilter')
                  this.$Progress.start();
                     this.servicefilterform.patch('/servicefilter/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "service")
                            this.$store.dispatch( "extraservice")
                            this.$store.dispatch( "servicefilter")
                         $('#ServiceFilterModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Servicefilter Updated successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                             $('#ServiceFilterModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            //Advert
            newAdvertModal(){
                this.editmodeAdvert = false;
                 this.advertform.reset()
                     $('#AdvertModal').modal('show')
            },
            editAdvertModal(id){
                 this.editmodeAdvert = true;
                 this.advertform.reset()
                   console.log('edit advert', id)
                    this.$Progress.start();
                      axios.get('/advert/edit/'+id)

                        .then((response)=>{
                             console.log(response.data)
                           $('#AdvertModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Advert data successfully'
                            })
                            this.advertform.fill(response.data.advert)
                               this.$Progress.finish();
                        })
                        .catch(()=>{

                            //errors
                            $('#AdvertModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                            this.$Progress.fail();
                        })
            },
            advertChangeImage(event){
             let file = event.target.files[0];
                if(file.size>1048576){
                    Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'The File you are uploading is larger than 2mbs!',
                            // footer: '<a href>Why do I have this issue? Reduce the Logo Size</a>'
                        })
                }else{
                    let reader = new FileReader();
                        reader.onload = event=> {
                            this.advertform.advert_image =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            advertLoadImage(image_id){
                if(image_id){
                    return "/assets/bureau/img/website/adverts/"+image_id;
                }else{
                    return "/assets/bureau/img/website/empty.png";
                }
            },
            updateAdvertImage(advertformimage){
                // console.log(advertformimage, 'mixcv')
                let img = this.advertform.advert_image;
                      if(img.length>100){
                            console.log('bbbbmixcv')
                            return this.advertform.advert_image;
                        }else{
                            if(advertformimage){
                                return "assets/bureau/img/website/adverts/"+advertformimage;
                            }else{
                                return "/assets/bureau/img/website/empty.png";
                            }
                        }
            },
            addAdvert() {
                console.log('add Advert new')
                this.$Progress.start();
                this.advertform.post('/advert')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Advert Info Created successfully'
                            })
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "advert")
                            $('#AdvertModal').modal('hide')
                            this.advertform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#AdvertModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateAdvert(id){
                  console.log('update advert')
                  this.$Progress.start();
                     this.advertform.patch('/advert/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "bureau")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            this.$store.dispatch( "advert")
                         $('#AdvertModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'Advert Updated successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                             $('#AdvertModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },

        },
        watch:{
            $route(to, from){
                this.singleabureau();//method
           }
        }

    }
</script>

