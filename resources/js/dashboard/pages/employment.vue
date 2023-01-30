<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employment</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <th>Company</th>
                                <th>Designation</th>
                                <th>Country</th>
                                <th>StartDate</th>
                                <th>EndDate</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                <tr v-for="employment in employmentData" :key="employment.id">
                                    <td>{{ employment.company }}</td>
                                    <td>{{ employment.designation }}</td>
                                    <td>{{ employment.country }}</td>
                                    <td>{{ employment.start_date }}</td>
                                    <td>
                                        <span v-if="employment.until_now === 1">Until now</span>
                                        <span v-else>{{employment.end_date}}</span>
                                    </td>
                                    <td>
                                        <a
                                            class="btn btn-warning btn-sm"
                                            href="#"
                                            data-toggle="modal"
                                            data-target="#createEditEmployment"
                                            @click="editEmploymentModal(employment)"
                                        ><i class="fa fa-pen"></i
                                        ></a>

                                        <a
                                            class="btn btn-danger btn-sm"
                                            href="#"
                                            @click="deleteEmployment(employment.id)"
                                        ><i class="fa fa-trash"></i
                                        ></a>
                                    </td>
                                </tr>
                                <tr v-if="employmentData.length === 0">
                                    <td colspan="6" class="text-center">No Employment Data
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a
                                class="btn btn-success btn-sm"
                                href="#"
                                data-toggle="modal"
                                data-target="#createEditEmployment"
                                @click="createEmploymentModal()"
                            ><i class="fa fa-plus"></i> Create New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- create/edit employment modal -->
        <div
            class="modal fade"
            id="createEditEmployment"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create/Edit Employment</h5>
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
                            <div v-for="(error, key) in errors" class="alert alert-danger" :key="key">{{ error }}</div>
                        </div>
                        <form @submit.prevent="editMode === true ? updateEmployment():storeEmployment()" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">Company</label>
                                        <input type="text" v-model="formData.company" id="company" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Designation</label>
                                        <input type="text" v-model="formData.designation" id="designation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Country</label>
                                        <input type="text" v-model="formData.country" id="country" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="github">Start Date</label>
                                        <input type="date" v-model="formData.start_date" id="startDate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="linkedin">End Date</label>
                                        <input type="date" v-model="formData.end_date" id="endDate" class="form-control" :disabled="disableEndDateField"><br>
                                        <input class="form-check-input ml-1" v-model="formData.until_now" :value="formData.until_now" @change="untilNowFieldChange" type="checkbox" id="untilNow">
                                        <label class="form-check-label ml-4" for="untilNow">
                                            Until Now
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <h3>Manage Details</h3>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div v-for="(detail, index) in formData.employment_details" class="d-flex justify-content-between mb-3" :key="index">
                                        <textarea class="form-control mr-2" cols="5" name="desc[]" v-model="detail.desc" ></textarea>
                                        <button type="button" v-show="!editMode" class="btn btn-sm btn-danger" @click.prevent="removeDetail(index)"><i class="fa fa-minus"></i> </button>
                                        <button type="button" v-show="editMode" class="btn btn-sm btn-danger" @click.prevent="deleteEmploymentDetails(detail.id)"><i class="fa fa-trash"></i> </button>
                                    </div>
                                    <button class="btn btn-sm btn-dark" @click.prevent="addNewDetail()"><i class="fa fa-plus"></i></button>
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
import moment from 'moment';
import Employment from '../apis/Employment';
    export default {
        data() {
            return {
                employmentData: {},
                employmentDetails: {},
                startDate:"",
                editMode:false,
                disableEndDateField:"",
                formData: new Form({
                    id:"",
                    company:"",
                    designation:"",
                    country:"",
                    start_date:"",
                    end_date:"",
                    until_now:"",
                    employment_details:[{
                        id:"",
                        desc:"",
                        employment_id:""
                    }]
                }),
                errors:""
            }
        },
        methods: {
            getEmploymentData() {
                Employment.get().then((res) => {
                    this.employmentData = res.data;
                });
            },
            editEmploymentModal(employment) {
                this.formData.fill(employment);
                this.editMode = true;
                this.errors = "";
                this.disableEndDateField = (this.formData.until_now === 1?true:false);
            },
            createEmploymentModal() {
                this.formData.reset();
                this.editMode = false;
                this.errors = "";
                this.disableEndDateField = (this.formData.until_now === 1?true:false);
            },
            storeEmployment() {
                Employment.store(this.formData).then((res) => {
                    this.$refs.Close.click();
                    this.getEmploymentData();
                    Toast.fire(
                        "success",
                        "Employment Created Successfully",
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
            updateEmployment() {
                Employment.update(this.formData.id, this.formData).then((res) => {
                    //console.log(res.data);
                    this.$refs.Close.click();
                    this.getEmploymentData();
                    Toast.fire(
                        "success",
                        "Employment has updated seccessfully",
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
            untilNowFieldChange() {
                this.disableEndDateField = this.disableEndDateField === true ? false : true;
                if(this.formData.until_now === true) {
                    this.formData.end_date = "";
                }
            },
            deleteEmployment(id) {
                if(confirm("are you sure you want to delete this record ?")) {
                    axios.delete('/api/employments/'+id).then((res) => {
                        this.getEmploymentData();
                    }).catch(error => {
                        console.log(error);
                    });
                }
            },
            addNewDetail() {
              this.formData.employment_details.push({
                  id:"",
                  desc:"",
                  employment_id:""
              });
            },
            removeDetail(index) {
                this.formData.employment_details.splice(index, 1);
            },
            deleteEmploymentDetails(id) {
                if(confirm("are you sure you want to delete this record ?")) {
                    var detailId = id;
                    Employment.delete(id).then((res) => {
                        var index = this.formData.employment_details.map(function(detail) {
                            return detail.id;
                        }).indexOf(detailId);
                        this.formData.employment_details.splice(index, 1);
                            Toast.fire(
                            "success",
                            "Employment details deleted seccessfully",
                            "success"
                        );
                    });
                }
            }
        },
        mounted() {
            this.getEmploymentData();
            console.log('component mounted');
        }
    }
</script>
