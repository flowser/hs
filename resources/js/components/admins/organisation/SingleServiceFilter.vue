<template>
    <div class="card flex-fill" >
            <!-- <img class="card-img-top " :src="servicefilterLoadImage(SingleServicefilter.servicefilter_image)" style="width:100%;"> -->
        <div class="card-body" >
            <h5 class="card-title text-center">{{SingleServiceFilter.title}}</h5>
            <p style="margin-bottom:-0.5em" class="card-text">{{SingleServiceFilter.details }}</p>
            <p style="margin-bottom:-0.5em" class="card-text">{{SingleServiceFilter.why }}</p>
        </div>
        <div class="clearfix">
            <span class="float-left" style="margin-bottom:-0.5em" >
                <p style="margin-bottom:-0.5em">
                    <small class="text-muted" v-if="SingleServiceFilter.user">Updated By: {{SingleServiceFilter.user.full_name}}</small>
                </p>
                <p style="margin-bottom:0.25em">
                    <small class="text-muted">On: {{SingleServiceFilter.updated_at | dateformat}}</small>
                </p>
            </span>
            <span class="float-right">
                <a href=""  @click.prevent="editServiceFilterModal(SingleServiceFilter.id)">
                    <i class="fa fa-edit blue"></i>
                </a>
                /
                <a href=""  @click.prevent="deleteServiceFilter(SingleServiceFilter.id)">
                    <i class="fa fa-trash red"></i>
                </a>
            </span>
        </div>
       <!-- Servicefilter -->
        <div class="modal fade " id="ServiceFilterModal" tabindex="-1" role="dialog" aria-labelledby="ServiceFilterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmodeServiceFilter" id="ServicefilterModalLabel">Update ServiceFilter Us</h5>
                        <h5 class="modal-title" v-show="!editmodeServiceFilter" id="ServicefilterModalLabel">Add New ServiceFilter Us</h5>
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

    </div>

</template>

<script>
    // import BlogSidebar from "./BlogSidebar.vue"
        export default {
                name:"SingleServiceFilter",
                data(){
                    return{
                editmodeServiceFilter: false,
                servicefilterform: new Form({
                        id:'',
                        title:'',
                        details:'',
                        why:'',
                }),
                    }
                },
                computed:{
                    SingleServiceFilter(){
                        return this.$store.getters.SingleServiceFilter
                    },
                },
                methods:{
                    singleservicefilter(){
                        console.log(this.$route.params.id)
                        this.$store.dispatch('ServiceFilterById', this.$route.params.id);   //action from index.js
                    },
                    //soon to add images
                    //Servicefilter Images
                    // servicefilterChangeImage(event){
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
                    //         if(img.length>100){
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
                    updateServiceFilter(id){
                        console.log('update servicefilter')
                        this.$Progress.start();
                            this.servicefilterform.patch('/servicefilter/update/'+id)
                                .then(()=>{
                                    this.$store.dispatch( "organisation")
                                    this.$store.dispatch( "about")
                                    this.$store.dispatch( "aboutpic")
                                    this.$store.dispatch( "servicefilter")
                                    this.$store.dispatch( "advert")
                                    this.singleservicefilter();
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
                    deleteServiceFilter(id){
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
                                    this.servicefilterform.get('/servicefilter/delete/'+id)
                                        .then(()=>{
                                        toast({
                                        type: 'success',
                                        title: 'Servicefilter Deleted successfully'
                                        })
                                        this.$store.dispatch( "organisation")
                                        this.$store.dispatch( "about")
                                        this.$store.dispatch( "aboutpic")
                                        this.$store.dispatch( "service")
                                        this.$store.dispatch( "extraservice")
                                        this.$store.dispatch( "servicefilter")
                                        this.$store.dispatch( "advert")
                                        this.singleserviceFilter();
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
                        this.singleservicefilter();  //method
                },
                watch:{
                    $route(to, from){
                          this.singleservicefilter();//method
                    }
                }
            }
</script>





