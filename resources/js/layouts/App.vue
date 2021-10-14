
<template>
  <div>
    <!--nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <router-link :to="{ name: 'home' }" class="navbar-brand"
        >Laravel-Vue SPA</router-link
      >
      <button
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'home' }"
            >
              Home
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'about' }"
            >
              About
            </router-link>
          </li>
        </ul>
      </div>
    </nav -->
    <header-component></header-component>
    <div class="container sections-wrapper">
      <div class="row">
        <div class="primary col-lg-8 col-12">
          <section class="about section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">About Me</h2>
              <div class="content">
                <p>
                  Experienced Full Stack Developer adept in all stages of
                  advanced web development. Knowledgeable in user interface,
                  testing, and debugging processes. Bringing forth expertise in
                  design, installation, testing and maintenance of web systems.
                  Equipped with a diverse and promising skill set. Proficient in
                  an assortment of technologies, including Java
                  EE,PHP,Laravel,Vue JS,Appache,Mysql . Able to effectively
                  self-manage during independent projects, as well as
                  collaborate in a team setting.
                </p>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </section>
          <!--//section-->

          <section class="latest section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Latest Projects</h2>
              <div class="content">
                <div class="item featured text-center">
                  <div class="featured-image has-ribbon">
                    <a href="https://www.appex-sd.com/" target="_blank">
                      <img
                        class="img-fluid project-image rounded shadow-sm"
                        src="/images/projects/appex.png"
                        alt="project name"
                      />
                    </a>
                    <div class="ribbon">
                      <div class="text">New</div>
                    </div>
                  </div>

                  <h3 class="title mb-3">
                    <a href="https://www.appex-sd.com/" target="_blank"
                      >Sudan's first exhibition for mobile applications and
                      electronic services (APPEX)</a
                    >
                  </h3>

                  <div class="desc text-left">
                    <p>
                      its interactive and responsive website that enable
                      exhibitors and sponsors to subscribe in the exhibition
                      directly from the website beside providing the visitors
                      with all information about the exhibition and its related
                      activities
                    </p>
                  </div>
                  <!--//desc-->
                  <a
                    class="btn btn-cta-secondary"
                    href="https://www.appex-sd.com/"
                    target="_blank"
                    ><i class="fas fa-thumbs-up"></i>Go To Website</a
                  >
                </div>
                <!--//item-->
                <hr class="divider" />
                <div class="item row">
                  <a class="col-md-4 col-12" href="#">
                    <img
                      class="img-fluid project-image rounded shadow-sm"
                      src="/images/projects/3ms.png"
                      alt="project name"
                    />
                  </a>
                  <div class="desc col-md-8 col-12">
                    <h3 class="title">
                      <a href="#"
                        >3MS Market A leading website for classified ads</a
                      >
                    </h3>
                    <p class="mb-2">
                      3MS Market is a classified ads website that enables the
                      advertisers to post an ads in the website , it contains
                      advertiser dashboard which enable them to manage their ads
                      , and admin dashboard to manage the whole website
                      operations (eg. advertisers - ads - activate ads - news ..
                      and so on ) , the website contains registration and forget
                      password systems as well as notification systems that send
                      new posted ads notifications to system admin , the website
                      view contains advanced features to search and filter ads
                      in the website like ajax and autocomplete search ,
                      moreover the website design is responsive .
                    </p>
                    <p>
                      <a
                        class="more-link"
                        href="#"
                      
                        ><i class="fas fa-external-link-alt"></i>Find out
                        more</a
                      >
                    </p>
                  </div>
                  <!--//desc-->
                </div>
                <!--//item-->

                <div class="item row">
                  <a
                    class="col-md-4 col-12"
                    href="#"
                    
                  >
                    <img
                      class="img-fluid project-image rounded shadow-sm"
                      src="/images/projects/sloc.png"
                      alt="project name"
                    />
                  </a>
                  <div class="desc col-md-8 col-12">
                    <h3 class="title">
                      <a
                        href="#"
                        target="_blank"
                        >sudanese license for computer operating website</a
                      >
                    </h3>
                    <p class="mb-2">
                     sudanese license for computer operating website is dynamic and responsive website with admin dashboard to manage the website , it contains all sudanese license for computer operating services (eg. news - training centers - exam centers .. etc)
                    </p>
                    <p>
                      <a
                        class="more-link"
                        href="#"
                      
                        ><i class="fas fa-external-link-alt"></i>Find out
                        more</a
                      >
                    </p>
                  </div>
                  <!--//desc-->
                </div>
                <!--//item-->

                
                <div class="item row">
                  <a
                    class="col-md-4 col-12"
                    href="#"
                    
                  >
                    <img
                      class="img-fluid project-image rounded shadow-sm"
                      src="/images/projects/scms.png"
                      alt="project name"
                    />
                  </a>
                  <div class="desc col-md-8 col-12">
                    <h3 class="title">
                      <a
                        href="#"
                        target="_blank"
                        >sudanese license for computer operating centers management system (SCMS)</a
                      >
                    </h3>
                    <p class="mb-2">
                    SCMS(slco system management system) is a system used to manage Sudanese license for computer operating centers , such as adding the centers data , accrediting and re-accrediting centers, extracting detailed reports, as well as adding exam sessions
                    </p>
                    <p>
                      <a
                        class="more-link"
                        href="#"
                      
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
         
          <section class="experience section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Work Experience</h2>
              <div class="content">
                <div class="item">
                  <h3 class="title">
                    Full stack web developer (remotely)
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
                </div>
                <!--//item-->
                <div class="item">
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
                </div>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </section>
        
        </div>
        <!--//primary-->
        <div class="secondary col-lg-4 col-12">
          <aside class="info aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading sr-only">Basic Information</h2>
              <div class="content">
                <ul class="list-unstyled">
                  <li>
                    <i class="fas fa-map-marker-alt"></i
                    ><span class="sr-only">Location:</span>Sudan, Khartoum
                  </li>
                  <li>
                    <i class="fas fa-envelope"></i
                    ><span class="sr-only">Email:</span
                    ><a href="#">omdasoft@hotmail.com</a>
                  </li>
                  <li>
                    <i class="fas fa-link"></i
                    ><span class="sr-only">Website:</span
                    ><a href="#">https://www.omdadev.com</a>
                  </li>

                  <li>
                    <i class="fas fa-external-link-alt"></i>
                    <span class="sr-only">GitHub:</span>
                    <a href="https://github.com/omdasoft">https://github.com/omdasoft</a>
                  </li>

                  
                </ul>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </aside>
          <!--//aside-->

          <aside class="skills aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Skills</h2>
              <div class="content">
                <div class="skillset">
                  <div class="item">
                    <h3 class="level-title">
                      php &amp; laravel<span
                        class="level-label"
                        data-toggle="tooltip"
                        data-placement="left"
                        data-animation="true"
                        title="You can use the tooltip to explain more about your skill level..."
                        ></span
                      >
                    </h3>
                    <div class="level-bar">
                      <div class="level-bar-inner" data-level="90%"></div>
                    </div>
                    <!--//level-bar-->
                  </div>
                  <!--//item-->

                  <div class="item">
                    <h3 class="level-title">
                      Javascript &amp; jQuery<span
                        class="level-label"
                        data-toggle="tooltip"
                        data-placement="left"
                        data-animation="true"
                        title="You can use the tooltip to explain more about your skill level..."
                        ></span>
                    </h3>
                    <div class="level-bar">
                      <div class="level-bar-inner" data-level="65%"></div>
                    </div>
                    <!--//level-bar-->
                  </div>
                  <!--//item-->

                  <div class="item">
                    <h3 class="level-title">
                      HTML5, CSS3, Bootstrap<span
                        class="level-label"
                        data-toggle="tooltip"
                        data-placement="left"
                        data-animation="true"
                        title="You can use the tooltip to explain more about your skill level..."
                        ></span
                      >
                    </h3>
                    <div class="level-bar">
                      <div class="level-bar-inner" data-level="90%"></div>
                    </div>
                    <!--//level-bar-->
                  </div>
                  <!--//item-->

                  <div class="item">
                    <h3 class="level-title">
                      Java EE & spring<span
                        class="level-label"
                        data-toggle="tooltip"
                        data-placement="left"
                        data-animation="true"
                        title="You can use the tooltip to explain more about your skill level..."
                        ></span
                      >
                    </h3>
                    <div class="level-bar">
                      <div class="level-bar-inner" data-level="60%"></div>
                    </div>
                    <!--//level-bar-->
                  </div>
                  <!--//item-->
                  <p><a class="more-link" href="/docs/cv.pdf" download><i class="far fa-file-pdf fa-2x"></i> More on Cv</a></p> 

                </div>
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </aside>
          <!--//section-->
          <aside class="education aside section">
            <div class="section-inner shadow-sm rounded">
              <h2 class="heading">Education</h2>
              <div class="content">
                <div class="item">
                  <h3 class="title">
                    <i class="fas fa-graduation-cap"></i> BSc Information systems
                  </h3>
                  <h4 class="university">
                    Omdurman Islamic University
                    <span class="year">(2014-2016)</span>
                  </h4>
                </div>
               
              </div>
              <!--//content-->
            </div>
            <!--//section-inner-->
          </aside>
          <!--//section-->

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
          <!--//section-->

          </div>
        <!--//secondary-->
      </div>
      <!--//row-->
    </div>
    <!--//masonry-->

    <!-- ******FOOTER****** -->
    <footer class="footer">
      <div class="container text-center">
        <small class="copyright">
          All Rights Are Reserved &copy 2021
        </small>
      </div>
      <!--//container-->
    </footer>
    <!--//footer-->

    <!--div class="container">
      <router-view></router-view>
    </div-->
  </div>
  
</template>

<script>
export default {
  computed: {},
};
</script>