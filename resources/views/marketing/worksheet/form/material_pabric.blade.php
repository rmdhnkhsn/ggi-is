@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content" >
  <div class="container-fluid">
    @include('marketing.worksheet.partials.stepbar')
    <div class="row mt-4">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12">
              <div class="ws-judul">Fabric Material List</div>
              <table class="table tbl-content mt-3 mb-4">
                <thead>
                  <tr class="bg-thead">
                    <th>ACTION</th>
                    <th>LINE</th>
                    <th>DESC 1</th>
                    <th>DESC 2</th>
                    <th>COLOR WAY</th>
                    <th>CUTTING WAY</th>
                    <th>PART</th>
                    <th>CSP</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($master_data->material_fabric as $key => $value)
                  <tr>
                    <td>
                      <div class="container-tbl-btn flex gap-2">
                        <button data-toggle="modal" data-target="#edit_detail-{{$value->id }}" class="btn-icon-yellow"><i class="fs-18 fas fa-pencil-alt"></i></button>
                        <button data-toggle="modal" data-target="#details_inac-{{$value->id }}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></button>
                        <a href="{{route('worksheet.mf_delete', $value->id)}}" class="btn-icon-red"><i class="fs-18 fas fa-trash"></i></a>
                        @include('marketing.worksheet.partials.modal-detail')
                      </div>
                    </td>
                    <td>{{$value->line_cpnb}}</td>
                    <td>{{$value->material1}}</td>
                    <td>{{$value->material2}}</td>
                    <td>{{$value->colorway}}</td>
                    <td>{{$value->cutting_way}}</td>
                    <td>{{$value->port}}</td>
                    <td>{{$value->consumption}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @php
              $file1="";
              $file2="";
              $file3="";
              $file4="";
              $file5="";
              $file6="";
              $attention_cutting="";
              $isian_fabric_image="";
              $isian_fabric_image2="";
              $isian_fabric_image3="";
              $isian_fabric_image4="";
              $isian_fabric_image5="";
              $isian_fabric_image6="";
              if ($master_data->attention_cutting != null) {
                  $master_data->attention_cutting->fabric_image==null?:$file1=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image);
                  $master_data->attention_cutting->fabric_image2==null?:$file2=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image2);
                  $master_data->attention_cutting->fabric_image3==null?:$file3=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image3);
                  $master_data->attention_cutting->fabric_image4==null?:$file4=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image4);
                  $master_data->attention_cutting->fabric_image5==null?:$file5=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image5);
                  $master_data->attention_cutting->fabric_image6==null?:$file6=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image6);
                  $master_data->attention_cutting->attention_sewing==null?:$attention_cutting=$master_data->attention_cutting->attention_sewing;
              }elseif($master_data->attention_cutting == null && $master_data->worksheet_copy != null){
                $rekap_order_tujuan = collect($rekap_order)->where('id',$master_data->worksheet_copy->rekap_order_tujuan)->first();

                $rekap_order_tujuan->attention_cutting->attention_sewing==null?:$attention_cutting=$rekap_order_tujuan->attention_cutting->attention_sewing;
                $rekap_order_tujuan->attention_cutting->fabric_image==null?:$file1=asset('/marketing/worksheet/material_fabric/'.$rekap_order_tujuan->attention_cutting->fabric_image);
                $rekap_order_tujuan->attention_cutting->fabric_image2==null?:$file2=asset('/marketing/worksheet/material_fabric/'.$rekap_order_tujuan->attention_cutting->fabric_image2);
                $rekap_order_tujuan->attention_cutting->fabric_image3==null?:$file3=asset('/marketing/worksheet/material_fabric/'.$rekap_order_tujuan->attention_cutting->fabric_image3);
                $rekap_order_tujuan->attention_cutting->fabric_image4==null?:$file4=asset('/marketing/worksheet/material_fabric/'.$rekap_order_tujuan->attention_cutting->fabric_image4);
                $rekap_order_tujuan->attention_cutting->fabric_image5==null?:$file5=asset('/marketing/worksheet/material_fabric/'.$rekap_order_tujuan->attention_cutting->fabric_image5);
                $rekap_order_tujuan->attention_cutting->fabric_image6==null?:$file6=asset('/marketing/worksheet/material_fabric/'.$rekap_order_tujuan->attention_cutting->fabric_image6);
                $isian_fabric_image= $rekap_order_tujuan->attention_cutting->fabric_image;
                $isian_fabric_image2= $rekap_order_tujuan->attention_cutting->fabric_image2;
                $isian_fabric_image3= $rekap_order_tujuan->attention_cutting->fabric_image3;
                $isian_fabric_image4= $rekap_order_tujuan->attention_cutting->fabric_image4;
                $isian_fabric_image5= $rekap_order_tujuan->attention_cutting->fabric_image5;
                $isian_fabric_image6= $rekap_order_tujuan->attention_cutting->fabric_image6;
              }
          @endphp
          <form action="{{ route('material_fabric.update_images')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="master_id" id="master_id" value="{{$master_data->id}}">
          <div class="row">
            <div class="col-12">
              <div class="title-14 text-left">Attention or Guide Cutting</div>
              <div class="messageGrey mt-2 mb-4">
                <textarea id="konten" name="attention_sewing" maxlength="500" placeholder="Uraian Singkat...">{{$attention_cutting}}</textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="title-14 text-left">Cutting Image</div>
            </div>
            @if($master_data->worksheet_copy != null)
              <input type="hidden" name="fabric_image" id="fabric_image" value="{{$isian_fabric_image}}">
              <input type="hidden" name="fabric_image2" id="fabric_image2" value="{{$isian_fabric_image2}}">
              <input type="hidden" name="fabric_image3" id="fabric_image3" value="{{$isian_fabric_image3}}">
              <input type="hidden" name="fabric_image4" id="fabric_image4" value="{{$isian_fabric_image4}}">
              <input type="hidden" name="fabric_image5" id="fabric_image5" value="{{$isian_fabric_image5}}">
              <input type="hidden" name="fabric_image6" id="fabric_image6" value="{{$isian_fabric_image6}}">
            @endif
            <!-- Image 1  -->
            <div class="col-md-2">
              <div class="file-upload-ws">
                <div class="image-upload-wrap-folding1">
                  <i class="icon-upload-folding1 fas fa-upload"></i>
                  <button class="file-upload-btn-folding1" type="button" id="file1" onclick="$('.file-upload-input-folding1').trigger('click')">Select Image</button>
                  <input class="file-upload-input-folding1" type='file' id="file1" name="fabric_image" onchange="readURL_folding1(this);" accept="image/*" />
                  <div class="drag-text-folding1">
                    <h5>Or Drop Images Here</h5>
                  </div>
                </div>
                <div class="file-upload-content-folding1">
                  <img class="file-upload-image-folding1" src="{{$file1}}" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_folding1()" class="remove-image-ws2"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- image 2  -->
            <div class="col-md-2">
              <div class="file-upload-ws">
                <div class="image-upload-wrap-folding2">
                  <button class="file-upload-btn-folding2" type="button" id="file2" name="file2" onclick="$('.file-upload-input-folding2').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input-folding2" type='file' id="file2" name="fabric_image2" value="" onchange="readURL_folding2(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding2">
                  <img class="file-upload-image-folding2" src="{{$file2}}" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_folding2()" class="remove-image-ws2"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- image 3  -->
            <div class="col-md-2">
              <div class="file-upload-ws">
                <div class="image-upload-wrap-folding3">
                  <button class="file-upload-btn-folding3" type="button" id="file3" name="file3" onclick="$('.file-upload-input-folding3').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input-folding3" type='file' id="file3" name="fabric_image3" value="" onchange="readURL_folding3(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding3">
                  <img class="file-upload-image-folding3" src="{{$file3}}" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_folding3()" class="remove-image-ws2"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- image 4  -->
            <div class="col-md-2">
              <div class="file-upload-ws">
                <div class="image-upload-wrap-folding4">
                  <button class="file-upload-btn-folding4" type="button" id="file4" name="file4" onclick="$('.file-upload-input-folding4').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input-folding4" type='file' id="file4" name="fabric_image4" value="" onchange="readURL_folding4(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding4">
                  <img class="file-upload-image-folding4" src="{{$file4}}" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_folding4()" class="remove-image-ws2"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- image 5  -->
            <div class="col-md-2">
              <div class="file-upload-ws">
                <div class="image-upload-wrap-folding5">
                  <button class="file-upload-btn-folding5" type="button" id="file5" name="file5" onclick="$('.file-upload-input-folding5').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input-folding5" type='file' id="file5" name="fabric_image5" value="" onchange="readURL_folding5(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding5">
                  <img class="file-upload-image-folding5" src="{{$file5}}" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_folding5()" class="remove-image-ws2"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- image 6  -->
            <div class="col-md-2">
              <div class="file-upload-ws">
                <div class="image-upload-wrap-folding6">
                  <button class="file-upload-btn-folding6" type="button" id="file6" name="file6" onclick="$('.file-upload-input-folding6').trigger( 'click' )"><i class="fas fa-plus"></i></button>
                  <input class="file-upload-input-folding6" type='file' id="file6" name="fabric_image6" value="" onchange="readURL_folding6(this);" accept="image/*" />
                </div>
                <div class="file-upload-content-folding6">
                  <img class="file-upload-image-folding6" src="{{$file6}}" alt=" Image Format Only" data-toggle="lightbox" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload_folding6()" class="remove-image-ws2"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 justify-end gap-4 mt-4">
              <a href="{{route('worksheet.breakdown',$master_data->id)}}" class="btn-outline-grey-md w-130">Back</a>
              <button type="submit" class="btn-blue-md">Next & Save</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('assets/ckeditor_basic/ckeditor.js')}}"></script>

<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
</script>

<script>
  function readURL_folding1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('.image-upload-wrap-folding1').hide();

        reader.onload = function (e) {
            $(".file-upload-image-folding1").attr("src", e.target.result);
            $(".file-upload-content-folding1").show();
            $('.image-title').html(input.files[0]);
        };
        reader.readAsDataURL(input.files[0]);
        $("#frmFolding").submit();

    } else {
        removeUpload_folding1();
    }
  }

  function removeUpload_folding1() {
    $('.file-upload-input-folding1').replaceWith($('.file-upload-input-folding1').clone());
    $('.file-upload-content-folding1').hide();
    $('.image-upload-wrap-folding1').show();
  }
  $('.image-upload-wrap-folding1').bind('dragover', function () {
      $('.image-upload-wrap-folding1').addClass('image-dropping');
  });
  $('.image-upload-wrap-folding1').bind('dragleave', function () {
      $('.image-upload-wrap-folding1').removeClass('image-dropping');
  });

  // =================================================================== //

  function readURL_folding2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('.image-upload-wrap-folding2').hide();

          reader.onload = function (e) {
              $(".file-upload-image-folding2").attr("src", e.target.result);
              $(".file-upload-content-folding2").show();
              $('.image-title').html(input.files[0]);
              // $('.image-title').html(input.files[0].name);
          };

          reader.readAsDataURL(input.files[0]);
          $("#frmFolding").submit();

      } else {
          removeUpload_folding2();
      }
  }

  function removeUpload_folding2() {
      $('.file-upload-input-folding2').replaceWith($('.file-upload-input-folding2').clone());
      $('.file-upload-content-folding2').hide();
      $('.image-upload-wrap-folding2').show();
  }
  $('.image-upload-wrap-folding2').bind('dragover', function () {
      $('.image-upload-wrap-folding2').addClass('image-dropping');
  });
  $('.image-upload-wrap-folding2').bind('dragleave', function () {
      $('.image-upload-wrap-folding2').removeClass('image-dropping');
  });

  // =================================================================== //

  function readURL_folding3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('.image-upload-wrap-folding3').hide();

          reader.onload = function (e) {
              $(".file-upload-image-folding3").attr("src", e.target.result);
              $(".file-upload-content-folding3").show();
              $('.image-title').html(input.files[0]);
              // $('.image-title').html(input.files[0].name);
          };

          reader.readAsDataURL(input.files[0]);
          $("#frmFolding").submit();

      } else {
          removeUpload_folding3();
      }
  }

  function removeUpload_folding3() {
      $('.file-upload-input-folding3').replaceWith($('.file-upload-input-folding3').clone());
      $('.file-upload-content-folding3').hide();
      $('.image-upload-wrap-folding3').show();
  }
  $('.image-upload-wrap-folding3').bind('dragover', function () {
      $('.image-upload-wrap-folding3').addClass('image-dropping');
  });
  $('.image-upload-wrap-folding3').bind('dragleave', function () {
      $('.image-upload-wrap-folding3').removeClass('image-dropping');
  });

  // =================================================================== //

  function readURL_folding4(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('.image-upload-wrap-folding4').hide();

          reader.onload = function (e) {
              $(".file-upload-image-folding4").attr("src", e.target.result);
              $(".file-upload-content-folding4").show();
              $('.image-title').html(input.files[0]);
              // $('.image-title').html(input.files[0].name);
          };

          reader.readAsDataURL(input.files[0]);
          $("#frmFolding").submit();

      } else {
          removeUpload_folding4();
      }
  }

  function removeUpload_folding4() {
      $('.file-upload-input-folding4').replaceWith($('.file-upload-input-folding4').clone());
      $('.file-upload-content-folding4').hide();
      $('.image-upload-wrap-folding4').show();
  }
  $('.image-upload-wrap-folding4').bind('dragover', function () {
      $('.image-upload-wrap-folding4').addClass('image-dropping');
  });
  $('.image-upload-wrap-folding4').bind('dragleave', function () {
      $('.image-upload-wrap-folding4').removeClass('image-dropping');
  });

  // =================================================================== //

  function readURL_folding5(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('.image-upload-wrap-folding5').hide();

          reader.onload = function (e) {
              $(".file-upload-image-folding5").attr("src", e.target.result);
              $(".file-upload-content-folding5").show();
              $('.image-title').html(input.files[0]);
              // $('.image-title').html(input.files[0].name);
          };

          reader.readAsDataURL(input.files[0]);
          $("#frmFolding").submit();

      } else {
          removeUpload_folding5();
      }
  }

  function removeUpload_folding5() {
      $('.file-upload-input-folding5').replaceWith($('.file-upload-input-folding5').clone());
      $('.file-upload-content-folding5').hide();
      $('.image-upload-wrap-folding5').show();
  }
  $('.image-upload-wrap-folding5').bind('dragover', function () {
      $('.image-upload-wrap-folding5').addClass('image-dropping');
  });
  $('.image-upload-wrap-folding5').bind('dragleave', function () {
      $('.image-upload-wrap-folding5').removeClass('image-dropping');
  });

  // =================================================================== //

  function readURL_folding6(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('.image-upload-wrap-folding6').hide();

          reader.onload = function (e) {
              $(".file-upload-image-folding6").attr("src", e.target.result);
              $(".file-upload-content-folding6").show();
              $('.image-title').html(input.files[0]);
              // $('.image-title').html(input.files[0].name);
          };

          reader.readAsDataURL(input.files[0]);
          $("#frmFolding").submit();

      } else {
          removeUpload_folding6();
      }
  }

  function removeUpload_folding6() {
      $('.file-upload-input-folding6').replaceWith($('.file-upload-input-folding6').clone());
      $('.file-upload-content-folding6').hide();
      $('.image-upload-wrap-folding6').show();
  }
  $('.image-upload-wrap-folding6').bind('dragover', function () {
      $('.image-upload-wrap-folding6').addClass('image-dropping');
  });
  $('.image-upload-wrap-folding6').bind('dragleave', function () {
      $('.image-upload-wrap-folding6').removeClass('image-dropping');
  });
</script>

@if ($file1!=="")
<script>
    $(".file-upload-content-folding1").show();
    $('.image-upload-wrap-folding1').hide();
</script>
@endif

@if ($file2!=="")
<script>
    $(".file-upload-content-folding2").show();
    $('.image-upload-wrap-folding2').hide();
</script>
@endif

@if ($file3!=="")
<script>
    $(".file-upload-content-folding3").show();
    $('.image-upload-wrap-folding3').hide();
</script>
@endif

@if ($file4!=="")
<script>
    $(".file-upload-content-folding4").show();
    $('.image-upload-wrap-folding4').hide();
</script>
@endif

@if ($file5!=="")
<script>
    $(".file-upload-content-folding5").show();
    $('.image-upload-wrap-folding5').hide();
</script>
@endif

@if ($file6!=="")
<script>
    $(".file-upload-content-folding6").show();
    $('.image-upload-wrap-folding6').hide();
</script>
@endif
@endpush
