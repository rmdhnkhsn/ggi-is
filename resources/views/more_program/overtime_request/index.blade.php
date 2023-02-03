@extends("layouts.app")
@section("title","Overtime Request")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards p-4">
            <div class="row">
                <div class="col-12">
                    <div class="joblist-date">
                        <div class="flexApprove">
                            <div class="title-22 mr-3">Form List</div>
                            @if($admin_overtime>=1 || $staff == 'STAFF')
                            <a href="{{ route('create-request') }}" class="btn-blue">Create Request<i class="ml-2 fs-20 fas fa-plus"></i></a>
                            @else
                            <button class="btn-blue" id="alowed">Create Request<i class="ml-2 fs-20 fas fa-plus"></i></button>
                            @endif
                            @if(($list>=1) || ($list_prod>=1) || ($list_branch>=1) || auth()->user()->nik == '332100245' || auth()->user()->nik == '330889' || auth()->user()->nik == 'GISCA' 
                            || auth()->user()->nik == '931132' || auth()->user()->jabatan == 'KABAG' || auth()->user()->role == 'SYS_ADMIN')
                            <a href="{{ route('cc.approval') }}" class="btn-green mt-res">Request List<i class="ml-2 fas fa-copy"></i></a>
                            @endif
                        </div>
                        <div class="approval-flex">
                          <div class="title-14 title-hide">Filter</div>
                          <div class="title-14 title-hide mx-2">:</div>
                          <div class="input-group date" id="report_date" data-target-input="nearest">
                            <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                <div class="inputGroupBlue"><i class="fas fa-calendar-alt mr-2 fs-18"></i><i class="fas fa-caret-down"></i></div>
                              </div>
                              <input type="text" class="form-control datetimepicker-input borderInput w-130" data-target="#report_date" placeholder="Select Date"/>
                          </div>
                        </div>
                        <input type="hidden" id="month" type="text" value="{{$nama_bulan}}" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="cards-scroll mb-5 scrollX" id="scroll-bar">
                        <button id="btnSearch"><i class="fas fa-search"></i></button>  
                        <table id="DTtable" class="table tbl-content no-wrap py-2">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>DATE</th>
                                    <th>BUYER</th>
                                    <th>WO/PO</th>
                                    <th>ITEM/ALASAN</th>
                                    <th>LIST NAME</th>
                                    <th>STATUS</th>
                                    <th>REQUEST ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0;?>
                                @foreach($data as $key=>$value)
                                <?php $no++;?>

                                <tr class="clickable-row" data-href="{{ route('edit.request',$value['id'])}}">
                                    <td>{{$no}}</td>
                                    <td>{{$value['tanggal']}}</td>
                                    <td>{{$value['buyer']}}</td>
                                    <td>{{$value['wo']}}</td>
                                    <td>
                                        <div class="text-truncate" style="max-width:400px">
                                            {{$value['item']}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tbl-list-name text-truncate">
                                        {{$value['list_name']}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="justify-start container-tbl-btn-sm">
                                            @if($value['status_lembur']=='Waiting')
                                            <div class="badge-orange-md">Waiting</div>
                                            @elseif ($value['status_lembur']=='Approve 1')
                                            <div class="badge-green-md">Approve 1</div>
                                            @elseif ($value['status_lembur']=='Approve 2')
                                            <div class="badge-green-md">Approve 2</div>
                                            @elseif ($value['status_lembur']=='Reject 1')
                                            <div class="badge-red-md">Reject 1</div>
                                            @elseif ($value['status_lembur']=='Reject 2')
                                            <div class="badge-red-md">Reject 2</div>
                                            @elseif ($value['status_lembur']=='Done')
                                            <div class="badge-blue-md">Done</div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$value['id']}}</td>
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
</section>
@endsection

@push("scripts")

<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });

    const alowed = document.getElementById('alowed');
    alowed.addEventListener('click', function() {
      // console.log(alowed);
      Swal.fire({
        icon: 'error',
        title: 'Akses Ditolak',
        text: 'Anda tidak memiliki izinkan untuk membuat form lembur',
        showConfirmButton: false,
      })

    })

  });
  
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
      if (filter_count > 0) {
        var month = $("#report_date").find("input").val();
        location.replace("{{ url('mrp/overtime-request/-') }}"+month) 
      }
      filter_count++
    })
    var month = $("#month").val();
    $('.borderInput').val(month)
  });
</script>

<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>

@if(Session::has('success'))
  <script>
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

@endpush