@extends("layouts.app")
@section("title","Data Process")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="cards p-4 o-hidden">
            <div class="row">
              <div class="col-12 justify-start gap-8">
                <div class="title-20 text-left">Data Process</div>
                <button type="button" class="icon-circle-blue"><i class="fas fa-info"></i></button>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                    <div class="cards-scroll scrollX" id="scroll-bar">
                        <table id="DTtable" class="table tbl-content-center no-wrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="padding-bottom:2rem">NO</th>
                                    <th style="padding-bottom:2rem">PROCESS OF GARMENT</th>
                                    <th style="padding-bottom:2rem">CAT</th>
                                    <th>CYCLE<br/>TIME<br/>(Second)</th>
                                    <th class="pb-4">SMV<br/>(Minute)</th>
                                    <th>PRD ON<br/>CAPACITY<br/>(pcs/hour)</th>
                                    <th>MANPOWER<br/>NEED<br/>(Operator)</th>
                                    <th>WORKING<br/>TIME<br/>(hour/opt)</th>
                                    <th>BALANCE<br/>WORKING<br/>TIME (hour/opt)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><button type="button" class="btn-delete-row2 container-tbl-btn"><i class="far fa-times-circle"></i></button></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                    <td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 mb-2">
                            <div class="title-14-dark2">Add data from existing process</div>
                        </div>
                        <div class="col-12 mb-1">
                            <div class="title-sm">Data Process</div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group flex mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-database"></i></span>
                                </div>
                                <select class="form-control border-input-10 select2bs4 pointer" id="" name="" required>
                                    <option selected disabled>Search data process</option>
                                    <option name="jahit">jahit</option>    
                                    <option name="obras">obras</option>    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="btn-outline-blue-md">Add Collumn <i class="fs-18 ml-2 fas fa-plus"></i></a>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="btn-blue-md saveAll">Save All <i class="fs-18 ml-2 fas fa-save"></i></a>
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
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
  $('.saveAll').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Successfully',
      text: 'SMV data Sucessfully Created.',
      buttons: false,
      timer: 2000
    })
  });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>

<script>
	$().ready(function(){
        var table = $('#DTtable').DataTable({
            // scrollX : '100%',
            "pageLength": 15,
            "dom": '<"search"f><"top">rt<"bottom"><"clear">'
        });
	});
</script>

<script>
    $('#DTtable').on('click', '.btn-delete-row2', function () {
        $(this).closest('tr').remove();
    })
    $('.btn-outline-blue-md').click(function () {
        $('#DTtable').append('<tr><td><button type="button" class="btn-delete-row2 container-tbl-btn"><i class="far fa-times-circle"></i></button></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="" id=""></td></tr>')
    });
</script>
@endpush