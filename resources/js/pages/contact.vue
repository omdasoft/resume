<template>
      <section class="latest section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Contact Us</h2>
              <div class="content">
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
                    <div class="md-form mt-3">
                        <button class="btn btn-success" type="submit">
                        <i class="fas fa-paper-plane"></i> Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
<script>
export default {
     data() {
    return {
      form: new Form({
        name: "",
        email: "",
        subject: "",
        message: ""
      })
    };
  },
  methods: {
    sendMessage() {
      this.form.post("/send_message").then(response => {
        Toast.fire("success", "The Message has send seccessfully", "success");
        
        //reset the form
        this.form.reset();
        // $('#contactForm').modal('hide');
        console.log("success");
      });
    }
  }
}
</script>

