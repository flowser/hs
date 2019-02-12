<template>
    <div class="card flex-fill" >
            <img class="card-img-top " :src="serviceLoadImage(SingleService.service_image)" style="width:100%;">
        <div class="card-body" >
            <h5 class="card-title text-center">{{SingleService.title}}</h5>
            <h6 class="card-title text-center">{{SingleService.service_title}}</h6>
            <p style="margin-bottom:-0.5em" class="card-text">{{SingleService.service_details }}</p>
        </div>
        <div class="clearfix">
            <span class="float-left" style="margin-bottom:-0.5em" >
                <p style="margin-bottom:-0.5em">
                    <small class="text-muted" v-if="SingleService.user">Updated By: {{SingleService.user.full_name}}</small>
                </p>
                <p style="margin-bottom:0.25em">
                    <small class="text-muted">On: {{SingleService.updated_at | dateformat}}</small>
                </p>
            </span>
            <span class="float-right">
                <a href=""  @click.prevent="editServiceModal(SingleService.id)">
                    <i class="fa fa-edit blue"></i>
                </a>
                /
                <a href=""  @click.prevent="deleteService(SingleService.id)">
                    <i class="fa fa-trash red"></i>
                </a>
            </span>
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

    </div>

</template>

<script>
    // import BlogSidebar from "./BlogSidebar.vue"
        export default {
                name:"SingleService",
                data(){
                    return{
                        editmodeService: false,
                        serviceform: new Form({
                            id:'',
                            title:'',
                            subtitle:'',
                            details:'',
                            service_image:'',
                        }),
                    }
                },
                computed:{
                    SingleService(){
                        return this.$store.getters.SingleService
                    },
                },
                methods:{
                    singleservice(){
                        console.log(this.$route.params.id)
                        this.$store.dispatch('ServiceById', this.$route.params.id);   //action from index.js
                    },
                    //Service Images
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
                    updateService(id){
                        console.log('update service')
                        this.$Progress.start();
                            this.serviceform.patch('/service/update/'+id)
                                .then(()=>{
                                    this.$store.dispatch( "organisation")
                                    this.$store.dispatch( "about")
                                    this.$store.dispatch( "aboutpic")
                                    this.$store.dispatch( "service")
                                    this.$store.dispatch( "advert")
                                    this.singleservice();
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
                    deleteService(id){
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
                                    this.serviceform.get('/service/delete/'+id)
                                        .then(()=>{
                                        toast({
                                        type: 'success',
                                        title: 'Service Deleted successfully'
                                        })
                                        this.$store.dispatch( "organisation")
                                        this.$store.dispatch( "about")
                                        this.$store.dispatch( "aboutpic")
                                        this.$store.dispatch( "service")
                                        this.$store.dispatch( "advert")
                                        this.singleservice();
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
                        this.singleservice();  //method
                },
                watch:{
                    $route(to, from){
                          this.singleservice();//method
                    }
                }
            }
</script>



