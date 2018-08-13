@extends('layout.showroom')

@section('title', ucfirst(substr(Route::currentRouteName(),14)))

@section('content')
  @include('multiAuth.showroomstaff.inc.sidebar')
  <div class="main-panel">
      @include('multiAuth.showroomstaff.inc.navbar')
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8 bg-white p-3 border">
                    @include('multiAuth.showroomstaff.inc.profileInfoForm')
                    @include('multiAuth.showroomstaff.inc.profileEditForm')
                  </div>
                  <div class="col-md-4">
                      <div class="card card-user">
                          <div class="card-image">
                              <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                          </div>
                          <div class="card-body">
                              <div class="author">
                                <img class="avatar border-gray" onclick="proPic()" src="{{ url(Auth::user()->getProfilePic()) }}" alt=""  style="cursor:pointer;">
                                <h5 class="title">{{ Auth::user()->getFullName() }}</h5>
                              </div>
                          </div>
                          <hr>
                          <div class="button-container mr-auto ml-auto">
                              <button href="#" class="btn btn-simple btn-link btn-icon">
                                  <i class="fa fa-facebook-square"></i>
                              </button>
                              <button href="#" class="btn btn-simple btn-link btn-icon">
                                  <i class="fa fa-twitter"></i>
                              </button>
                              <button href="#" class="btn btn-simple btn-link btn-icon">
                                  <i class="fa fa-google-plus-square"></i>
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @include('multiAuth.showroomstaff.inc.footer')
  </div>
@endsection

@section('style')
  <!-- CSS Files -->
  <style>
    .no-outline {
      box-shadow:none !important;
      outline:none;
    }
  </style>
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
@stop

@section('script')
  @include('multiAuth.showroomstaff.js.showroomJS')
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Chartist Plugin  -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
  <script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
  <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/js/demo.js') }}"></script>
@stop
