<template>
  <div class="container-fluid mt-5">
      <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">        
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users Table</h3>
              <div class="card-tools">                
                    <button class="btn btn-success"  @click.prevent="newUserModal()">Add New User
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
                    <th>users</th>
                    <th>Roles</th>
                    <th>Permissions</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    
                  <tr v-for="(user, index) in Users" :key="user.id">             
                    <td>{{index+1}}</td>
                    <td>{{user.full_name}}</td>                    
                    <td>        
                        <span v-for="role in user.roles" :key="role.id" class="pl-2">
                            <div class="btn btn-primary btn-sm ml-1 mb-2 ">{{role.name}} </div>
                        </span> 
                    </td> 
                    <td>          
                        <span v-for="permission in user.permissions" :key="permission.id" class="pl-2">
                            <div class="btn btn-primary btn-sm ml-1 mb-2 ">{{permission.name}} </div>
                        </span> 
                    </td> 
                    <!-- {{user.created_at | dateformat}} -->
                    <td>{{user.created_at | dateformat}} </td>                  
                    <td>
                         <a href="" @click.prevent="edituserModal()" > 
                             <i class="fa fa-edit blue"></i>
                         </a>                         
                         /
                         <a href="" @click.prevent="deleteuser()">
                             <i class="fa fa-trash red"></i>
                         </a>
                    </td>                  
                  </tr> 
                </tbody>               
              </table>
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
     <!-- <div class="modal fade" id="RoleModal" tabindex="-1" role="dialog" aria-labelledby="RoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="editmodeRole" id="RoleModalLabel">Update Role</h5>
                    <h5 class="modal-title" v-show="!editmodeRole" id="RoleModalLabel">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    
                <form role="form" @submit.prevent="editmodeRole ? updateRole(userform.id) : addRole ()" >
                    <div class="modal-body">
                        <div class="form-group">                        
                                <input v-model="userform.first_name" type="text" name="name" placeholder="Role Name"
                                    class="form-control" :class="{ 'is-invalid': userform.errors.has('name') }">
                                <has-error :form="userform" field="name"></has-error>
                        </div>
                        <div class="form-group"> 
                            <b-form-group label="Select Permissions:">
                                <b-form-checkbox-group v-model="selected">
                                    <b-form-checkbox v-for="permission in Permissions"
                                          :value="permission.name" :key="permission.id" v-model="userform.permission_id">{{permission.name}}
                                    </b-form-checkbox>
                                </b-form-checkbox-group>
                            </b-form-group>
                            <hr>
                            <div>Selected: <span class="btn btn-info btn-sm ml-2 mb-2">{{ selected }}</span></div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmodeRole" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmodeRole" type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->


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
                        name:'',
                        permission_id:[],
                }),
                checkedNames: [],
                selected: [],
            }
        },
        mounted() {                          
            this.loadUsers();   
            this.$store.getters.Users                      
        },
        computed:{
            // Permissions(){ 
            //     return this.$store.getters.Permissions                
            // },
            // Roles(){
            //     return this.$store.getters.Roles            
            // },
            Users(){
                 console.log('edit permiion')
                return this.$store.getters.Users            
            },
            // checkedComputed () {
            // return this.checkedNames
            // }
        },
        methods:{ 
            // //permissions
            // loadPermissions(){
            //     return this.$store.dispatch("permissions")//get all from permision.index 
            // },                          
            // //Roles
            // loadRoles(){
            //     return this.$store.dispatch( "roles")//get all from roles.index 
            // }, 
            loadUsers(){
                return this.$store.dispatch( "users")//get all from users.index 
            }, 
            newUserModal(){
                 this.editmodeUser= false;
                 this.userform.reset()
                     $('#UserModal').modal('show')
             },
             editUserModal(id){
                 this.editmodeRole = true;
                 this.useform.reset()
                   console.log('edit user', id)
                    this.$Progress.start();
                      axios.get('/user/edit/'+id)
                        .then((response)=>{
                           $('#UserModal').modal('show')
                            this.userform.fill(response.data.role)
                               this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                        })                          
             },
            addUser() {
                console.log('Role')
                this.$Progress.start();
                this.userform.post('/user/create')
                    .then((response)=>{
                         console.log(response.data)
                            this.$store.dispatch( "users")
                            // this.$store.dispatch( "permissions")//like refresh
                            //  this.$router.push('/role-list')
                            $('#UserModal').modal('hide')
                              this.$Progress.finish()
                    })
                    .catch(()=>{
                        this.$Progress.fail()
                    })
            }, 
            updateUser(id){
                  console.log('update user')                  
                  this.$Progress.start();
                     this.userform.patch('/user/update/'+id)  
                        .then(()=>{
                            this.$store.dispatch( "users")
                            // this.$store.dispatch( "permissions")//like refresh
                         $('#UserModal').modal('hide')
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                        }) 
            },           
            deleteUser(id){
                 console.log('delete user', id)
                 this.$Progress.start();
                    axios.get('/user/delete/'+id)  
                        .then(()=>{
                            this.$store.dispatch( "users")
                            // this.$store.dispatch( "permissions")//like refresh
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                        }) 
            }, 
        },        
            
    }
</script>

