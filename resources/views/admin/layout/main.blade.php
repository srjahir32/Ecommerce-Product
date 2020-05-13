<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{url('admin/css/dropzone.css')}}" rel="stylesheet" />
    <link href="{{url('admin/css/cropper.css')}}" rel="stylesheet" />
    <link href="{{url('admin/css/selectize.css')}}"rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/sidebar.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/media.css')}}" />
</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        
        @include('admin.include.sidebar')
        <main class="page-content">
           
                @yield('content')
           
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>
    <script src="{{url('admin/js/dropzone.js')}}" /></script>
    <script src="{{url('admin/js/cropper.js')}}" /></script>
    <script src="{{url('admin/js/jqueryui.js')}}"></script>
    <script src="{{url('admin/js/selectize.js')}}"></script>
    <script src="{{url('admin/js/jqueryui.js')}}"></script>

    <script src="{{url('admin/assets/js/sidebar.js')}}" /></script>
    <script src="{{url('admin/assets/js/imgecroper.js')}}" /></script>
    <script>
    // $(".sidebar-dropdown > a").click(function () {
    //   $(".sidebar-submenu").slideUp(200);
    //   if (
    //     $(this)
    //     .parent()
    //     .hasClass("active")
    //   ) {
    //     $(".sidebar-dropdown").removeClass("active");
    //     $(this)
    //       .parent()
    //       .removeClass("active");
    //   } else {
    //     $(".sidebar-dropdown").removeClass("active");
    //     $(this)
    //       .next(".sidebar-submenu")
    //       .slideDown(200);
    //     $(this)
    //       .parent()
    //       .addClass("active");
    //   }
    // });

    $(".page-content").click(function () {
      $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function () {
      $(".page-wrapper").addClass("toggled");
    });
  </script>
    @yield('scripts')
    <script>
        
    </script>
</body>

</html>