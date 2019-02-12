<template>
    <div class="card flex-fill" >
            <img class="card-img-top " :src="advertLoadImage(SingleAdvert.advert_image)" style="width:100%;">
        <div class="card-body" >
            <h5 class="card-title text-center">{{SingleAdvert.title}}</h5>
            <h6 class="card-title text-center">{{SingleAdvert.subtitle}}</h6>
            <p style="margin-bottom:-0.5em" class="card-text">{{SingleAdvert.details }}</p>
        </div>
        <div class="clearfix">
            <span class="float-left" style="margin-bottom:-0.5em" >
                <p style="margin-bottom:-0.5em">
                    <small class="text-muted" v-if="SingleAdvert.user">Updated By: {{SingleAdvert.user.full_name}}</small>
                </p>
                <p style="margin-bottom:0.25em">
                    <small class="text-muted">On: {{SingleAdvert.updated_at | dateformat}}</small>
                </p>
            </span>
            <span class="float-right">
                <a href=""  @click.prevent="editAdvertModal(SingleAdvert.id)">
                    <i class="fa fa-edit blue"></i>
                </a>
                /
                <a href=""  @click.prevent="deleteAdvert(SingleAdvert.id)">
                    <i class="fa fa-trash red"></i>
                </a>
            </span>
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
    // import BlogSidebar from "./BlogSidebar.vue"
        export default {
            name:"SingleAdvert",
            data(){
                return{
                    editmodeAdvert: false,
                    advertform: new Form({
                        id:'',
                        title:'',
                        subtitle:'',
                        details:'',
                        advert_image:'',
                    }),
                }
            },

                computed:{
                    SingleAdvert(){
                        return this.$store.getters.SingleAdvert
                    },

                },
                methods:{
                    singleadvert(){
                        console.log(this.$route.params.id)
                        this.$store.dispatch('AdvertById', this.$route.params.id);   //action from index.js
                    },
                    //Advert Images
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
                    updateAdvert(id){
                        console.log('update advert')
                        this.$Progress.start();
                            this.advertform.patch('/advert/update/'+id)
                                .then(()=>{
                                    this.$store.dispatch( "organisation")
                                    this.$store.dispatch( "about")
                                    this.$store.dispatch( "aboutpic")
                                    this.$store.dispatch( "advert")
                                    this.singleadvert();
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
                    deleteAdvert(id){
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
                                    this.advertform.get('/advert/delete/'+id)
                                        .then(()=>{
                                        toast({
                                        type: 'success',
                                        title: 'Advert Deleted successfully'
                                        })
                                        this.$store.dispatch( "organisation")
                                        this.$store.dispatch( "about")
                                        this.$store.dispatch( "aboutpic")
                                        this.$store.dispatch( "advert")
                                        this.singleadvert();
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
                        this.singleadvert();  //method
                },
                watch:{
                    $route(to, from){
                          this.singleadvert();//method
                    }
                }
            }
</script>


