@extends("layouts.app")
@section("title","Partial")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead">
            <div class="joblist-date p-3 gap-3">
              <div class="title-24-blue no-wrap mt-1">DATA KONTRAK KERJA</div>
              <div class="margin-date flex gap-2">
                <div class="justify-center mr-1">
                  <div class="title-sm mr-2 text-left title-hide">Filter</div>
                  <div class="input-group date" id="report_date" value="{{$year}}" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#report_date"data-toggle="datetimepicker">
                      <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                    </div>
                      <input type="text" class="form-control datetimepicker-input borderInput w-120" id="value_year" value="{{$year}}" data-target="#report_date" placeholder="Select Date" style="border-radius:0 10px 10px 0"/>
                  </div>
                </div>
                <button type="button" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-18 fas fa-file-excel"></i></button>
                <button type="button" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-18 fas fa-file-pdf"></i></button>
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
                        <th>NO</th>
                        <th>KONTRAK KERJA</th>
                        <th>JATUH TEMPO</th>
                        <th>NAMA PIC</th>
                        <th>QTY GARMENT</th>
                        <th>JUMLAH MASUK</th>
                        <th>TERSISA</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($subkon as $key=>$value)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value['sub_no_kontrak']}}</td>
                        <td>{{$value['jatuh_tempo']}}</td>
                        <td>{{$value['nama']}}</td>
                        <td>{{$value['qty_kontrak']}}</td>
                        <td>{{$value['qty_pemasukan']}}</td>
                        <td>{{$value['balance']}}</td>
                        <td>
                          <div class="container-tbl-btn">
                            <a href="{{ route('input.partial.index',[$value['branch'],$value['no_kontrak']])}}" class="btn-blue-md d-inline-flex">Details <i class="fs-18 ml-2 fas fa-caret-right"></i></a>
                          </div>
                        </td> 
                      </tr>
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
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y',
      showButtonPanel: true
    })
   
    $("#report_date").on("change.datetimepicker", ({date}) => {
            var year = $("#report_date").find("input").val();
            console.log(year)
            showLoading();
            location.replace("{{ url('mtd/partial-262?filter=') }}"+year) 
        })
    var year = $("#value_year").val();
    $('.input-date-fa').val(year)

  });

  function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                // showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }

</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        }],
    });
  });
  
  $('.exportExcel').click(function(){
      $(".buttons-excel").click();
  })

  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })
</script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
@endpush