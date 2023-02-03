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
            <form action="{{route('store.qty.partial')}}" id="myForm" method="post" enctype="multipart/form-data">
              @csrf
              @foreach($daftar_wo as $k => $v)
              <div class="accordionItems">
                <header class="accordionHeaders">
                  <div class="woNumber">
                    <div class="title-12-grey">WO Number</div>
                    <div class="sub-title-14 fw-500">{{$v['wo']}}</div>
                  </div>
                  <div class="totalQty">
                    <div class="title-12-grey">Total Qty Partial</div>
                    <div class="sub-title-14 fw-500 totalQtyPartial">0</div>
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
                                <th>GLPT</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no=0;?>
                              @foreach($v['item_garment'] as $key=>$value)
                              @if($value['gl_pt']=='INMK')
                                @if(in_array($value['kode_barang'], $v['item_inmk']))
                                <?php
                                $no++;
                                ?>
                                  <tr>
                                    <td class="key">{{$no}}</td>
                                    <td class="kodeBarang">{{$value['kode_barang']}}</td>
                                    <td class="namaBarang">{{$value['nama_barang']}}</td>
                                    <td>
                                      <!-- <input type="number" class="form-control borderInput w-120 calculation " onchange="jumlahSisa(this)" onkeyup="jumlahSisa(this)" id=""  name="qty_partial[]" placeholder="Input Qty"> -->
                                      <input type="number" class="form-control borderInput w-120 calculation" name="qty_partial[]" placeholder="Input Qty">
                                      <input type="hidden" class="form-control borderInput w-120" value="{{$value['tersisa']}}">
                                      
                                      <input type="hidden" id="" name="id_barangjadi[]" value="{{$value['id']}}">
                                      <input type="hidden" id="" name="kode_barang[]" value="{{$value['kode_barang']}}">
                                      <input type="hidden" id="" name="no_wo[]" value="{{$v['wo']}}">
                                      <input type="hidden" id="" name="no_kontrak" value="{{$value['id_no_kontrak']}}">
                                      <input type="hidden" id="" name="branch" value="{{$branch}}">

                                    </td>
                                    <td>{{$value['satuan']}}</td>
                                    <td class="QtySisaKontrak" >{{$value['tersisa']}}</td>
                                    <td>{{$value['gl_pt']}}</td>
                                  </tr>
                                @endif
                              @else
                              <?php
                                $no++;
                                ?>
                              <tr>
                                <td class="key">{{$no}}</td>
                                <td class="kodeBarang">{{$value['kode_barang']}}</td>
                                <td class="namaBarang">{{$value['nama_barang']}}</td>
                                <td>
                                  <!-- <input type="number" class="form-control borderInput w-120 calculation " onchange="jumlahSisa(this)" onkeyup="jumlahSisa(this)" id=""  name="qty_partial[]" placeholder="Input Qty"> -->
                                  <input type="number" class="form-control borderInput w-120 calculation" name="qty_partial[]" placeholder="Input Qty">
                                  <input type="hidden" class="form-control borderInput w-120" value="{{$value['tersisa']}}">
                                  
                                  <input type="hidden" id="" name="id_barangjadi[]" value="{{$value['id']}}">
                                  <input type="hidden" id="" name="kode_barang[]" value="{{$value['kode_barang']}}">
                                  <input type="hidden" id="" name="no_wo[]" value="{{$v['wo']}}">
                                  <input type="hidden" id="" name="no_kontrak" value="{{$value['id_no_kontrak']}}">

                                </td>
                                <td>{{$value['satuan']}}</td>
                                <td class="QtySisaKontrak" >{{$value['tersisa']}}</td>
                                <td>{{$value['gl_pt']}}</td>
                              </tr>
                              @endif
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
                    <input type="date" class="form-control borderInput" name="tanggal" id="tanggal" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="title-sm">Surat Jalan</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" name="no_surat_jalan" id="no_surat_jalan" placeholder="Masukan surat jalan">
                </div>
                <div class="col-md-4">
                  <div class="title-sm">No Packing List</div>
                  <input type="text" class="form-control borderInput mt-1 mb-3" name="no_packing_list" id="no_packing_list" placeholder="Masukan No PL">
                </div>
              </div>
              <div class="justify-end">
                <div class="flex gap-3">
                  <a href="{{ route('input.partial.index',[$branch,$no_kontrak])}}" class="btnSoftBlue mt-2 w-160">Batalkan</a>
                  <button type="button" class="btn-blue-md mt-2 w-160 " id="saveData">Simpan Data <i class="fs-18 ml-2 fas fa-caret-right"></i></button>
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
 const buffer = <?php echo json_encode($daftar_wo); ?> ; 
 let dataItem = buffer[0].item_garment;
 let qtyTersisa = []; 
 
const woCard = document.getElementsByClassName('accordionItems'); 
Array.from(woCard).forEach((Card, index)=>{
      const inputs = Card.getElementsByClassName('calculation');
      Array.from(inputs).forEach((input)=>{
        input.addEventListener('keyup', function(evt){
          const qtyPartial = evt.target.closest('table').getElementsByClassName('calculation')
          total = 0;
          Array.from(qtyPartial).forEach(function(qty){
            if(qty.value != '') {
              total += parseInt(qty.value)
            }
          })
          const accordionElement = document.getElementsByClassName('accordionItems'); 
          accordionElement[index].getElementsByClassName('totalQtyPartial')[0].innerHTML = total
          const inputQty = Card.getElementsByClassName('calculation')

          // Hitung sisa qty dari kontrak 
          // let dataInputan = getDataPartialInput()
          // let sisaQty = dataItem.map((data)=> data.tersisa)
          // let hasil = sisaQty.map((data, index)=> data - dataInputan[index] )

          // Assign hasil to global variable
          // qtyTersisa = hasil

          // Update kolom sisa pada tabel 
          // const woCard2 = document.getElementsByClassName('accordionItems'); 
          // Array.from(woCard2).forEach((card)=>{
          //   const sisa = card.getElementsByClassName('QtySisaKontrak')
          //   Array.from(sisa).forEach((s, index)=>{
          //     s.textContent = hasil[index]
          //     parseInt(s.textContent) < '0' ?  s.style.color = 'red'  :  s.style.color = '#2b2b2b'
          //   })
          // })
        })
      })
})

  const getDataPartialInput = ()=> {
    const woCard2 = document.getElementsByClassName('accordionItems'); 
    let allData = []
    total = 0 
    dataItem.map((items, index)=>{
      total = 0
      Array.from(woCard).forEach(function(card){
        // hitung total qty partial tiap item 
        const inputPartial = card.getElementsByClassName('calculation')
        if(inputPartial[index].value != '') {
          total += parseInt(inputPartial[index].value)
        }
      })
      allData.push(total)
    })
    return allData
  }
</script>

<script>
   const save = document.getElementById('saveData');
    save.addEventListener('click', function() {

      let checking = qtyTersisa.find( (qty)=> qty < 0  )
      let tanggal=document.getElementById('tanggal').value;
      let no_surat_jalan=document.getElementById('no_surat_jalan').value;
      let no_packing_list=document.getElementById('no_packing_list').value;

      if(!checking && tanggal!='' && no_surat_jalan!=''&& no_packing_list!='') {
        document.getElementById('myForm').submit();
        // Lakukan Submit disini..
      }else if(tanggal=='' || no_surat_jalan=='' || no_packing_list==''){
        swal({
          type: 'error',
          title: 'Tanggal, SJ, No Packing list Tidak boleh kosong',
          text: 'Periksa Kembali, Terdapat Kolom Yang kosong',
        })
      }
       else {
        swal({
          type: 'error',
          title: 'Quantity Melebihi Kontrak',
          text: 'Periksa Kembali, Terdapat Kolom Yang Minus',
        })
      }
    })
</script>

<!-- <script>
  $('.saveData').on('click', function (event) {
    swal({
      type: 'success',
      title: 'Berhasil Disimpan',
      text: 'Data partial berhasil ditambahkan',
      buttons: false,
      timer: 1500
    })
  });
</script> -->
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