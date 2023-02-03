@extends("layouts.app")
@section("title","HR & GA")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")

<section class="content">
  <div class="container-fluid">

    <div class="row my-2">
      <div class="col-12">
        <span class="title-24">All Factory</span>
      </div>
    </div>

    <div class="row">
    @php
      $branch_except = array(
                    "GISTEX CILEUNYI", 
                    "GISTEX MAJALENGKA 1", 
                    "GISTEX MAJALENGKA 2");
    @endphp

    @foreach($dataBranch as $key=>$value)
      <a href="{{route('cc.hrd.auditbuyer',$value->id)}}" class="col-xl-3 col-md-4 col-sm-12">
        <div class="cards bg-card h-280">
          @if(!in_array($value->nama_branch, $branch_except))
            <div class="pita"><span class="offline">OFFLINE</span></div>
            <div class="pita1"></div><div class="pita2"></div>
          @endif
          <div class="row">
            <div class="col-12">
              <center>
              <!-- <div class="adt-container-knob">
                <input type="text" class="dial" value="" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                <div class="knob-label" id="labelknob-critical">Critical</div>
              </div> -->
              <div class="adt-container-knob">
                <input type="text" class="dial" value="99%" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                <div class="knob-label" id="labelknob-good">Good</div>
              </div>
              <div class="adt-allfac-desc">
                <span class="branch">{{$value->nama_branch}}</span>
                <span class="tot-anom2">1 Issues</span>
                <!-- <span class="tot-anom1">1 Issues</span> -->
              </div>
              </center>
            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>

  </div>
</section>

@endsection

@push("scripts")

<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('position', 'absolute').css('font-size', '22px').css('font-weight', '500').css('padding-bottom', '12px').css('font-family', 'poppins').css('color', '#000');
      $(this.i).val(this.cv + '%');
    }
  });
</script>

@endpush