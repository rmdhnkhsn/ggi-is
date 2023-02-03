@include('layouts.header')
@include('layouts.navbar2')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="content-header">
          <div class="row">
            <div class="col-lg-3 col-6" style="padding:2px">
                <a href="{{ route('commandCenter') }}" class="btn btn-block btn-outline-secondary btn-sm">ALL FACTORY</a>
            </div>
            @foreach($Branch as $bc)
            <div class="col-lg-3 col-6" style="padding:2px">
              @if($bc->id == $id_branch)
              <a href="{{ route('cc.level2', $bc->id) }}" class="btn btn-block btn-secondary btn-sm">{{$bc->nama_branch}}</a>
              @else
              <a href="{{ route('cc.level2', $bc->id) }}" class="btn btn-block btn-outline-secondary btn-sm">{{$bc->nama_branch}}</a>
              @endif
            </div>
            @endforeach
          </div>
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="container col-lg-3">
            <div class="small-box" style="background-color: #2e788c;height:auto;">
             <span class="judul"><center>OVERALLa</center></span>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($dataSemua['issues'] != 0)
                      <div class="container" style="padding-top:10px;">
                        <input type="text" class="dial" value="{{$dataSemua['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#ff0000" disabled>
                        <div class="knob-label" style="font-weight:bold;color:#ff0000;text-align: center;font-size:18px;">CRITICAL</div>
                      </div>
                    @endif
                    @if($dataSemua['issues'] == 0)
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
          <a href="{{ route('cc.qc', $id_branch) }}" class="container col-lg-3">
          @elseif($dc['nama'] == 'GGI INDAH')
          <a href="{{route('cindah.index', $id_branch)}}" class="col-lg-3">
          @else
          <a href="" class="container col-lg-3">
          @endif
            <div class="small-box" style="background-color: #375a64;height:auto;">
             <span class="judul"><center>{{$dc['nama']}}</center></span>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($dc['issues'] != 0)
                      <div class="container" style="padding-top:10px;">
                        <input type="text" class="dial" value="{{$dc['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#ff0000" disabled>
                        <div class="knob-label" style="font-weight:bold;color:#ff0000;text-align: center;font-size:18px;">CRITICAL</div>
                      </div>
                    @endif
                    @if($dc['issues'] == 0)
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
        }, 60000);
    })
</script>