@extends("layouts.app")
@section("title","Daily Target Packing List")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row Finishing">
        <div class="col-12">
            <div class="cards" style="padding:26px">
                <div class="row">
                    <div class="col-12 flex" style="gap:1.3rem">
                        <div class="title-22 text-left">Daily Target Packing List</div>
                    </div>
                </div>
                <form action="{{route ('packing.updatePackingListToExpedisi')}}" method="post" enctype="multipart/form-data">
                @csrf  
                    <div class="row">
                        <div class="col-12">
                            <div class="cards-scroll scrollX" id="scroll-bar-sm">
                                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                                <table id="DTtable" class="table table-content no-wrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>PO</th>
                                            <th>OR</th>
                                            <th>WO</th>
                                            <th>Buyer</th>
                                            <th>Style</th>
                                            <th>Qty Size</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataData as $key =>$value)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check1" id="check{{$value['id']}}">
                                                <input type="hidden" id="cek{{$value['id']}}" name="cek[]" >
                                                <input type="hidden" id="id" name="id[]" value="{{ $value['id'] }}">
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value['tanggal2'] }}</td>
                                            <td>{{ $value['po'] }}</td>
                                            <td>{{ $value['or_number'] }}</td>
                                            <td>{{ $value['wo'] }}</td>
                                            <td>{{ $value['buyer'] }}</td>
                                            <td>{{ $value['style'] }}</td>
                                            <td>{{ $value['qty2'] }}</td>
                                            <td>
                                                <form action="{{route ('packing.updateApprovePackingList', $value['id']) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="flex" style="gap:.3rem;margin:-6px 0">
                                                        <a href="{{route('data-details', $value['id'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                                        <a href="{{route('packing-edit',$value['id'])}}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{route('packing.deletePackingList',$value['id'])}}" class="btn-simple-delete deleteFile"><i class="fas fa-trash"></i></a>
                                                        {{-- <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                                        <input type="hidden" id="action" name="action" value="APPROVE">
                                                        <button type="submit" class="btn-simple-check"><i class="fs-20 fas fa-check"></i></button> --}}
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <script>
                                            $(document).on('click', '#check{{$value['id']}}', function(){
                                                var status = document.getElementById('check{{ $value['id'] }}').value;
                                                if(document.getElementById('check{{ $value['id'] }}').checked){
                                                var result = '1';
                                                document.getElementById('cek{{$value['id'] }}').value = result;
                                                }
                                                else{
                                                var result = null; 
                                                document.getElementById('cek{{ $value['id'] }}').value = result;
                                                }    
                                                
                                            }); 
                                        </script>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex mt-3">  
                                <input type="hidden" id="packing_to_expedisi" name="packing_to_expedisi" value="DONE">           
                                <button name="archive" type="submit" onclick="archiveFunction()" class="btn-green-md" style="width:150px">Approve</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12">
            <ul class="nav nav-tabs rc-tabs mb-4" role="tablist">
              <li class="nav-item-show justify-center">
                <a class="nav-link py-2 active" data-toggle="tab" href="#proses" role="tab"></i>Packing List To Expeditions
                    <span class="number-badge">{{ $jumlahData }}</span>
                </a>
                <div class="rc-slide"></div>
              </li>
              <li class="nav-item-show justify-center">
                <a class="nav-link py-2" data-toggle="tab" href="#ganti" role="tab"></i>Resume Packing List<br/> To Expedition
                    <span class="number-badge">{{ $jumlahEkspedisi }} </span>
                </a>
                <div class="rc-slide"></div>
              </li>
            </ul>
            <div class="tab-content card-block">
              <div class="tab-pane active" id="proses" role="tabpanel">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="cards" style="padding:26px">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="title-22 text-left">Daftar PL TO ekspedisi</div>
                                </div>
                                <div class="col-12">
                                    <div class="cards-scroll scrollX pb-5" id="scroll-bar-sm"> 
                                        <table id="DTtable2" class="table table-content no-wrap">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>ID Expedition</th>
                                                <th>PO</th>
                                                <th>OR</th>
                                                <th>WO</th>
                                                <th>Buyer</th>
                                                <th>Style</th>
                                                <th>Qty Size</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($dataDataDone as $key =>$value)    
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value['tanggal2'] }}</td>
                                                    <td>{{ $value['id_ekspedisi'] }}</td>
                                                    <td>{{ $value['po'] }}</td>
                                                    <td>{{ $value['or_number'] }}</td>
                                                    <td>{{ $value['wo'] }}</td>
                                                    <td>{{ $value['buyer'] }}</td>
                                                    <td>{{ $value['style'] }}</td>
                                                    <td>{{ $value['qty2'] }}</td>
                                                    <td>
                                                        {{-- <form action="{{route ('packing.updateApprovePackingList', $value['id']) }}" method="post" enctype="multipart/form-data">
                                                        @csrf --}}
                                                            <div class="flex" style="gap:.35rem;margin:-6px 0">
                                                                <a href="{{route('data-details', $value['id'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                                                {{-- <a href="{{route('packing-edit',$value['id'])}}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a>
                                                                <a href="{{route('packing.deletePackingList',$value['id'])}}" class="btn-simple-delete delete"><i class="fas fa-trash"></i></a> --}}
                                                                {{-- <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                                                <input type="hidden" id="action" name="action" value="APPROVE">
                                                                <button type="submit" class="btn-simple-check"><i class="fs-20 fas fa-check"></i></button> --}}
                                                            </div>
                                                        {{-- </form> --}}
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
              <div class="tab-pane" id="ganti" role="tabpanel">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="cards" style="padding:26px">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="title-22 text-left">Data Resume PL To Ekspedisi</div>
                                </div>
                                <div class="col-12">
                                    <div class="cards-scroll scrollX pb-5" id="scroll-bar-sm">
                                        <table id="DTtable3" class="table table-content no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tanggal</th>
                                                    <th>ID EKSPEDISI</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataIdekspedisi as $key =>$value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value['tanggal'] }}</td>
                                                    <td>{{ $value['id_ekspedisi'] }}</td>
                                                    <td>
                                                        <div class="flex" style="gap:.35rem;margin:-6px 0">
                                                            <a href="{{route('data-Ekspedisi', $value['id_ekspedisi'])}}"  class="btn-merah">Download<i class="ml-2 fas fa-file-pdf"></i></a>
                                                            <a href="{{ route('finishing.dataEkspedisiExcel',$value['id_ekspedisi']) }}" class="btn-green">Download<i class="ml-2 fas fa-file-excel"></i></a>
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
        </div>
    </div>
  </div>
</section>


@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
    // scrollX : '100%',
    "pageLength": 15,
    "dom": '<"search"><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

{{-- <script>
  $('.delete').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script> --}}

<script>
  $('.delete').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be to Expedition!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.reload(true)
        }
    });
  });
</script>

<script>
  $('.approve').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be to Expedition!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.reload(true)
        }
    });
  });
</script>


<script>
  function archiveFunction() {
  event.preventDefault(); // prevent form submit
  var form = event.target.form; // storing the form
    swal({
      title: "Apakah Anda Yakin?",
      text: "Ini akan Membuat Data Packing List Berpindah ke Ekspedisi !",
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
      form.submit();          // submitting the form when user press yes
    } else {
      swal("Cancelled", "File imajiner Anda aman :)", "error");
    }
  });
}
</script>
{{-- <script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script> --}}

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




@endpush