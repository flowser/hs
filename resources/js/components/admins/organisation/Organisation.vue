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
                                                    <div class="card" >
                                                        <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
                                                    </div>
                                                    <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
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
                                                <button class="btn btn-success" @click.prevent="newPicsModal()" >Add New Pictures
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
                                                    <div class="card" >
                                                        <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
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
                                            <div class="card" >
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="card text-white bg-success mb-3" >
                                                            <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="card text-white bg-success mb-3" >
                                                            <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="card text-white bg-success mb-3" >
                                                            <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="card text-white bg-success mb-3" >
                                                            <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="card text-white bg-success mb-3" >
                                                            <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="card text-white bg-success mb-3" >
                                                            <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
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
                                        <div class="row">
                                            <div class="col-md-3 " >
                                                <div class="card text-white bg-success mb-3" >
                                                        <div class="card-header">
                                                            <h5 class="card-title text-center">hhh
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
                                        <div class="card border-danger">
                                            <div class="row">
                                                <div class="col-md-4" >
                                                   <div class="card" >
                                                        <img src="http://teifinnovate.foundation/images/logo-249x249.png" class="card-img-top" alt="">
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
        <div class="modal fade" id="OrganisationModal" tabindex="-1" role="dialog" aria-labelledby="OrganisationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
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
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label"> Organisation Name</label>
                                    <input v-model="organisationform.name" type="text" name="name" placeholder="Organisation Name"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('name') }" >
                                    <has-error :form="organisationform" field="name"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class=" col-form-label">Email </label>
                                    <input v-model="organisationform.email" type="email" name="email" placeholder="Email Address"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('email') }" >
                                    <has-error :form="organisationform" field="email"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="phone" class="col-form-label"> Organisation Phone</label>
                                    <input v-model="organisationform.phone" type="text" name="phone" placeholder="Organisation Phone"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('phone') }" >
                                    <has-error :form="organisationform" field="phone"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="landline" class=" col-form-label">Landline</label>
                                    <input v-model="organisationform.landline" type="text" name="landline" placeholder="landline"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('landline') }" >
                                    <has-error :form="organisationform" field="landline"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="website" class="col-form-label">Website</label>
                                    <input v-model="organisationform.website" type="text" name="website" placeholder="Website"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('website') }" >
                                    <has-error :form="organisationform" field="website"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address" class=" col-form-label">address</label>
                                    <input v-model="organisationform.phone" type="text" name="Address" placeholder="Address"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('address') }" >
                                    <has-error :form="organisationform" field="address"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="country_id">Select Country</label>
                                      <!-- {{Countries}} -->
                                    <select class="form-control" @change="countryCounties(organisationform.country_id)"
                                    v-model="organisationform.country_id" :class="{ 'is-invalid': organisationform.errors.has('country_id') }">
                                            <option disabled value="">Select Country</option>
                                            <option v-for="country in Countries" :value="country.id" :key="country.id">{{country.name}}</option>
                                    </select>

                                        <has-error :form="organisationform" field="country_id"></has-error>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="county" class=" col-form-label">County</label>
                                    <select class="form-control" @change="countyTowns(organisationform.county_id)"
                                    v-model="organisationform.county_id" :class="{ 'is-invalid': organisationform.errors.has('county_id') }">
                                            <option disabled value="">Select County</option>
                                            <option v-for="county in Counties" :value="county.id" :key="county.id">{{county.name}}</option>
                                    </select>
                                    <has-error :form="organisationform" field="county"></has-error>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="town" class="col-form-label"> Town</label>
                                    <select class="form-control"
                                    v-model="organisationform.town_id" :class="{ 'is-invalid': organisationform.errors.has('town_id') }">
                                            <option disabled value="">Select Town</option>
                                            <option v-for="town in Towns" :value="town.id" :key="town.id">{{town.name}}</option>
                                    </select>
                                    <has-error :form="organisationform" field="town"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="logo" class=" col-form-label">logo</label>
                                    <input v-model="organisationform.logo" type="text" name="logo" placeholder="logo"
                                        class="form-control" :class="{ 'is-invalid': organisationform.errors.has('logo') }" >
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

            }
        },
        mounted() {
            this.loadOrganisation();
            this.loadAbout();
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

        },
        methods:{
            loadOrganisation(){
                return this.$store.dispatch( "organisation")//get all from organisation. organisation linked to user
            },
            loadAbout(){
                return this.$store.dispatch( "about")//get all from organisation. organisation linked to user
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

            },
            newPicsModal(){

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

