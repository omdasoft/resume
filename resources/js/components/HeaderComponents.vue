<template>
  <header class="header">
    <div class="container clearfix">
      <img
        class="profile-image img-fluid float-left rounded-circle"
        src="/images/profile.jpg"
        width="180"
        height="180"
        alt="profile image"
      />
      <div class="profile-content float-left">
        <h1 class="name">Emad Aldin Ali</h1>
        <h2 class="desc">Full Stack Developer</h2>
        <ul class="social list-inline">
          <li class="list-inline-item">
            <a href="#"><i class="fab fa-facebook"></i></a>
          </li>
          <li class="list-inline-item">
            <a href="https://www.linkedin.com/in/emad-aldin-ali-707204174/"
              ><i class="fab fa-linkedin-in"></i
            ></a>
          </li>
          <li class="list-inline-item">
            <a href="https://github.com/omdasoft"
              ><i class="fab fa-github-alt"></i
            ></a>
          </li>
        </ul>
      </div>
      <!--//profile-->
      <a
        class="btn btn-cta-primary float-right"
        href="#"
        data-toggle="modal"
        data-target="#contactForm"
        ><i class="fas fa-paper-plane"></i> Contact Me</a
      >

      <div
        class="modal fade"
        id="contactForm"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Contact Me</h4>
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
              <form @submit.prevent="sendMessage">
                <div class="md-form mb-3">
                  <label for="name">
                    <i class="fas fa-user prefix grey-text"></i> Your
                    name</label
                  >

                  <input type="text" v-model="form.name" id="name" maxlength="100" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                  <has-error :form="form" field="name"></has-error>

                </div>

                <div class="md-form mb-3">
                  <label for="email"
                    ><i class="fas fa-envelope prefix grey-text"></i> Your
                    email</label
                  >

                  <input
                    type="text"
                    v-model="form.email"
                    id="email"
                    class="form-control validate"
                
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  />
                    <has-error :form="form" field="email"></has-error>

                </div>

                <div class="md-form mb-3">
                  <label for="subject"
                    ><i class="fas fa-tag prefix grey-text"></i> Subject</label
                  >

                  <input
                    type="text"
                    v-model="form.subject"
                    id="subject"
                    maxlength="255"
                    class="form-control validate"
                    :class="{ 'is-invalid': form.errors.has('subject') }"
                  />
                  <has-error :form="form" field="subject"></has-error>

                </div>

                <div class="md-form">
                  <label for="message"
                    > <i class="far fa-edit"></i> Your message
                  </label>
                  <textarea
                    type="text"
                    v-model="form.message"
                    id="message"
                    class="md-textarea form-control"
                    :class="{ 'is-invalid': form.errors.has('message') }"
                    rows="4"
                  ></textarea>
                    <has-error :form="form" field="message"></has-error>

                </div>
                <div class="md-form">
                  <button class="btn btn-success" type="submit">
                    <i class="fas fa-paper-plane"></i> Send
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--//container-->
  </header>
  <!--//header-->
</template>

<script>
export default {
  data(){
    return{
      form: new Form({
        name: '',
        email: '',
        subject: '',
        message: ''
      }),
    }
  },
  methods: {
        sendMessage() {
           this.form.post('/send_message')
                    .then( (response) => {

                      Toast.fire(
                         'success',
                                'The Message has send seccessfully',
                                'success'
                      )

                        //reset the form
                            this.form.reset()
                           // $('#contactForm').modal('hide');
                            console.log('success')
                        
                    })
        }
      }

};
</script>