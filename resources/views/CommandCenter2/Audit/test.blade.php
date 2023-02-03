@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
@endpush

@section("content")
  <!-- <div class="content-wrapper f-poppins">
    <section class="content-header">
        <div class="card-navigate">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('commandCenter2') }}" class="title-navigate">ALL FACTORY</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cc.internal.audit') }}" class="title-navigate">Internal Audit</a></li>
                    <li class="breadcrumb-item title-navigate-active" aria-current="page">{{$Branch->nama_branch}}</li>
                    <li class="navigate-active ml-itdt"></li>
                </ol>
            </nav>
        </div>
    </section> -->

    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="analytics">Analytics</span>
            <div class="btn-group">
              <button type="button" class="btn btn-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="allfac-ddown">{{$Branch->nama_branch}}</span>
              </button>
              <div class="container-fluid dropdown-menu">
                @foreach($dataBranch as $key=>$value)
                  <a class="dropdown-item" href="" ><span class="branch-item mt-2">{{$value->nama_branch}}</span></a>
                @endforeach
              </div>
            </div>
          </div>
        </div> -->
       

        <div class="row mb-3 mt-4">
          <div class="col-12">	
            <span class="all-factory">{{$a}}  {{$Branch->nama_branch}}</span>
          </div>
        </div>

        <div class="row">
          @foreach($menu_uji as $key=>$value)
          @if($value['nama'] == 'Ledger VS IT Inv')
            <a href="{{ route('cc.icr.ledge-it', $Branch->id)}}" class="col-sm-12 col-md-6 col-xl-3">
          @else
            <a href="{{route('cc.icr.test', $Branch->id)}}" class="col-sm-12 col-md-6 col-xl-3">
          @endif
            <div class="cards bg-card">
              @if($value['aktif']==0)
              <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div>
              @endif
              <div class="row">
                <div class="col-12">
                  <center>
                  @if($value['aktif'] == 0)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="0" disabled>
                    <div class="knob-label" id="labelknob-critical">CRITICAL</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">{{$value['nama']}}</span>
                    <span class="tot-issue">0 Issues</span>
                  </div>
                  @endif
                  @if($value['aktif'] == 1)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="0" disabled>
                    <div class="knob-label" id="labelknob-good">GOOD</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">{{$value['nama']}}</span>
                    <span class="tot-issue2">0 Issues</span>
                  </div>
                  @endif
                  </center>
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
  @endsection

@push("scripts")
<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('position', 'absolute').css('font-size', '18pt').css('font-weight', '500').css('padding-bottom', '12px').css('font-family', 'poppins');
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

        this.g.lineWidth = 1.5;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
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
