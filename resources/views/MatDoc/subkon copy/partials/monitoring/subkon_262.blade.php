    <div class="row">
        <div class="col-12">
          <div class="flexx" style="gap:.8rem">
          @if($data_kontrak['status_kontrak']!='Close')
          <div class="title-18 mt-1">Input Partial</div>
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT')
            <a href="{{route('subkon.create.pemasukan',$data_kontrak->no_kontrak)}}" class="btn-blue">Pemasukan<i class="ml-2 fas fa-plus"></i></a>
           
            <a href="#" class="btn-blue" data-toggle="modal" data-target="#exampleModal">Tambah Item<i class="ml-2 fas fa-database"></i></i></a>
            @endif
          @endif
          </div>

            <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
                <div class="modal-content" style="border-radius:10px">
                  <div class="row">
                    <div class="col-12 pt-3 px-4">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fas fa-times"></i></span>
                      </button>
                    </div>
                  </div>
                  <form  action="{{route('subkon.insert.return')}}" id="myForm262" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-4">
                      <input type="hidden" name="no_kontrak" value="{{$data_kontrak->no_kontrak}}">
                      <div class="col-12 mb-3">
                        <span class="general-identity-title">Nama Garment</span>
                        <div class="input-group my-2">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" style="border-radius:5px 0 0 5px" for=""><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                            </div>
                            <select class="form-control border-input select2bs_pemasukan" name="nama_barang" id="nama_barang" style="border-radius:10px" required>
                               <option value="">Nama Garment</option>
                                @foreach($item_pjkk as $keya=>$valuea)
                                  <option value="{{$valuea->item_number}}-{{$data_kontrak->no_kontrak}}"> {{$valuea->deskripsi}} [{{$valuea->item_number}}]</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-12 mb-3">
                        <div class="title-sm">Kode Barang</div>
                        <input type="text" class="form-control border-input" id="kdbarang" name="kode_barang" readonly>
                      </div>
                      <div class="col-12 mb-3">
                        <div class="title-sm">Satuan</div>
                        <input type="text" class="form-control border-input" id="satuanReturn" name="satuan" required>
                      </div>
                      <div class="col-12 mb-3">
                        <div class="title-sm">Quantity</div>
                        <input type="text" class="form-control border-input" id="qty" name="qty" required>
                      </div>
                      <div class="col-12 my-3">
                        <button type="button" class="btn-blue btn-block add262">Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    @include('MatDoc.subkon.partials.monitoring.card262')
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4 relative">
          <div class="row">
            <div class="col-12">
              <div class="approval-flex2">
                  <div class="title-22 text-left">Data Barang Masuk</div>
              </div>
            </div>
            <div class="col-12">
              <div class="cards-scroll mb-5 scrollX" id="scroll-bar">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable262" class="table hrd-tbl-content no-wrap" style="width:100%">
                  <thead>
                  <tr>
                      <th colspan="5"></th>
                      @foreach($pemasukan_group as $key1=>$value1)
                      <th class="text-center">{{$value1['no_aju']}}</th>
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
                              $cek_data = $data->where('id_barangjadi',$value3['id'])->where('no_aju',$value4['no_aju'])->count();
                              if ($cek_data != 0) {
                                  $jumlah=$data->where('id_barangjadi',$value3['id'])->where('no_aju',$value4['no_aju'])->sum('qty');
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