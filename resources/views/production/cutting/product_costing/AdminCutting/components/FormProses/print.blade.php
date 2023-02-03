@extends("layouts.app")
@section("title","Print")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/customSearch.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cards-part">
          <div class="cards-head">
            <div class="justify-sb3">
              <div class="title-24-blue no-wrap mt-1">Print Label Sisa Kain</div>
              <div class="containerSearch">
                <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
              </div>
            </div>
          </div>
          <div class="cards-body">
            <div class="row">
              <div class="col-12">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost">
                    <thead>
                      <tr class="bg-thead2">
                        <th width="4%" style="padding-top:1.5rem">NO</th>
                        <th width="8%" style="padding-top:1.5rem">WO</th>
                        <th width="8%" style="padding-top:1.5rem">STYLE</th>
                        <th width="8%">STYLE <br/> NUMBER</th>
                        <th width="13%" style="padding-top:1.5rem">BUYER</th>
                        <th width="8%" style="padding-top:1.5rem">COLOR</th>
                        <th width="4%" style="padding-top:1.5rem">ROLL</th>
                        <th width="8%" style="padding-top:1.5rem">COUNTRY</th>
                        <th width="20%" style="padding-top:1.5rem">FABRIC</th>
                        <th width="5%">QTY <br/> UTUH</th>
                        <th width="6%">PEMAKAIAN <br/> KAIN</th>
                        <th width="6%" style="padding-top:1.5rem">SATUAN</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>178267</td>
                        <td>5156184</td>
                        <td>5156184</td>
                        <td>Agus Hendra Kapoor</td>
                        <td>Purple</td>
                        <td>1</td>
                        <td>JPN</td>
                        <td>CW1 K 45 CHK HP 20210914#1,HNM (FABRIC 100%COTTON)</td>
                        <td>-</td>
                        <td>
                          <div class="container-tbl-btn">
                            <input type="text" class="form-control borderInput" id="" name="" placeholder="0">
                          </div>
                        </td>
                        <td>
                          <div class="container-tbl-btn">
                            <input type="text" class="form-control borderInput" id="" name="" placeholder="0">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>178267</td>
                        <td>5156184</td>
                        <td>5156184</td>
                        <td>THE GAP INC - KENTUCKY USA</td>
                        <td>Purple</td>
                        <td>1</td>
                        <td>JPN</td>
                        <td>CW1 K 45 CHK HP 20210914#1,HNM (FABRIC 100%COTTON)</td>
                        <td>-</td>
                        <td>
                          <div class="container-tbl-btn">
                            <input type="text" class="form-control borderInput" id="" name="" placeholder="0">
                          </div>
                        </td>
                        <td>
                          <div class="container-tbl-btn">
                            <input type="text" class="form-control borderInput" id="" name="" placeholder="0">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>178267</td>
                        <td>5156184</td>
                        <td>5156184</td>
                        <td>BEST INDO - JAPAN, PT.</td>
                        <td>Purple</td>
                        <td>1</td>
                        <td>JPN</td>
                        <td>CW1 K 45 CHK HP 20210914#1,HNM (FABRIC 100%COTTON)</td>
                        <td>-</td>
                        <td>
                          <div class="container-tbl-btn">
                            <input type="text" class="form-control borderInput" id="" name="" placeholder="0">
                          </div>
                        </td>
                        <td>
                          <div class="container-tbl-btn">
                            <input type="text" class="form-control borderInput" id="" name="" placeholder="0">
                          </div>
                        </td>
                      </tr>
                    </tbody> 
                  </table>
                </div>
                <div class="justify-end mt-3">
                  <a href="{{ route('print.proses.pdf')}}" class="btn-blue-md">Print Label <i class="fs-20 ml-2 fas fa-print"></i></a>
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
      "pageLength": 100,
      dom: 'frt'
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
</script>
@endpush