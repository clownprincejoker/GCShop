<script>
  //button to upload prifle pic
  function proPic(){
    document.getElementById("pro").click();
  }

  //show profile edit form
  function showEditForm(){
    document.getElementById("infoForm").style.display = "none";
    document.getElementById("editForm").style.display = "block";
  }

  //show profile edit form
  function showInfoForm(){
    document.getElementById("editForm").style.display = "none";
    document.getElementById("infoForm").style.display = "block";
  }
</script>

<!--search Box handle-->
<script>
  $(document).ready(function(){
    $("#siteSearchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      if(value != 0){
        $("#searchlist #slist").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $('#search_box').css('display', 'block');
      }
      else {
        $('#search_box').css('display', 'none');
      }
    });

    $(document).click(function (e) {
      e.stopPropagation();
      //check if the clicked area is dropDown or not
      if ($('#search_box').has(e.target).length === 0) {
        $('#siteSearchInput').val('');
        $('#search_box').hide();
      }
    });
  });
</script>

<script>
  //car maker added Alart
  if("{{Session::has('maker_added')}}"){
    swal("New Maker Added!", "{{Session::get('maker_added')}}", "success");
  }

  //car model added Alart
  if("{{Session::has('model_added')}}"){
    swal("New Model Added!", "{{Session::get('model_added')}}", "success");
  }
</script>

<!--Script for uploading and changing profile pic-->
<script>
  function uploadImage(){
    document.getElementById("profile_pic").click();
  }

  $(function(){
    $('#profile_pic').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
       {
          var reader = new FileReader();

          reader.onload = function (e) {
             $('#pro_pic').attr('src', e.target.result);
          }
         reader.readAsDataURL(input.files[0]);
      }
      else
      {
        $('#pro_pic').attr('src', 'storage/images/male.png');
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    if (sessionStorage.scrollTop != "undefined") {
      $(window).scrollTop(sessionStorage.scrollTop);
    }
  });
</script>

<!--upload product image-->
<script>
  function uploadCarImage(){
    document.getElementById("car_image").click();
  }

  function uploadCarMakerLogo(){
    document.getElementById("car_maker_logo").click();
  }

  function uploadCarModelImage(){
    document.getElementById("car_modal_image").click();
  }

  function uploadPartImage(){
    document.getElementById("part_image").click();
  }
</script>

<!--Add details-->
<script>
  function deleteCarDetail(x){
    var det_cri = document.getElementById("car_detail_criteria_col"+x);
    var det = document.getElementById("car_detail_col"+x);
    det_cri.parentNode.removeChild(det_cri);
    det.parentNode.removeChild(det);
  }

  function deletePartDetail(x){
    var det_cri = document.getElementById("part_detail_criteria_col"+x);
    var det = document.getElementById("part_detail_col"+x);
    det_cri.parentNode.removeChild(det_cri);
    det.parentNode.removeChild(det);
  }
</script>
<script>
  $(document).ready(function() {
      var car_wrapper = $("#car_details");
      var add_car_button = $("#add_car_detail_fields");
      var part_wrapper = $("#part_details");
      var add_part_button = $("#add_part_detail_fields");
      var car = 0;
      var part = 0;

      $(add_car_button).click(function(e){
          var x = $('div.car_detail_criteria_col').length;
          e.preventDefault();
          car++;
          $(car_wrapper).append('<div id="car_detail_criteria_col'+car+'" class="col-12 col-md-6" style="padding:10px;"><label for="car_detail_criteria'+car+'" style="margin:0px;font-size:12px;">Car Detail Criteria</label><input id="car_detail_criteria'+car+'" name="car_detail_criteria'+car+'" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{ old("car_detail_criteria'+car+'") }}" placeholder="Detail Criteria"></div><!-- Details --><div id="car_detail_col'+car+'" class="col-12 col-md-6" style="padding:10px;"><label for="car_detail'+car+'" style="margin:0px;font-size:12px;">Car Detail</label><div class="input-group"><input id="car_detail'+car+'" name="car_detail'+car+'" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{ old("car_detail'+car+'") }}" placeholder="Detail"><div class="input-group-append"><button id="deleteCarDetailButton" class="btn btn-danger no-outline rounded-0 pt-1 pb-1" onclick="deleteCarDetail('+car+')">X</button></div></div></div>');   //add input box
      });

      $(add_part_button).click(function(e){
          e.preventDefault();
          part++;
          $(part_wrapper).append('<div id="part_detail_criteria_col'+part+'" class="col-12 col-md-6" style="padding:10px;"><label for="part_detail_criteria'+part+'" style="margin:0px;font-size:12px;">Part Detail Criteria</label><input id="part_detail_criteria'+part+'" name="part_detail_criteria'+part+'" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{ old("part_detail_criteria'+part+'") }}" placeholder="Detail Criteria"></div><!-- Details --><div id="part_detail_col'+part+'" class="col-12 col-md-6" style="padding:10px;"><label for="part_detail'+part+'" style="margin:0px;font-size:12px;">Part Detail</label><div class="input-group"><input id="part_detail'+part+'" name="part_detail'+part+'" style="border: 1px solid #a5a5a5;" class="form-control no-outline rounded-0" type="text" value="{{ old("part_detail'+part+'") }}" placeholder="Detail"><div class="input-group-append"><button id="deletePartDetailButton" class="btn btn-danger no-outline rounded-0 pt-1 pb-1" onclick="deletePartDetail('+part+')">X</button></div></div></div>');   //add input box
      });
  });
  </script>
