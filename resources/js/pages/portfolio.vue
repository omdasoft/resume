<template>
      <section class="latest section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">All Projects</h2>
              <div class="content">
                <div class="item featured text-center" v-for="feature in featuredPortfolios" :key="feature.id">
                  <div class="featured-image has-ribbon">
                    <a :href="feature.url" target="new">
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
                    <a :href="feature.url" target="new">{{feature.title}}</a
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
</template>
<script>
export default {
    data() {
      return {
        fullPage: false,
        portfolios: {},
        featuredPortfolios: {},
        uploadPath: '/storage/uploads/',
      }
    },
    methods: {
      getPortfolios() {
        let loader = this.$loading.show();
        axios.get('/api/frontend/portfolios').then((res) => {
          if(res.data.data) {
            this.portfolios = res.data.data.filter((portfolio) => parseInt(portfolio.featured) !== 1);
            this.featuredPortfolios = res.data.data.filter((portfolio) => parseInt(portfolio.featured) == 1);
            loader.hide();
          }
          
        }).catch(err => {
          console.log(err);
          loader.hide();
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
