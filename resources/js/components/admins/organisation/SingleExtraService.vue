<template>
    <div class="card flex-fill" >
            <!-- <img class="card-img-top " :src="extraserviceLoadImage(SingleExtraservice.extraservice_image)" style="width:100%;"> -->
        <div class="card-body" >
            <h5 class="card-title text-center">{{SingleExtraService.title}}</h5>
            <p style="margin-bottom:-0.5em" class="card-text">{{SingleExtraService.details }}</p>
            <p style="margin-bottom:-0.5em" class="card-text">{{SingleExtraService.why }}</p>
        </div>
        <div class="clearfix">
            <span class="float-left" style="margin-bottom:-0.5em" >
                <p style="margin-bottom:-0.5em">
                    <small class="text-muted" v-if="SingleExtraService.user">Updated By: {{SingleExtraService.user.full_name}}</small>
                </p>
                <p style="margin-bottom:0.25em">
                    <small class="text-muted">On: {{SingleExtraService.updated_at | dateformat}}</small>
                </p>
            </span>
            <span class="float-right">
                <a href=""  @click.prevent="editExtraServiceModal(SingleExtraService.id)">
                    <i class="fa fa-edit blue"></i>
                </a>
                /
                <a href=""  @click.prevent="deleteExtraService(SingleExtraService.id)">
                    <i class="fa fa-trash red"></i>
                </a>
            </span>
        </div>
       <!-- Extraservice -->
        <div class="modal fade " id="ExtraServiceModal" tabindex="-1" role="dialog" aria-labelledby="ExtraServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeExtraService" id="ExtraserviceModalLabel">Update ExtraService Us</h5>
                        <h5 class="modal-title" v-show="!editmodeExtraService" id="ExtraserviceModalLabel">Add New ExtraService Us</h5>
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

    </div>

</template>

<script>
    // import BlogSidebar from "./BlogSidebar.vue"
        export default {
                name:"SingleExtraService",
                data(){
                    return{
                editmodeExtraService: false,
                extraserviceform: new Form({
                        id:'',
                        title:'',
                        details:'',
                        why:'',
                }),
                    }
                },
                computed:{
                    SingleExtraService(){
                        return this.$store.getters.SingleExtraService
                    },
                },
                methods:{
                    singleextraservice(){
                        console.log(this.$route.params.id)
                        this.$store.dispatch('ExtraServiceById', this.$route.params.id);   //action from index.js
                    },
                    //soon to add images
                    //Extraservice Images
                    // extraserviceChangeImage(event){
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
                    //         if(img.length>100){
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
                    updateExtraService(id){
                        console.log('update extraservice')
                        this.$Progress.start();
                            this.extraserviceform.patch('/extraservice/update/'+id)
                                .then(()=>{
                                    this.$store.dispatch( "organisation")
                                    this.$store.dispatch( "about")
                                    this.$store.dispatch( "aboutpic")
                                    this.$store.dispatch( "extraservice")
                                    this.$store.dispatch( "advert")
                                    this.singleextraservice();
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
                    deleteExtraService(id){
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
                                    this.extraserviceform.get('/extraservice/delete/'+id)
                                        .then(()=>{
                                        toast({
                                        type: 'success',
                                        title: 'Extraservice Deleted successfully'
                                        })
                                        this.$store.dispatch( "organisation")
                                        this.$store.dispatch( "about")
                                        this.$store.dispatch( "aboutpic")
                                        this.$store.dispatch( "service")
                                        this.$store.dispatch( "extraservice")
                                        this.$store.dispatch( "advert")
                                        this.singleextraService();
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
                mounted() { //action
                        this.singleextraservice();  //method
                },
                watch:{
                    $route(to, from){
                          this.singleextraservice();//method
                    }
                }
            }
</script>




