<template>
  <header class="header">
    <div class="container clearfix">
      <div class="row">
        <div class="col-md-6">
          <img
            class="profile-image img-fluid float-left rounded-circle"
            :src="profileImageSrc"
            width="180"
            height="180"
            alt="profile image"
          />
          <div class="profile-content float-left">
            <h1 class="name">{{profile.name}}</h1>
            <h2 class="desc">{{profile.title}}</h2>
            <ul class="social list-inline">
              <li class="list-inline-item">
                <a :href="profile.linkedin_url" target="new"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </li>
              <li class="list-inline-item">
                <a :href="profile.github_url" target="new"
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
    props: ['profile','profileImageSrc']
  }
</script>