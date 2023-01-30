<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile Info</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Linkedin</th>
                                <th>Github</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                <tr :key="profileInfo.id">
                                    <td>{{ profileInfo.name }}</td>
                                    <td>{{ profileInfo.email }}</td>
                                    <td>{{ profileInfo.phone }}</td>
                                    <td>{{ profileInfo.linkedin_url }}</td>
                                    <td>{{ profileInfo.github_url }}</td>
                                    <td>
                                    <a
                                        class="btn btn-warning btn-sm"
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#viewEditProfile"
                                        @click="addEditProfile(editMode=true)"
                                        ><i class="fa fa-pen"></i
                                    ></a>
                                    </td>
                                </tr>
                                <tr v-if="profileInfo.length === 0">
                                    <td colspan="6" class="text-center">No Profile Data
                                        <button class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#viewEditProfile" @click="addEditProfile(editMode=false)">
                                            <i class="fa fa-plus"></i> Create New </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <!-- Modal -->
        <div
        class="modal fade"
        id="viewEditProfile"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        >
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create/Edit Profile</h5>
                        <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        >
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card bg-light mb-3" style="max-width: 100%">
                        <div class="card-body">
                        <div v-if="errors">
                            <div v-for="(error, key) in errors" class="alert alert-danger" :key="key">{{ error }}</div>
                        </div>

                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" v-model="formData.name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" v-model="formData.email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" v-model="formData.phone" id="phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="github">Github</label>
                                        <input type="text" v-model="formData.github_url" id="github" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" v-model="formData.linkedin_url" id="linkedin" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" v-model="formData.address" id="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" v-model="formData.title" id="title" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summary">Summary</label>
                                        <textarea rows="10" v-model="formData.summary" id="summary" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Choose Image</label>
                                        <input type="file" name="image" class="form-control" id="image" @change="onImageChange" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img v-if="image" :src="imageSrc" width="80" height="80">
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cv">Choose Cv</label>
                                        <input type="file" name="cv" class="form-control" id="cv" @change="onCvChange">
                                        <a v-if="cv" :href="cvSrc" target="new">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button v-if="editMode" type="submit" @click.prevent="updateMyProfile()" class="btn btn-warning"><i class="fa fa-pen"></i> update</button>
                                <button v-else type="submit" @click.prevent="storeMyProfile()" class="btn btn-success"><i class="fa fa-plus"></i> create</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                        ref="Close"
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                        >
                        Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Profile from '../apis/Profile';
    //import Csrf from '../apis/Csrf';
    export default {
        data() {
            return{
                editMode: false,
                profileInfo: [],
                formData: {
                    id: "",
                    name:"",
                    email:"",
                    phone:"",
                    address:"",
                    title:"",
                    summary:"",
                    github_url:"",
                    linkedin_url:""
                },
                image: "",
                path:"/storage/uploads/",
                cv:"",
                imageSrc:"",
                cvSrc:"",
                errors:""
            }
        },
        methods: {
            getProfileInfo() {
                Profile.get().then((response) => {
                    this.profileInfo = response.data;
                });
            },
            addEditProfile(editMode) {
                if(editMode) {
                    this.formData.id = this.profileInfo.id;
                    this.formData.name = this.profileInfo.name;
                    this.formData.email = this.profileInfo.email;
                    this.formData.phone = this.profileInfo.phone;
                    this.formData.address = this.profileInfo.address;
                    this.formData.title = this.profileInfo.title;
                    this.formData.summary = this.profileInfo.summary;
                    this.formData.github_url = this.profileInfo.github_url;
                    this.formData.linkedin_url = this.profileInfo.linkedin_url;

                    this.image = this.profileInfo.image.image_name;
                    this.imageSrc = this.path + this.image;
                    this.cv = this.profileInfo.cv;
                    this.cvSrc = this.path + this.cv;
                    this.editMode = true;
                }
            },
            onImageChange(e){
                this.image = e.target.files[0];
            },
            onCvChange(e) {
                this.cv = e.target.files[0];
            },
            updateMyProfile() {
                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('cv', this.cv);
                _.each(this.formData, (value, key) => {
                    formData.append(key, value);
                });
                formData.append('_method', 'put');
                Profile.update(this.formData.id, formData).then((res) => {
                    this.$refs.Close.click();
                    this.getProfileInfo();
                    Toast.fire(
                            "success",
                            "Profile has updated seccessfully",
                            "success"
                        );

                }).catch(err => {
                    if (err.response.status === 422) {
                        this.errors = []
                        _.each(err.response.data.errors, error => {
                            _.each(error, e => {
                                this.errors.push(e)
                            })
                        })
                    }
                });
            },
            storeMyProfile() {
                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('cv', this.cv);
                _.each(this.formData, (value, key) => {
                    formData.append(key, value);
                });
               Profile.store(formData).then((res) => {
                    this.$refs.Close.click();
                    this.getProfileInfo();
                    Toast.fire(
                        "success",
                        "Profile created seccessfully",
                        "success"
                    );

                }).catch(err => {
                    if (err.response.status === 422) {
                        this.errors = []
                        _.each(err.response.data.errors, error => {
                            _.each(error, e => {
                                this.errors.push(e)
                            })
                        })
                    }
                });
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.getProfileInfo();
        }
    }
</script>
