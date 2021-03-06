<!DOCTYPE html>
<html>
<head>
  <title>Manager Page</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="HTML5,CSS3,JS,BOOTSTRAP 4.0">
  <meta name="author" content="Md Abdul Mannan Hridoy">

  <!-----Page Dashboard & Form Level Templetes CSS----->
  <link href="{{asset('/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/dashboard/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <!-----PROFILE SHOW CSS----->
  <link href="{{asset('/css/profile/style.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


</head>
<body id="page-top">

    @include('include.manager_sidebar')
    @include('include.manager_topbar')
    @include('sweetalert::alert')
    @yield('main')
    @include('include.scripts')
    @yield('scripts')

</body>
</html>



