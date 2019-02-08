<template>
  <div class="container-fluid mt-5">
      <!-- Main content -->
        <div class="col-md-12">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background: url('../dist/img/photo1.png') center center;">
                    <h3 class="widget-user-username">Elizabeth Pierce</h3>
                    <h5 class="widget-user-desc">Web Designer</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">Twitter Followers</span>
                        <div class="card-tools">
                            <button class="btn btn-info"  >Follow us
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
                        <span class="description-text">Facebook Followers</span>
                        <div class="card-tools">
                            <button class="btn btn-info"  >Follow us
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
                        <span class="description-text">Linkedin Followers</span>
                        <div class="card-tools">
                            <button class="btn btn-info"  >Follow us
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

                <!-- /.widget-user -->
                <div class="card">
                    <div class="card-header p-2">


                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="#general_configuration" class="nav-link active show" data-toggle="tab"
                                    title="General Configuration" aria-expanded="true">
                                    <i class="fa fa-cogs red"> General Settings</i>
                                </a>
                            </li>
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
                            <a href="#services" class="nav-link" data-toggle="tab"
                                title="Services Pages" aria-expanded="true">
                                <i class="fa fa-newspaper red">Services Page </i>
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
                                <div class="tab-pane active show" id="general_configuration">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#general_configuration">General Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newOrganisationModal()" >Add Organisation
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                    </div>

                                    <div v-for="organisation in Organisation" :key="organisation.id">
                                        <!-- Setting -->
                                        <div class="card border-primary">
                                            <div class="row">
                                                <div class="col-md-2" >
                                                    <div class="card-body">
                                                        <img :src="organisationLogo(organisation.logo)" alt="" >
                                                        <!-- <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt=""> -->

                                                    <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                                    </div>
                                                </div>
                                                <div  class="col-md-5 ">
                                                        <div class="card-body text-primary">
                                                            <h5 class="card-title">{{organisation.name}}</h5>
                                                            <p class="card-text">Phone: {{organisation.phone}}</p>
                                                            <p class="card-text">Landline: {{organisation.landline}}</p>
                                                            <p class="card-text">P.O. Box {{organisation.address}},
                                                                <span>{{organisation.town.name}}</span>
                                                                <span>{{organisation.county.name}}</span>
                                                                <span>{{organisation.country.name}}</span>
                                                            </p>
                                                        </div>
                                                    <!-- </div> -->
                                                </div>
                                                <div class="col-md-5" >
                                                    <div class="card-body text-primary">
                                                            <p class="card-text">Email: {{organisation.email}} </p>
                                                            <p class="card-text">Website: {{organisation.website}}  </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <a href="#about_us" class="card-link"> <i class="fa fa-edit blue"></i></a>
                                                    <a href="#about_us" class="card-link"><i class="fa fa-trash red"></i></a>
                                                </div>
                                                <div class="float-left">
                                                    <a href="#about_us" class="card-link">Updated On: {{organisation.created_at | dateformat}}</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.setting -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="about_us">
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
                                                        <img :src="aboutFrontImage(about.front_image)" alt="" >
                                                    </div>
                                                    <!-- front_image -->
                                                    <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
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
                                            <div v-for="aboutpic in about.aboutpics" :key="aboutpic.id">
                                                <div class="card" >
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <!-- <div class="card-body text-white bg-success mb-3" > -->
<!--
                                                                <div v-if="aboutpic.id === empty">
                                                                Now you see me
                                                                </div>
                                                                <div v-else>
                                                                Now you don't
                                                                </div> -->

                                                                <!-- <div v-if="aboutpic.id = null"> -->
                                                                    <!-- <img src="" alt="" class="img-thumbnail"> -->
                                                                    <!-- {{aboutpic.about_image1}} -->
                                                                <!-- </div> -->
                                                                <!-- {{about.aboutpics}} -->
                                                                <img :src="aboutImage1(aboutpic.about_image1)" alt="" width="150" >
                                                            <!-- </div> -->
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="card text-white bg-success mb-3" >
                                                                <img :src="aboutImage2(aboutpic.about_image2)" alt="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="card text-white bg-success mb-3" >
                                                                <img :src="aboutImage3(aboutpic.about_image3)" alt="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="card text-white bg-success mb-3" >
                                                                <img :src="aboutImage4(aboutpic.about_image4)" alt="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="card text-white bg-success mb-3" >
                                                                <img :src="aboutImage5(aboutpic.about_image5)" alt="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="card text-white bg-success mb-3" >
                                                                <img :src="aboutImage6(aboutpic.about_image6)" alt="" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="float-right">
                                                            <a href="#about_us" class="card-link"> <i class="fa fa-edit blue"></i></a>
                                                            <a href="#about_us" class="card-link"><i class="fa fa-trash red"></i></a>
                                                        </div>
                                                        <div class="float-left">
                                                            <a href="#about_us" class="card-link">Updated BY: {{aboutpic.user.full_name}}</a>
                                                            <a href="#about_us" class="card-link">Updated On: {{aboutpic.created_at | dateformat}}</a>
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
                                                    <a href="#about_us" class="card-link"> <i class="fa fa-edit blue"></i></a>
                                                    <a href="#about_us" class="card-link"><i class="fa fa-trash red"></i></a>
                                                </div>
                                                <div class="float-left">
                                                    <a href="#about_us" class="card-link">Updated BY: {{about.user.full_name}}</a>
                                                    <a href="#about_us" class="card-link">Updated On: {{about.created_at | dateformat}}</a>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="tab-pane" id="services">
                                     <div class="card-header">
                                        <h3 class="card-title">
                                             <a href="#general_configuration">About Us Settings</a>
                                        </h3>
                                        <div class="card-tools">
                                                <button class="btn btn-success" @click.prevent="newFilterModal()" >Add New Filter
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                                <button class="btn btn-success" @click.prevent="newExtraModal()" >Add New Extra Services
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                                <button class="btn btn-success" @click.prevent="newAdvertModal()" >Add new Advert
                                                    <i class="fas fa-plus fw"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <div class="card border-primary">
                                    <!-- servies -->
                                    <div v-for="service in Service" :key="service.id">
                                        <div v-for="filter in service.servicefilters" :key="filter.id">
                                            <div class="row">
                                                <div class="col-md-3 " >
                                                    <div class="card text-white bg-success mb-3" >
                                                            <div class="card-header">
                                                                <h5 class="card-title text-center">{{filter.title}}</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="card-text">{{filter.details}}</p>
                                                                <p class="card-text">{{filter.why}}</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <a href="#services" class="card-link"> <i class="fa fa-edit blue"></i></a>
                                                                    <a href="#services" class="card-link"><i class="fa fa-trash red"></i></a>
                                                                </div>
                                                                <div class="float-left">
                                                                    <a href="#services" class="card-link">Up:{{filter.created_at | dateformat}}</a>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="card border-danger">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                    <div class="card text-white bg-success mb-3" >
                                                        <!-- <img :src="aboutImage3(aboutpic.about_image3)" alt="" > -->
                                                    </div>
                                                    <!-- front_image -->
                                                    <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                                </div>
                                                <div class="col-md-6" >
                                                         <h5 class="card-title text-center">advert Title:
                                                              <!-- {{filter.title}} -->
                                                             </h5>
                                                        <div class="card-body">
                                                            <p class="card-text text-center">advert Details:
                                                                <!-- {{filter.details}} -->
                                                                </p>
                                                            <p class="card-text">hhhh
                                                                <!-- {{filter.why}} -->
                                                             </p>
                                                        </div>
                                                </div>
                                            </div>
                                             <div class="card-body">
                                                <div class="float-right">
                                                    <a href="#services" class="card-link"> <i class="fa fa-edit blue"></i></a>
                                                    <a href="#services" class="card-link"><i class="fa fa-trash red"></i></a>
                                                </div>
                                                <div class="float-left">
                                                    <a href="#services" class="card-link">Updated BY:
                                                      <!-- {{organisation.created_at | dateformat}} -->
                                                    </a>
                                                    <a href="#services" class="card-link">Created AT:
                                                                     <!-- {{organisation.created_at | dateformat}} -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="card border-success">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                   <div class="card" >
                                                        <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
                                                    </div>
                                                    <!-- front_image -->
                                                    <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                                </div>
                                                <div class="col-md-6" >
                                                         <h5 class="card-title text-center">Teif advert Title:
                                                              <!-- {{filter.title}} -->
                                                             </h5>
                                                        <div class="card-body">
                                                            <p class="card-text text-center">advert Details:
                                                                <!-- {{filter.details}} -->
                                                                </p>
                                                            <p class="card-text">hhhh
                                                                <!-- {{filter.why}} -->
                                                             </p>
                                                        </div>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                            <div class="float-right">
                                                                <a href="#services" class="card-link"> <i class="fa fa-edit blue"></i></a>
                                                                <a href="#services" class="card-link"><i class="fa fa-trash red"></i></a>
                                                            </div>
                                                            <div class="float-left">
                                                                <a href="#services" class="card-link">Updated BY:
                                                                     <!-- {{organisation.created_at | dateformat}} -->
                                                                     </a>
                                                                <a href="#services" class="card-link">Created AT:
                                                                     <!-- {{organisation.created_at | dateformat}} -->
                                                                     </a>
                                                            </div>
                                                        </div>
                                         </div>
                                        <div class="card border-warning">
                                            <div class="row">
                                                <!-- repeat extra services -->
                                                <div class="col-md-3" >
                                                    <div class="card text-white bg-success mb-3" >
                                                            <div class="card-header">
                                                                <h5 class="card-title text-center">Extra
                                                                    <!-- {{filter.title}} -->
                                                                    </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="card-text">hhh
                                                                    <!-- {{filter.details}} -->
                                                                    </p>
                                                                <p class="card-text">hhhh
                                                                    <!-- {{filter.why}} -->
                                                                    </p>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="float-right">
                                                                    <a href="#services" class="card-link"> <i class="fa fa-edit blue"></i></a>
                                                                    <a href="#services" class="card-link"><i class="fa fa-trash red"></i></a>
                                                                </div>
                                                                <div class="float-left">
                                                                    <a href="#services" class="card-link">Up:hh
                                                                        <!-- {{organisation.created_at | dateformat}} -->
                                                                        </a>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                    <has-error :form="organisationform" field="name"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class=" col-form-label">Email </label>
                                    <input v-model="organisationform.email" type="email" name="email" placeholder="Email Address"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('email') }" >
                                    <has-error :form="organisationform" field="email"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone" class="col-form-label"> Organisation Phone</label>
                                    <input v-model="organisationform.phone" type="text" name="phone" placeholder="Organisation Phone"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('phone') }" >
                                    <has-error :form="organisationform" field="phone"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-4">
                                    <label for="landline" class=" col-form-label">Landline</label>
                                    <input v-model="organisationform.landline" type="text" name="landline" placeholder="landline"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('landline') }" >
                                    <has-error :form="organisationform" field="landline"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="website" class="col-form-label">Website</label>
                                    <input v-model="organisationform.website" type="text" name="website" placeholder="Website"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('website') }" >
                                    <has-error :form="organisationform" field="website"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address" class=" col-form-label">address</label>
                                    <input v-model="organisationform.address" type="text" name="Address" placeholder="Address"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('address') }" >
                                    <has-error :form="organisationform" field="address"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-4">
                                    <label for="country_id">Select Country</label>
                                    <select class="form-control" @change="countryCounties(organisationform.country_id)"
                                    v-model="organisationform.country_id" :class="{ 'is-invalid': organisationform.errors.has('country_id') }">
                                            <option disabled value="">Select Country</option>
                                            <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                    </select>
                                        <has-error :form="organisationform" field="country_id"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="county" class=" col-form-label">County</label>
                                    <select class="form-control" @change="countyTowns(organisationform.county_id)"
                                    v-model="organisationform.county_id" :class="{ 'is-invalid': organisationform.errors.has('county_id') }">
                                            <option disabled value="">Select County</option>
                                            <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                    </select>
                                    <has-error :form="organisationform" field="county"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="town" class="col-form-label"> Town</label>
                                    <select class="form-control"
                                    v-model="organisationform.town_id" :class="{ 'is-invalid': organisationform.errors.has('town_id') }">
                                            <option disabled value="">Select Town</option>
                                            <option v-for="town in Towns" :value="town.id" :key="town.id">{{town.name}}</option>
                                    </select>
                                    <has-error :form="organisationform" field="town"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="logo" class=" col-form-label">Organisation Logo</label><br>
                                        <input @change="changePhoto($event)" type="file" name="logo"
                                            :class="{ 'is-invalid': organisationform.errors.has('logo') }">
                                            <img :src="organisationform.logo" alt="" width="30%" >
                                        <has-error :form="organisationform" field="logo"></has-error>
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
                                    <label for="about_image1" class=" col-form-label">Organisation Image 1</label><br>
                                        <input @change="aboutImage1($event)" type="file" name="about_image1"
                                            :class="{ 'is-invalid': aboutpicsform.errors.has('about_image1') }">
                                            <img :src="aboutpicsform.about_image1" alt="" width="30%" >
                                        <has-error :form="aboutpicsform" field="about_image1"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="about_image2" class=" col-form-label">Organisation Image 2</label><br>
                                        <input @change="aboutImage2($event)" type="file" name="about_image2"
                                            :class="{ 'is-invalid': aboutpicsform.errors.has('about_image2') }">
                                            <img :src="aboutpicsform.about_image2" alt="" width="30%" >
                                        <has-error :form="aboutpicsform" field="about_image2"></has-error>
                                </div>

                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="about_image3" class=" col-form-label">Organisation Image 3</label><br>
                                        <input @change="aboutImage3($event)" type="file" name="about_image3"
                                            :class="{ 'is-invalid': aboutpicsform.errors.has('about_image3') }">
                                            <img :src="aboutpicsform.about_image3" alt="" width="30%" >
                                        <has-error :form="aboutpicsform" field="about_image3"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="about_image4" class=" col-form-label">Organisation Image 4</label><br>
                                        <input @change="aboutImage4($event)" type="file" name="about_image4"
                                            :class="{ 'is-invalid': aboutpicsform.errors.has('about_image4') }">
                                            <img :src="aboutpicsform.about_image4" alt="" width="30%" >
                                        <has-error :form="aboutpicsform" field="about_image4"></has-error>
                                </div>

                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="about_image5" class=" col-form-label">Organisation Image 5</label><br>
                                        <input @change="aboutImage5($event)" type="file" name="about_image5"
                                            :class="{ 'is-invalid': aboutpicsform.errors.has('about_image5') }">
                                            <img :src="aboutpicsform.about_image5" alt="" width="30%" >
                                        <has-error :form="aboutpicsform" field="about_image5"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="about_image6" class=" col-form-label">Organisation Image 6</label><br>
                                        <input @change="aboutImage6($event)" type="file" name="about_image6"
                                            :class="{ 'is-invalid': aboutpicsform.errors.has('about_image6') }">
                                            <img :src="aboutpicsform.about_image6" alt="" width="30%" >
                                        <has-error :form="aboutpicsform" field="about_image6"></has-error>
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
                                    <label for="name" class="col-form-label"> User Name</label>
                                    <input v-model="aboutform.user_id" type="text" name="name" placeholder="User Name"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('user_id') }" >
                                    <has-error :form="aboutform" field="user_id"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="organisation_id" class="col-form-label">organisation Name</label>
                                    <input v-model="aboutform.organisation_id" type="text" name="organisation_id" placeholder="organisation Name"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('organisation_id') }" >
                                    <has-error :form="aboutform" field="organisation_id"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                 <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input v-model="aboutform.title" type="text" name="title" placeholder="Title"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('title') }" >
                                    <has-error :form="aboutform" field="title"></has-error>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="subtitle" class="col-form-label">subtitle</label>
                                    <input v-model="aboutform.subtitle" type="text" name="subtitle" placeholder="subtitle"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('subtitle') }" >
                                    <has-error :form="aboutform" field="subtitle"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="why_choose_us" class="col-form-label">why_choose_us</label>
                                    <textarea v-model="aboutform.why_choose_us" type="text" name="why_choose_us" placeholder="why_choose_us"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('why_choose_us') }" >
                                    </textarea>
                                    <has-error :form="aboutform" field="why_choose_us"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="who_we_are" class="col-form-label">who_we_are</label>
                                    <textarea v-model="aboutform.who_we_are" type="text" name="who_we_are" placeholder="who_we_are"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('who_we_are') }" >
                                    </textarea>
                                    <has-error :form="aboutform" field="who_we_are"></has-error>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="what_we_do" class="col-form-label">what_we_do</label>
                                    <textarea v-model="aboutform.what_we_do" type="text" name="what_we_do" placeholder="what_we_do"
                                        class="form-control" :class="{ 'is-invalid': aboutform.errors.has('what_we_do') }" >
                                    </textarea>
                                    <has-error :form="aboutform" field="what_we_do"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="front_image" class=" col-form-label">About Us Front Image 6</label><br>
                                        <input @change="FrontImage($event)" type="file" name="front_image"
                                            :class="{ 'is-invalid': aboutform.errors.has('front_image') }">
                                            <img :src="aboutform.front_image" alt="" width="30%" >
                                        <has-error :form="aboutform" field="front_image"></has-error>
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
                        town_id:'',
                        logo:'',
                }),
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
                        about_image1:'',
                        about_image2:'',
                        about_image3:'',
                        about_image4:'',
                        about_image5:'',
                        about_image6:'',
                }),
            }
        },
        mounted() {
            this.loadOrganisation();
            this.loadAbout();
            this.loadService();
            this.loadCountries();
            this.loadCounties();
            this.loadTowns();///linked to methods and actions store
        },
        computed:{
            Countries(){
                return this.$store.getters.Countries
            },
            Counties(){
               return this.$store.getters.CountryCounties
            },
            Towns(){
               return this.$store.getters.CountyTowns
            },
            Organisation(){
               return this.$store.getters.Organisation
            },
            About(){
               return this.$store.getters.About
            },
            Service(){
               return this.$store.getters.Service
            },
        },
        methods:{
            changePhoto(event){
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
            organisationLogo(logo_id){
                return "/assets/organisation/img/logo/small/"+logo_id;
            },
            //front image about
            FrontImage(event){
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
            aboutFrontImage(front_image_id){
                return "/assets/organisation/img/website/frontimage/medium/"+front_image_id;
            },
            //About Images
            aboutImage1(event){
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
                            this.aboutpicsform.about_image1 =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutImage2(event){
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
                            this.aboutpicsform.about_image2 =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutImage3(event){
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
                            this.aboutpicsform.about_image3 =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutImage4(event){
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
                            this.aboutpicsform.about_image4 =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutImage5(event){
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
                            this.aboutpicsform.about_image5 =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutImage6(event){
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
                            this.aboutpicsform.about_image6 =event.target.result
                                // console.log(event.target.result)
                            };
                        reader.readAsDataURL(file);
                }
            },
            aboutImage1(about_image_id){

                if(about_image_id !=null){
                    return "/assets/organisation/img/website/aboutpics/medium/"+about_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
                // return "/assets/organisation/img/website/aboutpics/medium/"+about_image_id;
            },
            aboutImage2(about_image_id){
                if(about_image_id !=null){
                    return "/assets/organisation/img/website/aboutpics/medium/"+about_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            aboutImage3(about_image_id){
                if(about_image_id !=null){
                    return "/assets/organisation/img/website/aboutpics/medium/"+about_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            aboutImage4(about_image_id){
                if(about_image_id !=null){
                    return "/assets/organisation/img/website/aboutpics/medium/"+about_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            aboutImage5(about_image_id){
                if(about_image_id !=null){
                    return "/assets/organisation/img/website/aboutpics/medium/"+about_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            aboutImage6(about_image_id){
                if(about_image_id !=null){
                    return "/assets/organisation/img/website/aboutpics/medium/"+about_image_id;
                }else{
                    return "/assets/organisation/img/website/empty.png";
                }
            },
            loadOrganisation(){
                return this.$store.dispatch( "organisation")//get all from organisation. organisation linked to user
            },
            loadAbout(){
                return this.$store.dispatch( "about")//get all from organisation. organisation linked to user
            },
            loadService(){
                return this.$store.dispatch( "service")//get all from organisation. organisation linked to user
            },
            loadCountries(){
                return this.$store.dispatch( "countries")//get all from roles.index
            },
            loadCounties(){
                return this.$store.dispatch( "countrycounties")//get all from counties.index
            },
            loadTowns(){
                return this.$store.dispatch( "countytowns")//get all from towns.index
            },
            newAboutModal(){
                this.editmodeAbout = false;
                 this.aboutform.reset()
                     $('#AboutModal').modal('show')
            },
            newAboutPicsModal(){
                this.editmodeAboutPics = false;
                 this.aboutpicsform.reset()
                     $('#AboutPicsModal').modal('show')
            },
            newFilterModal(){

            },
            newExtraModal(){

            },
            newAdvertModal(){

            },
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
                      axios.get('/user/edit/'+id)
                        .then((response)=>{
                           $('#OrganisationModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the User data successfully'
                            })
                            this.organisationform.fill(response.data.user)
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
            countryCounties(country_id){
                this.$store.dispatch('countrycounties', country_id);
            },
            countyTowns(county_id){
                this.$store.dispatch('countytowns', county_id); //send to store to the action with id
            },
            addOrganisation() {
                console.log('add Organisation new')
                this.$Progress.start();
                this.organisationform.post('/organisation')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Organisation Created successfully'
                            })
                            // this.$store.dispatch( "organisation")
                            $('#OrganisationModal').modal('hide')
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
                            // this.$store.dispatch( "organisation")
                            $('#AboutModal').modal('hide')
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
            updateOrganisation(id){
                  console.log('update user')
                  this.$Progress.start();
                     this.organisationform.patch('/user/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "users")
                         $('#OrganisationModal').modal('hide')
                         toast({
                            type: 'success',
                            title: 'User Created successfully'
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
            deleteUser(id){
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
                        this.organisationform.get('/user/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'User Deleted successfully'
                            })
                            this.$store.dispatch( "users")
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
             }
        },

    }
</script>

