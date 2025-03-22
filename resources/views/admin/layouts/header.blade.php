
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
 


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Green Sport Club</title>

 
 
    <script src="{{ url('assets') }}/js/config.js"></script>
    <script src="{{ url('vendors') }}/simplebar/simplebar.min.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ url('vendors') }}/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="{{ url('assets') }}/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="{{ url('assets') }}/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="{{ url('assets') }}/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ url('assets') }}/css/user.min.css" rel="stylesheet" id="user-style-default">



    <link href="{{ url('vendors') }}/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="{{ url('vendors') }}/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="{{ url('vendors') }}/prism/prism-okaidia.css" rel="stylesheet">



    <script src="{{ url('vendors') }}/datatables.net-bs5/dataTables.bootstrap5.min.css"></script>

    
    
  


    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>