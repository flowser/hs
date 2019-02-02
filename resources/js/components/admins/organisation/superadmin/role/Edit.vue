<template>
    <div class="container-fluid mt-5">
   <!-- Main content -->
    
        <!-- Role Modal -->
     
    <section class="content">
      <div class="row justify-content-around m-t-6">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Update Role</h3>
                <div class="card-body">                    
                    <form role="form" @submit.prevent="updateRole()" >
                        <div class="container">
                            <div class="form-group">                        
                                    <input v-model="roleform.name" type="text" name="name" placeholder="Role Name"
                                        class="form-control" :class="{ 'is-invalid': roleform.errors.has('name') }">
                                    <has-error :form="roleform" field="name"></has-error>
                            </div>
                           
                            <div class="form-group">
                                <b-form-group label="Select Permissions:">
                                    <b-form-checkbox-group v-model="selected">
                                        <b-form-checkbox v-for="permission in Permissions"
                                            :value="permission.name" :key="permission.id" v-model="roleform.permission">{{permission.name}}
                                        </b-form-checkbox>
                                    </b-form-checkbox-group>
                                </b-form-group>
                                <hr>
                                <div>Selected: <span class="btn btn-info btn-sm ml-2 mb-2">{{ selected }}</span></div>
                            </div>  



                        </div>
                            <button  type="submit" class="btn btn-success">Update</button>                    
                    </form>
                </div>
            </div>
          </div>
        </div>
     </div>
    </section>
          
     



  </div>
</template>

<script>
    export default {
        name:"New",
        data(){            
            return{                
                roleform: new Form({
                        id:'',
                        name:'',
                        permission:''
                }),
                selected: {},
            }
        },
        mounted() {
            // this.loadRoles();
            this.loadPermissions                        
        },
        created(){
            this.$Progress.start();
            // this.roleform.get(`role/edit/${this.$route.params.roleid}`)
            axios.get(`role/edit/${this.$route.params.roleid}`)
            .then((response)=>{
                $('#RoleModal').modal('show')
                // console.log(response.data)
                  this.roleform.fill(response.data.role)
                //   console.log(response.data.role.permissions)
            //    Vue (this.$data, 'selected', response.data.role.permissions.selected)
            //    console.log(ks)
                //   this.selected.fill(response.data.role.permissions)
                    this.$Progress.finish();
            })
            .catch(()=>{
                this.$Progress.fail();
            }) 
                       
        },
        computed:{
            Permissions(){ 
                return this.$store.getters.Permissions                
            },
        },
        methods:{ 
              
            //Roles
            // loadRoles(){
            //     return this.$store.dispatch( "roles")//get all from roles.index 
            // },
            loadPermissions(){
                return this.$store.dispatch( "permissions")//get all from roles.index 
            },
            //  editRoleModal(id){
            //      this.editmodeRole = true;
            //      this.roleform.reset()
            //        console.log('edit role', id)
            //         this.$Progress.start();
            //           axios.get('/role/edit/'+id)
            //             .then((response)=>{
            //                $('#RoleModal').modal('show')
            //                 this.roleform.fill(response.data.role)
            //                    this.$Progress.finish();
            //             })
            //             .catch(()=>{
            //                 this.$Progress.fail();
            //             })                          
            //  },             
            updateRole(id){
                  console.log('update role')                  
                  this.$Progress.start();
                     this.roleform.patch('/role/update/'+id)  
                        .then(()=>{
                            this.$router.push('/permissions') 
                            // this.$store.dispatch( "roles")
                            // this.$store.dispatch( "permissions")//like refresh
                        //  $('#RoleModal').modal('hide')
                            this.$Progress.finish();
                        })
                        .catch(()=>{
                            this.$Progress.fail();
                        }) 
            },           
             
        },        
            
    }
</script>
