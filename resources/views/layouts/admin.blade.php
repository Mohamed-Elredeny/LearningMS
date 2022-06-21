<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield("title", "LMS")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield("styleChart")
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/admin/images/icon.png")}}">

    <link href="{{asset('assets/admin/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset("assets/admin/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset("assets/admin/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    @yield("style")
    <link href="{{asset("assets/admin/css/app-rtl.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/css/redo.css")}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/site/css/teacher.css')}}">


</head>

<body data-sidebar="dark">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="d-none d-sm-block ml-2">
                    <h4 class="page-title">@yield("pageTitle")</h4>
                </div>
            </div>
            <div class="d-flex">


            </div>
            <div class="d-flex">

                <div class="dropdown d-inline-block">

                    <div class="btn header-item waves-effect">
                        <!-- item-->
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger" ><i
                                    class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">
                @include('admin.sections.sections_ar')
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

        <div class="main-content" style="margin-right: 240px; margin-left: 0%">

            <div class="page-content">
                <div class="container-fluid">

                    @yield("content")

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer" style="left: 0; right: 240px;">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </footer>
        </div>


    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset("assets/admin/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/node-waves/waves.min.js")}}"></script>

@yield("script")
<script src="{{asset("assets/admin/js/app.js")}}"></script>
{{-- <script>
    Dropzone.options.fileDropzone = {
      url: 'http://127.0.0.1:8000/admin/groups/images/add/' + 'uuid',
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      addRemoveLinks: true,
      maxFilesize: 8,
      headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
    //   data: { "_token": "{{ csrf_token() }}", name: 'vvv'},
      removedfile: function(file)
      {
        var name = file.upload.uuid;
        $.ajax({
          type: 'POST',
          url: '{{route("groups.image.remove")}}',
          data: { "_token": "{{ csrf_token() }}", name: name},
          success: function (data){
              console.log(data);
          },
          error: function(e) {
              console.log(e);
          }});
          var fileRef;
          return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function (file, response, data) {
        console.log(file);
        console.log(response);
        console.log(data);
      },
    }
</script> --}}
</body>
</html>
