    <div class="row">
        <div class="col-12 justify-sb">
            <span class="title-18">Rekap Sub Kontrak</span>
            <div class="input-group-prepend">
              <!-- <div class="container-form"> -->
                  <!-- <input type="number" class="search-subkon search2" placeholder="Search..." required>
                  <input type="hidden" class="nomor_kontrak2" value="{{$no_kontrak}}"> -->
                  <!-- <button type="button" class="btn-subkon-submit2"><i class="icon-search fas fa-search"></i></button> -->
              <!-- </div> -->
            </div>
        </div>
    </div>
    @include('MatDoc.subkon.partials.rekapitulasi.card262')
    <div class="row">
      <div class="col-12">
        <div class="cards bg-card mt-3 p-4">
          <div class="cards-scroll p-2 scrollX" id="scroll-bar">
          <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable2" class="table hrd-tbl-content no-wrap" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor AJU SJ</th>
                  <th>Nomor Aju Dokumen</th>
                  <th>Nomor Daftar</th>
                  <th>Tanggal</th>
                  <th>BM</th>
                  <th>PPN</th>
                  <th>PPH</th>
                  <th>Nilai jaminan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php $no=0;?>
                @foreach($pemasukan_group as $key=>$value)
                  <?php $no++;?>
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$value['no_aju']}}</td>
                    <td>{{$value['dok_aju']}}</td>
                    <td>{{$value['no_daftar']}}</td>
                    <td>{{$value['tanggal']}}</td>
                    <td>Rp {{number_format($value['bm'], 2, ",", ".")}}</td>
                    <td>Rp {{number_format($value['ppn'], 2, ",", ".")}}</td>
                    <td>Rp {{number_format($value['pph'], 2, ",", ".")}}</td>
                    <td>Rp {{number_format($value['total_jaminan'], 2, ",", ".")}}</td>
                    <td>
                      <div class="container-tbl-btn flex gap-2">
                        <a href="{{route('subkon.rekapitulasi262.dok',[$no_kontrak,$value['no_aju']])}}"  class="btn-icon-blue" ><i class="fas fa-info"></i></a>
                        <a  href="" data-toggle="modal" data-target="#myModal{{$value['no_aju']}}" class="btn-icon-hijau" ><i class="fas fa-file-excel"></i></a>
                        @if($data_kontrak['status_kontrak']!='Close')
                          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT')
                          <a href="{{route('subkon.rekapitulasi262.edit',[$no_kontrak,$value['no_aju']])}}" class="btn-icon-yellow"><i class="fas fa-pencil-alt"></i></a>
                          @endif
                        @endif
                      </div>
                      <div class="modal fade" id="myModal{{$value['no_aju']}}">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:530px">
                            <div class="modal-content p-4" style="border-radius:10px">
                              <form  action="{{route('subkon.rekapitulasi262.excel')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                  <div class="row mb-3">
                                    <div class="col-12 justify-sb" style="border-bottom : 0.5px solid #ccc">
                                        <div class="title-22">Title</div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                        </button>
                                    </div>
                                    <div class="col-12 mt-3 mb-1">
                                        <label for="">TOTAL GARMENT JADI</label>
                                        <input type="number" name="total_garmen" class="form-control border-input" required>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label for="">* NETO</label>
                                        <input type="number" step="0.01" name="note" class="form-control border-input" required>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label for="">NDPBM</label>
                                        <input type="number" step="0.01" name="ndpbm" class="form-control border-input" required>
                                    </div>
                                  </div>
                                  <input type="hidden" name="no_kontrak" value="{{$no_kontrak}}">
                                  <input type="hidden" name="no_aju" value="{{$value['no_aju']}}">

                                  <button type="submit" class="btn-green-md w-100">Download <i class="fas fa-file-excel ml-2"></i></button>
                              </form>
                            </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nomor AJU SJ</th>
                  <th>Nomor Aju Dokumen</th>
                  <th>Nomor Daftar</th>
                  <th>Tanggal</th>
                  <th>BM</th>
                  <th>PPN</th>
                  <th>PPH</th>
                  <th>Nilai jaminan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
