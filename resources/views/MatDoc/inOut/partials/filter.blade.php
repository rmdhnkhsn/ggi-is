  <div class="modal fade" id="filter" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <form class="filterContainer" id="frmFilter" action="{{route('in-out.monitoring')}}" method="get" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:54vw">
          <div class="modal-content" style="border-radius:1vw;padding:1.6vw">
            <div class="row">
              <div class="col-12 justify-sb">
                <div class="title-18vw">Filter Data</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times" style="font-size:1.5vw"></i></span>
                </button>
              </div>
              <div class="col-12" style="margin: .4vw 0 1vw 0">
                <div class="borderlight2"></div>
              </div>
              <div class="col-lg-6">
                <div class="title-14vw">Pilih Branch</div>
                <div class="input-group flex" style="margin: .3vw 0 1.5vw 0">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlueVW"><i class="fas fa-stream"></i></span>
                  </div>
                  <select class="form-control borderInputVW select2bs4 pointer" id="from_branchdetail" name="from_branchdetail">
                    <option value="" selected>All Branch</option>
                    @foreach($branch as $d)
                      <option value="{{$d->branchdetail}}">{{$d->branchdetail}}</option>    
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="title-14vw">Penerima SUBKON</div>
                <div class="input-group flex" style="margin: .3vw 0 1.5vw 0">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlueVW"><i class="fas fa-stream"></i></span>
                  </div>
                  <select class="form-control borderInputVW select2bs4 pointer" id="to_branchdetail" name="to_branchdetail">
                    <option value="" selected>All Branch</option>
                    @foreach($branch as $d)
                      <option value="{{$d->branchdetail}}">{{$d->branchdetail}}</option>    
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- <div class="col-lg-4">
                <div class="title-14vw">PO</div>
                <input type="text" class="form-control borderInputVW" id="no_kontrak" name="no_kontrak" placeholder="Cari PO" style="margin: .3vw 0 1.5vw 0">
              </div> -->
              <div class="col-lg-4">
                <div class="title-14vw">BPB</div>
                <input type="text" class="form-control borderInputVW" id="bpb" name="bpb" placeholder="Cari BPB" style="margin: .3vw 0 1.5vw 0">
              </div>
              <!-- <div class="col-lg-4">
                <div class="title-14vw">G/L Kategori</div>
                <div class="input-group flex" style="margin: .3vw 0 1.5vw 0">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlueVW"><i class="fas fa-stream"></i></span>
                  </div>
                  <select class="form-control borderInputVW select2bs4 pointer" id="" name="" required>
                    <option selected disabled>Pilih GL</option>
                    <option name="11223344">11223344</option>    
                    <option name="9988776">9988776</option>    
                  </select>
                </div>
              </div> -->
              <div class="col-12 mt-3">
                <button type="submit" class="btnSearch">Terapkan Filter <i class="fas fa-filter"></i></button>
              </div>
            </div>
          </div>
        </div>
    </form>
  </div>