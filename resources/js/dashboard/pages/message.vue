<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-envelope"></i> Inbox</div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Date</th>
                  <th>#</th>
                </thead>
                <tbody>
                  <tr v-for="msg in messages.data" :key="msg.id">
                    <td>{{ msg.name }}</td>
                    <td>{{ msg.email }}</td>
                    <td>{{ msg.subject }}</td>
                    <td>{{ msg.created_date }}</td>
                    <td>
                      <a
                        class="btn btn-success btn-sm"
                        href="#"
                        data-toggle="modal"
                        data-target="#viewMessageModal"
                        @click="viewMessage(msg)"
                        ><i class="fa fa-eye"></i
                      ></a>
                      &nbsp;
                      <a href="#" class="btn btn-danger btn-sm"
                        @click="deleteMessage(msg.id)"
                        ><i class="fa fa-trash"></i
                      ></a>
                    </td>
                  </tr>
                  <br />
                  <pagination
                    :data="messages"
                    @pagination-change-page="getMessages"
                  ></pagination>
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
      id="viewMessageModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Message</h5>
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
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">From : {{ view_message.name }}</div>
                  <div class="col-md-6">Email : {{ view_message.email }}</div>
                </div>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ view_message.subject }}</h5>

                <p class="card-text">
                  {{ view_message.message }}
                </p>
              </div>
              <div class="card-footer">
                <i class="fa fa-clock"></i> {{ view_message.created_date }}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
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
import Messages from '../apis/Message';
export default {
  data() {
    return {
      messages: {},
      msg: "",
      view_message: [],
      id: ''
    };
  },
  methods: {
    getMessages(page = 1) {
      Messages.get().then((response) => {
        this.messages = response.data;
      });
    },
    viewMessage(msg) {
      this.view_message = msg;
    },
    deleteMessage(id) {
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
             Messages.delete(id).then((response) => {
              this.getMessages()
              Toast.fire(
                "success",
                "The Message has deleted seccessfully",
                "success"
              );


            });
          }
        });
    },
  },
  mounted() {
    this.getMessages();
    console.log("Component mounted.");
  },
};
</script>
