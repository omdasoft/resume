<template>
    <div>
        <!-- Navbar -->
        <dashboard-navbar></dashboard-navbar>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
       <dashboard-sidebar></dashboard-sidebar>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <!--h1 class="m-0 text-dark">@yield('page_title')</h1-->
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                
                    <router-view></router-view>

                    <!--vue-progress-bar></vue-progress-bar-->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
       <dashboard-footer></dashboard-footer>
    </div>
</template>

