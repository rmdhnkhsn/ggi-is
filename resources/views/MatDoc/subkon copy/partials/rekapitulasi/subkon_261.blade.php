    <div class="row">
        <div class="col-12 justify-sb">
            <span class="title-18">Rekap Sub Kontrak</span>
            <div class="input-group-prepend">
              <!-- <div class="container-form">
                  <input type="number" class="search-subkon search" placeholder="Search..." required>
                  <input type="hidden" class="nomor_kontrak" value="{{$no_kontrak}}">
                  <button type="button" class="btn-subkon-submit"><i class="icon-search fas fa-search"></i></button>
              </div> -->
            </div>
        </div>
    </div>
    @include('MatDoc.subkon.partials.rekapitulasi.card261')
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards bg-card mt-3 p-4">
          <div class="cards-scroll p-2 scrollX" id="scroll-bar">
            <button id="btnSearch"><i class="fas fa-search"></i></button>  
            <table id="DTtable" class="table tbl-content">
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
                @foreach($aju_group as $key=>$value)
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
                        <a href="{{route('subkon.rekapitulasi.dok',[$no_kontrak,$value['no_aju']])}}"  class="btn-icon-blue" ><i class="fas fa-info"></i></a>
                        <a href="{{route('subkon.rekapitulasi.excel',[$no_kontrak,$value['no_aju']])}}"  class="btn-icon-hijau" ><i class="fas fa-file-excel"></i></a>
                        @if($data_kontrak['status_kontrak']!='Close')
                          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT')
                          <a href="{{route('subkon.rekapitulasi.edit',[$no_kontrak,$value['no_aju']])}}" class="btn-icon-yellow"><i class="fas fa-pencil-alt"></i></a>
                          @endif
                        @endif
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





    
   
