
<template>
  <div>
    <header-component v-bind:profile="profile" v-bind:profileImageSrc="profileImageSrc"></header-component>
    <div class="container sections-wrapper">
      <div class="row">
        <div class="primary col-lg-8 col-12">
          <router-view></router-view>
        </div>
        <!--sidebar-->
        <div class="secondary col-lg-4 col-12">
          <sidebar-component :profile="profile" :cvSrc="cvSrc"></sidebar-component>
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
        fullPage: false,
        profile: {},
        profileImageSrc: '',
        cvSrc: '',
    }
  },
  methods: {
    getProfile() {
      let loader = this.$loading.show();
      axios.get('/api/profiles').then((res) => {
        this.profile = res.data;
        this.profileImageSrc = '/storage/uploads/'+this.profile.image.image_name;
        this.cvSrc = '/storage/uploads/'+this.profile.cv;
        loader.hide();
      }).catch(err => {
        console.log(err);
        loader.hide();
      });
    }
  },
  mounted() {
    this.getProfile();
    console.log('front layout mounted');
  }
}
</script>