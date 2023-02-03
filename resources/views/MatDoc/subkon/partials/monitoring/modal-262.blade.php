        
        
        <div class="modal fade" id="addItem" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
            <div class="modal-content p-4" style="border-radius:10px">
              <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-18">Tambah Item</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-3">
                    <div class="borderlight2"></div>
                </div>
              </div>
              <form  action="{{route('subkon.insert.return')}}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <input type="hidden" name="no_kontrak" value="{{$data_kontrak->no_kontrak}}">
                  <div class="col-12">
                    <div class="title-sm">Nama Garment</div>
                    <div class="input-group flex relative mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="containerLeft"></span>
                            <div class="borderLeft2"></div>
                        </div>
                        <select class="form-control borderInput select2bs4 pointer select2bs_pemasukan" name="nama_barang" id="nama_barang" required>
                            <option value="">Nama Garment</option>
                            @foreach($item_pjkk as $keya=>$valuea)
                              <option value="{{$valuea->item_number}}-{{$data_kontrak->no_kontrak}}"> {{$valuea->deskripsi}} [{{$valuea->item_number}}]</option>
                            @endforeach  
                        </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="title-sm">Kode Barang</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="kdbarang" name="kode_barang" placeholder="kode Barang" readonly>
                  </div>
                  <div class="col-md-4">
                    <div class="title-sm">Qty</div>
                    <input type="number" class="form-control borderInput mt-1 mb-3" id="qtyMaterial" name="qty" placeholder="Qty" required>
                  </div>
                  <div class="col-md-4">
                    <div class="title-sm">Satuan</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="satuanReturn" name="satuan" placeholder="Satuan" required>
                  </div>
                  <div class="col-md-4">
                    <div class="title-sm">Qty Contract</div>
                    <input type="text" class="form-control borderInput mt-1 mb-3" id="qtyPj" placeholder="Qty Contract" readonly>
                  </div>
                  <div class="col-12 mt-2">
                    <button type="submit" class="btn-blue btn-block ">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <form  action="{{route('subkon.receive.262')}}"  method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="no_kontrak" value="{{$data_kontrak->no_kontrak}}">
          <div class="modal fade" id="receiveSJ" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
              <div class="modal-content p-4" style="border-radius:10px">
                <div class="row">
                  <div class="col-12 justify-sb">
                      <div class="title-18">Input Partial Supplier</div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fas fa-times"></i></span>
                      </button>
                  </div>
                  <div class="col-12 mt-1 mb-3">
                      <div class="borderlight2"></div>
                  </div>
                </div>
                <div class="cards-part">
                  <div class="cards-head">
                    <div class="title-24-blue text-center no-wrap">DAFTAR SURAT JALAN</div>
                  </div>
                  <div class="cards-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="containerSearch w-100 mt-3">
                          <input type="text" class="form-control borderInput" id="DTtableSearchSJ" placeholder="Search..."><i class="srch fas fa-search"></i>
                        </div>
                        <div class="card-close-orange mt-2 py-1 px-2">
                          <div class="justify-sb">
                            <div class="txt-orange">Keterangan : Silahkan pilih Surat Jalan yang akan di proses </div>
                            <button type="button" class="close-icon" data-effect="fadeOut"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <table id="SuratJalan" class="tables3 tbl-content-cost no-wrap">
                          <thead>
                            <tr class="bg-thead2">
                              <th></th>
                              <th>NO</th>
                              <th>ID SJ</th>
                              <th>Surat Jalan</th>
                              <th>Tanggal Pengiriman</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=0;?>
                            @foreach($surat_jalan as $k => $v)
                            <?php $no++; ?>
                            <tr>
                              <td>
                                <div class="conainer-tbl-btn">
                                  <input type="checkbox" class="check1" name="id_sj[]" id="" value={{$k}}>
                                </div>
                              </td>
                              <td>{{$no}}</td>
                              <td>{{$v->first()->id_sj}}</td>
                              <td>{{$v->first()->no_surat_jalan}}</td>
                              <td>{{$v->first()->tanggal_sj}}</td>
                            </tr>
                            @endforeach
                          </tbody> 
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn-blue-md mt-3">Partial <i class="fs-18 ml-2 fas fa-caret-right"></i></button>
              </div>
            </div>
          </div>
        </form>

        <script>
            $('.close-icon').on('click',function() {
              $(this).closest('.card-close-orange').fadeOut();
            })

            $(document).ready( function () {
              var table = $('#SuratJalan').DataTable({
                "pageLength": 100,
                dom: 'frt'
              });
            });

            const search3 = document.getElementById('DTtableSearchSJ')
            search3.addEventListener('keyup', function(evt){
                const searchInput3 = document.querySelector('#SuratJalan_filter').querySelector('input')
                searchInput3.value = evt.target.value
                let e = document.createEvent('HTMLEvents');
                e.initEvent("keyup",false,true);
                searchInput3.dispatchEvent(e);
            });
        </script>