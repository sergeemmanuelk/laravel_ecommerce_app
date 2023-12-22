<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.dashboard.partials.head')
</head>

<body>


<!--=============================
  DASHBOARD MENU START
==============================-->
<div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
        <img
            src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/dashboard_user.jpg') }}"
            alt="img" class="img-fluid"
        >
        <p>{{ Auth::user()->name }}</p>
    </div>
</div>
<!--=============================
  DASHBOARD MENU END
==============================-->


<!--=============================
  DASHBOARD START
==============================-->
@yield('content')
<!--=============================
  DASHBOARD START
==============================-->


<!--============================
    SCROLL BUTTON START
  ==============================-->
<div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
</div>
<!--============================
  SCROLL BUTTON  END
==============================-->

@include('frontend.dashboard.partials.scripts')

</body>

</html>
