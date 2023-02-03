<div class="row">
    <div class="col-12">
        <div class="flexx" style="gap:.8rem">
        @if($data_kontrak['status_kontrak']!='Close')
        <div class="title-18 mt-1">Input Partial</div>

            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT')
            <form  action="{{route('subkon.create.pj')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flexx" style="gap:.8rem">
                    <div class="form-input d-flex">
                        <input type="hidden" class="form-control border-input" id="no_kontrak" name="no_kontrak" value="{{$no_kontrak}}" required>
                        <input type="text" placeholder="masukan BPB" class="form-control border-input mr-3" id="bpb" name="bpb" value="" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="top" data-content="Jika Nomor BPB Lebih dari satu, Maka pisahkan dengan strip ( - )" required>
                        <input type="text" placeholder="masukan Aju" class="form-control border-input mr-3" id="no_aju" name="no_aju" value="" required>
                        <input type="date" placeholder="tanggal transaksi" class="form-control border-input" id="tanggal_transaksi" name="tanggal_transaksi" value="" required>
                    </div>
                    <div class="buttons">
                        <button type="button" id="buttonpengeluaran" class="btn-blue no-wrap">Pengeluaran<i class="ml-2 fas fa-plus"></i></button>
                    </div>
                </div>
            </form>
            <a href="#" class="btn-blue no-wrap" style="max-width:180px" data-toggle="modal" data-target="#Modal261">Tambah Item<i class="ml-2 fas fa-database"></i></a>
            @endif
        @endif
        </div>
    </div>
</div>
    @include('MatDoc.subkon.partials.monitoring.card261')
    <div class="row mt-3 pb-5">
      <div class="col-12">
        <div class="cards bg-card p-4 relative">
          <div class="row">
            <div class="col-12">
                <div class="approval-flex2">
                    <div class="title-22 text-left">Data Barang Keluar</div>
                </div>
            </div>
            <div class="col-12">
                <div class="cards-scroll mb-5 scrollX" id="scroll-bar">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                  <table id="DTtable1" class="table hrd-tbl-content no-wrap">
                    <thead>
                      <tr>
                        <th colspan="6"></th>
                        @foreach($partial_group as $key1=>$value1)
                        <th class="text-center">{{$value1['no_aju']}}</th>
                        @endforeach
                        <th colspan="2"></th>
                      </tr>
                      <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>HS Code</th>
                        <th>Description</th>
                        <th>Qty Kontrak</th>
                        <th>Satuan</th>
                        @foreach($partial_group as $key2=>$value2)
                        <th>{{$value2['tanggal']}}</th>
                        @endforeach
                        <th>BC261</th>
                        <th>BC262</th>
                        <th>Tersisa</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=0;?>
                      @foreach($data_material as $key3=>$value3)
                      <?php $no++;?>
                      @if(($data_kontrak['status_kontrak']!='Close') &&(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT'))
                      <tr class="clickable-row" data-href="{{ route('subkon.edit.material',$value3['id'])}}">
                      @else
                      <tr>
                      @endif 
                        <td>{{$no}}</td>
                        <td>{{$value3['item_number']}}</td>
                        <td>{{$value3['hs_code']}}</td>
                        <td>{{$value3['deskripsi']}}</td>
                        <td>{{$value3['kebutuhan']}}</td>
                        <td>{{$value3['satuan']}}</td>
                        @foreach($partial_group as $key4=>$value4)
                        <?php 
                                $data=collect($data_partial);
                                $cek_data = $data->where('id_material',$value3['id'])->where('no_aju',$value4['no_aju'])->count();
                                if ($cek_data != 0) {
                                    $jumlah=$data->where('id_material',$value3['id'])->where('no_aju',$value4['no_aju'])->first();
                                    $qty=$jumlah['qty'];
                                }
                                else{
                                  $qty='-';
                                }
                            ?>
                          <td>{{$qty}}</td>
                        @endforeach
                        <td>{{$value3['jumlah_keluar']}}</td>
                        <td>{{$value3['jumlah_pemasukan']}}</td>
                        <td>{{$value3['tersisa']}}</td>
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


    <!-- Modal add item pengeluaran barang -->
    <div class="modal fade" id="Modal261" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:610px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <form  action="{{route('subkon.insert.material')}}" id="myForm261" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row px-4">
                    <input type="hidden" class="form-control border-input" id="no_kontrak" name="no_kontrak" value="{{$no_kontrak}}" required>
                    <div class="col-md-6">
                        <span class="general-identity-title">HS CODE</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="hs_code" name="hs_code" placeholder="Masukan Nomor HS CODE..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">ITEM NUMBER</span>
                        <div class="input-group my-2">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue px-3" style="border-radius:5px 0 0 5px" for=""><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                            </div>
                            <select class="form-control border-input select2bs4" name="item_number" id="item_number" style="border-radius:10px" required>
                                <option value="">ITEM NUMBER</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <span class="general-identity-title">DESCRIPTION</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="deskripsi" name="deskripsi" placeholder="Masukan DESCRIPTION..." required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">KEBUTUHAN</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="kebutuhan" name="kebutuhan" placeholder="Masukan KEBUTUHAN..." >
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <span class="general-identity-title">SATUAN</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="satuan" name="satuan" placeholder="Masukan SATUAN..." >
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <span class="general-identity-title">CONS</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="consumption" name="consumption" placeholder="Masukan CONS..." >
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <span class="general-identity-title">NW</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="nw" name="nw" placeholder="Masukan NW..." >
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <span class="general-identity-title">GW</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="gw" name="gw" placeholder="Masukan Nomor GW..." >
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <span class="general-identity-title">JENIS DOK</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="doc_type" name="doc_type" placeholder="Masukan JENIS DOK..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">BC NUMBER</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="bc_number" name="bc_number" placeholder="Masukan BC NUMBER..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">DOC DATE</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="doc_date" name="doc_date" placeholder="Masukan DOC DATE..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">POS</span>
                        <div class="input-group my-2">
                            <input type="text" class="form-control border-input" id="pos" name="pos" placeholder="Masukan POS..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">HARGA US</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="us_price" name="us_price" placeholder="Masukan HARGA US..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">HARGA IDR</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="idr_price" name="idr_price" placeholder="Masukan HARGA IDR..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">TOTAL HARGA US</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="us" name="us" placeholder="Masukan TOTAL HARGA US..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">TOTAL HARGA IDR</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="idr" name="idr" placeholder="Masukan TOTAL HARGA IDR..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">PERSENTASE (%)</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="persen" name="persen" placeholder="Masukan PERSENTASE (%)..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">BM</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="bm" name="bm" placeholder="Masukan BM..." >
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <span class="general-identity-title">BPT/KG</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="bpt" name="bpt" placeholder="Masukan BPT/KG..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">BMT</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="btm" name="btm" placeholder="Masukan BMT..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">PPN</span>
                        <div class="input-group my-2">
                            <input type="number"  step="0.01" class="form-control border-input" id="ppn" name="ppn" placeholder="Masukan PPN..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">PPH</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="pph" name="pph" placeholder="Masukan PPH..." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="general-identity-title">TOTAL</span>
                        <div class="input-group my-2">
                            <input type="number" step="0.01" class="form-control border-input" id="total" name="total" placeholder="Masukan TOTAL..." >
                        </div>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-12">
                        <button type="button" class="btn-blue btn-block add261">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>