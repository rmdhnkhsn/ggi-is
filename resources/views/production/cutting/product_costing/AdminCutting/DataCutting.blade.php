@extends("layouts.app")
@section("title","Data Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
@endpush

@section("content")
<style>
  .nav-tabs { 
    border-bottom: 1px solid #f2f2f2; 
    margin-bottom: -1px;
  }
</style>
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        @include('production.cutting.product_costing.AdminCutting.partials.nav-menu')
        <div class="cards-part">
          <div class="cards-head">
            <div class="justify-sb3">
              <div class="title-24-blue no-wrap mt-1">Data Daily Cutting</div>
              <div class="flexx gap-3">
                <div class="input-group dates widthDateRange">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" id="dateRange" class="form-control borderInput" name="daterange" value="" placeholder="Input Date" />
                </div>
                <div class="containerSearch">
                  <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="cards-body">
            <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th>PO</th>
                        <th>WO</th>
                        <th>BUYER</th>
                        <th>ITEM</th>
                        <th>ARTICLE/STYLE</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>XL -057G</td>
                        <td>176267</td>
                        <td>PT.TEIJIN FRONTIER INDONESIA</td>
                        <td>AZ-751</td>
                        <td>427471</td>
                        <td>
                          <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu"> 
                            <a href="{{ route('detail.data.cutting')}}" class="dropdown-item"><div class="w-22"><i class="mr-2 fs-18 fas fa-search"></i></div>Detail</a>
                            <a href="" class="dropdown-item"><div class="w-22"><i class="mr-2 fs-18 fas fa-file-excel"></i></div>Download Excel</a>
                            <a href="" class="dropdown-item"><div class="w-22"><i class="mr-2 fs-18 fas fa-file-pdf"></i></div>Download Pdf</a>
                          </div>
                        </td>
                      </tr>
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
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Data yang dihapus tidak akan bisa dikembalikan lagi !",
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
        swal("Batal", "Data Anda Kembali Aman", "error");
        }
    }); 
  });
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      "pageLength": 10,
      dom: 'frtp'
    });
  });

  const search = document.getElementById('DTtableSearch')
  search.addEventListener('keyup', function(evt){
    const searchInput = document.querySelector('#DTtable_filter').querySelector('input')
    searchInput.value = evt.target.value
    let e = document.createEvent('HTMLEvents');
    e.initEvent("keyup",false,true);
    searchInput.dispatchEvent(e);
  });

  $(function() {
    $('input[name="daterange"]').daterangepicker();
  });
</script>
@endpush