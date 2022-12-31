
<template>
  <div>
    <header-component></header-component>
    <div class="container sections-wrapper">
      <div class="row">
        <div class="primary col-lg-8 col-12">
          <router-view></router-view>
        </div>
        <!--sidebar-->
        <div class="secondary col-lg-4 col-12">
          <sidebar-component v-bind:profile="profile"></sidebar-component>
        </div>
        <!--//sidebar-->
      </div>
    </div>
    <footer-component></footer-component>
  </div>
  
</template>
<script>
 export default {
  data() {
    return {
        profile: {},
    }
  },
  methods: {
    getProfile() {
      axios.get('/api/profiles').then((res) => {
        this.profile = res.data;
        console.log(this.profile);
      }).catch(err => {
        console.log(err);
      });
    }
  },
  mounted() {
    this.getProfile();
    console.log('front layout mounted');
  }
}
</script>