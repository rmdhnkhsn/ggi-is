@extends("layouts.app")
@section("title","Input QTY Partial")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-md-9 mx-auto">
        <div class="cardPart">
          <div class="cardHead p-3">
            <div class="title-24-blue no-wrap mt-1">MASUKKAN QTY PARTIAL</div>
          </div>
          <div class="section3"></div>
          <div class="cardBody warehouseIR p-3">
            <form action="{{route('update.qty.partial')}}" method="post" enctype="multipart/form-data">
              @csrf

              @foreach($pemasukan as $key => $value)
              <div class="accordionItems">
                <header class="accordionHeaders">
                  <div class="woNumber">
                    <div class="title-12-grey">WO Number</div>
                    <div class="sub-title-14 fw-500">{{$key}}</div>
                  </div>
                  <div class="totalQty">
                    <div class="title-12-grey">Total Qty Partial</div>
                    <div class="sub-title-14 fw-500">{{$value->sum('qty')}}</div>
                  </div>
                  <div class="icons">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </header>
                <div class="accordionContents">
                  <div class="bodyContent">
                    <div class="row">
                      <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                            <thead>
                              <tr class="bg-thead2">
                                <th>NO</th>
                                <th>ITEM CODE</th>
                                <th>JENIS BARANG</th>
                                <th>QUANTITY</th>
                                <th>SATUAN</th>
                                <th>TERSISA</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($value as $key1=>$value1)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value1['kode_barang']}}</td>
                                <td>{{$value1['nama_barang']}}</td>
                                <td>
                                  <input type="text" class="form-control borderInput w-120" id="" name="qty_partial[]" value="{{$value1['qty']}}">
                                  <input type="hidden"  name="id[]" value="{{$value1['id']}}">
                                  <input type="hidden"  name="no_kontrak" value="{{$data_pemasukan->id_no_kontrak}}">

                                </td>
                                <td>{{$value1['satuan']}}</td>
                                <td>{{$value1['tersisa']}}</td>
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
              @endforeach

              <div class="row mt-3">
                <div class="col-md-4">
                  <div class="title-sm">Tanggal Pengiriman :</div>
                  <div class="input-group flex mt-1 mb-3">
                    <div class="input-group-prepend">
                      <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control borderInput" name="tanggal" id="tanggal" value="{{$data_pemasukan->tanggal_sj}}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="title-sm">Surat Jalan</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" name="no_surat_jalan" id="no_surat_jalan" value="{{$data_pemasukan->no_surat_jalan}}"placeholder="Masukan surat jalan">
                </div>
                <div class="col-md-4">
                  <div class="title-sm">No Packing List</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" name="no_packing_list" id="no_packing_list" value="{{$data_pemasukan->no_packing_list}}" placeholder="Masukan No PL">
                </div>
              </div>
              <div class="justify-end">
                <div class="flex gap-3">
                  <a href="{{ route('input.partial.index',[$data_kontrak->branch, $data_pemasukan->id_no_kontrak] )}}" class="btnSoftBlue mt-2 w-160">Batalkan</a>
                  <button type="submit" class="btn-blue-md mt-2 w-160 " id="saveData">Simpan Data <i class="fs-18 ml-2 fas fa-caret-right"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
  $('.saveData').on('click', function (event) {
    swal({
      type: 'success',
      title: 'Berhasil Disimpan',
      text: 'Data partial berhasil ditambahkan',
      buttons: false,
      timer: 1500
    })
  });
</script>
<script>
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =>{
    const accordionHeader = item.querySelector('.accordionHeaders')

    accordionHeader.addEventListener('click', () =>{
      const openItem = document.querySelector('.accordion-open')
      
      toggleItem(item)

      if(openItem && openItem!== item){
          toggleItem(openItem)
      }
    })
  })

  const toggleItem = (item) =>{
    const accordionContent = item.querySelector('.accordionContents')

    if(item.classList.contains('accordion-open')){
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    }else{
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }
</script>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
@endpush