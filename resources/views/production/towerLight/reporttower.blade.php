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
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Report Signal Tower</h3>
                        </div>                         
                        <div class="card-body" style="overflow:auto">
                                <center><h4>MONTHLY REPORT SIGNAL TOWER CUTING KE SEWING</h4></center>
                                {{-- <center><h6>FACTORY : {{$dataBranch->nama_branch}}</h6></center> --}}
                                {{-- <center><h6>{{$kodeBulan}}</h6></center> --}}
                                <br>
							<table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td style="font-weight:bold;">Date</td>
                                        <td style="font-weight:bold;">Name Line</td>
                                        <td style="font-weight:bold;">Qty Request</td>
                                        <td style="font-weight:bold;">Avr Respon Time (Min)</td>
                                        <td style="font-weight:bold;">Qty Losstime </td>
                                        <td style="font-weight:bold;">Avr Delivery Time </td>
                                        <td style="font-weight:bold;">Total Delivery Time (Min)</td>
                                        <td style="font-weight:bold;">Qty Req/Day (Pc)</td>
                                        <td style="font-weight:bold;">Qty Act/Day (Pc)</td>
							        </tr>
                                </thead>
                                
                                    @foreach($stowers->groupBy('tanggal')->values() as $keyDate => $stowersByDate)
                                        @foreach($stowersByDate->sortBy('namaline')->groupBy('namaline')->values() as $keyName => $stowersByDateAndName)
                                            <tr>
                                                @if($keyName === 0)                                                  
                                                <td rowspan="{{$stowersByDate->groupBy('namaline')->count()+2}}">{{ $stowersByDateAndName->first()->tanggal }}</td>
                                                @endif
                                                <td>{{ $stowersByDateAndName->first()->namaline }}</td>
                                                <td>{{ $stowersByDateAndName->count() }}</td>
                                                <td>{{ round($rataRataResponTime[$keyDate][$keyName],2) }}</td>
                                                <td>{{ round($jumlahLosTime[$keyDate][$keyName],2) }}</td>
                                                <td>{{ round($rataRataDeliEndTime[$keyDate][$keyName],2) }}</td>
                                                <td>{{ round($totWaktuDeliveryTime[$keyDate][$keyName],2) }}</td>
                                                <td>{{ $jumlahTargetPerHari[$keyDate][$keyName] }}</td>
                                                <td>{{ $jumlahRemarkPerHari[$keyDate][$keyName] }}</td>
                                            </tr>
									
                                        @endforeach
                                        <tr>
                                            <td style="background-color:#DCDCDC;">TOTAL ALL LINE</td>
                                            <td style="background-color:#DCDCDC;">{{ round($sumAllDataPerLineAndDate[$keyDate]['sumTotalRequest'],1) }}</td>
                                            <td style="background-color:#DCDCDC;">{{ round($sumAllDataPerLineAndDate[$keyDate]['sumResponTime'],2 )}}</td>
                                            <td style="background-color:#DCDCDC;">{{ round($sumAllDataPerLineAndDate[$keyDate]['sumTotalLossTime'],2) }}</td>
                                            <td style="background-color:#DCDCDC;">{{ round($sumAllDataPerLineAndDate[$keyDate]['sumDeliveryTime'],2) }}</td>
                                            <td style="background-color:#DCDCDC;">{{ round($sumAllDataPerLineAndDate[$keyDate]['sumTotalDeliveryTime'],2) }}</td>
                                            <td style="background-color:#DCDCDC;">{{ round($sumAllDataPerLineAndDate[$keyDate]['sumTotalRequestPerDay'],2) }}</td>
                                            <td style="background-color:#DCDCDC;">{{ round($sumAllDataPerLineAndDate[$keyDate]['sumTotalActualPerDay'],2) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color:#cfd7da;">AVERAGE ALL LINE</td>
                                            <td style="background-color:#cfd7da;">{{ round($avgAllDataPerLineAndDate[$keyDate]['avgTotalRequest'],1) }}</td>
                                            <td style="background-color:#cfd7da;">{{ round($avgAllDataPerLineAndDate[$keyDate]['avgAvgResponTime'],2 )}}</td>
                                            <td style="background-color:#cfd7da;">{{ round($avgAllDataPerLineAndDate[$keyDate]['avgTotalLossTime'],2) }}</td>
                                            <td style="background-color:#cfd7da;">{{ round($avgAllDataPerLineAndDate[$keyDate]['avgAvgDeliveryTime'],2) }}</td>
                                            <td style="background-color:#cfd7da;">{{ round($avgAllDataPerLineAndDate[$keyDate]['avgTotalDeliveryTime'],2) }}</td>
                                            <td style="background-color:#cfd7da;">{{ round($avgAllDataPerLineAndDate[$keyDate]['avgTotalRequestPerDay'],2) }}</td>
                                            <td style="background-color:#cfd7da;">{{ round($avgAllDataPerLineAndDate[$keyDate]['avgTotalActualPerDay'],2) }}</td>
                                        </tr>
                                      @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push("scripts")
<script>
$(document).ready(function() {
    $('#example1').DataTable(
        {
             "pageLength": 25,
             "responsive": true, "lengthChange": true, "autoWidth": false,
             "order": [ 6, "desc" ],
        } 
    );
} );
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $('#example1 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example1').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>
@endpush

