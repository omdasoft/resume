<template>
    <div>
         <section class="about section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">About</h2>
              <div class="content">
                <p class="summary">
                  {{profile.summary}}
                </p>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </section>
          <!--//section-->

          <section class="experience section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Work Experience</h2>
              <div class="content">
                 <!-- item -->
                <div class="item" v-for="employment in employments" :key="employment.id">
                  <h3 class="title">
                    {{employment.designation}}
                    <span class="place"
                      ><a href="#">{{employment.company}} – {{employment.country}}</a></span
                    >
                    <span class="year">({{employment.start_date}} - {{employment.until_now===1?'present':employment.end_date}})</span>
                  </h3>
                  <ul>
                    <li v-for="details in employment.employment_details" :key="details.id">{{details.desc}}</li>
                  </ul>
                </div>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </section>
    </div>
</template>
<script>
export default {
    data() {
      return {
        profile: {},
        employments: {}
      }
    },
    methods: {
      getProfile() {
        axios.get('/api/profiles').then((res) => {
          this.profile = res.data;
        }).catch(err => {
          console.log(err);
        });
      },
      getEmployments() {
        axios.get('/api/employments').then((res) => {
            this.employments = res.data;
        });
      },
    },
    mounted() {
      this.getProfile();
      this.getEmployments();
      console.log('index page mounted');
    }
}
</script>
<style scoped>
  .summary{
    line-height: 2em;
  }
</style>


