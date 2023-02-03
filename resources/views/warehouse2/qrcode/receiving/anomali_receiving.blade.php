@extends("layouts.app")
@section("title","Delivery Details")
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
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('anomali-delivery') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Status Delivery</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('anomali-receiving') }}" class="column-2">
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
    <div class="row pb-4">
      <div class="col-12">
        <div class="cards" style="padding: 30px 20px">
          <div class="row">
            <div class="col-12 mt-4">
              <div class="title-24 title-absolute">Material delivery detail</div>
              <div class="cards-scroll scrollX" id="scroll-bar-sm">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable" class="table tbl-content-left no-wrap">
                    <thead>
                      <tr>
                        <th></th>
                        <th>DOC NUMBER</th>
                        <th>DOC TYPE</th>
                        <th>DOC CO</th>
                        <th>TRANSACTION DATE</th>
                        <th>BRANCH/PLANT</th>
                        <th>QUANTITY</th>
                        <th>TRANS UOM</th>
                        <th>UNIT COST</th>
                        <th>EXTENDED</th>
                        <th>LOT/SERIAL</th>
                        <th>LOCATION</th>
                        <th>ORDER CO</th>
                        <th>CLASS CODE</th>
                        <th>G/L DATE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <input type="checkbox" id="check1" value="" name="">
                        </td>
                        <td>176197</td>
                        <td>332100185</td>
                        <td>Albert Flores</td>
                        <td>04/25/2022</td>
                        <td>1202</td>
                        <td>1097</td>
                        <td>5026</td>
                        <td>None</td>
                        <td>12345</td>
                        <td>10000</td>
                        <td>BANDUNG</td>
                        <td>10</td>
                        <td>223344</td>
                        <td>10-10-2022</td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" id="check1" value="" name="">
                        </td>
                        <td>176197</td>
                        <td>332100185</td>
                        <td>Albert Flores</td>
                        <td>04/25/2022</td>
                        <td>1202</td>
                        <td>1097</td>
                        <td>5026</td>
                        <td>None</td>
                        <td>12345</td>
                        <td>10000</td>
                        <td>BANDUNG</td>
                        <td>10</td>
                        <td>223344</td>
                        <td>10-10-2022</td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" id="check1" value="" name="">
                        </td>
                        <td>176197</td>
                        <td>332100185</td>
                        <td>Albert Flores</td>
                        <td>04/25/2022</td>
                        <td>1202</td>
                        <td>1097</td>
                        <td>5026</td>
                        <td>None</td>
                        <td>12345</td>
                        <td>10000</td>
                        <td>BANDUNG</td>
                        <td>10</td>
                        <td>223344</td>
                        <td>10-10-2022</td>
                      </tr>
                    </tbody>
                </table>
              </div>
              <div class="flex mt-3">
                <a href="{{ route('warehouse-delivery') }}" class="btn-green-md" style="width:235px">Done</a>
                <a href="" class="btn-merah-md ml-2" style="width:235px">Download QRcode<i class="ml-2 fs-18 fas fa-file-pdf"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

@endpush