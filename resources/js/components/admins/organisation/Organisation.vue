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
                                        <!-- Setting -->
                                        <div class="row">
                                            <div class="col-md-3" >
                                                <img src="" alt="logo" width="150px">
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-3 " >
                                                <p> <a href="#general_configuration">Organisation:</a> </p>
                                                <p><a href="#general_configuration">Email:</a>   </p>
                                                <p><a href="#general_configuration">Phone:</a>   </p>
                                                <p><a href="#general_configuration">Landline:</a>    </p>
                                            </div>
                                            <div class="col-md-3" >
                                                <p><a href="#general_configuration">Website:</a> </p>
                                                <p><a href="#general_configuration">Address:</a> </p>
                                                <p><a href="#general_configuration">Country:</a> </p>
                                                <p><a href="#general_configuration">County:</a>  </p>
                                                <p><a href="#general_configuration">Town:</a>    </p>
                                            </div>
                                            <div class="col-md-3" >
                                                <p><a href="#general_configuration">Active:</a>  </p>
                                                <p><a href="#general_configuration">Created At:</a>  </p>
                                                <p><a href="#general_configuration">Updated At:</a>  </p>
                                                <a href="">
                                                    <i class="fa fa-edit blue"></i>
                                                </a>
                                                /
                                                <a href="">
                                                    <i class="fa fa-trash red"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <!-- /.setting -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="about_us">
                                    <!-- Setting -->
                                        <div class="row">
                                            <div class="col-md-4" >
                                                <img src="" alt="front_image" width="150px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-8 " >
                                                <p> <a href="#about_us">Title:</a> </p>
                                                <p><a href="#about_us">Subtitle:</a>   </p>
                                                <p><a href="#about_us">Why choose us</a>   </p>
                                                <p><a href="#about_us">Updated BY:</a></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" >
                                                <img src="" alt="about_image1" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-2" >
                                                <img src="" alt="about_image2" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-2" >
                                                <img src="" alt="about_image3" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-2" >
                                                <img src="" alt="about_image4" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-2" >
                                                <img src="" alt="about_image5" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-2" >
                                                <img src="" alt="about_image6" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <p><a href="#about_us">Who We are:</a>Lepfffffffffffff
                                                ffffffffffffffffffffffffffff;
                                                ddddddddddddddddddd  bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>
                                            </div>
                                            <div class="col-md-6" >
                                                <p><a href="#about_us">What We do:</a>Lepfffffffffffff
                                                ffffffffffffffffffffffffffff;
                                                ddddddddddddddddddd  bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb  </p>
                                                <div class="float-right">
                                                   <p><a href="#about_us">Updated At:</a> 12.pm </p>
                                                   <p><a href="#about_us">Updated by:</a>felix nyachio  </p>
                                                     <a href="">
                                                    <i class="fa fa-edit blue"></i>
                                                    </a>
                                                    /
                                                    <a href="">
                                                        <i class="fa fa-trash red"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                </div>
                                <div class="tab-pane" id="services">
                                    <!-- Setting -->
                                        <div class="row">
                                            <div class="col-md-12 " >
                                                <!-- repeat as different filters -->
                                                <p> <a href="#services">Filter Title:</a> </p>
                                                <p><a href="#services">Details:</a>   </p>
                                                <p><a href="#services">Why</a>   </p>
                                                <p><a href="#services">Updated BY:</a></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" >
                                                <img src="" alt="advert_image" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-6" >
                                                <p> <a href="#services">advert Title:</a> </p>
                                                <p><a href="#services">advert Details:</a>   </p>
                                                <p><a href="#services">Updated BY:</a></p>
                                                <p><a href="#services">created at:</a></p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" >
                                                <img src="" alt="teif advert_image" width="250px">
                                                <!-- front_image -->
                                                <!-- <img :src="courseImage(course.photo)" alt="" width="150px"> -->
                                            </div>
                                            <div class="col-md-6" >
                                                <p> <a href="#services">teif advert Title:</a> </p>
                                                <p><a href="#services">subtitle:</a>   </p>
                                                <p><a href="#services"> Details:</a>   </p>
                                                <p><a href="#services">Updated BY:</a></p>
                                                <p><a href="#services">created at:</a></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- repeat extra services -->
                                            <div class="col-md-2" >
                                                <p> <a href="#services">extra Title:</a> </p>
                                                <p><a href="#services"> Details:</a>   </p>
                                                <p><a href="#services"> Why:</a>   </p>
                                                <p><a href="#services">Updated BY:</a></p>
                                                <p><a href="#services">created at:</a></p>
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
        <div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="UserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeUser" id="UserModalLabel">Update Organisation User</h5>
                        <h5 class="modal-title" v-show="!editmodeUser" id="UserModalLabel">Add New Organisation User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form role="form" @submit.prevent="editmodeUser ? updateUser(userform.id) : addUser ()" >
                        <div class="modal-body">
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="first_name" class="col-form-label"> First Name</label>
                                    <input v-model="userform.first_name" type="text" name="first_name" placeholder="First Name"
                                        class="form-control" :class="{ 'is-invalid': userform.errors.has('first_name') }" >
                                    <has-error :form="userform" field="first_name"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name" class=" col-form-label">Last Name</label>
                                    <input v-model="userform.last_name" type="text" name="last_name" placeholder="Last Name"
                                        class="form-control" :class="{ 'is-invalid': userform.errors.has('last_name') }" >
                                    <has-error :form="userform" field="last_name"></has-error>
                                </div>
                            </div>

                            <div class=" row">
                                    <div class="form-group col-md-12">
                                        <label for="email" class="col-form-label">E-Mail Address</label>
                                        <input v-model="userform.email" type="email" name="email" placeholder="E-Mail Address"
                                        class="form-control" :class="{ 'is-invalid': userform.errors.has('email') }" >
                                    <has-error :form="userform" field="email"></has-error>
                                    </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <select name="user_type" v-model="userform.user_type" id="user_type" class="form-control"
                                    :class="{ 'is-invalid': userform.errors.has('user_type') }">
                                        <option value="">Select User Role</option>
                                        <option value="Director">Director</option>
                                        <option value="Admin"> Admin</option>
                                        <option value="Accounts"> Accounts</option>
                                    </select>
                                    <has-error :form="userform" field="user_type"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <input v-model="userform.password" type="password" id="password" placeholder="Password"
                                        class="form-control" :class="{ 'is-invalid': userform.errors.has('password') }">
                                    <has-error :form="userform" field="password"></has-error>
                                </div>
                            </div>


                            <div class="form-group">
                                <!-- Roles -->
                                <label>Select Roles</label>
                                <div v-for="role in Roles" :key="role.id">
                                    <input type="checkbox" v-model="userform.roles" :value="role.name">{{ role.name}}
                                </div>
                                <hr>
                                <div> <span class="btn btn-info btn-sm ml-2 mb-2">{{ userform.roles }}</span></div>

                            </div>
                            <div class="form-group">
                                <!-- {{ Permissions }} -->
                                <label>Select Permissions</label>
                                <div v-for="permission in Permissions" :key="permission.id">
                                    <input type="checkbox" v-model="userform.permissions" :value="permission.name"/>{{ permission.name}}
                                </div>
                                <hr>
                                <div> <span class="btn btn-info btn-sm ml-2 mb-2">{{ userform.permissions }}</span></div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmodeUser" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmodeUser" type="submit" class="btn btn-primary">Create</button>
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
                editmodeUser: false,
                userform: new Form({
                        id:'',
                        first_name:'',
                        last_name:'',
                        email:'',
                        password:'',
                        user_type:'',
                        permissions:[],
                        roles:[],
                }),
                selected_permissions: [],
                selected_roles: [],
            }
        },
        mounted() {
            this.loadUsers();
            this.loadRoles();
            this.loadPermissions();
        },
        computed:{
            Users(){
                //  console.log('edit permiion')
                return this.$store.getters.Users
            },
            Permissions(){
                return this.$store.getters.Permissions
            },
            Roles(){
                return this.$store.getters.Roles
            },
            selectedRoles () {
            return this.selected_roles
            },
            selectedPermissions () {
            return this.selected_permissions
            }
        },
        methods:{
            loadUsers(){
                return this.$store.dispatch( "users")//get all from users.index
            },
            //Permissions
            loadPermissions(){
                return this.$store.dispatch( "permissions")//get all from roles.index
            },
            //Roles
            loadRoles(){
                return this.$store.dispatch( "roles")//get all from roles.index
            },
            newUserModal(){
                console.log('new user modal')
                 this.editmodeUser= false;
                 this.userform.reset()
                     $('#UserModal').modal('show')
             },
             editUserModal(id){
                 this.editmodeUser = true;
                 this.userform.reset()
                   console.log('edit user', id)
                    this.$Progress.start();
                      axios.get('/user/edit/'+id)
                        .then((response)=>{
                           $('#UserModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the User data successfully'
                            })
                            this.userform.fill(response.data.user)
                               this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                            //errors
                            $('#UserModal').modal('show');
                            toast({
                            type: 'error',
                            title: 'There was something Wrong'
                            })
                        })
             },
            addUser() {
                console.log('add user new')
                this.$Progress.start();
                this.userform.post('/user')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'User Created successfully'
                            })
                            this.$store.dispatch( "users")
                            $('#UserModal').modal('hide')
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                        //errors
                            $('#UserModal').modal('show');
                            toast({
                                type: 'error',
                                title: 'There was something wrong.'
                                })
                    })
            },
            updateUser(id){
                  console.log('update user')
                  this.$Progress.start();
                     this.userform.patch('/user/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "users")
                         $('#UserModal').modal('hide')
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
                        this.userform.get('/user/delete/'+id)
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

