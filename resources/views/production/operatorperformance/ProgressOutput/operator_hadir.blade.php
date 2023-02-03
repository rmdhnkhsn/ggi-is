@extends("layouts.app")
@section("title","Jumlah Operator Hadir")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker2.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endpush

@push("sidebar")
    @include('production.operatorperformance.ProgressOutput.partials.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4">
          <form action="{{route('op.hadir.store')}}" method="post" enctype="multipart/form-data"  style="gap:.7rem;width:100%">
                @csrf
            <div class="row" id="inputline">
              <div class="col-12 mb-3">
                <div class="title-22 text-left">Jumlah Operator yang hadir</div>
                <div class="margin-date justify-start" style="gap:.6rem">
                  <div class="input-group date" id="filter_date" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#filter_date"
                        data-toggle="datetimepicker">
                        <div class="fa-custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                        </div>
                      </div>
                      <input type="tanggal" class="form-control datetimepicker-input input-date-fa"
                      data-target="#filter_date" placeholder="Select Date" style="width: 130px"/>
                  </div>
                </div>
              </div>
              <input type="hidden" id="tanggal" name="tanggal" value="{{$tanggal}}" />
            </div>
            <div class="row" id="inputline">
              <div class="col-md-3">
                <div class="title-sm">Select Line</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-sitemap"></i></span>
                  </div>
                  <select class="form-control border-input-10 listline1" id="line" name="line[]" style="cursor:pointer" onchange="search_style(this);" required>
                    <option value="" selected >Select Line</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 ">
                <div class="title-sm">style</div>
                <div class="input-group flex mt-1 mb-3">
                <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fas fa-briefcase"></i></span>
                  </div>
                    <select class="form-control border-input-10 lineStyle" name="style[]" id="style" required>
                      <option selected></option>
                    </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="title-sm">Total Operator</div>
                <div class="mt-1 mb-3">
                  <input type="number" class="form-control border-input-10" id="" name="total_op[]" style="height:38px" placeholder="masukan jumlah oprator yang hadir" required>
                </div>
              </div>
              <div class="col-md-2">
                <div class="title-sm">Jam Kerja (jam)</div>
                <div class="mt-1 mb-3">
                  <input type="number" step="0.01" class="form-control border-input-10" id="" name="waktu_smv[]" value="8" style="height:38px" placeholder="masukan jumlah oprator yang hadir" required>
                </div>
              </div>
              <div class="col-md-1">
                <button id="removeline" type="button" class="btn-delete-row ml-2"><i class="fs-20 fas fa-times"></i></button>
              </div>
            </div>
            <div id="newLine"></div>
            <div class="col-12 flex mt-2" style="gap:.8rem">
              <button type="button" class="btn-orange" id="addline">Tambah Line <i class="fs-18 ml-2 fas fa-plus"></i></button>
              <button  type="submit" class="btn-blue">Simpan <i class="fs-18 ml-2 fas fa-download"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 pb-5">
      <div class="cards bg-card p-4">
        <div class="row" id="inputline">
          <div class="col-12 mb-3">
            <div class="title-22 text-left">Jumlah Operator yang hadir</div>
            <div class="margin-date justify-start" style="gap:.6rem">
              <div class="input-group date" id="filter_date2" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#filter_date2"
                    data-toggle="datetimepicker">
                    <div class="fa-custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Date</span><i class="ml-2 fas fa-caret-down"></i>
                    </div>
                  </div>
                  <input type="tanggal2" class="form-control datetimepicker-input input-date-fa2"
                  data-target="#filter_date2" placeholder="Select Date" style="width: 130px"/>
              </div>
            </div>
          </div>
          <input type="hidden" id="tanggal2" name="tanggal2" value="{{$tanggal2}}" />
        </div>
        <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable" class="table tbl-content no-wrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>Tanggal</th>
                        <th>Line</th>
                        <th>Style</th>
                        <th>Total Oprator</th>
                        <th>Jam Kerja (jam)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=0;
                  ?>
                    @foreach ($op_hadir as $key=>$value)
                    <tr>
                      <?php
                      $no++;
                      ?>
                      <td>{{$no}}</td>
                      <td>{{$value->branchdetail}}</td>
                      <td>{{$value->tanggal}}</td>
                      <td>{{$value->line}}</td>
                      <td>{{$value->style}}</td>
                      <td>{{$value->total_operator}}</td>
                      <td>{{($value->waktu_smv)/60}}</td>
                      <td>
                        <button type="button" class="btn wp-btn-done mr-2" data-toggle="modal" data-target="#edit{{$value->id}}">Edit
                          <i class="fas fa-edit"></i>
                        </button>
                      </td>

                      <div class="modal fade" id="edit{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width:380px" role="document">
                            <div class="modal-content" style="border-radius:10px">
                                <div class="row">
                                    <div class="col-12 py-3 px-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="wp-modal-title">Edit Jumlah Hadir Operator </div>
                                    </div>
                                </div>
                                <form name="form" action="{{route('op.hadir.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row px-4 py-3">
              
                                      <div class="col-12 mt-3">
                                          <span class="title-sm">Tanggal</span>
                                          <input type="date" class="form-control border-input-10" id="tanggal" name="tanggal" value="{{$value->tanggal}}" readonly>
                                      </div>
                                      <div class="col-12 mt-3">
                                          <span class="title-sm">Line</span>
                                          <input type="text" class="form-control border-input-10" id="line" name="line" value="{{$value->line}}" readonly>
                                      </div>

                                      <div class="col-12 mt-3">
                                          <span class="title-sm">Style</span>
                                          <input type="text" class="form-control border-input-10" id="style" name="style" value="{{$value->style}}" readonly>
                                      </div>

                                      <div class="col-12 mt-3">
                                          <span class="title-sm">Total Oprator</span>
                                          <input type="number" class="form-control border-input-10" id="total_operator" name="total_operator" value="{{$value->total_operator}}" >
                                      </div>
                                      <div class="col-12 mt-3">
                                          <span class="title-sm">Jam Kerja (jam)</span>
                                          <input type="number" step="0.01" class="form-control border-input-10" id="waktu_smv" name="waktu_smv" value="{{($value->waktu_smv)/60}}" >
                                      </div>
                                      <input type="hidden" name="id" value="{{$value->id}}">
                                      <div class="col-12 justify-end mt-4">
                                          <button type="submit" class="btn-blue-md">Save<i class="fs-18 ml-2 fas fa-check"></i></button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div>
                                              
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>Tanggal</th>
                        <th>Line</th>
                        <th>Style</th>
                        <th>Total Oprator</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/sweetalert2.js')}}"></script>

<script>  

  function listLine() {
    $('.listline').select2({
      theme: 'bootstrap4',
      placeholder:'Select Line',
      searchInputPlaceholder: 'search',
      data:<?php echo json_encode($line); ?>

    });
  }
  $('.listline1').select2({
      theme: 'bootstrap4',
      placeholder:'Select Line',
      searchInputPlaceholder: 'search',
      data:<?php echo json_encode($line); ?>

    });
</script>

<script>
  jQuery(document).ready(function($) {
    $('#filter_date').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    $("#filter_date").on("change.datetimepicker", ({date}) => {
      console.log(filter_count)

      if (filter_count > 0) {
        var date = $("#filter_date").find("input").val();
        location.replace("{{ url('/prd/operator-performance/progres-output/hadir-') }}"+date) 
      }
      filter_count++
    })
    var tanggal = $("#tanggal").val();
    $('.input-date-fa').val(tanggal )
  });

  jQuery(document).ready(function($) {
    $('#filter_date2').datetimepicker({
      format: 'Y-MM-DD',
      showButtonPanel: true
    })
    var filter_count = 0;
    $("#filter_date2").on("change.datetimepicker", ({date}) => {
      console.log(filter_count)
      if (filter_count > 0) {
        var date = $("#filter_date2").find("input").val();
        location.replace("{{ url('/prd/operator-performance/progres-output/op-hadir-') }}"+date) 
      }
      filter_count++
    })
    var tanggal2 = $("#tanggal2").val();
    $('.input-date-fa2').val(tanggal2 )
  });
</script>

<script>
    function search_style(elem) {
    var line=$(elem).val();
    console.log(line);
    if (line!==''||line!=='undefined') {
      var tanggal = $("#tanggal").val();
      var data=get_style(line,tanggal);
      if (!jQuery.isEmptyObject(data)) {
        $(".lineStyle").append('');
        const parentopt = elem.parentElement.parentElement.parentElement.children[1].children[1].children[1];
            parentopt.innerHTML = '';
        $.each(data,function(line2,style){
            $(elem).closest('.lineStyle').find('select.style').append('<option value="'+style+'">'+style+'</option>');
            const node = document.createElement("option");
            const textnode = document.createTextNode(style);
            node.appendChild(textnode);
            parentopt.appendChild(node);    
            });
      } 
      else {
           $(".lineStyle").empty();
      }
    }
    else{
      $(".lineStyle").append('');
    }
  }

  function get_style(line,tanggal) {
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    var return_first = function () {
        var lbr = 0;
                $.ajax({
                    async: false,
                    data: {
                      line: line,
                      tanggal :tanggal,
                    },
                    
                    url: '{{ route("op.hadir.style") }}',
                    type: 'POST',
                    
                    success:function(response){   
                      lbr = response;
                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Style tidak ada';
                            desc = 'Periksa sambungan koneksi anda'
                        } else if (jqXHR.status == 404) {
                            msg = 'Style tidak ada';
                            desc = 'Style tidak ada'
                        } else if (jqXHR.status == 500) {
                            msg = 'Style tidak ada';
                            desc = 'Style tidak ada'
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'WAKTU HABIS';
                            desc = 'Sistem tidak merespon '
                        } else if (exception === 'abort') {
                            msg = 'PENCARIAN NIK DIBATALKAN';
                            desc = 'Silahkan tulis ulang no NIK';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: msg,
                            text: desc
                          })
                    },
                });
                // console.log(lbr);
        return lbr;
    }(); 
    return return_first;
  }
</script>

<script>
  $(document).on('click', '#removeline', function () {
    $(this).closest('#inputline').remove();
  });

  $("#addline").click(function () {
    var html = '';
    html += '<div class="row" id="inputline">';
    html += '<div class="col-md-3">';
    html += '<div class="title-sm"></div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += '<div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fs-18 fas fa-sitemap"></i></span>';
    html += '</div>';
    html += '<select class="form-control border-input-10 listline" id="" name="line[]" style="cursor:pointer" onchange="search_style(this);" required >';
    html += '<option value="" selected >Select Line</option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-3 ">';
    html += '<div class="title-sm"></div>';
    html += '<div class="input-group flex mt-1 mb-3">';
    html += ' <div class="input-group-prepend">';
    html += '<span class="inputGroupBlue" style="width:50px"><i class="fas fa-briefcase"></i></span>';
    html += '</div>';
    html += '<select class="form-control border-input-10 lineStyle" name="style[]" id="style" required >';
    html += '<option selected></option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-3">';
    html += '<div class="title-sm"></div>';
    html += '<div class="mt-1 mb-3">';
    html += '<input type="number" class="form-control border-input-10" id="" name="total_op[]" style="height:38px" placeholder="masukan jumlah oprator yang hadir" required>';
    html += '</div>';
    html += '</div>';

    html += '<div class="col-md-2">';
    html += '<div class="title-sm"></div>';
    html += '<div class="mt-1 mb-3">';
    html += '<input type="number" step="0.01" class="form-control border-input-10" id="" name="waktu_smv[]" value="8" style="height:38px" placeholder="masukan jumlah oprator yang hadir" required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-1">';
    html += '<button id="removeline" type="button" class="btn-delete-row ml-2"><i class="fs-20 fas fa-times"></i></button>';
    html += '</div>';
    html += '</div>';

    $('#newLine').append(html);
    listLine();
  });
</script>

<script>
    $(function () {
    $("#DTtable").DataTable({
      dom: 'Brtp',
      "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable tfoot th').each( function () {
        var title = $('#DTtable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
</script>

@endpush