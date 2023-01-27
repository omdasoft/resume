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
          <!--start latest project section-->
          <section class="latest section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Latest Projects</h2>
              <div class="content">
                <div class="item featured text-center">
                  <div class="featured-image has-ribbon">
                    <a :href="featuredPortfolio.url" target="new">
                      <img
                        class="img-fluid project-image rounded shadow-sm"
                        :src="getImageSrc(featuredPortfolio.image.image_name)"
                        alt="project name"
                      />
                    </a>
                    <div class="ribbon">
                      <div class="text">New</div>
                    </div>
                  </div>

                  <h3 class="title mb-3">
                    <a :href="featuredPortfolio.url" target="new">{{featuredPortfolio.title}}</a
                    >
                  </h3>

                  <div class="desc text-left">
                    <p>
                      {{featuredPortfolio.summary}}
                    </p>
                  </div>
                  <!--//desc-->
                  <a
                    class="btn btn-cta-secondary"
                    :href="featuredPortfolio.url"
                    target="new"
                    ><i class="fas fa-thumbs-up"></i>Go To Website</a
                  >
                </div>
                <!--//item-->
                <hr class="divider" />
                <div class="item row" v-for="portfolio in portfolios" :key="portfolio.id">
                  <a class="col-md-4 col-12" :href="portfolio.url" target="new">
                    <img
                      class="img-fluid project-image rounded shadow-sm"
                      :src="getImageSrc(portfolio.image.image_name)"
                      alt="project name"
                    />
                  </a>
                  <div class="desc col-md-8 col-12">
                    <h3 class="title">
                      <a :href="portfolio.url" target="new">{{portfolio.title}}</a>
                    </h3>
                    <p class="mb-2">
                      {{portfolio.summary}}
                    </p>
                    <p>
                      <a
                        class="more-link"
                        :href="portfolio.url"
                        target="new"
                      
                        ><i class="fas fa-external-link-alt"></i>Find out
                        more</a
                      >
                    </p>
                  </div>
                  <!--//desc-->
                </div>
                <!--//item-->      
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </section>
          <!--end latest project section-->
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
        portfolios: {},
        featuredPortfolio: {},
        uploadPath: '/storage/uploads/',
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
        axios.get('/api/frontend/profile').then((res) => {
          this.profile = res.data.data;
        }).catch(err => {
          console.log(err);
        });
      },
      getEmployments() {
        axios.get('/api/frontend/employment').then((res) => {
            this.employments = res.data.data;
        });
      },
      getLatestProjects() {
        axios.get('/api/frontend/latest_projects').then((res) => {
            this.portfolios = res.data.data;
        }).catch(err => {
          console.log(err);
        });
      },
      getFeaturedProject() {
        axios.get('/api/frontend/featured_project').then((res) => {
            this.featuredPortfolio = res.data.data;
        }).catch(err => {
          console.log(err);
        });
      },
      getImageSrc(imgName) {
        return this.uploadPath+imgName;
      }
    },
    mounted() {
      this.getProfile();
      this.getEmployments();
      this.getLatestProjects();
      this.getFeaturedProject();
      console.log('index page mounted');
    }
}
</script>
<style scoped>
  .summary, .details{
    line-height: 2em;
  }
</style>


