@extends("layouts.app")
@section("title","Turn Over")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row turnOver pb-5">
        <div class="col-12">
            <div class="cards p-4">
                <div class="row">
                    <div class="col-12 display mb-4">
                        <div class="title-28 titleNone">Data Turn Over</div>
                        <div class="filterSearch">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-icon" style="border-radius:10px 0 0 10px" for=""><i class="fas fa-filter"></i></span>
                                </div>
                                <select class="form-control border-input-grey select2bs4 status-dropdown" id="table-filter" name="status_pengajuan" style="cursor:pointer" required>
                                    <option selected disabled>Filter Data</option>
                                    <option value="">All Status</option>   
                                    <option name="Approved">Approved</option>    
                                    <option name="Cancel">Cancel</option>    
                                    <option name="Pending">Pending</option>    
                                </select>
                            </div>
                            <div class="container-form">
                                <input type="text" id="SearchText" class="searchText" placeholder="Search..." required>
                                <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                            <table id="DTtable" class="table tbl-content-left">
                                <thead>
                                    <tr>
                                        <th><div class="mb-2">NIK</div></th> 
                                        <th><div class="mb-2" style="min-width:200px">Nama</div></th>
                                        <th><div class="mb-2">Branch</div></th>
                                        <th><div class="mb-2">Department</div></th>
                                        <th>Tanggal <div>Mengajukan</div> </th>
                                        <th>Tanggal <div>Keluar</div> </th>
                                        <th>Status <div>Pengajuan</div> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key =>$value)
                                        <tr data-toggle="modal" data-target="#detail{{ $value['ess_id'] }}" class="detailHover">
                                            <td>{{ $value['nikoriginator'] }}</td>
                                            <td>{{ $value['nama_karyawan'] }}</td>
                                            <td>{{ $value['branch_group'] }}</td>
                                            <td>{{ $value['bagian'] }}</td>
                                            <td class="no-wrap">{{ $value['tglinput'] }}</td>
                                                
                                            <td class="no-wrap">{{ $value['tglrequest'] }} 
                                                @include('hr_ga.turn_over.modal')
                                            </td>
                                            <td>
                                                @if (($value['status_pengajuan'] == 'approved'))
                                                <div class="badge-green" style="width:100px">Approved</div>
                                                @elseif(($value['status_pengajuan'] == 'pending'))
                                                <div class="badge-yellow" style="width:100px">Pending</div>
                                                @elseif($value['status_pengajuan'] =='cancel')
                                                <div class="badge-pink" style="width:100px">Cancel</div>
                                                @endif
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
</section>
@endsection

@push("scripts")


<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    "pageLength": 15,
    // "dom": '<"search"><"top">rt<"bottom"p><"clear">',
     order: [[4, 'desc']],
     dom: 'Brtp',
        buttons: [
            'excel', 'pdf', 'print'
        ],
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
      
    });
    $('#table-filter').on('change', function(){
       table.search(this.value).draw();   
    });
  });
  var input = document.getElementById("SearchText");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("SearchBtn").click();
    }
  });

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

</script>
@endpush