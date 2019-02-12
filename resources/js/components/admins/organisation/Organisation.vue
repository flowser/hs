<template>
  <div class="container-fluid mt-5">
      <!-- Main content -->
        <div class="col-md-12">
                <!-- Widget: user widget style 1 -->
                <div v-if="Organisation.length <1" class="card-tools">
                    <button class="btn btn-success" @click.prevent="newOrganisationModal()" >Add Organisation
                        <i class="fas fa-plus fw"></i>
                    </button>
                </div>
                <div class="card card-widget widget-user" v-for="organisation in Organisation" :key="organisation.id">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white" style="background: url('assets/organisation/img/background/background-1.jpg')
                    center center;width:100%;height:300px">

                            <div class="clearfix">
                                <span class="float-left">
                                    <h3 class="widget-user-username">{{organisation.name}}</h3>
                                    <h5 class="widget-user-desc bg-green" style="margin-bottom:0">Phone: {{organisation.phone}}, <span>{{organisation.landline}}</span> </h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0">P.O. Box {{organisation.address}},</h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0">{{organisation.ward.name}} Ward,
                                        <span>{{organisation.constituency.name}} Constituency,</span>
                                    </h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0">{{organisation.county.name}} County,
                                         <span> {{organisation.country.name}}</span>
                                    </h5>
                                </span>
                                <span class="float-right">
                                    <h5 class="widget-user-desc" style="margin-bottom:0">{{organisation.email}}</h5>
                                    <h5 class="widget-user-desc" style="margin-bottom:0">{{organisation.website}}</h5>
                                    <!-- <p style="margin-bottom:-0.5em">
                                        <small class="text-muted">Updated By: {{organisation.user.full_name}}</small>
                                    </p> -->
                                    <p style="margin-bottom:0.25em">
                                        <small class="text-muted">Last updated On: {{organisation.updated_at | dateformat}}</small>
                                    </p>
                                    <a href=""  @click.prevent="editOrganisationModal(organisation.id)">
                                            <i class="fa fa-edit red"> Edit</i>
                                    </a>
                                    <!-- / -->
                                    <!-- <a href=""  @click.prevent="deleteOrgnisation(organisation.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a> -->
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
                     <img :src="organisationLoadLogo(organisation.logo)"  class="border-0" alt="" style="width:160px;">
                     <h3 class="card-title text-center text-white">{{organisation.name}}</h3>
                </div>

                </div>

                <!-- /.widget-user -->
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
                                <!-- /.tab-pane -->
                                <div class="tab-pane active show" id="about_us">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#general_configuration">About Us Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newAboutPicsModal()" >Add New About US Pictures
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
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
                            <!-- /.tab-content -->
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->
        </div>
        <!-- Role Modal -->
        <div class="modal fade " id="OrganisationModal" tabindex="-1" role="dialog" aria-labelledby="OrganisationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeOrganisation" id="OrganisationModalLabel">Update Organisation User</h5>
                        <h5 class="modal-title" v-show="!editmodeOrganisation" id="OrganisationModalLabel">Add New Organisation User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" @submit.prevent="editmodeOrganisation ? updateOrganisation(organisationform.id) : addOrganisation ()" >
                        <div class="modal-body">
                            <div class=" row">
                                <div class="form-group col-md-4">
                                    <label for="name" class="col-form-label"> Organisation Name</label>
                                    <input v-model="organisationform.name" type="text" name="name" placeholder="Organisation Name"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('name') }" >
                                    <has-error style="color: #e83e8c" :form="organisationform" field="name"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class=" col-form-label">Email </label>
                                    <input v-model="organisationform.email" type="email" name="email" placeholder="Email Address"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('email') }" >
                                    <has-error style="color: #e83e8c" :form="organisationform" field="email"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone" class="col-form-label"> Organisation Pxxhone</label>
                                        <div>
                                            <vue-tel-input v-model="organisationform.phone" name="phone" @onInput="InputPhone"
                                            class="form-control" :class="{ 'is-invalid': organisationform.errors.has('phone') }">
                                            </vue-tel-input>
                                            <has-error style="color: #e83e8c" :form="organisationform" field="phone"></has-error>
                                        </div>
                                        <div v-if="organisationform.phone" style="color: #e83e8c">
                                            <span>Is valid: <strong>{{phone1.isValid}}</strong>,&nbsp;</span>
                                            <span>Country: <strong>{{phone1.country}}</strong></span>
                                       </div>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-4">
                                    <label for="landline" class=" col-form-label">Landline</label>
                                        <vue-tel-input v-model="organisationform.landline" name="landline" @onInput="InputLandline"
                                             class="form-control" :class="{ 'is-invalid': organisationform.errors.has('landline') }">
                                        </vue-tel-input>
                                        <has-error style="color: #e83e8c" :form="organisationform" field="landline"></has-error>

                                        <div v-if="organisationform.landline" style="color: #e83e8c">
                                            <span>Is valid: <strong>{{landline1.isValid}}</strong>,&nbsp;</span>
                                            <span>Country: <strong>{{landline1.country}}</strong></span>
                                       </div>

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="website" class="col-form-label">Website</label>
                                    <input v-model="organisationform.website" type="text" name="website" placeholder="Website"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('website') }" >
                                    <has-error style="color: #e83e8c" :form="organisationform" field="website"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address" class=" col-form-label">address</label>
                                    <input v-model="organisationform.address" type="text" name="Address" placeholder="Address"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('address') }" >
                                    <has-error style="color: #e83e8c" :form="organisationform" field="address"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-3">
                                    <label for="country_id">Select Country</label>
                                    <select class="form-control" @change="countryCounties(organisationform.country_id)"
                                    v-model="organisationform.country_id" :class="{ 'is-invalid': organisationform.errors.has('country_id') }">
                                            <option disabled value="">Select Country</option>
                                            <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                    </select>
                                        <has-error style="color: #e83e8c" :form="organisationform" field="country_id"></has-error>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="county_id" class=" col-form-label">County</label>
                                    <select class="form-control" @change="countyConstituencies(organisationform.county_id)"
                                    v-model="organisationform.county_id" :class="{ 'is-invalid': organisationform.errors.has('county_id') }">
                                            <option disabled value="">Select County</option>
                                            <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                    </select>
                                    <has-error style="color: #e83e8c" :form="organisationform" field="county_id"></has-error>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="constituency_id" class=" col-form-label">Constituency</label>
                                    <select class="form-control" @change="constituencyWards(organisationform.constituency_id)"
                                    v-model="organisationform.constituency_id" :class="{ 'is-invalid': organisationform.errors.has('constituency_id') }">
                                            <option disabled value="">Select County</option>
                                            <option v-for="constituency in Constituencies" :value="constituency.id" :key="constituency.id">{{constituency.name}}</option>
                                    </select>
                                    <has-error style="color: #e83e8c" :form="organisationform" field="constituency_id"></has-error>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ward_id" class="col-form-label"> Ward </label>
                                    <select class="form-control"
                                    v-model="organisationform.ward_id" :class="{ 'is-invalid': organisationform.errors.has('ward_id') }">
                                            <option disabled value="">Select Town</option>
                                            <option v-for="ward in Wards" :value="ward.id" :key="ward.id">{{ward.name}}</option>
                                    </select>
                                    <has-error style="color: #e83e8c" :form="organisationform" field="ward_id"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="logo" class=" col-form-label">Organisation Logo</label><br>
                                        <input @change="organisationChangeLogo($event)" type="file" name="logo"
                                            :class="{ 'is-invalid': organisationform.errors.has('logo') }">
                                            <img v-show="editmodeOrganisation" :src="updateOrganisationLogo(organisationform.logo)" alt="" width="100%" >
                                            <img  v-show="!editmodeOrganisation" :src="organisationform.logo" alt="" width="100%" >
                                        <has-error style="color: #e83e8c" :form="aboutform" field="logo"></has-error>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeOrganisation" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeOrganisation" type="submit" class="btn btn-primary">Create</button>
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
                                    <label for="image" class=" col-form-label">Organisation Image 1</label><br>
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
        name:"List",
        data(){
            return{
                editmodeOrganisation: false,
                organisationform: new Form({
                        id:'',
                        name:'',
                        email:'',
                        phone:'',
                        landline:'',
                        website:'',
                        address:'',
                        country_id:'',
                        county_id:'',
                        constituency_id:'',
                        ward_id:'',
                        logo:'',
                }),
                phone1:{
                        isValid: false,
                        country: undefined,
                },
                landline1:{
                        isValid: false,
                        country: undefined,
                },
                 editmodeAbout: false,
                aboutform: new Form({
                        id:'',
                        user_id:'',
                        organisation_id:'',
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
            this.loadOrganisation();
            this.loadAbout();
            this.loadAboutPic();
            this.loadService();
            this.loadExtraService();
            this.loadServiceFilter();
            this.loadAdvert();

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
            Organisation(){
               return this.$store.getters.Organisation
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
            InputPhone({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.organisationform.phone = number;
            this.phone1.isValid = isValid;
            this.phone1.country = country && country.name;
            },
            InputLandline({ number, isValid, country }) {
            console.log(number, isValid, country);
            this.organisationform.landline = number;
            this.landline1.isValid = isValid;
            this.landline1.country = country && country.name;
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
            loadOrganisation(){
                return this.$store.dispatch( "organisation")//get all from organisation. organisation linked to user
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

            //Organisation
            newOrganisationModal(){
                 this.editmodeOrganisation= false;
                 this.organisationform.reset()
                     $('#OrganisationModal').modal('show')
            },
            editOrganisationModal(id){
                 this.editmodeOrganisation = true;
                 this.organisationform.reset()
                   console.log('edit user', id)
                    this.$Progress.start();
                      axios.get('/organisation/edit/'+id)
                        .then((response)=>{
                           $('#OrganisationModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Organisation data successfully'
                            })
                            this.organisationform.fill(response.data.organisation)
                               this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#OrganisationModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
            },
            organisationChangeLogo(event){
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
                            this.organisationform.logo =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            organisationLoadLogo(logo_id){
                 if(logo_id){
                    return "assets/organisation/img/logo/"+logo_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            updateOrganisationLogo(organisationformlogo){
                console.log(organisationformlogo)
                let img = this.organisationform.logo;
                      if(img.length>100){
                            return this.organisationform.logo;
                        }else{
                            if(organisationformlogo){
                                return "assets/organisation/img/logo/"+organisationformlogo;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
                            }
                        }
            },
            addOrganisation(){
                console.log('add Organisation new')
                this.$Progress.start();
                this.organisationform.post('/organisation')
                    .then((response)=>{
                         toast({
                            type: 'success',
                            title: 'Organisation Created successfully'
                            })
                            this.$store.dispatch( "organisation")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                            $('#OrganisationModal').modal('hide')
                            this.organisationform.reset()
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#OrganisationModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateOrganisation(id){
                  console.log('update organisaton')
                  this.$Progress.start();
                     this.organisationform.patch('/organisation/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "organisation")
                            this.$store.dispatch( "about")
                            this.$store.dispatch( "aboutpic")
                         $('#OrganisationModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'User Created successfully'
                            })
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            $('#OrganisationModal').modal('show')
                            toast({
                            type: 'error',
                            title: 'There was something wrong'
                            })
                        })
            },
            deleteOrganisation(id){
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
                        this.organisationform.get('/organisation/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Organisation Deleted successfully'
                            })
                            this.$store.dispatch( "organisation")
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
                    return "/assets/organisation/img/website/frontimage/"+front_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
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
                                return "assets/organisation/img/website/frontimage/"+aboutformfront_image;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
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
                            this.$store.dispatch( "organisation")
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
                            this.$store.dispatch( "organisation")
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
                    return "/assets/organisation/img/website/aboutpics/"+about_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            updateAboutImage(about_image){
                // console.log(this.aboutpicsform.image)
                let img = this.aboutpicsform.image;
                      if(img.length>100){
                            return this.aboutpicsform.image;
                        }else{
                            if(about_image){
                                return "assets/organisation/img/website/aboutpics/"+about_image;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
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
                            this.$store.dispatch( "organisation")
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
                            this.$store.dispatch( "organisation")
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
                            this.$store.dispatch( "organisation")
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
                    return "/assets/organisation/img/website/services/"+image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
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
                                return "assets/organisation/img/website/services/"+serviceformimage;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
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
                            this.$store.dispatch( "organisation")
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
                            this.$store.dispatch( "organisation")
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
            //         return "/assets/organisation/img/website/extraservices/"+image_id;
            //     }else{
            //         return "/assets/organisation/img/website/empty.png";
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
            //                     return "assets/organisation/img/website/extraservices/"+extraserviceformimage;
            //                 }else{
            //                     return "/assets/organisation/img/website/empty.png";
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
                            this.$store.dispatch( "organisation")
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
                            this.$store.dispatch( "organisation")
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
            //         return "/assets/organisation/img/website/servicefilters/"+image_id;
            //     }else{
            //         return "/assets/organisation/img/website/empty.png";
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
            //                     return "assets/organisation/img/website/servicefilters/"+servicefilterformimage;
            //                 }else{
            //                     return "/assets/organisation/img/website/empty.png";
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
                            this.$store.dispatch( "organisation")
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
                            this.$store.dispatch( "organisation")
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
                    return "/assets/organisation/img/website/adverts/"+image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
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
                                return "assets/organisation/img/website/adverts/"+advertformimage;
                            }else{
                                return "/assets/organisation/img/website/empty.png";
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
                            this.$store.dispatch( "organisation")
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
                            this.$store.dispatch( "organisation")
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

    }
</script>

