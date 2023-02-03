@extends("layouts.flat_breadcrumb.app")
@section("title","FACTORY AUDIT REPORT")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<style>
.nav-tabs {
    border-bottom: none !important;
  }
</style>
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12 text-center mt-3 mb-4">
        <div class="title-24-dark">REPORT FA MATSUOKA TRADING CO., LTD. </div>
        <div class="title-20G">25 January 2022 sd 06 June 2023</div>
      </div>
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead">
            <div class="justifySearch gap-3 p-3">
              <div class="title-24-dark2 no-wrap mt-1">QA FACTORY AUDIT</div>
              <div class="margin-search">
                <button class="btn-icon-hijau exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
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
                        <th>SHIP PERIOD/TOD</th>
                        <th>PO NO</th>
                        <th>BUYER</th>
                        <th>STYLE</th>
                        <th>COLOR</th>
                        <th>ITEM</th>
                        <th>DESTINATION</th>
                        <th>QTY ORDER</th>
                        <th>TOTAL PCS</th>
                        <th>TOTAL CARTON</th>
                        <th>SAMPLE SIZE</th>
                        <th>SAMPLE CARTON</th>
                        <th>REJECT PCS</th>
                        <th>REJECT CTN</th>
                        <th>REJECT CTN NO</th>
                        <th>RESULT</th>
                        <th>QUALITY COMMENTS</th>
                        <th>APPROVAL SPV FINISHING</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>26 January 2022</td>
                        <td>26 January 2022</td>
                        <td>65412378</td>
                        <td>ADIDAS</td>
                        <td>A3215412</td>
                        <td>BLACK</td>
                        <td>SHIRT</td>
                        <td>New York</td>
                        <td>1234</td>
                        <td>45</td>
                        <td>1</td>
                        <td>3</td>
                        <td>65</td>
                        <td>194</td>
                        <td>99 %</td>
                        <td>48</td>
                        <td>5</td>
                        <td>-</td>
                        <td>Citra Rahmawati</td>
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
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script type="text/javascript">
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

  $('.exportExcel').click(function(){
    $(".buttons-excel").click();
  })
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      "pageLength": 10,
      dom: 'Bfrtp',
      "buttons": [ {extend: 'excel', title: ''}],
    });
  });
</script>
@endpush