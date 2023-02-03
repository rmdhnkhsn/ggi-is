@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
    <!-- <link rel="stylesheet" href="{{asset('/assets/css/styleCC2.css')}}"> -->
    <link rel="stylesheet" href="{{asset('/common/css/ngedip.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

    <style>
	table, td, th {
  text-align:center;
  font-size:13px;
  padding:3px;
  }

  .stopwatch {
  display: grid;
  justify-items: center;
  grid-row-gap: 23px;
  width: 100%;
  padding-top: 25px;
}

.time {
  font-family: "Roboto Mono", monospace;
  font-weight: 200;
  font-size: 20px;
}

.gold {
  font-weight: 900;

  color: #f2c94c;
  text-shadow: 0 0 0px #fff, 0 0 50px #f2c94c;
}

.controls {
  display: flex;
  justify-content: space-between;
  width: 187px;
}
#seconds {
  font-size: 1.8em;}

#minutes {
  font-size: 1.8em;
}
#jam {
  font-size: 1.8em;
}
#colon {
  font-size: 1.8em;
}
  </style>
@endpush

@section("content")
<section class="content-header">
      <div class="content-header">
          <div class="row">
            <div class="col-lg-3 col-6">
               <a href="{{ route('commandCenter2') }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i> ALL FACTORY</a>
            </div>
            <div class="col-lg-3 col-6">
              <a href="{{ route('cproduction2.index') }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-arrow-circle-left"></i> PRODUCTION</a>
            </div>
          </div>
      </div>
    </section>

    <div class="container-fluid">
        <div class="row">
        	<div class="col-12">
          		<div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
                    <div class="card-body" style="overflow:auto;">
                    <center><h3 style="font-weight:bold;margin-top: 1%;">DAILY MONITORING TOWER LIGHT SYSTEM CUTTING AND SEWING</h3></center>
                        <center><h6 style="font-weight:bold;">MAJALENGKA 2</h6></center>
                        <center><h6 style="font-weight:bold;">{{ now()->parse()->locale(config('app.locale'))->timezone(config('app.timezone'))->isoFormat('LL') }}</h6></center>
                        <br>
                        <table class="table table-hover text-nowrap" >
                          <thead  class="thead-light">
                            <tr>
                              <th style="font-weight:bold;font-size:21px;">No</th>
                              <th style="font-weight:bold;font-size:21px;">Line</th>
                              <th style="font-weight:bold;font-size:21px;">WO</th>
                              <th style="font-weight:bold;font-size:21px;">Request</th>
                              <th style="font-weight:bold;font-size:21px;">Response</th>
                              <th style="font-weight:bold;font-size:21px;">Out of Stock</th>
                              <th style="font-weight:bold;font-size:21px;">Process</th>
                              <th style="font-weight:bold;font-size:21px;">Delivery</th>
                              <th style="font-weight:bold;font-size:21px;">Status</th>
                            </tr>
                          </thead>
                            <?php $no=1;?>
                                @foreach($stowers->groupBy('namaline') as $stByNamaLine)                        
                                @foreach($stByNamaLine as $row)
                                @php
                                    $dat_default = date('H:i:s', strtotime('00:00:00'));
                                    $dat_content = $row->totwaktu;  
                                @endphp
                                @if ($dat_default == $dat_content)  
                                <tr>
                                      <td scope="row" style="font-weight:bold;font-size: 19px;">{{ $no }}</td>
                                      <td style="font-weight:bold;font-size:19px;">{{ $row->namaline }}</td>
                                      <td style="font-weight:bold;font-size:19px;">{{ $row->wo }}</td>
                                      <td>
                                          @if($row->reqlin != NULL)
                                              @if($row->resline != NULL)
                                              @else
                                                  <img id="bulb-on" src="{{  url('/assets7/images/lampu/kuning.png')  }}" width="30" height="40">
                                                  
                                              @endif
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->resline != NULL)
                                                @if($row->proses != NULL)

                                                @else
                                                    <img id="bulb-on" src="{{ url('/assets7/images/lampu/white.png') }}" width="30" height="40">
                                                @endif
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->lostim != NULL)
                                                @if($row->deliend != NULL)

                                                @else
                                                    <img id="bulb-on" src="{{ url('/assets7/images/lampu/red.png') }}" width="30" height="40">
                                                @endif
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->proses != NULL)
                                                @if($row->deli != NULL)

                                                @else
                                                    <img id="bulb-on" src="{{ url ('/assets7/images/lampu/blue.png') }}" width="30" height="40">  
                                                @endif
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->deli != NULL)
                                                @if($row->deliend != NULL)

                                                @else
                                                    <img id="bulb-on" src="{{ url('/assets7/images/lampu/green.png') }}" width="30" height="40">  
                                                @endif
                                            @else
                                            @endif
                                        </td>
                                        <td> 
                                             @if($row->totwaktu)
                                                @if($row->deliend  == NULL)     
                                                  {{ $row->totwaktu }}
                                                @endif    
                                              @endif
                                        </td>                                        
                                    </tr>
                                     <?php $no++ ;?>
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
          			</div>
        		</div>
    		</div>
		</div>
	</div>
@endsection

@push("scripts")
<script>
      setTimeout(function(){
		window.location.href = window.location.href;
	},60000)
   </script>
@endpush