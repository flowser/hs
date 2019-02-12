<template>
        <div class="card flex-fill" >
                <img class="card-img-top " :src="aboutLoadImage(SingleAboutPic.image)" style="width:100%;">
                <div class="card-body" >
                    <h5 class="card-title">{{SingleAboutPic.title}}</h5>
                    <p style="margin-bottom:-0.5em" class="card-text">{{SingleAboutPic.description }}</p>
                </div>
                <div class="clearfix">
                    <span class="float-left" style="margin-bottom:-0.5em" >
                        <p style="margin-bottom:-0.5em">
                            <small class="text-muted" v-if="SingleAboutPic.user">Updated By: {{SingleAboutPic.user.full_name}}</small>
                        </p>
                        <p style="margin-bottom:0.25em">
                            <small class="text-muted">On: {{SingleAboutPic.updated_at | dateformat}}</small>
                        </p>
                    </span>
                    <span class="float-right">
                        <a href=""  @click.prevent="editAboutPicsModal(SingleAboutPic.id)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href=""  @click.prevent="deleteAboutPics(SingleAboutPic.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                    </span>
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
                                            <label for="title" class="col-form-label">Title</label>
                                            <input v-model="aboutpicsform.title" type="text" name="title" placeholder="Title"
                                                class="form-control" :class="{ 'is-invalid': aboutpicsform.errors.has('title') }" >
                                            <has-error style="color: #e83e8c" :form="aboutpicsform" field="title"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <label for="description" class="col-form-label">Description</label>
                                        <textarea v-model="aboutpicsform.description" type="text" name="description" placeholder="description"
                                                class="form-control" :class="{ 'is-invalid': aboutpicsform.errors.has('description') }" >
                                            </textarea>
                                            <has-error style="color: #e83e8c" :form="aboutpicsform" field="description"></has-error>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="form-group col-md-12">
                                            <label for="image" class=" col-form-label">Organisation Image 1</label><br>
                                                <input @change="aboutImage($event)" type="file" name="image"
                                                    :class="{ 'is-invalid': aboutpicsform.errors.has('image') }">
                                                    <img v-show="editmodeAboutPics" :src="updateAboutImage(aboutpicsform.image)" alt="" width="100%" >
                                                    <img  v-show="!editmodeAboutPics" :src="aboutpicsform.image" alt="" width="100%" >
                                                <has-error style="color: #e83e8c" :form="aboutpicsform" field="image"></has-error>
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
        </div>
</template>

<script>
    // import BlogSidebar from "./BlogSidebar.vue"
        export default {
            name:"SingleAbouPic",
            data(){
                return{
                    editmodeAboutPics: false,
                    aboutpicsform: new Form({
                        id:'',
                        title:'',
                        description:'',
                        image:'',
                    }),
                }
            },

                computed:{
                    SingleAboutPic(){
                        return this.$store.getters.SingleAbouPic
                    },

                },
                methods:{
                    singleaboutpic(){
                        console.log(this.$route.params.id)
                        this.$store.dispatch('AboutPicById', this.$route.params.id);   //action from index.js
                    },
                    //About Images
                    aboutImage(event){
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
                                    this.aboutpicsform.image =event.target.result
                                        // console.log(event.target.result)
                                    };
                                reader.readAsDataURL(file);
                        }
                    },
                    aboutLoadImage(about_image_id){
                        if(about_image_id !=null){
                            return "/assets/organisation/img/website/aboutpics/"+about_image_id;
                        }else{
                            return "/assets/organisation/img/website/empty.png";
                        }
                    },
                    updateAboutImage(about_image){
                        // console.log(this.aboutpicsform.image)
                        let img = this.aboutpicsform.image;
                            if(img.length>100){
                                    return this.aboutpicsform.image;
                                }else{
                                    if(about_image){
                                        return "assets/organisation/img/website/aboutpics/"+about_image;
                                    }else{
                                        return "/assets/organisation/img/website/empty.png";
                                    }
                                }
                    },
                    editAboutPicsModal(id){
                        this.editmodeAboutPics = true;
                        this.aboutpicsform.reset()
                        console.log('edit aboutpic', id)
                            this.$Progress.start();
                            axios.get('/aboutpic/edit/'+id)
                                .then((response)=>{
                                    console.log(response.data)
                                $('#AboutPicsModal').modal('show')
                                toast({
                                    type: 'success',
                                    title: 'Fetched the About data successfully'
                                    })
                                    this.aboutpicsform.fill(response.data.aboutpic)
                                    this.$Progress.finish();
                                })
                                .catch(()=>{

                                    //errors
                                    $('#AboutPicsModal').modal('show');
                                    toast({
                                    type: 'error',
                                    title: 'There was something Wrong'
                                    })
                                    this.$Progress.fail();
                                })
                    },
                    deleteAboutPics(id){
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
                                    this.aboutpicsform.get('/aboutpic/delete/'+id)
                                        .then(()=>{
                                        toast({
                                        type: 'success',
                                        title: 'About Picture Deleted successfully'
                                        })
                                        this.$store.dispatch( "organisation")
                                        this.$store.dispatch( "about")
                                        this.$store.dispatch( "aboutpic")
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
                        this.singleaboutpic();  //method
                },
                watch:{
                    $route(to, from){
                          this.singleaboutpic();//method
                    }
                }
            }
</script>
