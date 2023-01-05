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
                  <!--p>
                    • Design client-side and server-side architecture <br />
                    • Integration of user-facing elements developed by front-end developers.
                    <br />
                    • Design and implement backend models and API endpoints
                    <br />
                    • Testing for bugs in code
                    <br />
                    • Collaborate with other engineers in a multidisciplinary team.
                  </p -->
                </div>
                <!--//item-->
                <!-- item -->
                <!--div class="item">
                  <h3 class="title">
                    Full stack developer (remotely)
                    <span class="place"
                      ><a href="#">Al Dana Computer Technology – UAE</a></span
                    >
                    <span class="year">(01/2021 - 03/2021)</span>
                  </h3>
                  <p>
                    • Add new features to existing ERP system according to
                    customer needs <br />
                    • Edit existing system functions according to customer needs
                    <br />
                    • Review and fix system errors <br />
                    • Design client-side and server-side architecture <br />
                    • Manage the databases (import-export-backup-create-edit)
                    <br />
                    • Extract various reports from system (PDF- excel – word )
                    <br />
                    • Manage hosting (add new domain – upload files – backup
                    files)
                  </p>
                </div -->
                <!--//item-->
                <!--div class="item">
                  <h3 class="title">
                    Full stack web develope
                    <span class="place"
                      ><a href="#"
                        >Ministry of the Cabinet – National Information Center,
                        Sudan
                      </a></span
                    >
                    <span class="year">(02/2017 – present )</span>
                  </h3>
                  <p>
                    • Design client-side and server-side architecture <br />
                    • Design user interactions on web pages.<br />
                    • Develop backend web applications <br />
                    • Creating servers and databases for functionality. <br />
                    • Ensuring cross-platform optimization for mobile phones.<br />
                    • Carry out quality assurance tests to discover errors and
                    optimize usability. <br />
                    • Design and develop APIs.<br />
                    • Web service integration with the other government units
                    <br />
                    • Cooperate diligently with other IT team members to plan,
                    design, and develop smart solutions.
                  </p>
                </div-->
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
          console.log(this.profile);
        }).catch(err => {
          console.log(err);
        });
      },
      getEmployments() {
        axios.get('/api/employments').then((res) => {
            this.employments = res.data;
            console.log(this.employments);
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


