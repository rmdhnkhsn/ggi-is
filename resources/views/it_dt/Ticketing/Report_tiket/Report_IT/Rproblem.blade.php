@extends("layouts.app")
@section("title","IT & DT Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
						    <center><h3 style="font-weight:bold;font-size:20px;"> MONTHLY REPORT TICKET IT SUPPORT</h3>
                            <h3 style="font-weight:bold;font-size:15px;"> FACTORY : {{$dataBranch->nama_branch}}</h3>
                            <h3 style="font-weight:bold;font-size:13px;"> {{$dataBulan}}  {{$tahun}}</h3> </center>
							<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td style="font-weight:bold;">Problem Category</td>
                                        <td style="font-weight:bold;">Sub Category</td>
                                        <td style="font-weight:bold;">Total Problem Sub Category </td>
							        </tr>
                                </thead>
							    <tbody>
                                    @foreach($tiket->groupBy('rusak')->values() as $keyDate => $TiketByProblem)
                                        @foreach($TiketByProblem->sortBy('sub_rusak')->groupBy('sub_rusak')->values() as $keyName => $TiketByProblemAndSub)
                                        <tr>
                                            @if($keyName === 0)
                                            <td rowspan="{{$TiketByProblem->groupBy('sub_rusak')->count() }}" >{{ $TiketByProblemAndSub->first()->rusak }}</td>
                                            @endif
                                            <td>{{ $TiketByProblemAndSub->first()->sub_rusak }}</td>
                                            <td>{{ $TiketByProblemAndSub->count() }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" style="background-color:#DCDCDC;">TOTAL Problem Category</td>
                                            <td style="background-color:#DCDCDC;">{{ $TiketByProblem->count() }}</td>
                                        </tr>
                                    @endforeach
                                        <td style="background-color:#C0C0C0;" colspan="2" > TOTAL Problem</td>
                                        <td style="background-color:#C0C0C0;">{{ $tiket->count() }}</td>
                                </tbody>
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

