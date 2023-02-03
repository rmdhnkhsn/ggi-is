@include('qc.final-inspection.layouts.header')
@include('qc.final-inspection.layouts.navbar')

<style>
    table, td, th {
    border: 1px solid black;
    text-align:center;
    font-size:13px;
    padding:3px;
    }
    table {
    border-collapse: collapse;
    }
    table thead tr th,
    table tfoot tr th {
        font-size: 15px;
        /* background: #007BFF15; */
        background: #aaaaaa40
    }
    
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                       
                        <div class="card-body" style="overflow:scroll;">
                            <center><h4>ANNUAL REPORT FINAL INSPECTION ALL FACILLITY</h4></center>
                            <center><h6>ALL FACILITY </h6></center>
                            <center><h6>YEAR : {{$tahun}}</h6></center>
                            <br>
                            <table class="tables">  
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">MONTH</th>
                                        <th rowspan="2">BRANCH</th>
                                        <th colspan="2">Nilai</th>
                                        <th rowspan="2">TOTAL</th>
                                        <th rowspan="2">REMARK</th>
                                    </tr>
                                    <tr>
                                        <th>PASS</th>
                                        <th>FAIL</th>
                                    </tr>
                                </thead>
                          
                                      @foreach ($z as $key => $value)
                                    <tr>
                                        <td rowspan="{{count($value) + 1}}">{{ $loop->iteration}}</td>
                                        <td rowspan="{{count($value) + 1}}">{{$key}}</td>
                                    </tr>
                                    @foreach($value as $dp)
                                    <tr>
                                        <td>{{ $dp['branchdetail'] }}</td>
                                        <td>{{ $dp['pass'] }}</td>
                                        <td>{{ $dp['fail'] }}</td>
                                        <td>{{ $dp['total'] }}</td>
                                        <td>{{ $dp['remark'] }}</td>
                                    </tr>
                                   @endforeach
                                   @endforeach
                                </tbody>
                               <tfoot>
                                   
                                    <tr>
                                        <th rowspan="2" colspan="3">TOTAL</th>
                                        <th>{{ $passResult }}</th>
                                        <th>{{ $failResult }}</th>
                                        <th>{{ $total }}</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="1" colspan="2">%FAIL</th>
                                        <th>{{ $perFail }} %</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                             <form action="{{ route('yearlyAll_pdf_final')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="tahun" id="tahun" value="{{$tahun}}">
                                {{-- <input type="hidden" name="branch" id="branch" value="{{$dataBranch->id}}"> --}}
                                <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-file-pdf"></i> Download PDF</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>

@include('qc.final-inspection.layouts.footer')