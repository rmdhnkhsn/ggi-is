@include('layouts.header')
@include('layouts.navbar2')
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <section class="content-header">
    <div class="content-header">
      <div class="row">
        <div class="col-lg-3 col-6" style="padding:2px">
            <a href="{{ route('commandCenter') }}" class="btn btn-block btn-secondary btn-sm">ALL FACTORY</a>
        </div>
        @foreach($dataBranch as $bc)
        <div class="col-lg-3 col-6" style="padding:2px">
          <a href="{{ route('cc.level2', $bc->id) }}" class="btn btn-block btn-outline-secondary btn-sm">{{$bc->nama_branch}}</a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="container col-lg-3">
          <div class="small-box" style="background-color: #2e788c;height:auto;">
            <span class="judul"><center>OVERALL</center></span>
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col-6">
                  <center>
                  @if($dataSemua['warna'] != 0)
                    <div class="container" style="padding-top:10px;">
                      <input type="text" class="dial" value="{{$dataSemua['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#ff0000" disabled>
                      <div class="knob-label" style="font-weight:bold;color:#ff0000;text-align: center;font-size:18px;">CRITICAL</div>
                    </div>
                  @endif
                  @if($dataSemua['warna'] == 0)
                    <div class="container" style="padding-top:10px;">
                      <input type="text" class="dial" value="{{$dataSemua['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#00ff00" disabled>
                      <div class="knob-label" style="font-weight:bold;color:#00ff00;text-align: center;font-size:18px;">GOOD</div>
                    </div>
                  @endif
                  </center>
                </div>
                <div class="col-lg-5 col-6">
                  <div clas="container" style="padding-top:30px">
                    <span class="Issues">Issues</span>
                    <br>
                    <span class="Angka">{{$dataSemua['issues']}}</span>
                  </div>
                  <div class="container lines"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col --> 
        

        @foreach($dataCC as $dc)
        @if($dc['nama'] == 'QUALITY CONTROL')
        <a href="{{route('allfac.qc')}}" class="col-lg-3">
        @elseif($dc['nama'] == 'IT & DT')
        <a href="{{route('it_dt.all')}}" class="col-lg-3">
        @elseif($dc['nama'] == 'PRODUCTION')
        <a href="{{route('cproduction.index')}}" class="col-lg-3">
        @elseif($dc['nama'] == 'GGI INDAH')
        <a href="{{route('indah.all')}}" class="col-lg-3">
        @elseif($dc['nama'] == 'INTERNAL AUDIT')
        <a href="{{route('cc2.it.dt',$id_branch) }}" class="col-lg-3">
        @else
        <a href="" class="col-lg-3">
        @endif
          <div class="small-box" style="background-color: #375a64;height:auto;">
            <span class="judul"><center>{{$dc['nama']}}</center></span>
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col-6">
                  <center>
                  @if($dc['warna'] != 0)
                    <div class="container" style="padding-top:10px;">
                      <input type="text" class="dial" value="{{$dc['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#ff0000" disabled>
                      <div class="knob-label" style="font-weight:bold;color:#ff0000;text-align: center;font-size:18px;">CRITICAL</div>
                    </div>
                  @endif
                  @if($dc['warna'] == 0)
                    <div class="container" style="padding-top:10px;">
                      <input type="text" class="dial" value="{{$dc['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#00ff00" disabled>
                      <div class="knob-label" style="font-weight:bold;color:#00ff00;text-align: center;font-size:18px;">GOOD</div>
                    </div>
                  @endif
                  </center>
                </div>
                <div class="col-lg-5 col-6">
                  <div clas="container" style="padding-top:30px" >
                    <span class="Issues">Issues</span>
                    <br>
                    <span class="Angka">{{$dc['issues']}}</span>
                  </div>
                  <div class="container lines"></div>
                </div>
              </div>
            </div>
          </div>
        </a>
        @endforeach
        <!-- ./col -->
        <div class="container col-lg-3">
          
        </div>
        <!-- ./col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div>
@include('layouts.footer')
<script>
$(".dial").knob({
 "readOnly":true,
 'change': function (v) { console.log(v); },
  draw: function () {
    $(this.i).css('font-size', '13.5pt').css('font-weight', 'bold');
    $(this.i).val(this.cv + ' %');
  }
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 30000);
    })
</script>