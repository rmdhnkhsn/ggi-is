@extends("layouts.app")
@section("title","Budgeting Limit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
@endpush

@push("sidebar")
  @include('acc_fin.budgeting.layouts.navbar')
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
          <div class="title-14-dark my-2"><span class="text-ping title-16 mr-1">${{$budget_limit-$Sum_budget_plan-$Sum_budget_actual}}</span> Tersisa</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-hand-holding-usd"></i>
          </div>
          <div class="title-14-dark my-2">Plan Budget</div>
          <div class="title-24-600-dark">${{$Sum_budget_plan}}</div>
          <div class="title-14-dark my-2"><span class="text-ping title-16 mr-1">${{$Sum_budget_actual}}</span> Actual Budget</div> 
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-190">
          <div class="icons2">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="title-14-dark my-2">Balance</div>
          <div class="title-24-600-dark text-ping">${{$budget_limit-$Sum_budget_plan-$Sum_budget_actual}}</div>
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
              <div class="title-14-dark2">{{$budget_actual['        1201']->sum('F0911_AA')}}</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">{{$budget_actual['        1204']->sum('F0911_AA')}}</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">{{$budget_actual['        1205']->sum('F0911_AA')}}</div>
            </div>
          </div>
          <div class="justify-sb mt-1">
            <div class="title-14-dark">1201</div>
            <div class="justify-sb w-95">
              <div class="title-14-dark">$</div>
              <div class="title-14-dark2">{{$budget_actual['        1206']->sum('F0911_AA')}}</div>
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
              <a href="{{ route('acc.budget.monitoring')}}" class="nav-link"></i>Monitoring Account</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.daily')}}" class="nav-link"></i>Budget Daily</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.limit')}}" class="nav-link active"></i>Budget Limit</a>
              <div class="blue-slide2"></div>
            </li>
            <li class="nav-item-show">
              <a href="{{ route('acc.budget.plan')}}" class="nav-link"></i>Budget Plan</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
        <div class="cardPart">
          <div class="cardHead p-3">
            <div class="joblist-date">
              <div class="title-24-grey no-wrap">Budgeting Limit</div>
              <div class="margin-date flexx gap-3">
                <div class="justify-center">
                  <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                  <div class="input-group flex" id="showDate" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#showDate" data-toggle="datetimepicker">
                        <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput w-105" data-target="#showDate" value="{{$year}}" placeholder="Select Date"/>
                  </div>
                </div>
                <div class="flex gap-3">
                  <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></a>
                  <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="section"></div>
          <div class="cardBody p-3">
            <form action="{{route('acc.store.limit')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <input type="hidden" class="form-control borderInput pl-4 w-120" id="" name="tahun" value="{{$year}}" placeholder="-">
                <div class="col-12">
                  <button id="btnSearch"><i class="fas fa-search"></i></button>  
                  <div class="card-close-orange py-1 px-2">
                    <div class="txt-orange">Keterangan : Tekan shift + scroll pada mouse untuk menggeser tabel secara horizontal</div>
                    <button type="button" class="close-icon" data-effect="fadeOut"><i class="fa fa-times"></i></button>
                  </div>
                  <div class="cards-scroll scrollX" id="scroll-bar">
                    <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                      <thead>
                        <tr class="bg-thead2">
                          <th class="bg-thead2">NO</th>
                          <th class="bg-thead2">NO ACCOUNT</th>
                          <th class="bg-thead2">ACCOUNT DESCRIPTION</th>
                          <th>Jan</th>
                          <th>Feb</th>
                          <th>Mar</th>
                          <th>Apr</th>
                          <th>May</th>
                          <th>Jun</th>
                          <th>Jul</th>
                          <th>Aug</th>
                          <th>Sep</th>
                          <th>Oct</th>
                          <th>Nov</th>
                          <th>Dec</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=0;
                        ?>
                        @foreach($records as $key => $value)
                        <?php
                        $no++;
                        ?>
                          <tr>
                            <td>{{$no}}</td>
                            <td>{{$value['account']}}
                              <input type="hidden" class="form-control borderInput pl-4 w-120" id="" name="account[]" value="{{$value['account']}}" placeholder="-">
                            </td>
                            <td>{{$value['deskripsi']}}
                              <input type="hidden" class="form-control borderInput pl-4 w-120" id="" name="deskripsi[]" value="{{$value['deskripsi']}}" placeholder="-">
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Jan[]" value="{{$value['Jan']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Feb[]" value="{{$value['Feb']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Mar[]" value="{{$value['Mar']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Apr[]" value="{{$value['Apr']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="May[]" value="{{$value['May']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Jun[]" value="{{$value['Jun']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Jul[]" value="{{$value['Jul']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Aug[]" value="{{$value['Aug']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Sep[]" value="{{$value['Sep']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Oct[]" value="{{$value['Oct']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Nov[]" value="{{$value['Nov']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                            <td>
                              <div class="container-tbl-btn relative">
                                <input type="number" step="0.01" class="form-control borderInput pl-4 w-120" id="" name="Dec[]" value="{{$value['Dec']}}" placeholder="-">
                                <span class="dollar">$</span>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-12 justify-end mt-3">
                  <button type="submit" class="btn-blue-md">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>

<script>
  $(function () {
      $('[data-toggle="popover"]').popover()
  })
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 500,
        dom: 'frt',
        fixedColumns:   {
          left: 3,
        },
    });
  });

  $('.close-icon').on('click',function() {
    $(this).closest('.card-close-orange').fadeOut();
  })
</script>


<script>
  jQuery(document).ready(function($) {
    $('#showDate').datetimepicker({
      format: 'YYYY',
      showButtonPanel: false
    })
    
    var filter_count = 0;
    $("#showDate").on("change.datetimepicker", ({date}) => {
      // console.log(filter_count);
      //   if(filter_count>0){
            var year = $("#showDate").find("input").val()
            // console.log(year);

            location.replace("{{ url('acf/blocking-budget/limit?year=') }}"+year) 
        // }
        //   filter_count++
        })
        // else if(filter==1){
        //   if (filter_count > 0) {
        //     var month = $("#report_date").find("input").val();
        //     showLoading();
        //     location.replace("{{ url('cmc/approval/-') }}"+month) 
        //   }
        //   filter_count++
        // }

    // var month = $("#month").val();
    // $('.input-date-fa').val(month + '')

  });
</script>
@endpush