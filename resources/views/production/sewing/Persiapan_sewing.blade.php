@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<style>
  .nav-tabs {
    border-bottom: none !important
  }
</style>
@endpush

@push("sidebar")
  @include('production.layouts.navbar_sewing')
@endpush

@section("content")
<section class="content position-relative">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="cardFlat" style="margin-bottom:12px">
          <ul class="nav nav-tabs blue-md-tabs2 justify-start d-flex" role="tablist">
            <li class="nav-item-show flex-fill">
              <a href="{{route('prd.sewing.index')}}" class="nav-link">Daily Sewing</a>
              <div class="blue-slide2 w-50"></div>
            </li>
            <li class="nav-item-show flex-fill">
              <a href="{{route('prd.sewing.persiapan')}}" class="nav-link active">Persiapan Sewing</a>
              <div class="blue-slide2 w-50"></div>
            </li>
          </ul>
        </div>
        <div class="cardFlat p-4">
          <form id="upload" name="custForm" action="{{route ('prd.sewingpersiapan.import')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12 justify-sb mb-3">
                <div class="title-24-dark2">Upload Persiapan Sewing</div>
                <div class="justify-center">
                  <span class="mr-2 title-12-grey2">Download Template : </span>
                  <a href="{{route('prd.sewing.formatpersiapan')}}" class="btn-icon-hijau "><i class="fs-18 fas fa-file-excel"></i></a>
                </div>
              </div>
              <div class="col-12 mb-3">
                <div class="title-sm">Upload Document</div>
                <div class="customFile mt-1">
                  <input type="file" class="customFileInput" id="customFile" name="file" value="" accept=".xlsx, .xls, .csv" required >
                  <label class="customFileLabelsBlue" for="customFile">
                      <span class="chooseFile"></span>
                  </label>
                </div>
                <div class="alert-upload">**Tidak diperbolehkan untuk upload lebih dari satu tanggal produksi.</div>  
              </div>
              @foreach($dataBranch as $db)
              <div class="col-md-6">
                <div class="justify-start">
                  <div class="radioContainer">
                    <input type="radio" name="branch" id="{{$db->branchdetail}}" class="radioCustomInput" value="{{$db->id}}" checked>
                    <label for="{{$db->branchdetail}}" class="radioCustoms"></label>
                  </div>
                  <label for="{{$db->branchdetail}}" class="label-radio">{{$db->nama_branch}}</label>
                </div>
              </div>
              @endforeach
              <div class="col-12 mt-3">
                <button type="submit" class="btn-blue-md w-100">Simpan<i class="fs-18 ml-3 fas fa-caret-right"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3 pb-4">
        <div class="col-12">
          <div class="cardPart">
            <div class="cardHead">
              <div class="joblist-date p-3 gap-3">
                <div class="title-20-dark2 no-wrap mt-1">Data Monitoring Production [PLOT]</div>
                <div class="margin-date justify-start" style="gap:.6rem">
                  <div class="title-sm title-none">Filter</div>
                  <div class="title-none">:</div>
                  <div class="input-group date" id="report_date" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                      <div class="inputGroupBlue" ><i class="fs-20 fas fa-calendar-alt"></i><i class="fs-18 ml-2 fas fa-caret-down"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput input-date-fa" data-target="#report_date" placeholder="Select Date" style="width: 130px"/>
                  </div>
                </div>
                <input type="hidden" id="month" type="text" value="{{$bulan}}" />
              </div>
            </div>
            <div class="section3"></div>
            <div class="cardBody p-3">
              <div class="row">
                <div class="col-12">
                  <div class="justify-sb">
                    <div class="mt-3 d-inline-flex gap-4">
                      <div class="radioFlatContainer2" onclick="filterStatus('')">
                        <input type="radio" name="table" value="" class="radioFlat2" id="all">
                        <label for="all" class="options check py-4 px-3">
                            <span class="radio-desc">All Status</span>
                        </label>
                      </div>
                      <div class="radioFlatContainer2" onclick="filterStatus('Persiapan Kurang')">
                        <input type="radio" name="table" value="" class="radioFlat2" id="x">
                        <label for="x" class="options check py-4 px-3">
                            <span class="radio-desc"><i class="fas fa-arrow-circle-down text-merah mr-3"></i> Persiapan Kurang </span>
                        </label>
                      </div>
                      <div class="radioFlatContainer2" onclick="filterStatus('Persiapan Mencukupi')">
                        <input type="radio" name="table" value="" class="radioFlat2" id="a">
                        <label for="a" class="options check py-4 px-3">
                            <span class="radio-desc"><i class="fas fa-arrow-circle-up text-hijau mr-3"></i>Persiapan Mencukupi</span>
                        </label>
                      </div>
                    </div>
                    <button type="button" class="btn-green-md exportExcel" onclick="test(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel">Download<i class="fs-18 ml-2 fas fa-file-excel"></i></button>
                  </div>
                  <div class="cards-scroll pb-5 scrollX" id="scroll-bar">
                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                    <table id="DTtable" class="tables3 tbl-content-cost no-wrap" width="100%">
                      <tfoot class="d-none">
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>WO Number</th>
                          <th>Line</th>
                          <th>QTY Persipan</th>
                          <th>QTY Target</th>
                          <th>QTY Balance</th>
                          <th>Branch</th>
                          <th class="statusSelect">Status</th>
                        </tr>
                      </tfoot>
                      <thead class="bg-thead2">
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>WO Number</th>
                          <th>Line</th>
                          <th>QTY Persipan</th>
                          <th>QTY Target</th>
                          <th>QTY Balance</th>
                          <th>Branch</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=0;?>
                      @foreach ($data_plot as $key => $value)
                      <?php $no++;?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{ $value->tanggal }}</td>
                          <td>{{ $value->wo }}</td>
                          <td>{{ $value->line }}</td>
                          <td>{{ $value->qty_output }}</td>
                          <td>{{ $value->qty_target }}</td>
                          <td>{{ $value->qty_balance }}</td>
                          <td>{{ $value->branchdetail }}</td>
                          @if($value->qty_balance>=0)
                          <td><i class="fas fa-arrow-circle-up text-hijau"></i><span class="d-none">Persiapan Mencukupi</span></td>
                          @else
                          <td><i class="fas fa-arrow-circle-down text-merah"></i><span class="d-none">Persiapan Kurang</span></td>
                          @endif
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
        <div class="col-12 mt-3">
          <div class="cardPart">
            <div class="cardHead">
              <div class="joblist-date p-3 gap-3">
                <div class="title-20-dark2 no-wrap mt-1">Data Persiapan Sewing [UNPLANNED]</div>
                <div class="margin-date">
                  <button type="button" class="btn-green-md exportExcel2 " onclick="test(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel">Download<i class="fs-18 ml-2 fas fa-file-excel"></i></button>
                </div>
              </div>
            </div>
            <div class="section3"></div>
            <div class="cardBody p-3">
              <div class="row">
                <div class="col-12">
                  <div class="cards-scroll pb-5 scrollX" id="scroll-bar">
                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                    <table id="DTtable2" class="tables3 tbl-content-cost no-wrap" width="100%">
                      <thead class="bg-thead2">
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>WO Number</th>
                          <th>Line</th>
                          <th>QTY Persipan</th>
                          <th>Branch</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=0;?>
                        @foreach ($data_unplanned as $key2 => $value2)
                          <?php $no++;?>
                          <tr>
                            <td>{{$no}}</td>
                            <td>{{ $value2->tanggal }}</td>
                            <td>{{ $value2->wo }}</td>
                            <td>{{ $value2->line }}</td>
                            <td>{{ $value2->qty_output }}</td>
                            <td>{{ $value2->branchdetail }}</td>
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
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>

<!-- <script> 
  $('#tes').toast('show');
  $('#tes').toast(options)
</script> -->

@if(Session::has('error'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    var meseg = "{{Session::get('error')}}";
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: meseg
      })
    }
  </script>
@endif

@if(Session::has('noMatch'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    // var meseg = "{{Session::get('noMatch')}}";
    // var a="{{(session()->get('noMatch'))}}"
    // console.log('a');
    // window.onload = function() { 
    //     Swal.fire({
    //     icon: 'error',
    //     title: 'Oops...',
    //     text: meseg
    //   })
    // }
  </script>
@endif

@if(Session::has('success'))
  <script>
    // toastr.success("{!!Session::get('success')!!}");
    window.onload = function() {
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Data Berhasil Disimpan',
      showConfirmButton: false,
      timer: 1500
      })
    };
  </script>
@endif

<script>
  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '190px');
  });
  $(document).ready(function() {
    var table = $('#DTtable').DataTable({
      "pageLength": 10,
        
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'excelHtml5',
          title: 'Data Persiapan Sewing '
        }
      ]
    });
 
    $("#DTtable tfoot th").each( function ( i ) {
        var select = $('<select><option value=""></option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                table.column( i )
                    .search( $(this).val() )
                    .draw();
            } )
    } )
  })
  
  function filterStatus(branch) {
    var table = $('#DTtable').DataTable()
    const select = document.querySelector('.statusSelect select')
    select.value = branch

    table.column( 8 )
    .search( branch )
    .draw();
  }

  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
      "pageLength": 15,
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'excelHtml5',
          title: 'Data Persiapan Sewing(UNPLANNED)'
        }
      ]
    });
  });

  // $('.exportExcel').click(function(){
  //   $(".buttons-excel").click();
  // })
  // $('.exportExcel2').click(function(){
  //   $(".buttons-excel").click();
  // })
</script>
<script>
  function test(button) {
    const tombol = document.getElementsByClassName('buttons-excel');

    if (button.classList.contains('exportExcel')) {
        tombol[0].click();
    } else if (button.classList.contains('exportExcel2')) {
        tombol[1].click();
    }
  }
</script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>
    document.getElementById('upload').addEventListener('submit', function() {
        showLoading();
    });
    function showSuccessAlert(){
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 5500
        })
    }
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
                showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-labels").addClass("selected").html(fileName).css('padding-left', '190px');
  });

</script>

<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    $('#report_date2').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
      if (filter_count > 0) {
        var month = $("#report_date").find("input").val();
        console.log('ok')
        location.replace("{{ url('prd/sewing/persiapan?filter=') }}"+month) 
      }
      filter_count++
    })
    var month = $("#month").val();
    console.log(month);
    $('.input-date-fa').val(month)
  });
</script>

@endpush