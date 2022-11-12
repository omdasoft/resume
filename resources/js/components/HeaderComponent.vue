<template>
  <header class="header">
    <div class="container clearfix">
      <div class="row">
        <div class="col-md-6">
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
                <a :href="linkedinUrl" target="new"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </li>
              <li class="list-inline-item">
                <a :href="githubUrl" target="new"
                  ><i class="fab fa-github-alt"></i
                ></a>
              </li>
            </ul>
          </div>
          <!--//profile-->
        </div>
        <div class="col-md-6">
          <!--a class="btn btn-cta-primary float-right"
          href="#"
          data-toggle="modal"
          data-target="#contactForm"
          ><i class="fas fa-paper-plane"></i> Contact Me
          </a -->
            <div class="topnav">
              <router-link :to="{name:'index'}" class="active"><i class="fa fa-home"></i></router-link>
              <router-link :to="{name:'posts'}">Posts</router-link>
              <router-link :to="{name:'portfolio'}">Portfolio</router-link>
              <router-link :to="{name:'contact'}">Message Me</router-link>
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
        githubUrl: '',
        linkedinUrl: '',
      };
    },
    methods: {
      getMyContacts(){
        axios.get('/api/myContacts').then((response) => {
          this.githubUrl = response.data.github;
          this.linkedinUrl = response.data.linkedin;
        });
      }
    },
    mounted(){
      this.getMyContacts();
      console.log('component mounted');
    }
  }
</script>