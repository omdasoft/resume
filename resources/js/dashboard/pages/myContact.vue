<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-envelope"></i> Contacts</div>

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
                    <td>address</td>
                    <td>email</td>
                    <td>phone</td>
                    <td>github</td>
                    <td>linkedin</td>
                    <td>
                      <a href="#" class="btn btn-danger btn-sm"
                        ><i class="fa fa-trash"></i
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
  </div>
</template>

<script>
export default {
     mounted() {
            console.log('Component mounted.')
        }
};
</script>
