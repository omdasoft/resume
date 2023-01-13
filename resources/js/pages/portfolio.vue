<template>
      <section class="latest section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Latest Projects</h2>
              <div class="content">
                <div class="item featured text-center" v-for="feature in featuredPortfolios" :key="feature.id">
                  <div class="featured-image has-ribbon">
                    <a href="https://www.appex-sd.com/" target="_blank">
                      <img
                        class="img-fluid project-image rounded shadow-sm"
                        :src="getImageSrc(feature.image.image_name)"
                        alt="project name"
                      />
                    </a>
                    <div class="ribbon">
                      <div class="text">New</div>
                    </div>
                  </div>

                  <h3 class="title mb-3">
                    <a href="https://www.appex-sd.com/" target="_blank">{{feature.title}}</a
                    >
                  </h3>

                  <div class="desc text-left">
                    <p>
                      {{feature.summary}}
                    </p>
                  </div>
                  <!--//desc-->
                  <a
                    class="btn btn-cta-secondary"
                    :href="feature.url"
                    target="_blank"
                    ><i class="fas fa-thumbs-up"></i>Go To Website</a
                  >
                </div>
                <!--//item-->
                <hr class="divider" />
                <div class="item row" v-for="portfolio in portfolios" :key="portfolio.id">
                  <a class="col-md-4 col-12" href="#">
                    <img
                      class="img-fluid project-image rounded shadow-sm"
                      :src="getImageSrc(portfolio.image.image_name)"
                      alt="project name"
                    />
                  </a>
                  <div class="desc col-md-8 col-12">
                    <h3 class="title">
                      <a href="#"
                        >{{portfolio.title}}</a
                      >
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
</template>
<script>
export default {
    data() {
      return {
        portfolios: {},
        featuredPortfolios: {},
        uploadPath: '/storage/uploads/',
      }
    },
    methods: {
      getPortfolios() {
        axios.get('/api/portfolios').then((res) => {
          if(res.data) {
            this.portfolios = res.data.filter((portfolio) => portfolio.featured !== 1);
            this.featuredPortfolios = res.data.filter((portfolio) => portfolio.featured == 1);
          }
          
        }).catch(err => {
          console.log(err);
        });
      },
      getImageSrc(imgName) {
        return this.uploadPath+imgName;
      }
    },
    mounted() {
      this.getPortfolios();
      console.log('portfolio mounted');
    }
}
</script>
