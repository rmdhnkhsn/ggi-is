@extends("layouts.app")
@section("title","Production")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">

@endpush

@push("sidebar")
  @include('production.layouts.navbar')
@endpush



@section("content")
<section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
            </div>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
               <div class="card">
                  <!-- /.card-header -->
                    <div class="card-header">
                       <h3 class="card-title">Performance Signal Tower</h3>
                    </div>
                        <div class="card-body" style="overflow:auto">
                             <center><h4>MONTHLY REPORT PERFORMANCE PARAMETER SIGNAL TOWER CUTING KE SEWING</h4></center>
                                {{-- <center><h6>FACTORY : {{$dataBranch->nama_branch}}</h6></center> --}}
                                {{-- <center><h6>{{$kodeBulan}}</h6></center> --}}
                                <br>
                            {{-- <center><h1 style="font-weight:bold;font-size:20px;">PERFORMANCE PARAMETER</h1></center> --}}
                                <table class="table table-bordered table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <td style="font-weight:bold;">Date</td>
                                            <td style="font-weight:bold;">Qty Request</td>
                                            <td style="font-weight:bold;">Avr Respon Time (Min)</td>
                                            <td style="font-weight:bold;">Qty Losstime </td>
                                            <td style="font-weight:bold;">Avr Delivery Time </td>
                                            <td style="font-weight:bold;">Total Delivery Time (Min)</td>
                                            <td style="font-weight:bold;">Qty Req/Day (Pc)</td>
                                            <td style="font-weight:bold;">Qty Actual/Day (Pc)</td>
                                            <td style="font-weight:bold;">% Request Fulfilled</td>
                                        </tr>
                                        <tbody>
                                            @foreach($stowers->groupBy('tanggal')->values() as $keyDate => $stowersByDate)
                                                @foreach($stowersByDate->sortBy('namaline')->groupBy('namaline')->values() as $keyName => $stowersByDateAndName) 
                                                    <tr>
                                                        @if($keyName === 0)
                                                            <td>{{ $stowersByDate->first()->tanggal }}</td>
                                                            <td>{{ round($sumAllDataPerLineAndDate[$keyDate]['sumTotalRequest'],1) }}</td>
                                                            <td>{{ round($avgAllDataPerLineAndDate[$keyDate]['avgAvgResponTime'],2 )}}</td>
                                                            <td>{{ round($avgAllDataPerLineAndDate[$keyDate]['avgTotalLossTime'],2) }}</td>
                                                            <td>{{ round($avgAllDataPerLineAndDate[$keyDate]['avgAvgDeliveryTime'],2) }}</td>
                                                            <td>{{ round($avgAllDataPerLineAndDate[$keyDate]['avgTotalDeliveryTime'],2) }}</td>
                                                            <td>{{ round($sumAllDataPerLineAndDate[$keyDate]['sumTotalRequestPerDay'],2) }}</td>
                                                            <td>{{ ($sumAllDataPerLineAndDate[$keyDate]['sumTotalActualPerDay']) }}</td>
                                                            <td>{{ round($pemenuhanRequest[$keyDate][$keyName],2) }} %</td>
                                                        @endif
                                                    </tr>
                                                @endforeach  
                                            @endforeach   
                                        </tbody>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@push("scripts")
<script>
$(document).ready(function() {
    $('.select3').select2({
        placeholder:"Select Branch",
        theme: 'bootstrap4'
    });
});
$(document).ready(function() {
    $('.select4').select2({
        placeholder:"Select Branch Detail",
        theme: 'bootstrap4'
    });
});
$('#reservationdate').datetimepicker({
    format: 'Y-MM-DD'
    });
</script>
@endpush
