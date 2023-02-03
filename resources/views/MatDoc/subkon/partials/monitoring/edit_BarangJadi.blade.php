@extends("layouts.app")
@section("title","Subkon")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-subkon2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
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
    <div calss="row">
      <div class="cards bg-card p-4">
        <form  action="{{route('subkon.update.barangjadi')}}" id="myFormEdit262" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row p-4">
            <div class="col-12 mb-3">
              <div class="title-sm">Nama Garment</div>
              <input type="hidden" class="form-control border-input" name="id" id="id" value="{{$data->id}}" readonly>
              <input type="hidden" class="form-control border-input" name="id_no_kontrak" id="id_no_kontrak" value="{{$data->id_no_kontrak}}" readonly>
              <input type="text" class="form-control border-input" name="nama_barang" id="nama_barang" value="{{$data->nama_barang}}" readonly>
            </div>
            <div class="col-12 mb-3">
              <div class="title-sm">Kode Barang</div>
              <input type="text" class="form-control border-input" id="kdbarang" name="kode_barang" value="{{$data->kode_barang}}"  readonly>
            </div>
            <div class="col-12 mb-3">
              <div class="title-sm">Satuan</div>
              <input type="text" class="form-control border-input" id="satuan" name="satuan" value="{{$data->satuan}}" required>
            </div>
            <div class="col-12 mb-3">
              <div class="title-sm">Quantity</div>
              <input type="text" class="form-control border-input" id="qty" name="qty" value="{{$data->qty}}" required>
            </div>
            <div class="col-12 my-3">
              <button type="button" class="btn-blue btn-block add262">Update</button>
            </div>
          </div>
        </form>
        <div class="row p-4">
          <div class="col-12">
            <a class="btn-red delete262" href="{{route('subkon.delete.barangjadi',$data->id)}}">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
  $('.delete262').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    // console.log('ok');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["cancel", "yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>
<script>
  $('.add262').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    const form = document.getElementById('myFormEdit262');
    const kodebarang = document.getElementById('kdbarang').value;
    console.log(url);

    if( kodebarang == '' ) {
      Swal.fire({
          icon: 'error',
          title: 'Kode barang tidak boleh kosong',
          text: 'Periksa Kembali',
        })
    } else {
      swal({
          title: 'Are you sure?',
          text: 'update garment',
          icon: 'warning',
          buttons: ["cancel", "yes"],
      }).then(function(value) {
          if (value) {
            form.submit();
              // window.location.href = url;
          }
      });
    }
  });
</script>
@endpush