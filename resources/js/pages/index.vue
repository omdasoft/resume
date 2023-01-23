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
                    <span class="year">({{employment.start_date|formatDate}}</span> - 
                    <span class="year" v-if="employment.until_now == 1">present)</span>
                    <span class="year" v-else>{{employment.end_date|formatDate}})</span>
                  </h3>
                  <ul class="details">
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
//import moment 
import moment from 'moment';
export default {
    data() {
      return {
        profile: {},
        employments: {}
      }
    },
    filters: {
      formatDate: function(value) {
        return moment(value).format('MM/YYYY');
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
  .summary, .details{
    line-height: 2em;
  }
</style>


