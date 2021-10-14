<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                            <form> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo">Select Photo</label>
                                            <input type="file" id="photo" name="photo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="designation">Designation</label>
                                            <input type="text" id="designation" name="designation" class="form-control" placeholder="eg.software developer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Current Location</label>
                                            <input type="text" id="location" name="location" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                         <div class="form-group">
                                            <label for="breif">Breif</label>
                                            <textarea id="breif" name="breif" class="form-control" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Save" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
