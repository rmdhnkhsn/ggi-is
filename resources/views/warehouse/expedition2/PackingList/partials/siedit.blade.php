@extends("layouts.app")
@section("title","Edit Packing List")
@push("styles")
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section("content")
<style>
  ::placeholder {
    color: #fff;
  }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row Finishing"> 
            <div class="col-12">
                <div class="cards" style="padding:26px">
                    <div class="row">
                        <div class="col-12 flexx gap-6">
                            <div class="title-20 title-none">Detail Packing List</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 pb-5">
                            <button id="btnSearch"><i class="fas fa-search"></i></button>  
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable" class="table tbl-content-left">
                                    <thead>
                                        <tr>
                                            <th>ID</th>    
                                            <th>Tanggal</th>
                                            <th>Buyer</th>
                                            <th>Branch</th>
                                            <th>Placement</th>
                                            <th>No surat Jalan</th>
                                            <th>Container Number</th>
                                            <th>Seal No</th>
                                            <th>Jenis Dokumen</th>
                                            <th>No Dokumen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datasurat as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value['tanggal_surat'] }}</td>
                                            <td>{{ $value['buyer'] }}</td>
                                            <td>{{ $value['branch'] }} ({{$value['branchdetail']}})</td>
                                            <td>{{ $value['tujuan'] }}</td>
                                            <td>{{ $value['no_surat_jalan'] }}</td>
                                            <td>{{ $value['no_kontainer'] }}</td>
                                            <td>{{ $value['no_seal'] }}</td>
                                            <td>{{ $value['jenis_doct'] }}</td>
                                            <td>{{ $value['no_doct'] }}</td>    
                                            <td>
                                                <div class="flex" style="gap:.35rem;margin:-6px 0">
                                                    @if(auth()->user()->departemensubsub != 'EXIM')
                                                    <a href="{{ route('packinglist.siedit',$value['kode_ekspedisi']) }}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
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
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('/js/packing_list/scriptEdit.js')}}"></script>

<script>
    $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>
@endpush