@extends('layout.showroom')

@section('title', ucfirst(substr(Route::currentRouteName(),10)))

@section('content')
  @include('multiAuth.showroomstaff.inc.sidebar')
  <!-- modals -->
  @include('multiAuth.showroomstaff.inc.modals.carMakerModal')
  @include('multiAuth.showroomstaff.inc.modals.carModelModal')
  <div class="main-panel">
      @include('multiAuth.showroomstaff.inc.navbar')

      <div class="content">
        <div class="container border-0">
          <div class="ml-3 mr-3 p-3 mt-1 bg-white">
              <!-- Tab Options -->
              <ul class="nav nav-tabs mb-2">
                  <li class="nav-item"><a class="rounded-0 nav-link active" role="tab" data-toggle="tab" href="#tab-2">+ Car</a></li>
                  <li class="nav-item"><a class="rounded-0 nav-link" role="tab" data-toggle="tab" href="#tab-3">+ Part</a></li>
              </ul>

              <!-- Tab Contents -->
              <div class="tab-content">
                  <div class="tab-pane active" role="tabpanel" id="tab-2">
                      @include('multiAuth.showroomstaff.inc.carEntryForm')
                  </div>
                  <div class="tab-pane" role="tabpanel" id="tab-3">
                      @include('multiAuth.showroomstaff.inc.partEntryForm')
                  </div>
              </div>
          </div>
        </div>
      </div>
      <!-- footer -->
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
  <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
@stop

@section('script')
  @include('multiAuth.showroomstaff.js.showroomJS')
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Chartist Plugin  -->
  <script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
  <script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.1') }}" type="text/javascript"></script>
@stop
