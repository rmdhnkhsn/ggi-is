@foreach($dataBagian as $dc)
    @if($dc['nama_bagian'] == 'IT & DT')
    <div class="container col-lg-3">
            <div class="cards bg-card">
              <i></i>
              <div class="card-header" id="Cardheader">
                <span class="card-judul-overall"><center>OVERALL</center></span>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($dc['issues'] != 0)
                      <div class="container-critical">
                        <input class="dial" data-displayPrevious=true data-fgColor="#ff0000" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dc['nilai']}}" disabled>
                        <div class="knob-label" id="labelC">CRITICAL</div>
                      </div>
                    @endif
                    @if($dc['issues'] == 0)
                      <div class="container-good">
                        <input class="dial" data-displayPrevious=true data-fgColor="#228B22" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dc['nilai']}}" disabled>
                        <div class="knob-label" id="labelG">GOOD</div>
                      </div>
                    @endif
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div class="container-issue">
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">{{$dc['issues']}}</span>
                    </div>
                    <div class="container lines bg-lines"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    @endif
@endforeach