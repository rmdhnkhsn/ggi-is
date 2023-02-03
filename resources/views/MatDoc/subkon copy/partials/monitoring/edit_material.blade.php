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
      <!-- <div class="cards bg-card p-4"> -->
        <form  action="{{route('subkon.update.material')}}" id="myFormEdit261" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row px-4">
            <div class="col-md-6">
                <span class="general-identity-title">HS CODE</span>
                <div class="input-group my-2">
                    <input type="hidden" class="form-control border-input" name="id" id="id" value="{{$data->id}}" readonly>
                    <input type="hidden" class="form-control border-input" name="id_no_kontrak" id="id_no_kontrak" value="{{$data->id_no_kontrak}}" readonly>
                    <input type="text" class="form-control border-input" id="hs_code" name="hs_code" value="{{$data->hs_code}}" placeholder="Masukan Nomor HS CODE..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">ITEM NUMBER</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" name="item_number" id="item_number" value="{{$data->item_number}}" placeholder="Masukan Item No..." readonly >
                </div>
            </div>  
            <div class="col-md-12">
                <span class="general-identity-title">DESCRIPTION</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="deskripsi" name="deskripsi" value="{{$data->deskripsi}}" placeholder="Masukan DESCRIPTION..." readonly>
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">KEBUTUHAN</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="kebutuhan" name="kebutuhan" value="{{$data->kebutuhan}}" placeholder="Masukan KEBUTUHAN..." >
                </div>
            </div>  
            <div class="col-md-6">
                <span class="general-identity-title">SATUAN</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="satuan" name="satuan" value="{{$data->satuan}}" placeholder="Masukan SATUAN..." >
                </div>
            </div>  
            <div class="col-md-6">
                <span class="general-identity-title">CONS</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="consumption" name="consumption" value="{{$data->consumption}}"placeholder="Masukan CONS..." >
                </div>
            </div>  
            <div class="col-md-6">
                <span class="general-identity-title">NW</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="nw" name="nw" value="{{$data->nw}}" placeholder="Masukan NW..." >
                </div>
            </div>  
            <div class="col-md-6">
                <span class="general-identity-title">GW</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="gw" name="gw" value="{{$data->gw}}" placeholder="Masukan Nomor GW..." >
                </div>
            </div>  
            <div class="col-md-6">
                <span class="general-identity-title">JENIS DOK</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="doc_type" name="doc_type" value="{{$data->doc_type}}" placeholder="Masukan JENIS DOK..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">BC NUMBER</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="bc_number" name="bc_number" value="{{$data->bc_number}}" placeholder="Masukan BC NUMBER..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">DOC DATE</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="doc_date" name="doc_date" value="{{$data->doc_date}}" placeholder="Masukan DOC DATE..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">POS</span>
                <div class="input-group my-2">
                    <input type="text" class="form-control border-input" id="pos" name="pos" value="{{$data->pos}}" placeholder="Masukan POS..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">HARGA US</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="us_price" name="us_price" value="{{$data->us_price}}" placeholder="Masukan HARGA US..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">HARGA IDR</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="idr_price" name="idr_price" value="{{$data->idr_price}}" placeholder="Masukan HARGA IDR..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">TOTAL HARGA US</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="us" name="us" value="{{$data->us}}" placeholder="Masukan TOTAL HARGA US..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">TOTAL HARGA IDR</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="idr" name="idr" value="{{$data->idr}}" placeholder="Masukan TOTAL HARGA IDR..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">PERSENTASE (%)</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="persen" name="persen" value="{{$data->persen}}" placeholder="Masukan PERSENTASE (%)..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">BM</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="bm" name="bm" value="{{$data->bm}}" placeholder="Masukan BM..." >
                </div>
            </div> 
            <div class="col-md-6">
                <span class="general-identity-title">BPT/KG</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="bpt" name="bpt" value="{{$data->bpt}}" placeholder="Masukan BPT/KG..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">BMT</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="btm" name="btm" value="{{$data->btm}}" placeholder="Masukan BMT..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">PPN</span>
                <div class="input-group my-2">
                    <input type="number"  step="0.01" class="form-control border-input" id="ppn" name="ppn" value="{{$data->ppn}}" placeholder="Masukan PPN..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">PPH</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="pph" name="pph" value="{{$data->pph}}" placeholder="Masukan PPH..." >
                </div>
            </div>
            <div class="col-md-6">
                <span class="general-identity-title">TOTAL</span>
                <div class="input-group my-2">
                    <input type="number" step="0.01" class="form-control border-input" id="total" name="total" value="{{$data->total}}" placeholder="Masukan TOTAL..." >
                </div>
            </div>
            <div class="col-12">
              <button type="button" class="btn-blue btn-block update261">Update</button>
            </div>
          </div>
          
        </form>
        <div class="row p-4">
          <div class="col-12">
            <a class="btn-red delete261" href="{{route('subkon.delete.material',$data->id)}}">Hapus</a>
          </div>
        </div>
      <!-- </div> -->
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
  $('.delete261').on('click', function (event) {
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
  $('.update261').on('click', function (event) {
    // alert('test')
    event.preventDefault();
    // const url = $(this).attr('href');
    const form = document.getElementById('myFormEdit261');
    const item_number = document.getElementById('item_number').value;
    // console.log(form);

    if( item_number == '' ) {
      Swal.fire({
          icon: 'error',
          title: 'Kode barang tidak boleh kosong',
          text: 'Periksa Kembali',
        })
    } else {
      swal({
          title: 'Are you sure?',
          text: 'update material',
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