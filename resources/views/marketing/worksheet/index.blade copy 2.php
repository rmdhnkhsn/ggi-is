@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRights.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item-show">
              <a class="nav-link relative active" data-toggle="tab" href="#po_list" role="tab"></i>
                <i class="fs-28 fas fa-file-alt"></i>
                <div class="f-14">PO List</div>
                <span class="tabs-badge">{{$jumlah}}</span>
              </a>
              <div class="sch-slide"></div>
            </li>
            <li class="nav-item-show">
              <a class="nav-link relative" data-toggle="tab" href="#worksheet" role="tab"></i>
                <i class="fs-28 fas fa-file-invoice"></i>
                <div class="f-14">Worksheet</div>
                <span class="tabs-badge">{{$jumlah_worksheet}}</span>
              </a>
              <div class="sch-slide"></div>
            </li>
          </ul>
          <div class="tab-content card-block">
            <!-- Rekap Order  -->
            <input type="hidden" id="po_list_bulan" value={{$id}}>
            <div class="tab-pane active" id="po_list" role="tabpanel">
              <div class="row">
                <div class="col-12 justify-sb2">
                  <div class="title-20 text-left">Order Recap</div>
                  <div class="filterSMV">
                      <div class="input-group justify-center">
                          <div class="sub-title-14 mr-2">Show : </div>
                          <!-- <div class="input-group-prepend">
                              <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                          </div> -->
                          <div class="input-group date" id="report_date" data-target-input="nearest">
                            <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                              <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input borderInput w-130"
                            data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                            <input type="hidden" id="nilai_filter" type="text" value="" />
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 pb-5">
                  <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                  <div class="cards-scroll scrollX" id="scroll-bar">
                    <table id="POlist" class="table tbl-content table-striped" >
                      <thead>
                        <tr class="bg-thead">
                          <th>PO Number</th>
                          <th>Style</th>
                          <th>Buyer</th>
                          <th>Article</th>
                          <th>Qty</th>
                          <th>Shipment to</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Worksheet  -->
            <div class="tab-pane" id="worksheet" role="tabpanel">
              <div class="row">
                <div class="col-12 justify-sb2">
                  <div class="title-20 text-left">Worksheet List</div>
                  <div class="filterSMV">
                      <div class="input-group justify-center">
                          <div class="sub-title-14 mr-2">Show : </div>
                          <div class="input-group-prepend">
                              <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                          </div>
                          <input type="date" class="form-control borderInput" name="" id="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 pb-5">
                  <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                  <div class="cards-scroll scrollX" id="scroll-bar">
                    <table id="Worksheet" class="table tbl-content-left" >
                      <thead>
                        <tr class="bg-thead">
                          <th>PO Number</th>
                          <th>Style</th>
                          <th>Buyer</th>
                          <th>Article</th>
                          <th>Qty</th>
                          <th>Shipment</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
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

<script type="text/javascript">
  $(function () {
    var id = $('#po_list_bulan').val();
    var url = "{{ route('worksheet.po_list',[':id']) }}";
    url=url.replace(':id',id);

    // console.log(id);
    var table = $('#POlist').DataTable({
      "dom": '<"search"f><"top">rt<"bottom"ip><"clear">',
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "order": [[ 0, "desc" ]],
      processing: true,
      serverSide: true,
      ajax: url,
      columns: [
          {data: 'no_po', name: 'no_po'},
          {data: 'style', name: 'style'},
          {data: 'buyer', name: 'buyer'},
          {data: 'article', name: 'article'},
          {data: 'qty', name: 'qty'},
          {data: 'shipment_to', name: 'shipment_to'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
    });
  });
</script>

<script type="text/javascript">
  $(function () {
    var table = $('#Worksheet').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"ip><"clear">',
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        ajax: "{{ route('worksheet.list') }}",
        columns: [
            {data: 'no_po', name: 'no_po'},
            {data: 'style', name: 'style'},
            {data: 'buyer', name: 'buyer'},
            {data: 'article', name: 'article'},
            {data: 'qty', name: 'qty'},
            {data: 'shipment_to', name: 'shipment_to'},
            // {data: 'note1', name: 'note1'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>
<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    var filter=$('#nilai_filter').val();
    $("#report_date").on("change.datetimepicker", ({date}) => {
        if (filter_count > 0) {
            var month = $("#report_date").find("input").val();
            // console.log( month)
            var url = "{{ route('worksheet.po_list',[':id']) }}";
            url=url.replace(':id',month);
            window.location.href = url;
          }
          filter_count++
    })
    var month = $("#month").val();
    $('.input-date-fa').val(month + '')
  });
</script>
@endpush
