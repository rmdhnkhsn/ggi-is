<div class="row">
      <div class="col-12">
        <div class="title-18 text-left">Input Partial</div>
        <div class="flexx mt-2" style="gap:.6rem">
        @if($data_kontrak['status_kontrak']!='Close')
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT'|| auth()->user()->departemensubsub == 'PPIC')
          <div class="w-100">
            <div class="title-sm">No BPB</div>
            <input type="text" class="form-control borderInput mt-1 mb-2" id="" name="" placeholder="Masukkan BPB">
          </div>
          <div class="w-100">
            <div class="title-sm">Tanggal Transaksi :</div>
            <div class="input-group flex mt-1 mb-2">
              <div class="input-group-prepend">
                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control borderInput" id="" name="">
            </div>
          </div>
          <div class="Button">
            <div class="title-sm title-none" style="opacity:0">x</div>
            <a href="{{route('subkon.create.pemasukan',$data_kontrak->no_kontrak)}}" class="btn-blue-md mt-1">Partial<i class="ml-2 fas fa-plus"></i></a>
          </div>
          <div class="Button">
            <div class="title-sm title-none" style="opacity:0">x</div>
            <a href="#" class="btnSoftBlue no-wrap mt-1" data-toggle="modal" data-target="#receiveSJ">Receive SJ Supplier<i class="ml-2 fas fa-plus"></i></i></a>
          </div>
          <div class="Button">
            <div class="title-sm title-none" style="opacity:0">x</div>
            <a href="#" class="btnSoftBlue no-wrap mt-1" data-toggle="modal" data-target="#addItem">Tambah Item<i class="ml-2 fas fa-database"></i></i></a>
          </div>
          @endif
        @endif
        </div>
        @include('MatDoc.subkon.partials.monitoring.modal-262')
      </div>
    </div>
    @include('MatDoc.subkon.partials.monitoring.card262')
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4 relative">
          <div class="row">
            <div class="col-12 justify-sb3">
              <div class="title-22 text-left">Data Barang Masuk</div>
              <div class="flex gap-3">
                <div class="containerSearch">
                  <input type="text" class="form-control borderInput" id="DTtableSearch2" placeholder="Search..."><i class="srch fas fa-search"></i>
                </div>
                <button type="button" class="btn-icon-green exportExcel" onclick="report(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></button>
                <button type="button" class="btn-icon-red exportPdf" onclick="report(this)" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></button>
              </div>
            </div>
            <div class="col-12">
              <div class="cards-scroll mb-5 scrollX" id="scroll-bar">
                <table id="DTtable262" class="table hrd-tbl-content no-wrap" style="width:100%">
                  <thead>
                  <tr>
                      <th colspan="5"></th>
                      @foreach($pemasukan_group as $key1=>$value1)
                      <th class="text-center">{{$value1['no_daftar']}}</th>
                      @endforeach
                      <th colspan="2"></th>
                    </tr>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Jenis Barang</th>
                      <th>Qty Kontrak</th>
                      <th>Satuan</th>
                      @foreach($pemasukan_group as $key2=>$value2)
                      <th>{{$value2['tanggal']}}</th>
                      @endforeach
                      <th>Jumlah Masuk</th>
                      <th>Tersisa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0;?>
                    @foreach($data_barangJadi as $key3=>$value3)
                    <?php $no++;?>
                    @if(($data_kontrak['status_kontrak']!='Close') &&(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT'))
                    <tr class="clickable-row" data-href="{{ route('subkon.edit.barangjadi',$value3['id'])}}">
                    @else
                    <tr>
                    @endif 
  
                      <td>{{$no}}</td>
                      <td>{{$value3['item_number']}} </td>
                      <td>{{$value3['deskripsi']}}</td>
                      <td>{{$value3['qty']}}</td>
                      <td>{{$value3['satua']}}</td>
                      @foreach($pemasukan_group as $key4=>$value4)
                      <?php 
                              $data=collect($data_pemasukan);
                              // dd($value4);
                              $cek_data = $data->where('id_barangjadi',$value3['id'])->where('id_no_aju',$value4['id_no_aju'])->count();
                              if ($cek_data != 0) {
                                  $jumlah=$data->where('id_barangjadi',$value3['id'])->where('id_no_aju',$value4['id_no_aju'])->sum('qty');
                                  $qty=$jumlah;
                              }
                              else{
                                $qty='-';
                              }
                          ?>
                        <td>{{$qty}}</td>
                      @endforeach
                      <td>{{$value3['jumlah_pemasukan']}}</td>
                      <td>{{$value3['sisa']}}</td>
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

  <script>
    $('.exportExcel').click(function(){
      $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
    })

    function report(button) {
      const excel = document.getElementsByClassName('buttons-excel');
      const pdf = document.getElementsByClassName('buttons-pdf');

      if (excel.classList.contains('exportExcel')) {
          tombol[1].click();
      } else if (pdf.classList.contains('exportPdf')) {
          tombol[1].click();
      }
    }
  </script>
    <script>
      const search2 = document.getElementById('DTtableSearch2')
      search2.addEventListener('keyup', function(evt){
        const searchInput2 = document.querySelector('#DTtable262_filter').querySelector('input')
        searchInput2.value = evt.target.value
        let e = document.createEvent('HTMLEvents');
        e.initEvent("keyup",false,true);
        searchInput2.dispatchEvent(e);
      });
    </script>