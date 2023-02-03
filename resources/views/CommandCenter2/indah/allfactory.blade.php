@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/dist/css/adminlte.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/graph.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content-header">
      <div class="content-header">
          <!-- <div class="row">
            <div class="col-lg-3 col-6">
              <a href="{{ route('commandCenter2') }}" class="btn btn-primary btn-sm btn-block"><i class="fas fa-arrow-circle-left"></i> ALL FACTORY</a>
            </div>
            <div class="col-lg-3 col-6">
              <a href="{{ route('indah2.all') }}" class="btn btn-primary btn-sm btn-block"><i class="fas fa-arrow-circle-left"></i> GGI INDAH</a>
            </div>
          </div> -->
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @foreach($dataBranch as $db)
          <a href="{{ route('cc2.indah', $db['id'])}}" class="col-lg-3">
            <div class="cards bg-card border-top-alus">
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>{{$db['nama_branch']}}</center></span>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                      <div class="container-good">
                        <input class="dial" data-displayPrevious=true data-fgColor="#228B22" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="0" disabled>
                        <div class="knob-label" id="labelG">GOOD</div>
                      </div>
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div class="container-issue">
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">0</span>
                    </div>
                    <div class="container lines bg-lines"></div>
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
@endsection

@push("scripts")
<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('font-size', '13.5pt').css('font-weight', '600').css('padding-bottom', '18px');
      $(this.i).val(this.cv + '%');


      // "tron" case
      if(this.$.data('skin') == 'tron') {

        this.cursorExt = 0.3;

        var a = this.arc(this.cv)  // Arc
            , pa                   // Previous arc
            , r = 1;

        this.g.lineWidth = this.lineWidth;

        if (this.o.displayPrevious) {
            pa = this.arc(this.v);
            this.g.beginPath();
            this.g.strokeStyle = this.pColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
            this.g.stroke();
        }

        this.g.beginPath();
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
        this.g.stroke();

        this.g.lineWidth = 3;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 3 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();

        return false;
      }
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

@endpush