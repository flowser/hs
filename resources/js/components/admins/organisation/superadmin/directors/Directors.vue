<template>
  <div class="container-fluid mt-5">
      <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Directors Table</h3>
              <div class="card-tools">
                    <button class="btn btn-success"  @click.prevent="newDirectorModal()">Add New Director
                         <i class="fas fa-plus fw"></i>
                     </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S1</th>
                    <th>Passport</th>
                    <th>directors</th>
                    <th>Roles</th>
                    <th>Permissions</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                  <tr v-for="(director, index) in Directors" :key="director.id">
                    <td>{{index+1}}</td>
                    <td> <img class="card-img-top" src="http://hs-vuejs.test/assets/admin/default/logo.png" style="width:150px" alt="Card image cap"></td>
                    <td><div class="">
                        <p>{{director.full_name}}</p>
                        <span v-for="directorpivot in director.organisationdirectors" :key="directorpivot.id">
                            <p>{{directorpivot.pivot.id_no}}</p>
                            <p>{{directorpivot.pivot.phone}}, <span>{{directorpivot.pivot.landline}} </span></p>
                            <p>{{directorpivot.pivot.address}}</p>
                            <p v-for="directorpivot in director.organisationdirectors" :key="directorpivot.id">
                                {{directorpivot}}</p>
                            <p>{{directorpivot.pivot.genders}}</p>
                        </span>
                        </div>
                    </td>
                    <td>
                        <span v-for="role in director.roles" :key="role.id" class="pl-2">
                            <div class="btn btn-primary btn-sm ml-1 mb-2 ">{{role.name}} </div>
                        </span>
                    </td>
                    <td>
                        <span v-for="permission in director.permissions" :key="permission.id" class="pl-2">
                            <div class="btn btn-primary btn-sm ml-1 mb-2 ">{{permission.name}} </div>
                        </span>
                    </td>
                    <!-- {{director.created_at | dateformat}} -->
                    <td>{{director.created_at | dateformat}} </td>
                    <td>
                         <a href="" @click.prevent="editDirectorModal(director.id)" >
                             <i class="fa fa-edit blue"></i>
                         </a>
                         /
                         <a href="" @click.prevent="deleteDirector(director.id)">
                             <i class="fa fa-trash red"></i>
                         </a>
                    </td>
                  </tr>
                </tbody>
              </table>
               <div class="card-group row" v-for="director in Directors" :key="director.id">
                    <div class="card col-md-4">
                        <img class="card-img-top" src="http://hs-vuejs.test/assets/admin/default/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{director.full_name}}</h5>
                            <p>
                                <span v-for="role in director.roles" :key="role.id" class="pl-2">
                                <div class="btn btn-primary btn-sm ml-1 mb-2 ">{{role.name}} </div>
                             </span>
                            </p>
                            <p class="card-text">
                                <span v-for="permission in director.permissions" :key="permission.id" class="pl-2">
                                    <div class="btn btn-primary btn-sm ml-1 mb-2 ">{{permission.name}} </div>
                                </span>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated {{director.created_at | dateformat}}</small>
                            </p>

                         <span class="float-right">
                             <a href="" @click.prevent="editDirectorModal(director.id)" >
                                 <i class="fa fa-edit blue"></i>
                             </a>
                            /
                            <a href="" @click.prevent="deleteDirector(director.id)">
                                <i class="fa fa-trash red"></i>
                            </a>
                         </span>
                        </div>
                    </div>
               </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- Role Modal -->
     <div class="modal fade" id="DirectorModal" tabindex="-1" role="dialog" aria-labelledby="DirectorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="editmodeDirector" id="DirectorModalLabel">Update Organisation Director</h5>
                    <h5 class="modal-title" v-show="!editmodeDirector" id="DirectorModalLabel">Add New Organisation Director</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form role="form" @submit.prevent="editmodeDirector ? updateDirector(directorform.id) : addDirector ()" >
                    <div class="modal-body">
                        <!-- <div class="form-group">
                                <input v-model="directorform.first_name" type="text" name="name" placeholder="Role Name"
                                    class="form-control" :class="{ 'is-invalid': directorform.errors.has('name') }">
                                <has-error :form="directorform" field="name"></has-error>
                        </div> -->
                        <div class=" row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label"> First Name</label>
                                <input v-model="directorform.first_name" type="text" name="first_name" placeholder="First Name"
                                    class="form-control" :class="{ 'is-invalid': directorform.errors.has('first_name') }" >
                                <has-error :form="directorform" field="first_name"></has-error>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" class=" col-form-label">Last Name</label>
                                <input v-model="directorform.last_name" type="text" name="last_name" placeholder="Last Name"
                                    class="form-control" :class="{ 'is-invalid': directorform.errors.has('last_name') }" >
                                <has-error :form="directorform" field="last_name"></has-error>
                            </div>
                        </div>

                        <div class=" row">
                                <div class="form-group col-md-12">
                                    <label for="email" class="col-form-label">E-Mail Address</label>
                                    <input v-model="directorform.email" type="email" name="email" placeholder="E-Mail Address"
                                    class="form-control" :class="{ 'is-invalid': directorform.errors.has('email') }" >
                                <has-error :form="directorform" field="email"></has-error>
                                </div>
                        </div>
                        <div class=" row">
                            <div class="form-group col-md-6">
                                <select name="director_type" v-model="directorform.director_type" id="director_type" class="form-control"
                                :class="{ 'is-invalid': directorform.errors.has('director_type') }">
                                    <option value="">Select Director Role</option>
                                    <option value="Director">Director</option>
                                    <option value="Admin"> Admin</option>
                                    <option value="Accounts"> Accounts</option>
                                </select>
                                <has-error :form="directorform" field="director_type"></has-error>
                            </div>
                            <div class="form-group col-md-6">
                                <input v-model="directorform.password" type="password" id="password" placeholder="Password"
                                    class="form-control" :class="{ 'is-invalid': directorform.errors.has('password') }">
                                <has-error :form="directorform" field="password"></has-error>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Roles -->
                            <label>Select Roles</label>
                            <div v-for="role in Roles" :key="role.id">
                                <input type="checkbox" v-model="directorform.roles" :value="role.name">{{ role.name}}
                            </div>
                            <hr>
                            <div> <span class="btn btn-info btn-sm ml-2 mb-2">{{ directorform.roles }}</span></div>

                        </div>
                        <div class="form-group">
                            <!-- {{ Permissions }} -->
                            <label>Select Permissions</label>
                            <div v-for="permission in Permissions" :key="permission.id">
                                <input type="checkbox" v-model="directorform.permissions" :value="permission.name"/>{{ permission.name}}
                            </div>
                            <hr>
                            <div> <span class="btn btn-info btn-sm ml-2 mb-2">{{ directorform.permissions }}</span></div>

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

  </div>

</template>

<script>
    export default {
        name:"List",
        data(){
            return{
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
                }),
                selected_permissions: [],
                selected_roles: [],
            }
        },
        mounted() {
            this.loadDirectors();
            this.loadRoles();
            this.loadPermissions();
        },
        computed:{
            Directors(){
                //  console.log('edit permiion')
                return this.$store.getters.Directors
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
            loadDirectors(){
                return this.$store.dispatch( "directors")//get all from directors.index
            },
            //Permissions
            loadPermissions(){
                return this.$store.dispatch( "permissions")//get all from roles.index
            },
            //Roles
            loadRoles(){
                return this.$store.dispatch( "roles")//get all from roles.index
            },
            newDirectorModal(){
                console.log('new director modal')
                 this.editmodeDirector= false;
                 this.directorform.reset()
                     $('#DirectorModal').modal('show')
             },
             editDirectorModal(id){
                 this.editmodeDirector = true;
                 this.directorform.reset()
                   console.log('edit director', id)
                    this.$Progress.start();
                      axios.get('/director/edit/'+id)
                        .then((response)=>{
                           $('#DirectorModal').modal('show')
                           toast({
                            type: 'success',
                            title: 'Fetched the Director data successfully'
                            })
                            this.directorform.fill(response.data.director)
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
                console.log('add director new')
                this.$Progress.start();
                this.directorform.post('/director')
                    .then((response)=>{
                        //  console.log(response.data)
                         toast({
                            type: 'success',
                            title: 'Director Created successfully'
                            })
                            this.$store.dispatch( "directors")
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
                     this.directorform.patch('/director/update/'+id)
                        .then(()=>{
                            this.$store.dispatch( "directors")
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
                        this.directorform.get('/director/delete/'+id)
                            .then(()=>{
                            toast({
                            type: 'success',
                            title: 'Director Deleted successfully'
                            })
                            this.$store.dispatch( "directors")
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


