<template>
    <div>
        <aside class="info aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading sr-only">Basic Information</h2>
              <div class="content">
                <ul class="list-unstyled">
                  <li>
                    <i class="fas fa-map-marker-alt"></i
                    ><span class="sr-only">Location:</span>{{profile.address}}
                  </li>
                  <li>
                    <i class="fas fa-envelope"></i
                    ><span class="sr-only">Email:</span
                    ><a>{{profile.email}}</a>
                  </li>
                  <li>
                    <i class="fas fa-phone"></i
                    ><span class="sr-only">Phone:</span
                    ><a>{{profile.phone}}</a>
                  </li>
                  <li>
                    <i class="fas fa-external-link-alt"></i>
                    <span class="sr-only">GitHub:</span>
                    <a :href="profile.github_url" target="new">{{profile.github_url}}</a>
                  </li>
                </ul>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
        </aside>
        
        <aside class="skills aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Skills</h2>
              <div class="content">
                <div class="skillset">
                  <!-- item -->
                  <div class="item" v-for="skill in skills" :key="skill.id">
                    <h3 class="level-title">
                      {{skill.title}} <span
                        class="level-label"
                        data-toggle="tooltip"
                        data-placement="left"
                        data-animation="true"
                        title="You can use the tooltip to explain more about your skill level..."
                        ></span
                      >
                    </h3>
                    <div class="level-bar">
                      <div class="level-bar-inner" :data-level="skill.percentage" :style="{width: skill.percentage+'%'}"></div>
                    </div>
                  </div>
                  <!-- // item -->
                  <p><a class="more-link" :href="cvSrc" download><i class="far fa-file-pdf fa-2x"></i> More on Cv</a></p> 

                </div>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
        </aside>

        <aside class="education aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Education</h2>
              <div class="content">
                <div class="item" v-for="education in educations" :key="education.id">
                  <h3 class="title">
                    <i class="fas fa-graduation-cap"></i> {{education.degree}} of {{education.specialty}}
                  </h3>
                  <h4 class="university">
                    {{education.university}}
                    <span class="year">({{education.from|getYear}} - {{education.to|getYear}})</span>
                  </h4>
                </div>
               
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
        </aside>

        <aside class="languages aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Languages</h2>
              <div class="content">
                <ul class="list-unstyled">
                  <li class="item">
                    <span class="title"><strong>Arabic:</strong></span>
                    <span class="level"
                      >Native Speaker <br class="visible-xs" /><i
                        class="fas fa-star"
                      ></i>
                      <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                    </span>
                  </li>
                  <!--//item-->
                  <li class="item">
                    <span class="title"><strong>English:</strong></span>
                    <span class="level"
                      >Professional Proficiency
                      <br class="visible-sm visible-xs" /><i
                        class="fas fa-star"
                      ></i>
                      <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                      <i class="fas fa-star-half"></i
                    ></span>
                  </li>
                  <!--//item-->
                </ul>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
        </aside>
         
        <aside class="list conferences aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Conferences</h2>
              <div class="content">
                <ul class="list-unstyled">
                  <li>
                    <i class="far fa-calendar-alt"></i>
                    <a href="https://10times.com/international-conference-on-cyber-law-cyber-crime" target="_blank">International Conference on Cyberlaw, Cybercrime and Cybersecurity</a> (New Delhi)
                  </li>
                
                </ul>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
        </aside>
    </div>
</template>
<script>
import moment from 'moment'
 Vue.filter('getYear', function(date) {
        if (date) {
            return moment(String(date)).year();
        }
  });
  export default {
    props: ['profile','cvSrc'],
    data() {
      return {
        skills: {},
        educations: {}
      }
    },
    methods:{
      getSkills() {
        axios.get('/api/skills').then((res) => {
          this.skills = res.data;
          console.log(this.skills);
        }).catch(err => {
          console.log(err);
        });
      },
      getEducation() {
        axios.get('/api/educations').then((res) => {
          this.educations = res.data;
          console.log(this.educations);
        }).catch(err => {
          console.log(err);
        });
      }
    },
    mounted() {
      this.getSkills();
      this.getEducation();
      console.log('sidebare mounted');
    }
  }
</script>

