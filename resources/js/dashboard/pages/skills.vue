<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Skills</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <th>title</th>
                                <th>percentage</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                    <tr v-for="skill in skills" :key="skill.id">
                                        <td>{{skill.title}}</td>
                                        <td>{{skill.percentage}}</td>
                                        <td>
                                            <a
                                                class="btn btn-warning btn-sm"
                                                href="#"
                                                @click="updateSkillsModal(skill)"
                                            ><i class="fa fa-pen"></i></a>
                                            <a
                                                class="btn btn-danger btn-sm"
                                                href="#"
                                                @click="deleteSkills(skill.id)"
                                            ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <tr v-if="skills.length === 0">
                                    <td colspan="3" class="text-center">No Skills Data
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a
                                class="btn btn-success btn-sm"
                                href="#"
                                data-toggle="modal"
                                data-target="#createEditEmployment"
                                @click="createSkillsModal"
                            ><i class="fa fa-plus"></i> Create New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- create/edit skills modal -->
        <div
            class="modal fade"
            id="createEditSkills"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create/Edit Skills</h5>
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
                            <div v-for="(error, index) in errors" :key="index" class="alert alert-danger">{{ error }}</div>
                        </div>
                        <form @submit.prevent="editMode === true ? updateSkills():storeSkills()" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" v-model="formData.title" id="title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="percentage">Percentage</label>
                                        <input type="text" v-model="formData.percentage" id="percentage" class="form-control">
                                    </div>
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
import Skills from '../apis/Skills';
    export default {
        data() {
            return {
                skills: {},
                editMode:false,
                formData: new Form({
                    id:"",
                    title:"",
                    percentage:"",
                }),
                errors:"",
            }
        },
        methods: {
            getSkills() {
                Skills.get().then((res) => {
                   this.skills = res.data;
                });
            },
            createSkillsModal() {
                this.errors = "";
                this.editMode = false;
                this.formData.reset();
                $('#createEditSkills').modal('show');
            },
            updateSkillsModal(skill) {
                this.errors = "";
                this.editMode = true;
                this.formData.fill(skill);
                $('#createEditSkills').modal('show');
            },
            storeSkills() {
                Skills.store(this.formData).then((res) => {
                    this.$refs.Close.click();
                    this.getSkills();
                    Toast.fire(
                        "success",
                        "Skill has been created Successfully",
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
            updateSkills() {
                Skills.update(this.formData.id, this.formData).then((res) => {
                    this.$refs.Close.click();
                    this.getSkills();
                    Toast.fire(
                        "success",
                        "Skill has been updated Successfully",
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
            deleteSkills(id) {
                Swal
                    .fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    })
                    .then((result) => {
                        if (result.value) {
                            Skills.delete(id).then((res) => {
                                this.getSkills();
                                Toast.fire(
                                    "success",
                                    "Skill has been deleted Successfully",
                                    "success"
                                );
                            });
                        }
                    });
            }
        },
        mounted() {
            console.log('component mounted');
            this.getSkills();
        }
    }
</script>
