@extends("layouts.flat_breadcrumb.app")
@section("title","QA INLINE")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
<style>
  /* .dropdown-menu.show {
    transform  : translate3d(-180px, -80px, 0px) !important; 
  } */
.nav-tabs {
    border-bottom: none !important;
  }
</style>
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cardFlat pt-4">
          <div class="title-32-grey text-center py-4">QUALITY ASSURANCE</div>
          <ul class="nav nav-tabs blue-md-tabs2 mt-4" id="myTab" role="tablist">
            <li class="nav-item-show">
              <a href="{{ route('qa.inline.index')}}" class="nav-link active"></i>INLINE</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.prefinal.index')}}" class="nav-link"></i>PRE-FINAL</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.factory.index')}}" class="nav-link"></i>FACTORY AUDIT</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.inspection.index')}}" class="nav-link"></i>FINAL INSPECTION</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('qa.report.index')}}" class="nav-link"></i>REPORT</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead">
            <div class="justifySearch gap-3 p-3">
              <div class="title-24-dark2 no-wrap mt-1">QA INLINE</div>
              <div class="margin-search flex gap-3">
                <button type="button" class="btnSoftBlue" data-toggle="modal" data-target="#filter"><i class="fs-18 mr-2 fas fa-filter"></i>Filter</button>
                <a href="{{ route('create.inline.index')}}" class="btn-blue-md">Create New <i class="fs-18 ml-2 fas fa-plus"></i></a>
                @include('qc.QualityAssurance.QA_Inline.filter')
              </div>
            </div>
          </div>
          <div class="section"></div>
          <div class="cardBody p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th>ID</th>
                        <th>INSPECT DATE</th>
                        <th>PO NO</th>
                        <th>BUYER</th>
                        <th>STYLE</th>
                        <th>COLOR</th>
                        <th>QTY ORDER</th>
                        <th>CHECK</th>
                        <th>DEFECT</th>
                        <th>GOOD</th>
                        <th class="bg-thead2"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>26 January 2022</td>
                        <td>65412378</td>
                        <td>ADIDAS</td>
                        <td>A3215412</td>
                        <td>BLACK</td>
                        <td>1000</td>
                        <td>29</td>
                        <td>1</td>
                        <td>50</td>
                        <td>
                          <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a href="{{ route('edit.inline.index')}}" class="dropdown-item">
                              <div style="width:28px"><i class="mr-2 fs-18 fas fa-pencil-alt"></i></div>Edit Data 
                            </a>
                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailsInline">
                              <div style="width:28px"><i class="mr-2 fs-18 fas fa-search"></i></div>Details
                            </button>
                            <a href="" class="dropdown-item deleteFile" style="color:#FB5B5B">
                              <div style="width:28px"><i class="mr-2 fs-18 fas fa-trash"></i></div>Delete
                            </a>
                          </div>
                        </td> 
                      </tr>
                    </tbody> 
                  </table>
                  @include('qc.QualityAssurance.QA_Inline.details')
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
<!-- <script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script> -->
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Setelah mengkonfirmasi, data akan secara permanent di hapus",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4545",
        confirmButtonText: "Yes",
        cancelButtonText: "No ",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Data Anda Kembali Aman", "error");
        }
    }); 
  });
</script>

<script type="text/javascript">
  $(function() {
    $('input[name="daterange"]').daterangepicker();
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      "pageLength": 10,
      dom: 'frtp',
      fixedColumns:   {
        left: 0,
        right: 1,
      },
    });
  });
</script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
@endpush