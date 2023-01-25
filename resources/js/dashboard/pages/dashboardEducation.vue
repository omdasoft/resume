<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Education</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <th>Degree</th>
                                <th>University</th>
                                <th>Faculty</th>
                                <th>Specialty</th>
                                <th>From</th>
                                <th>To</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                    <tr v-for="education in educationInfo" :key="education.id">
                                        <td>{{education.degree}}</td>
                                        <td>{{education.university}}</td>
                                        <td>{{education.faculty}}</td>
                                        <td>{{education.specialty}}</td>
                                        <td>{{education.from}}</td>
                                        <td>{{education.to}}</td>
                                        <td>
                                            <a
                                                class="btn btn-warning btn-sm"
                                                href="#"
                                                @click="updateEducationModal(education)"
                                            ><i class="fa fa-pen"></i></a>
                                            <a
                                                class="btn btn-danger btn-sm"
                                                href="#"
                                                @click="deleteEducation(education.id)"
                                            ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <tr v-if="educationInfo.length === 0">
                                    <td colspan="7" class="text-center">No Education Data
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a
                                class="btn btn-success btn-sm"
                                href="#"
                                data-toggle="modal"
                                data-target="#createEditEmployment"
                                @click="createEducationModal"
                            ><i class="fa fa-plus"></i> Create New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- create/edit employment modal -->
        <div
            class="modal fade"
            id="createEditEducation"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create/Edit Education</h5>
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
                        <div v-if="errors">
                            <div v-for="(key, error) in errors" class="alert alert-danger" :key="key">{{ error }}</div>
                        </div>
                        <form @submit.prevent="editMode === true ? updateEducation():storeEducation()" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="degree">Degree</label>
                                        <select v-model="formData.degree" id="degree" class="form-control">
                                            <option>BSc</option>
                                            <option>Master</option>
                                            <option>PHD</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="university">University</label>
                                        <input type="text" v-model="formData.university" id="university" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="faculty">Faculty</label>
                                        <input type="text" v-model="formData.faculty" id="faculty" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="specialty">Specialty</label>
                                        <input type="test" v-model="formData.specialty" id="specialty" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="from">From</label>
                                        <input type="date" v-model="formData.from" id="from" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <input type="date" v-model="formData.to" id="to" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button v-show="editMode === true" type="submit" class="btn btn-warning">Update</button>
                                <button v-show="editMode !== true" type="submit" class="btn btn-success">Create</button>
                            </div>
                        </form>
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
    export default {
        data() {
            return {
                educationInfo: {},
                editMode:false,
                formData: new Form({
                    id:"",
                    degree:"",
                    university:"",
                    faculty:"",
                    specialty:"",
                    from:"",
                    to:""
                }),
                errors:"",
            }
        },
        methods: {
            getEducationInfo() {
                axios.get('/api/educations').then((res) => {
                   this.educationInfo = res.data;
                });
            },
            createEducationModal() {
                this.editMode = false;
                this.formData.reset();
                $('#createEditEducation').modal('show');
            },
            updateEducationModal(education) {
                this.editMode = true;
                this.formData.fill(education);
                $('#createEditEducation').modal('show');
            },
            storeEducation() {
                this.formData.post('/api/educations/').then((res) => {
                    this.$refs.Close.click();
                    this.getEducationInfo();
                    Toast.fire(
                        "success",
                        "Education has been created Successfully",
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
            updateEducation() {
                this.formData.put('/api/educations/'+this.formData.id).then((res) => {
                    this.$refs.Close.click();
                    this.getEducationInfo();
                    Toast.fire(
                        "success",
                        "Education has been updated Successfully",
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
            deleteEducation(id) {
                if(confirm("are you sure you want to delete this record ?")) {
                    axios.delete('/api/educations/'+id).then((res) => {
                        this.getEducationInfo();
                        Toast.fire(
                            "success",
                            "Education has been deleted Successfully",
                            "success"
                        );
                    });
                }
            }
        },
        mounted() {
            console.log('component mounted');
            this.getEducationInfo();
        }
    }
</script>
