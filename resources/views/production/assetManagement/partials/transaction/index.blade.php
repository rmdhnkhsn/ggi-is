@extends("layouts.app")
@section("title","Assets Management")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
  <section class="content">
    <div class="container-fluid assman">
      <div class="row">
        <div class="col-12">
          <div class="cards px-4 pt-4">
            <div class="container-title">
              <img src="{{url('images/iconpack/data-management.svg')}}">
              <div class="text">
                <div class="title-30 mb-2">Assets Management</div>
                <div class="title-16-blue-400">Monitor assets by recording IN and OUT assets</div>
              </div>
            </div>
            <ul class="nav nav-tabs blue-md-tabs2 mt-5" id="myTab" role="tablist" style="border-bottom:none !important">
              <li class="nav-item-show">
                <a href="{{ route('asset.maintenance.welcome')}}" class="nav-link"></i>Maintenance</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.transaction.index')}}" class="nav-link active"></i>Transaction</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.dashboard.index')}}" class="nav-link"></i>Dashboard</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.master_data.index')}}" class="nav-link"></i>Master Data</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.report.index')}}" class="nav-link"></i>Report</a>
                <div class="blue-slide2"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="tab-content card-block">
            <div class="tab-pane active" id="transaction" role="tabpanel">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="title-20-grey">Record IN & OUT Assets</div>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <a href="{{ route('asset.purchase')}}" class="cardFlat">
                            <i class="fs-18 fas fa-money-bill-wave"></i>
                            <div class="text">Purchase</div>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <a href="{{ route('asset.purchase')}}" class="cardFlat">
                            <i class="fs-18 far fa-address-card"></i>
                            <div class="text">Rental</div>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <a href="{{ route('asset.purchase')}}" class="cardFlat">
                            <i class="fs-18 fas fa-handshake"></i>
                            <div class="text">Trial</div>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <a href="{{ route('asset.transaksi_out')}}" class="cardFlat">
                            <i class="fs-18 fas fa-store"></i>
                            <div class="text">Sale</div>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <a href="{{ route('asset.rental')}}" class="cardFlat">
                            <i class="fs-18 fas fa-clipboard-check"></i>
                            <div class="text">Rental Finished</div>
                        </a>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <a href="{{ route('asset.trial')}}" class="cardFlat">
                            <i class="fs-18 fas fa-hand-holding-usd"></i>
                            <div class="text">Trial Finished</div>
                        </a>
                    </div>
                    {{-- <div class="col-xl-2 col-lg-6">
                        <button type="button" class="cardFlat" data-toggle="modal" data-target="#sale">
                            <i class="fs-18 fas fa-clipboard-check"></i>

                            <div class="text">Rental Finished</div>
                        </button>
                        @include('production.assetManagement.partials.transaction.modal.sale')
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <button type="button" class="cardFlat" data-toggle="modal" data-target="#sale">
                            <i class="fs-18 fas fa-hand-holding-usd"></i>

                            <div class="text">Trial Finished</div>
                        </button>
                        @include('production.assetManagement.partials.transaction.modal.sale')
                    </div> --}}
                </div>

                <div class="row my-2">
                    <div class="col-12">
                        <div class="cards p-4">
                            <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item-show">
                                    <a class="nav-link relative active" data-toggle="tab" href="#assetsIn" role="tab"></i>
                                        <i class="fs-28 fas fa-file-import"></i>
                                        <div class="f-14">Assets In</div>
                                    </a>
                                    <div class="sch-slide"></div>
                                </li>
                                <li class="nav-item-show">
                                    <a class="nav-link relative" data-toggle="tab" href="#assetsOut" role="tab"></i>
                                        <i class="fs-28 fas fa-file-download"></i>
                                        <div class="f-14">Assets Out</div>
                                    </a>
                                    <div class="sch-slide"></div>
                                </li>
                            </ul>
                            <div class="tab-content card-block">
                                <div class="tab-pane active" id="assetsIn" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 justify-sb2">
                                            <div class="title-20 text-left">Asset List</div>
                                            <div class="filterSMV">
                                                <div class="input-group justify-center">
                                                    <div class="sub-title-14 mr-2 title-hide">Show : </div>
                                                    <div class="input-group-prepend">
                                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-filter"></i></span>
                                                    </div>
                                                    <select class="form-control border-input-10 select2bs4 pointer w-200" id="table-filter" name="status" style="cursor:pointer" required>
                                                        <option selected disabled>Filter Data</option>
                                                        <option value="">All Status</option>
                                                        <option name="Asset">Asset</option>    
                                                        <option name="Trial">Trial</option>    
                                                        <option name="Rental">Rental</option>    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 pb-5">
                                            <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                            <div class="cards-scroll scrollX" id="scroll-bar">
                                                <table id="example1" class="table tbl-content-left no-wrap">
                                                <thead>
                                                      <tr>
                                                            <th>id</th>
                                                            <th>Transaction</th>
                                                            <th>Branch</th>
                                                            <th>Supplier</th>
                                                            <th>Date</th>
                                                            <th>Code</th>
                                                            <th>Type</th>
                                                            <th>Category</th>
                                                            <th>Brand</th>
                                                            <th>Serial Number</th>
                                                            <th class="bg-thead">Act</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>

                                              </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="assetsOut" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 justify-sb2">
                                            <div class="title-20 text-left">Asset List</div>
                                            <div class="filterSMV">
                                                <div class="input-group justify-center">
                                                    <div class="sub-title-14 mr-2 title-hide">Show : </div>
                                                    <div class="input-group-prepend">
                                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-filter"></i></span>
                                                    </div>
                                                    <select class="form-control border-input-10 select2bs4 pointer w-200"id="table-filter2" name="" required>
                                                        <option selected disabled>Filter Data</option>
                                                        <option name="Sale">Sale</option>    
                                                        <option name="TrialFinished">Trial Finished</option>    
                                                        <option name="RentalFinished">Rental Finished</option>    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 pb-5">
                                            <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                            <div class="cards-scroll scrollX" id="scroll-bar">
                                                <table id="assetOut" class="table tbl-content-left no-wrap">
                                                    <thead>
                                                        <tr class="bg-thead">
                                                            <th>No</th>
                                                            <th>Transaction</th>
                                                            <th>Branch</th>
                                                            <th>Recipient</th>
                                                            <th>Alamat</th>
                                                            <th>Date</th>
                                                            <th>Assets</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th class="bg-thead">Act</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataOut as $key2 =>$value2)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $value2['status'] }}</td>
                                                                <td>{{ $value2['brOrigin'] }}</td>
                                                                <td>{{ $value2['supplier'] }}</td>
                                                                <td>{{ $value2['recipient'] }}</td>
                                                                <td>{{ $value2['date'] }}</td>
                                                                <td>{{ $value2['jenis'] }}</td>
                                                                <td>{{ $value2['qty'] }}</td>
                                                                <td>{{ $value2['price'] }}</td>
                                                                <td>
                                                                    <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-h"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailsOut{{ $value2['id'] }}"><i class="mr-2 fs-18 fas fa-info-circle"></i>Details Asset</button>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editOut{{ $value2['id'] }}"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Item</button>
                                                                        <a href="{{route ('asset.master.deleteAssetTransaction', $value2['id'])}}" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @include('production.assetManagement.partials.transaction.modal.modal-action-out')
                                                        @endforeach                                       
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
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons2.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script type="text/javascript">
  $(function () {
        var table = $('#example1').removeAttr('width').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        processing: true,
        serverSide: true,
        ajax:{
				url: "{{ route('asset.transaction.index') }}"
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'status', name: 'status'},
            {data: 'brOrigin', name: 'brOrigin'},
            {data: 'supplier', name: 'supplier'},
            {data: 'date', name: 'date'},
            {data: 'code', name: 'code'},
            {data: 'tipe', name: 'tipe'},
            {data: 'jenis', name: 'jenis'},
            {data: 'merk', name: 'merk'},
            {data: 'serialno', name: 'serialno'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
  

  $(document).ready( function () {
    
    $('#btnSearch').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    });
     $('#table-filter').on('change', function(){
        table.search(this.value).draw();   
    });
  });
</script>

<script type="text/javascript">
  $(function() {
      $('input[name="daterange"]').daterangepicker();
  });
</script>
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "Permanently delete this asset data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2e93ff",
        confirmButtonText: "Yes",
        cancelButtonText: "No ",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Cancel", "Data has been saved", "error");
        }
    }); 
  });
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
  
  $('.close-icon').on('click',function() {
    $(this).closest('.card-close').fadeOut();
  })
</script>

<script>
  $(document).ready( function () {
    var table = $('#assetIn').DataTable({
    "pageLength": 10,
    dom: 'Bfrtp',
    "buttons": [ "excel", "pdf" ],
    fixedColumns:   {
      left: 0,
      right: 1
    },
    });
    //     $('#table-filter').on('change', function(){
    //     table.search(this.value).draw();   
    // });
  });
  $(document).ready( function () {
    var table = $('#assetOut').DataTable({
    "pageLength": 10,
    dom: 'Bfrtp',
    "buttons": [ "excel", "pdf" ],
      fixedColumns:   {
      left: 0,
      right: 1
    },
    });
        $('#table-filter2').on('change', function(){
        table.search(this.value).draw();   
    });
  });
</script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<script>
    var JmlRow = 0;
    var record_id = 1
  $("#addRowSale").click(function () {
      JmlRow++
      var rand = JmlRow
      record_id =JmlRow
      $("#JmlRow").val(JmlRow)
       var AssetName =`
        <select class="form-control borderInput pointer jenis" name="machine[]" id="test"  data-record_id="'+rand+'" style="width:190px">
            <option selected disabled>Select Category</option>
            @foreach ($dataAssetMachine as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['jenis'] }}-{{ $value['serialno'] }}</option>
            @endforeach
        </select>`
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowSale">';
        html +='<div class="col-md-5">';
        html +='<div class="title-sm">Assets Name</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +=AssetName;
        html +='</div></div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Quantity</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3 " id="qty_'+rand+'"  data-record_id="'+rand+'" name="qty[]" value="1" placeholder="Input qty" readonly>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Price</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="price_'+rand+'"  data-record_id="'+rand+'" name="price[]" placeholder="000">';
        html +='<input type="hidden"name="created_by[]" id="" value="{{ auth()->user()->nik }}">';
        html +='<input type="hidden"name="branch[]" id="" value="{{ auth()->user()->branchdetail }}">';
        html +='</div>';
        html +='<div class="col-md-1">';
        html +='<div class="title-sm text-white">x</div>';
        html +='<button id="removeRowSale" type="button" class="btn-delete-row"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
        html +='</div>';

    $('#newRowSale').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowSale', function () {
    $(this).closest('#inputFormRowSale').remove();
  });
</script>
<script>
  $("#addRowTrial").click(function () {
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowTrial">';
        html +='<div class="col-md-5">';
        html +='<div class="title-sm">Assets Name</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +='<select class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]">';
        html +='<option selected disabled>Assets name</option>';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='</select>';
        html +='</div></div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Quantity</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="qty" name="qty" value="1" placeholder="Input qty">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Price</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="price" name="price" placeholder="000">';
        html +='</div>';
        html +='<div class="col-md-1">';
        html +='<div class="title-sm text-white">x</div>';
        html +='<button id="removeRowTrial" type="button" class="btn-delete-row"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
        html +='</div>';

    $('#newRowTrial').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowTrial', function () {
    $(this).closest('#inputFormRowTrial').remove();
  });
</script>
<script>
  $("#addRowRental").click(function () {
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowRental">';
        html +='<div class="col-md-5">';
        html +='<div class="title-sm">Assets Name</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +='<select class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]">';
        html +='<option selected disabled>Assets name</option>';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='</select>';
        html +='</div></div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Quantity</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="" name="" placeholder="Input qty">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Price</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="" name="" placeholder="000">';
        html +='</div>';
        html +='<div class="col-md-1">';
        html +='<div class="title-sm text-white">x</div>';
        html +='<button id="removeRowRental" type="button" class="btn-delete-row"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
        html +='</div>';

    $('#newRowRental').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowRental', function () {
    $(this).closest('#inputFormRowRental').remove();
  });
</script>

<script>
  document.getElementById("addRowSale").addEventListener("click", () => {
    document.getElementById("noItem").classList.add("hide");
  });
  document.getElementById("addRowRental").addEventListener("click", () => {
    document.getElementById("noItem2").classList.add("hide");
  });
  document.getElementById("addRowTrial").addEventListener("click", () => {
    document.getElementById("noItem3").classList.add("hide");
  });
</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
/* When click New customer button */
  });
   $('#nama').change(function(){
  // console.log("ok");
  var ID = $(this).val();
// console.log(ID);
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("asset.getSupplier") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#alamat').val(data.alamat)
        },

      });
    }
  }); 
</script>
@endpush
