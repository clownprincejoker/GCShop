@extends('layout.showroom')

@section('title', 'Update Products')

@section('content')
  @include('multiAuth.showroomstaff.inc.sidebar')
  <div class="main-panel">
      @include('multiAuth.showroomstaff.inc.navbar')

      <div class="content">
        <div class="container border-0">
          <div class="ml-2 mr-2 p-3 mt-0 bg-white">
            <form class="product-option" id="car-entry" method="POST" action="{{ route('cars.update', ['id' => $car->id]) }}" enctype='multipart/form-data'>
                @csrf
                {{Form::hidden('_method', 'PUT')}}
                <div class="form-row">
                    <!-- Name -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                      <label for="car_name" style="margin:0px;font-size:12px;">Car Name</label>
                      <input id="car_name" name="car_name" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('car_name') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ $car->name }}" placeholder="Car Name" required>

                      @if ($errors->has('car_name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('car_name') }}</strong>
                          </span>
                      @endif
                    </div>

                    <!-- stock -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                      <label for="car_stock" style="margin:0px;font-size:12px;">Car Stock</label>
                      <div class="input-group">
                          <input id="car_stock" name="car_stock" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('car_stock') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ $car->getOurStock() }}" placeholder="Car Stock" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                          <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                            <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">Pieces</span>
                          </div>
                      </div>

                      @if ($errors->has('car_stock'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('car_stock') }}</strong>
                          </span>
                      @endif
                    </div>

                    <!-- buying Price -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="buying_price" style="margin:0px;font-size:12px;">Buying Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">$</span>
                            </div>
                            <input id="buying_price" name="buying_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('buying_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ $car->buying_price }}" placeholder="Buying Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">.00</span>
                            </div>
                        </div>

                        @if ($errors->has('buying_price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('buying_price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- selling Price -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="selling_price" style="margin:0px;font-size:12px;">Selling Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">$</span>
                            </div>
                            <input id="selling_price" name="selling_price" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('selling_price') ? ' is-invalid' : '' }} no-outline rounded-0" type="text" value="{{ $car->selling_price }}" placeholder="Selling Price" required onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">.00</span>
                            </div>
                        </div>

                        @if ($errors->has('selling_price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('selling_price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Discount -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="discount" style="margin:0px;font-size:12px;">Discount</label>
                        <div class="input-group">
                            <input id="discount" name="discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{ $car->current_discount*100 }}" placeholder="Discount">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">%</span>
                            </div>
                        </div>

                        @if ($errors->has('discount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('discount') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Max Discount -->
                    <div class="col-12 col-md-6" style="padding:10px;">
                        <label for="max_discount" style="margin:0px;font-size:12px;">Max Discount Possible</label>
                        <div class="input-group">
                            <input id="max_discount" name="max_discount" style="border: 1px solid #a5a5a5;" class="form-control{{ $errors->has('max_discount') ? ' is-invalid' : '' }} no-outline rounded-0" type="number" min="0" max="100" value="{{ $car->max_possible_discount*100 }}" placeholder="Max Discount Possible">
                            <div class="input-group-append" style="border: 1px solid #a5a5a5;">
                              <span class="input-group-text no-outline rounded-0" style="font-weight:bold;">%</span>
                            </div>
                        </div>

                        @if ($errors->has('max_discount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('max_discount') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Car Maker -->
                    <div class="col col-6" style="padding:10px;">
                        <div class="input-group">
                            <select id="car_maker_select" name="car_maker" style="border: 1px solid #a5a5a5;" class="update_select_maker form-control no-outline rounded-0" required>
                              @foreach(App\Models\Product\CarMaker::all() as $carmaker)
                                <option value="{{$carmaker->id}}">{{$carmaker->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Car Model -->
                    <div class="col col-6" style="padding:10px;">
                        <div class="input-group">
                            <select id="car_model_select" name="car_model" style="border: 1px solid #a5a5a5;" class="update_select_model form-control no-outline rounded-0" required>
                              @foreach(App\Models\Product\CarModel::all() as $carmodel)
                                <option value="{{$carmodel->id}}" class="carmaker{{$carmodel->getMaker()->id}}">{{$carmodel->name}}</option>
                              @endforeach
                            </select>
                        </div>

                        @if ($errors->has('car_model'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('car_model') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Add Details Button-->
                    <div class="col-12 col-md-3" style="padding:10px;">
                      <button id="add_car_detail_fields" class="btn btn-primary no-outline rounded-0 w-100" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Add Car Details</button>
                    </div>

                    <!-- Image -->
                    <div class="col-12 col-md-3" style="padding:10px;">
                      <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('car_image_main')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Main Image</button>
                      <input id="car_image_main" name="car_image_main" class="d-none" onchange="readURL(this, '#image_car_main')" type="file"/>
                      <img id="image_car_main" src="{{url($car->getImage())}}" style="width:100%;height:80px;object-fit:cover;" alt="">
                    </div>

                    <!-- Extra Image -->
                    <?php $ex_c = 1; ?>
                    @foreach($car->getExtraImage() as $extra)
                      <div class="col-12 col-md-2" style="padding:10px;">
                        <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('car_image_extra{{$ex_c}}')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Extra Image</button>
                        <input id="car_image_extra{{$ex_c}}" name="car_image_extra{{$ex_c}}" class="d-none" onchange="readURL(this, '#image_car_extra{{$ex_c}}')" type="file"/>
                        <img id="image_car_extra{{$ex_c}}" src="{{url($extra->getImage())}}" style="width:100%;height:80px;object-fit:cover;" alt="">
                      </div>
                      <?php $ex_c++; ?>
                    @endforeach

                    <!-- Extra Image -->
                    @for($i=count($car->getExtraImage())+1; $i<'4'; $i++)
                      <div class="col-12 col-md-2" style="padding:10px;">
                        <button type="button" class="btn btn-primary no-outline rounded-0 w-100" onclick="uploadImage('car_image_extra{{$i}}')" style="font-size:13px;"><span class="fa fa-plus mr-2"></span>Extra Image</button>
                        <input id="car_image_extra{{$i}}" name="car_image_extra{{$i}}" class="d-none" onchange="readURL(this, '#image_car_extra{{$i}}')" type="file"/>
                        <img id="image_car_extra{{$i}}" src="" style="width:100%;" alt="">
                      </div>
                    @endfor

                    <!-- Car Details-->
                    <div id="car_details" class="col-12 row mr-auto ml-auto m-0 p-0">
                      <?php $de = 1; ?>
                      @foreach($car->getDetails() as $detail)
                        <div id="car_detail_criteria_col{{$de}}" class="col-12 col-md-6" style="padding:10px;">
                          <label for="car_detail_criteria{{$de}}" style="margin:0px;font-size:12px;">Car Detail Criteria</label>
                          <input id="car_detail_criteria{{$de}}" name="car_detail_criteria{{$de}}" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{$detail->detail_criteria}}" placeholder="Detail Criteria">
                        </div>
                        <div id="car_detail_col{{$de}}" class="col-12 col-md-6" style="padding:10px;">
                          <label for="car_detail{{$de}}" style="margin:0px;font-size:12px;">Car Detail</label>
                          <div class="input-group">
                            <input id="car_detail{{$de}}" name="car_detail{{$de}}" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{$detail->detail}}" placeholder="Detail">
                            <div class="input-group-append">
                              <button id="deleteCarDetailButton" class="btn btn-danger no-outline rounded-0 pt-1 pb-1" onclick="deleteCarDetail({{$de}})">X</button>
                            </div>
                          </div>
                        </div>
                        <?php $de++; ?>
                      @endforeach
                    </div>

                    <!-- Submit -->
                    <div class="col-6 ml-auto mr-auto" style="padding:10px;">
                      <!-- Submit -->
                      <button class="no-outline rounded-0 btn btn-primary pt-1 pb-1 text-center" type="submit" style="margin-right:25%;margin-left:25%;width:50%;">
                          {{ __('Update Car Info') }}
                      </button>
                    </div>
                </div>
            </form>
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
  <script>
    $(document).ready(function () {
      $("#car_model_select").children("option[class=carmaker{{$car->getModel()->getMaker()->id}}]").show();
      $('.update_select_maker option[value={{$car->getModel()->getMaker()->id}}]').attr('selected','selected');
      $('.update_select_model option[value={{$car->getModel()->id}}]').attr('selected','selected');
    });
  </script>
  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
