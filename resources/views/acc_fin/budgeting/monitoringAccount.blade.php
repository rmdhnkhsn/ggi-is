@extends("layouts.app")
@section("title","Monitoring Account")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush


@section("content")
<style>
  .blue-md-tabs2 .nav-item-show {
    border: none !important;
  }
  .nav-tabs {
    border-bottom: 1px solid #f2f2f2
  }
</style>
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-wallet"></i>
          </div>
          <div class="title-14-dark my-2">Budget {{$periode}}</div>
          <div class="title-24-600-dark">${{$budget_limit}}</div>
          <div class="title-14-dark my-2"><span class="text-hijau title-16 mr-1">${{$budget_limit-$Sum_budget_plan-$Sum_budget_actual}}</span> Tersisa</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-hand-holding-usd"></i>
          </div>
          <div class="title-14-dark my-2">Plan Budget</div>
          <div class="title-24-600-dark">${{$Sum_budget_plan}}</div>
          <div class="title-14-dark my-2"><span class="text-hijau title-16 mr-1">${{$Sum_budget_actual}}</span> Actual Budget</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="title-14-dark my-2">Balance</div>
          <div class="title-24-600-dark text-hijau">${{$budget_limit-$Sum_budget_plan-$Sum_budget_actual}}</div>
          <div class="title-14-dark my-2">Selisih Budget</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="flex gap-3">
            <div class="icons2-sm">
              <i class="far fa-building"></i>
            </div>
            <div class="title-14-dark-500 text-truncate">Anggaran terpakai (Aktual)</div>
          </div>
          <div class="borderlight3 my-2"></div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">{{collect($budget_actual)->sum('budget_1201')}}</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1204</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">{{collect($budget_actual)->sum('budget_1204')}}</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1205</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">{{collect($budget_actual)->sum('budget_1205')}}</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1206</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">{{collect($budget_actual)->sum('budget_1206')}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cards3" style="margin-bottom:-1px">
          <ul class="nav nav-tabs blue-md-tabs2 justify-start" role="tablist">
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.monitoring')}}" class="nav-link active"></i>Monitoring Account</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.daily')}}" class="nav-link"></i>Budget Daily</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.limit')}}" class="nav-link"></i>Budget Limit</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.plan')}}" class="nav-link"></i>Budget Plan</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
        <div class="cards-part">
          <div class="cards-head">
            <div class="justify-sb3">
              <div class="title-24-grey no-wrap">Monitoring Account</div>
              <div class="endSide flexx gap-3">
                <!-- <div class="justify-center">
                  <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                  <div class="input-group flex" id="showDate" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#showDate" data-toggle="datetimepicker">
                      <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput w-135" data-target="#showDate" placeholder="Select Date"/>
                  </div>
                </div> -->
                <button type="button" class="btnSoftBlue" data-toggle="modal" data-target="#filter">Filter <i class="fas fa-filter"></i></button>
                @include('acc_fin.budgeting.partials.filter')
                <div class="flex gap-3">
                  <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></a>
                  <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="cards-body p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th rowspan="2" style="padding-top:2rem">NO</th>
                        <th rowspan="2" style="padding-top:2rem">ACCOUNT DESCRIPTION</th>
                        <th rowspan="2" style="padding-top:2rem">BUDGET LIMIT</th>
                        <th colspan="4" class="text-center">BRANCH</th>
                        <th rowspan="2" style="padding-top:2rem">ACTUAL</th>
                        <th rowspan="2" style="padding-top:2rem">BALANCE</th>
                        <th rowspan="2" style="padding-top:2rem">ACT</th>
                      </tr>
                      <tr class="bg-thead2">
                        <th>1201</th>
                        <th>1204</th>
                        <th>1205</th>
                        <th>1206</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($monitoring as $k=>$v)
                        <tr>
                          <td>{{$k+1}}</td>
                          <td>{{$v['deskripsi']}}</td>
                          <td><span class="title-14-light mr-2">$</span> {{$v['limit']}}</td> 
                          <td><span class="title-14-light mr-2">$</span>{{$v['budget_1201']}}</td> 
                          <td><span class="title-14-light mr-2">$</span>{{$v['budget_1204']}}</td> 
                          <td><span class="title-14-light mr-2">$</span>{{$v['budget_1205']}}</td> 
                          <td><span class="title-14-light mr-2">$</span>{{$v['budget_1206']}}</td> 
                          <td><span class="title-14-light mr-2">$</span>{{$v['total']}}</td> 
                          <td><span class="title-14-light mr-2">$</span>{{$v['limit']-$v['total']}}</td> 
                          <td>
                            <div class="container-tbl-btn">
                              <a href="{{ route('budget.monitoring.detail',['account='.$v['account'],'date='.$date])}}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></a>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                      <!-- <tr>
                        <td>2</td>
                        <td>MEDICALALLOWANCE</td>
                        <td><span class="title-14-light mr-2">$</span> 120.000</td> 
                        <td><span class="title-14-light mr-2">$</span> 4,32</td> 
                        <td><span class="title-14-light mr-2">$</span> 4,32</td> 
                        <td><span class="title-14-light mr-2">$</span> 4,32</td> 
                        <td><span class="title-14-light mr-2">$</span> 4,32</td> 
                        <td><span class="title-14-light mr-2">$</span> 4,32</td> 
                        <td><span class="title-14-light mr-2">$</span> 4,32</td> 
                        <td>
                          <div class="container-tbl-btn">
                            <a href="{{ route('budget.monitoring.detail')}}" class="btn-icon-blue"><i class="fs-18 fas fa-info"></i></a>
                          </div>
                        </td>
                      </tr> -->
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
</section>
@endsection

@push("scripts")
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'rtp',
    });
  });

  $('#showDate').datetimepicker({
    format: 'DD-MM-YYYY',
    showButtonPanel: false
  })

  $('#month').datetimepicker({
    format: 'Month',
    showButtonPanel: false
  })

  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
</script>
@endpush