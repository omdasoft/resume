<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link to="/dashboard" class="brand-link">
        <img src="/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">My Admin</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="/admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/profile" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/employment" class="nav-link">
                    <i class="nav-icon fa fa-bullseye"></i>
                    <p>
                        Employment
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/portfolio" class="nav-link">
                    <i class="nav-icon fa fa-cube"></i>
                    <p>
                        Portfolio
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/education" class="nav-link">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>
                        Education
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/skills" class="nav-link">
                    <i class="nav-icon fa fa-tags"></i>
                    <p>
                        Skills
                    </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/dashboard/message" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                    Messages
                </p>
                </router-link>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" @click.prevent="logout">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>Logout</p>
                </a>
                <form id="logout-form" method="POST" style="display: none;">
                  @csrf
                </form>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->}
    </aside>
</template>
<script>
    export default {
        // data: () => ({
        //      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        //      }),
        methods:{
            logout:function(){
               axios.post('logout').then(response => {
                  if (response.status === 302 || 401) {
                    window.location = '/login';
                  }
                  else {
                    console.log('can not logout something goes wrong');
                  }
                }).catch(err => {
                    console.log(err);
              });
            },
        },
    }
</script>
