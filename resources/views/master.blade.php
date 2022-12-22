
<!doctype html>
<html lang="en">

    <head>
        @include('layouts.head')
    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <i class="ri-loader-line spin-icon"></i>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="layout-wrapper">

            
         @include('layouts.header')
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                  

                    <!--- Sidemenu -->
                   @include('layouts.menu')
                    <!-- Sidebar -->
                </div>
            </div>
          
            <div class="main-content">

                <div class="page-content">
                  @yield('konten')
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Upcube.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

      
      

        <!-- JAVASCRIPT -->
        @include('layouts.script')

    </body>
</html>
