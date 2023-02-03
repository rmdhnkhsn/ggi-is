@extends("layouts.app")
@section("title","Hourly Operator Performance")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/dataTablesSearchLeft.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<style>
.card-finish-detail {
  margin-top:0px;
}

.table tbody tr td {
  font-size: 10px;
}

.table thead tr th {
  font-size: 12px;
}

.table tfoot tr th {
  font-size: 12px;
}



/* .table {
  overflow: scroll;
  height: 180px;
  width: 300px;
} */

/* table {
  border-collapse: collapse;
} */

table th,
table td {
  max-width: 300px;
  padding: 8px 16px;
  border: 1px solid #ddd;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

/* table thead {
  position: sticky;
  inset-block-start: 0;
  background-color: #ddd;
} */
</style>
@endpush

@push("sidebar")
  @include('production.cutting.product_costing.layouts.navbar')
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="ctg-ppic-title">Today Issue</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards bg-card">
          <div class="row">
              <div class="col-xl-4">
                  <div class="cards card-finish-detail h-300F scrollX">
                    <div class="row py-2">
                      <div class="col-12 text-center">
                        <span class="finished-cln">Top 5 Downtime Machine</span>
                        <em style="font-size:12px;">(Mesin Rusak)</em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="no-wrap">No</th>
                              <th class="no-wrap">Ftr</th>
                              <th class="no-wrap">Line</th>
                              <th class="no-wrap">Nama</th>
                              <th class="no-wrap">Elapsed.Tm</th>
                              <th class="no-wrap">Count</th>
                              <th class="no-wrap">Proses</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=1;
                            @endphp
                            @foreach($operator_performance->where('t_downtime','>',0)->sortByDesc('TotalTimeDowntime')->take(5) as $d)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$d->fasilitas}}</td>
                                <td>{{$d->line}}</td>
                                <td>{{substr($d->nama,0,10).'...'}}</td>
                                <td>{{$d->TotalTimeDowntime}}</td>
                                <td>{{$d->t_downtime}}</td>
                                <td>{{$d->proses}}</td>
                              </tr>
                              @php
                                $i+=1;
                              @endphp
                            @endforeach		
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-4">
                  <div class="cards card-finish-detail h-300F scrollX">
                    <div class="row py-2">
                      <div class="col-12 text-center">
                        <span class="finished-cln">Top 5 Lost Time</span>
                        <em style="font-size:12px;">(Keperluan Pribadi)</em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="no-wrap">No</th>
                              <th class="no-wrap">Ftr</th>
                              <th class="no-wrap">Line</th>
                              <th class="no-wrap">Nama</th>
                              <th class="no-wrap">Elapsed.Tm</th>
                              <th class="no-wrap">Count</th>
                              <th class="no-wrap">Proses</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=1;
                            @endphp
                            @foreach($operator_performance->where('t_lost','>',0)->sortByDesc('TotalLosttime')->take(5) as $d)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$d->fasilitas}}</td>
                                <td>{{$d->line}}</td>
                                <td>{{substr($d->nama,0,10).'...'}}</td>
                                <td>{{$d->TotalLosttime}}</td>
                                <td>{{$d->t_lost}}</td>
                                <td>{{$d->proses}}</td>
                              </tr>
                              @php
                                $i+=1;
                              @endphp
                            @endforeach		
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-4">
                  <div class="cards card-finish-detail h-300F scrollX">
                    <div class="row py-2">
                      <div class="col-12 text-center">
                        <span class="finished-cln">Top 5 Overload</span>
                        <em style="font-size:12px;">(Kelebihan WIP)</em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="no-wrap">No</th>
                              <th class="no-wrap">Ftr</th>
                              <th class="no-wrap">Line</th>
                              <th class="no-wrap">Nama</th>
                              <th class="no-wrap">Elapsed.Tm</th>
                              <th class="no-wrap">Count</th>
                              <th class="no-wrap">Proses</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=1;
                            @endphp
                            @foreach($operator_performance->where('t_overload','>',0)->sortByDesc('TotalOverload')->take(5) as $d)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$d->fasilitas}}</td>
                                <td>{{$d->line}}</td>
                                <td>{{substr($d->nama,0,10).'...'}}</td>
                                <td>{{$d->TotalOverload}}</td>
                                <td>{{$d->t_overload}}</td>
                                <td>{{$d->proses}}</td>
                              </tr>
                              @php
                                $i+=1;
                              @endphp
                            @endforeach		
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-xl-4">
                  <div class="cards card-finish-detail h-300F scrollX">
                    <div class="row py-2">
                      <div class="col-12 text-center">
                        <span class="finished-cln">Top 5 Bantuan Teknis</span>
                        <em style="font-size:12px;">(Operator Coaching)</em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="no-wrap">No</th>
                              <th class="no-wrap">Ftr</th>
                              <th class="no-wrap">Line</th>
                              <th class="no-wrap">Nama</th>
                              <th class="no-wrap">Elapsed.Tm</th>
                              <th class="no-wrap">Count</th>
                              <th class="no-wrap">Proses</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=1;
                            @endphp
                            @foreach($operator_performance->where('t_coach','>',0)->sortByDesc('TotalCoaching')->take(5) as $d)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$d->fasilitas}}</td>
                                <td>{{$d->line}}</td>
                                <td>{{substr($d->nama,0,10).'...'}}</td>
                                <td>{{$d->TotalCoaching}}</td>
                                <td>{{$d->t_coach}}</td>
                                <td>{{$d->proses}}</td>
                              </tr>
                              @php
                                $i+=1;
                              @endphp
                            @endforeach		
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-4">
                  <div class="cards card-finish-detail h-300F scrollX">
                    <div class="row py-2">
                      <div class="col-12 text-center">
                        <span class="finished-cln">Top 5 Supply Problem</span>
                        <em style="font-size:12px;"></em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="no-wrap">No</th>
                              <th class="no-wrap">Ftr</th>
                              <th class="no-wrap">Line</th>
                              <th class="no-wrap">Nama</th>
                              <th class="no-wrap">Elapsed.Tm</th>
                              <th class="no-wrap">Count</th>
                              <th class="no-wrap">Proses</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=1;
                            @endphp
                            @foreach($operator_performance->where('t_problem','>',0)->sortByDesc('TotalSupply')->take(5) as $d)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$d->fasilitas}}</td>
                                <td>{{$d->line}}</td>
                                <td>{{substr($d->nama,0,10).'...'}}</td>
                                <td>{{$d->TotalSupply}}</td>
                                <td>{{$d->t_problem}}</td>
                                <td>{{$d->proses}}</td>
                              </tr>
                              @php
                                $i+=1;
                              @endphp
                            @endforeach		
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-xl-4">
                  <div class="cards card-finish-detail h-300F scrollX">
                    <div class="row py-2">
                      <div class="col-12 text-center">
                        <span class="finished-cln">Top 5 Rework</span>
                        <em style="font-size:12px;">(Perbaikan)</em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="no-wrap">No</th>
                              <th class="no-wrap">Ftr</th>
                              <th class="no-wrap">Line</th>
                              <th class="no-wrap">Nama</th>
                              <th class="no-wrap">Elapsed.Tm</th>
                              <th class="no-wrap">Count</th>
                              <th class="no-wrap">Proses</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=1;
                            @endphp
                            @foreach($operator_performance->where('t_rework','>',0)->sortByDesc('TotalPerbaikan')->take(5) as $d)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$d->fasilitas}}</td>
                                <td>{{$d->line}}</td>
                                <td>{{substr($d->nama,0,10).'...'}}</td>
                                <td>{{$d->TotalPerbaikan}}</td>
                                <td>{{$d->t_rework}}</td>
                                <td>{{$d->proses}}</td>
                              </tr>
                              @php
                                $i+=1;
                              @endphp
                            @endforeach		
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-xl-4">
                  <div class="cards card-finish-detail h-300F scrollX">
                    <div class="row py-2">
                      <div class="col-12 text-center">
                        <span class="finished-cln">Top 5 Change Layout</span>
                        <em style="font-size:12px;">(Perubahan Layout)</em>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 text-center">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="no-wrap">No</th>
                              <th class="no-wrap">Ftr</th>
                              <th class="no-wrap">Line</th>
                              <th class="no-wrap">Nama</th>
                              <th class="no-wrap">Elapsed.Tm</th>
                              <th class="no-wrap">Count</th>
                              <th class="no-wrap">Proses</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $i=1;
                            @endphp
                            @foreach($operator_performance->where('t_change','>',0)->sortByDesc('TotalLayout')->take(5) as $d)
                              <tr>
                                <td>{{$i}}</td>
                                <td>{{$d->fasilitas}}</td>
                                <td>{{$d->line}}</td>
                                <td>{{substr($d->nama,0,10).'...'}}</td>
                                <td>{{$d->TotalLayout}}</td>
                                <td>{{$d->t_change}}</td>
                                <td>{{$d->proses}}</td>
                              </tr>
                              @php
                                $i+=1;
                              @endphp
                            @endforeach		
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
          </div>

          
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection

@push("scripts")
<script type="text/javascript">

</script>
@endpush