@extends("layouts.app")
@section("title","Receiving Material")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push("sidebar")
    @include('warehouse.partials.navbar')
@endpush


@section("content")
<section class="content">
  <!-- <div class="container-fluid">
    <div class="row">
      <a href="{{ route('scan-delivery') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Status Receiving</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <form action="{{ route('warehouse-updateScanQrcode')}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="row pb-4">
        <div class="col-12">
          <div class="cards" style="padding: 30px 20px">
            <div class="title-24 text-center">Receiving Material</div>
            <div class="col-12 mt-4">
              <div class="input-group mt-2">
                  <div class="input-group-prepend">
                      <span class="input-group-select-icon"><i class="fs-22 fas fa-qrcode"></i></span>
                  </div>
                  <input type="text" class="form-control border-input" id="id_barcode" name="id_barcode" value="" placeholder="input here...">
              </div>
            <div class="col-12 justify-center mt-4">
              <button type="submit" class="btn-blue-sm" style="width:320px">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div> -->


  <div class="h-100 w-100">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#frmSearchQRCode" type="button"><span class="fa fa-search"></span>&nbsp;</button>
                        </div>
                        <input class="form-control mt-2 mb-2" type="text" name="id_barcode" value="" placeholder="Scan QRCode" id="scanqr" style="background: #ffffb4;font-size: 18px"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table class='table table-bordered table-lg'>
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="3">Last Scanned QR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="20%">From.Company</td>
                                <td width="10%">:</td>
                                <td id="company"></td>
                            </tr>
                            <tr>
                                <td width="20%">Subcont.No</td>
                                <td width="10%">:</td>
                                <td id="nomorsubkon"></td>
                            </tr>
                            <tr>
                                <td>Box/Roll.No</td>
                                <td>:</td>
                                <td id="boxno"></td>
                            </tr>
                            <tr>
                                <td>Item</td>
                                <td>:</td>
                                <td id="item"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <fieldset>
                        <div style="font-size: 28px;text-align:center;">
                            <b>PACK SCANNED</b><br/>
                            <span id="pack_scanned" style="font-size: 22px;">0</span>
                        </div>
                    </fieldset>
                    <fieldset class="mt-3 mb-3" id="labelstatus">
                        <div style="font-size: 28px;text-align:center;">
                            <b>STATUS</b><br/>
                            <span id="status" style="font-size: 22px;">-</span>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-3">
                    <fieldset>
                        <div style="font-size: 28px;text-align:center;">
                            <b>TOTAL PACK</b><br/>
                            <span id="pack_total" style="font-size: 22px;">-</span>
                        </div>
                    </fieldset>
                </div>
            </div>    
        </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script type="text/javascript">
$(document).ready( function () {

  $('body').on('keydown', '#scanqr', function (e) {
    if(e.keyCode==9){
          e.preventDefault();
      }
  });

  $("#scanqr").on("keyup",function(e){
    if(e.keyCode==13){
          let scan_url="{{route('receiving-scanqr-api',['id'=>':id'])}}";
          let post_url="{{route('receiving-scanqr-api-store')}}";
          var scanqr=$("#scanqr").val();

          scan_url=scan_url.replace(":id", scanqr);
          $.get(scan_url,function(resp){
              if(resp.msg=="OK"){

                  $("#company").text(resp.info.company);
                  $("#nomorsubkon").text(resp.info.no_kontrak);
                  $("#boxno").text(resp.info.boxno);
                  $("#item").text(resp.info.list_item);

                  $("#labelstatus").delay(1000).css("background-color","green");
                  $("#status").text(resp.msg);
                  $("#pack_scanned").text(resp.info.pack_scanned);
                  $("#pack_total").text(resp.info.pack_total);
                  play_sound("{{asset('/sounds/ok.mp3')}}");
              }else{
                  $("#labelstatus").delay(1000).css("background-color","red");
                  play_sound("{{asset('/sounds/invalid.mp3')}}");
                  $("#status").text(resp.msg);
              }

          });
          // $("#scanqr").prop('disabled', false);
          $("#scanqr").val("");
          $("#scanqr").focus();
      }
  });

  function play_sound(file){
            console.log(file);
            var audio = new Audio(file);
            audio.play();
  }
});
</script>
@endpush