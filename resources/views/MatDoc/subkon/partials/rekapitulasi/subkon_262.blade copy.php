    <div class="row">
        <div class="col-12 justify-sb">
            <span class="title-18">Rekap Sub Kontrak</span>
            <div class="input-group-prepend">
              <div class="container-form">
                  <input type="number" class="search-subkon search2" placeholder="Search..." required>
                  <input type="hidden" class="nomor_kontrak2" value="{{$no_kontrak}}">
                  <button type="button" class="btn-subkon-submit2"><i class="icon-search fas fa-search"></i></button>
              </div>
            </div>
        </div>
    </div>
    @include('MatDoc.subkon.partials.rekapitulasi.card262')
    <?php $no=0;?>
    @foreach($pemasukan_group as $key=>$value)
    <?php $no++;?>
    <div class="row mt-2 initable262" id="Aju262-{{$value['no_aju']}}" id_na="{{$value['no_aju']}}">
      <div class="col-12">
        <div class="flat-card pd-tbl-header">
          <div class="flex">
            <div class="sb-count">
                <div class="sb-count-badge">{{$no}}</div>
            </div>
            <div class="sb-header-table justify-sb">
              <div class="j-first flex">
                <div class="sj">
                    <div class="title">Nomor AJU</div>
                    <div class="desc nama_dokumen2">{{$value['no_aju']}}</div>
                </div>
                <div class="doc">
                      <div class="title">Nomor Aju Dokumen</div>
                      <div class="desc">{{$value['dok_aju']}}</div>
                  </div>
                <div class="daftar">
                    <div class="title">Nomor Daftar</div>
                    <div class="desc">{{$value['no_daftar']}}</div> 
                </div>
              </div>
              <div class="sb-date flex">
                <div class="desc mr-3">{{$value['tanggal']}}</div> 
                <a href="{{route('subkon.rekapitulasi262.dok',[$no_kontrak,$value['no_aju']])}}" class="btn btn-simple-info justify-center"><i class="fas fa-info"></i></a>
                @if($data_kontrak['status_kontrak']!='Close')
                  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT')
                  <a href="{{route('subkon.rekapitulasi262.edit',[$no_kontrak,$value['no_aju']])}}" class="btn btn-simple-edit justify-center ml-1"><i class="fas fa-pencil-alt"></i></a>
                  @endif
                @endif
              </div>
            </div>
          </div>
          <div class="row scrollX" id="scroll-bar">
              <div class="col-12">
                  <table class="table sb-tbl-content no-wrap">
                      <thead>
                        <tr>
                          <th>SKU</th>
                          <th>Jenis Barang</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pemasukan_aju as $key2=>$value2)
                          @if(($value['no_aju']==$value2['no_aju'])&&($value2['qty'] != null))
                            <tr>
                              <td>{{$value2['kode_barang']}}</td>
                              <td>{{$value2['nama_barang']}}</td>
                              <td>{{$value2['qty']}}</td>
                              <td>{{$value2['satuan']}}</td>
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="position-relative">
            <div class="sb-header-table justify-sb position-relative w-100">
              <div class="j-first flex">
                <div class="sj">
                    <div class="title">BM</div>
                    <div class="desc">Rp {{number_format($value['bm'], 2, ",", ".")}}</div>
                </div>
                <div class="doc pl-5">
                    <div class="title">PPN</div>
                    <div class="desc">Rp {{number_format($value['ppn'], 2, ",", ".")}}</div>
                </div>
                <div class="daftar pl-5">
                    <div class="title">PPH</div>
                    <div class="desc">Rp {{number_format($value['pph'], 2, ",", ".")}}</div> 
                </div>
                <div class="jaminan position-absolute d-flex my-au">
                  <h3>Nilai jaminan : Rp {{number_format($value['total_jaminan'], 2, ",", ".")}}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach