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
            <form action="{{route ('packing.UpdateInvoice',$collectionData['kode_ekspedisi']) }}" method="post" enctype="multipart/form-data">
                @csrf  
                <div class="col-12">
                    <div class="flat-card" style="padding:18px 20px">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="title-20 text-left">Details</div>
                            </div>
                            <div class="col-md-3">
                                <div class="title-sm">No Surat Jalan</div>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan" value="{{ $collectionData['no_surat_jalan'] }}" placeholder="masukan nomor invoice...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="title-sm text-white">x </div>
                                <div class="input-group mb-3 mt-1">
                                    <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan2" value="{{ $collectionData['no_surat_jalan2'] }}" placeholder="masukan nomor invoice...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Tanggal</div>
                                <div class="input-group flex mt-1 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="height:40px;width:55px;border-radius:8px 0 0 8px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control border-input-10" name="tanggal_surat" id="" value="{{ $collectionData['tanggal_surat'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-sm">Invoice No</div>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="" name="invoice" value="{{ $collectionData['invoice'] }}" placeholder="Invoice no...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="title-sm">Seal No</div>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="" name="no_seal" value="{{ $collectionData['no_seal'] }}" placeholder="seal no...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="title-sm text-white">x </div>
                                <div class="input-group mb-3 mt-1">
                                    <input type="text" class="form-control border-input-10" id="" name="no_seal2" value="{{ $collectionData['no_seal2'] }}" placeholder="seal no...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="title-sm">Container No</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="" name="no_kontainer" value="{{ $collectionData['no_kontainer'] }}" placeholder="container no...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="title-sm text-white">x </div>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="" name="no_kontainer2" value="{{ $collectionData['no_kontainer2'] }}" placeholder="container no...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="title-sm">Jenis Document</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="" name="jenis_doct" value="{{ $collectionData['jenis_doct'] }}" placeholder="Jenis Document...">
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="title-sm">No Document</span>
                                <div class="input-group mt-1 mb-3">
                                    <input type="text" class="form-control border-input-10" id="" name="no_doct" value="{{ $collectionData['no_doct'] }}" placeholder="No Document...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="cards" style="padding:26px">
                        <div class="row">
                            <div class="col-12 flexx gap-6">
                                <div class="title-20 title-none">Detail Packing List to Ekspedisi</div>
                                <a href="" class="btn-blue-md" data-toggle="modal" data-target="#addwo">ADD DATA <i class="ml-2 fs-18 fas fa-plus"></i></a>
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
                                                <th>PO</th>
                                                <th>OR</th>
                                                <th>WO</th>
                                                <th>Buyer</th>
                                                <th>Style</th>
                                                <th>Qty Size</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datasurat as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value['tanggal'] }}</td>
                                                <td>{{ $value['po'] }}</td>
                                                <td>{{$value['or_number'] }}</td>
                                                <td>{{ $value['wo'] }}</td>
                                                <td>{{ $value['buyer'] }}</td>
                                                <td>{{ $value['style'] }}</td>
                                                <td>{{ $value['qty2'] }}</td>
                                            </tr>
                                            @endforeach   
                                        </tbody>
                                    </table>
                                </div>
                                <div class="justify-start" style="position:absolute;bottom:0">
                                <button type="submit" class="btn-blue-md">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form  action="{{route('packinglist.addWo')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="addwo" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
                        <div class="modal-content p-4" style="border-radius:10px">
                            <div class="row">
                                <div class="col-12 justify-sb">
                                    <div class="title-20">Tambah Wo ke Ekspedisi</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <div class="borderlight"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="title-sm">Input Wo Data</div>
                                    <input type="hidden" name="id_packing" value="{{ $collectionData['id'] }}">
                                    <input type="hidden" name="id_packing_size" value="{{ $collectionData['id'] }}">
                                    <input type="hidden" id="kode_ekspedisi" name="kode_ekspedisi" value="{{ $collectionData['kode_ekspedisi'] }}">
                                    <input type="hidden" id="" name="no_surat_jalan" value="{{ $collectionData['no_surat_jalan'] }}">
                                    <input type="hidden" id="" name="no_surat_jalan2" value="{{ $collectionData['no_surat_jalan2'] }}">
                                    <input type="hidden" id="" name="tanggal_surat" id="" value="{{ $collectionData['tanggal_surat'] }}">
                                    <input type="hidden" id="" name="no_doct" value="{{ $collectionData['no_doct'] }}">
                                    <input type="hidden" id="" name="jenis_doct" value="{{ $collectionData['jenis_doct'] }}">
                                    <input type="hidden" id="" name="no_kontainer2" value="{{ $collectionData['no_kontainer2'] }}">
                                    <input type="hidden" id="" name="no_kontainer" value="{{ $collectionData['no_kontainer'] }}">
                                    <input type="hidden" id="" name="no_seal" value="{{ $collectionData['no_seal'] }}">
                                    <input type="hidden" id="" name="no_seal2" value="{{ $collectionData['no_seal2'] }}">
                                    <input type="hidden" id="" name="invoice" value="{{ $collectionData['invoice'] }}">
                                </div>
                            </div>
                            <div id="newRow"></div>
                            <div class="row">
                                <div class="col-12 justify-start">
                                    <button id="addRow" type="button" class="btn-green-md">Add WO<i class="fs-18 ml-2 fas fa-plus"></i> </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-4 mt-3">
                                    <button type="submit" class="btn-blue-md btn-block">Tambah Wo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('/js/packing_list/scriptEdit.js')}}"></script>

<script>
    var JmlRow = 0;
    var record_id = 1
  $("#addRow").click(function () {
  JmlRow++
  var rand = JmlRow
  record_id =JmlRow
  $("#JmlRow").val(JmlRow)
  var category =` <select class="form-control borderInput select2bs4 pointer" id="id"  data-record_id="`+rand+`" name="id[]" required>
                            <option selected disabled>Select WO</option>
                            @foreach ($datawo as $key =>$value)
                            <option value="{{ $value['id'] }}">{{ $value['wo'] }}-{{ $value['qty'] }}-{{ $value['buyer'] }}</option> 
                            @endforeach  
                        </select>`
    var html = '';
        html +='<div class="row" id="inputFormRowWO">';
        html +='<div class="col-12 flex gap-2">';
        html +='<div class="input-group flex mt-1 mb-2">';
        html +='<div class="input-group-prepend">'; 
        html +='<span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-list-ol"></i></span>';  
        html +='</div>';  
        html +=''+category+'';  
        html +='</div>';  
        html +='<button id="removeRowWO" type="button" class="btn-delete-row3"><i class="fs-20 far fa-times-circle"></i></button>'; 
        html +='</div>';
                     
    $('#newRow').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowWO', function () {
    $(this).closest('#inputFormRowWO').remove();
  });
  $("document").ready(function() {
        $(".btn-green-md").trigger('click');
    });
</script>

<script>
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
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  document.getElementById('save').addEventListener('click', function() {
    swal({
      position: 'center',
      type: 'success',
      title: 'Success',
      text: 'Data Has Been Saved',
      showConfirmButton: false,
      timer: 1500
    })
  });
</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
   $('#id').change(function(){
    var id = $(this).val();
    console.log(id)
    if(id){
        $.ajax({
        data: {
          id: id,
        },
        url: '{{ route("packinglist.getDataWo") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
            console.log(data)
          // $('#id_machine').val(data.id)
          // $('#code').val(data.code)
          // $('#lokasi').val(data.lokasi)
          // $('#serialno').val(data.serialno)
          // $('#price').val(data.price)
          // $('#tipe').val(data.tipe)
          // $('#varian').val(data.varian)
          // $('#merk').val(data.merk)
          // $('#supplier').val(data.coOrigin)
          // $('#kondisi').val(data.kondisi)
        },

      });
    }
  }); 
</script>


@endpush