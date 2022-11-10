<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-envelope"></i>My Contacts</div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Github</th>
                  <th>Linkedin</th>
                  <th>#</th>
                </thead>
                <tbody>
                  <tr>
                    <td>{{myContacts.address}}</td>
                    <td>{{myContacts.email}}</td>
                    <td>{{myContacts.phone}}</td>
                    <td>{{myContacts.github}}</td>
                    <td>{{myContacts.linkedin}}</td>
                    <td>
                      <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editContact" @click="editMyContacts(myContacts)"
                        ><i class="fa fa-edit"></i
                      ></a>
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
      id="editContact"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Contacts</h5>
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
               <form @submit.prevent="updateMyContacts" method="post">
                 <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" v-model="form.address" id="address" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" v-model="form.email" id="email" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" v-model="form.phone" id="phone" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="github">Github</label>
                    <input type="text" v-model="form.github" id="github" class="form-control">
                 </div>
                 <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" v-model="form.linkedin" id="linkedin" class="form-control">
                 </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-warning">Update</button>
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
export default {
  data() {
    return {
      myContacts: {},
      form: new Form({
        id:"",
        address:"",
        email:"",
        phone:"",
        github:"",
        linkedin:""
      }),
    };
  },
  methods: {
    getMyContacts() {
      axios.get("/api/dashboard/myContacts").then(response => {
        this.myContacts = response.data;
      });
    },
    editMyContacts(myContacts) {
      this.form.fill(myContacts);
    },
    updateMyContacts() {
      this.form.put("/api/dashboard/myContacts/"+this.form.id).then((response) => {
        this.$refs.Close.click();
        this.getMyContacts();
         Toast.fire(
                "success",
                "Contacts has updated seccessfully",
                "success"
              );

        //Fire.$emit('AfterUpdateMycontacts');
      });
    }
  },
  mounted() {
    this.getMyContacts();
    console.log("mounted");
  }
};
</script>
