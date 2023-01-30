<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Portfolio</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Github URL</th>
                                <th>#</th>
                                </thead>
                                <tbody>
                                <tr v-for="portfolio in portfolios" :key="portfolio.id">
                                    <td>{{ portfolio.title }}</td>
                                    <td>{{ portfolio.url }}</td>
                                    <td>{{ portfolio.github_url }}</td>
                                    <td>
                                        <a
                                            class="btn btn-warning btn-sm mb-1"
                                            href="#"
                                            @click="editPortfolioModal(portfolio)"
                                        ><i class="fa fa-pen"></i
                                        ></a>
                                        <a
                                            class="btn btn-danger btn-sm"
                                            href="#"
                                            @click="deletePortfolio(portfolio.id)"
                                        ><i class="fa fa-trash"></i
                                        ></a>
                                    </td>
                                </tr>
                                <tr v-if="portfolios.length === 0">
                                    <td colspan="6" class="text-center">No portfolio Data</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-success btn-sm" href="#" @click="createPortfolioModal()">
                            <i class="fa fa-plus"></i> Create New </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- create/edit portfolio modal -->
        <div
            class="modal fade"
            id="createEditPortfolio"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create/Edit Portfolio</h5>
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
                        <form @submit.prevent="editMode === true ? updatePortfolio():storePortfolio()">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" v-model="formData.title" id="title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="url">url</label>
                                        <input type="text" v-model="formData.url" id="url" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="githubUrl">github_url</label>
                                        <input type="text" v-model="formData.github_url" id="githubUrl" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="github">Summary</label>
                                        <textarea v-model="formData.summary" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" ref="imageUpload" name="image" id="image" class="form-control" @change="onImageChange">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-check-input ml-1" v-model="formData.featured" @change="onFeaturedChange" type="checkbox" id="featured">
                                        <label class="form-check-label ml-4" for="featured">
                                            Featured
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div v-show="imageSrc">
                                        <img :src="imageSrc" width="100%" height="100%">
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
import Portfolio from '../apis/Portfolio';
export default {
    data() {
        return {
            editMode: false,
            errors: "",
            portfolios: {},
            image:"",
            path:"/storage/uploads/",
            imageSrc:"",
            formData: {
                id: "",
                title: "",
                summary: "",
                url: "",
                github_url: "",
                featured: "",
            },
        };
    },
    methods:{
        getPortfolioData() {
            Portfolio.get().then((res) => {
               this.portfolios = res.data;
            });
        },
        onFeaturedChange() {
            this.formData.featured = this.formData.featured === true ? 1:0;
        },
        editPortfolioModal(portfolio) {
            this.errors = "";
            this.editMode = true;
            this.formData.id = portfolio.id;
            this.formData.title = portfolio.title;
            this.formData.summary = portfolio.summary;
            this.formData.url = portfolio.url;
            this.formData.github_url = portfolio.github_url;
            this.formData.featured = portfolio.featured == 1?1:0;
            this.image = "";
            if(portfolio.image) {
                this.imageSrc = this.path+portfolio.image.image_name;
            }
            $('#createEditPortfolio').modal('show');
        },
        createPortfolioModal() {
            this.errors = "";
            this.editMode = false;
            this.formData.id = "";
            this.formData.title = "";
            this.formData.summary = "";
            this.formData.url = "";
            this.formData.github_url = "";
            this.formData.featured = "";
            this.image = "";
            this.imageSrc = "";
            this.$refs.imageUpload.value = "";
            $('#createEditPortfolio').modal('show');
        },
        onImageChange(e) {
            this.image = e.target.files[0];
            this.imageSrc = URL.createObjectURL(this.image);
        },
        storePortfolio() {
            let formData = new FormData();
            formData.append('image', this.image);
            _.each(this.formData, (value,key) => {
                formData.append(key, value);
            });

            Portfolio.store(formData).then((res) => {
                this.$refs.Close.click();
                this.getPortfolioData();
                Toast.fire(
                    "success",
                    "Portfolio has been created successfully",
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
        updatePortfolio() {
            let formData = new FormData();
            formData.append('image', this.image);
            _.each(this.formData, (value,key) => {
                formData.append(key, value);
            });

            formData.append('_method', 'put');
            Portfolio.update(this.formData.id, formData).then((res) => {
                //console.log(res.data);
                this.$refs.Close.click();
                this.getPortfolioData();
                Toast.fire(
                    "success",
                    "Portfolio has been updated successfully",
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
        deletePortfolio(id) {
            if(confirm("are you sure you want to delete this record ?")) {
                Portfolio.delete(id).then((res) => {
                    this.getPortfolioData();
                    Toast.fire(
                        "success",
                        "Portfolio has been deleted Successfully",
                        "success"
                    );
                }).catch(error => {
                    console.log(error);
                });
            }
        }
        // cancelUpload() {
        //     //this.$refs.portfolioForm.reset();
        //     this.image = ""
        //     this.imageSrc = "";
        //     this.$refs.imageUpload.value = "";
        // }

    },
    mounted() {
        this.getPortfolioData();
        console.log('portfolio component mounted');
    }
}
</script>

<style scoped>

</style>
