@extends("layouts.app")
@section("title","Monitoring Detail")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@push("sidebar")
  @include('acc_fin.budgeting.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <div class="row">
      <div class="col-md-3">
        <div class="card-flat p-4 h-160">
          <div class="icons2">
            <i class="fas fa-wallet"></i>
          </div>
          <div class="title-14-dark my-2">Budget {{$AccountDebit->deskripsi}}</div>
          <div class="title-24-600-dark">${{$budget_limit}}</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-160">
          <div class="icons2">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <div class="title-14-dark my-2">Budget Terpakai Aktual</div>
          <div class="title-24-600-dark">${{$budet_actual}}</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-160">
          <div class="icons2">
            <i class="fas fa-hand-holding-usd"></i>
          </div>
          <div class="title-14-dark my-2">Plan Budget</div>
          <div class="title-24-600-dark">${{$budet_plan}}</div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card-flat p-4 h-160">
          <div class="icons2">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="title-14-dark my-2">Balance</div>
          <div class="title-24-600-dark">${{$budget_limit-$budet_actual-$budet_plan}}</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead">
            <div class="justify-sb3 p-3">
              <div class="title-24-grey no-wrap">{{$AccountDebit->deskripsi}} {{$periode}}</div>
              <div class="endSide flexx gap-3">
                <div class="justify-center">
                  <div class="sub-title-14 title-hide mr-2">Show<span class="mx-1">:</span></div> 
                  <div class="input-group flex" id="showDate" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#showDate" data-toggle="datetimepicker">
                      <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18"></i><i class="ml-2 fas fa-caret-down"></i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input borderInput" data-target="#showDate" placeholder="Select Date"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section"></div>
          <div class="cardBody p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                    <thead>
                      <tr class="bg-thead2">
                        <th>No</th>
                        <th>Tanggal</th>
                        <!-- <th>NO ACCOUNT</th>
                        <th>ACCOUNT DESCRIPTION</th> -->
                        <th>Branch</th>
                        <th>Buyer</th>
                        <th>Explanation</th>
                        <th>Budget</th>
                        <th>Kurs</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($detail_Actual as $k1 => $v1)
                        <tr>
                          <td>{{$k1+1}}</td>
                          <td>
                            <div class="text-pink" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Actual">{{$v1->F0911_DGJ }}</div>
                          </td>
                          <td>{{$v1->F0911_MCU }}</td> 
                          <td>-</td> 
                          <td>-</td> 
                          <td><span class="title-14-light mr-2">$</span> {{$v1->F0911_AA }}</td>
                          <td>{{$v1->F0911_CRCD}} {{$v1->F0911_CRR}}</td> 
                        </tr>
                      @endforeach

                      @foreach($detail_plan as $k =>$v)
                        <tr>
                          <td>{{$k1+1}}</td>
                          <td>
                            <div class="text-hijau" data-toggle="popover1" data-trigger="hover" data-placement="top" data-content="Plan">{{$v->tanggal}}</div>
                          </td>
                          <!-- <td>{{$v->no_account}}</td>
                          <td>{{$v->desc_account}}</td> -->
                          <td>{{$v->branch}}</td> 
                          <td>{{$v->buyer}}</td> 
                          <td>{{$v->explanation}}</td> 
                          <td><span class="title-14-light mr-2">$</span> {{$v->plan_budget}}</td>
                          <td>{{$v->type}} {{$v->kurs}}</td> 
                        </tr>
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

  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })

  $(function () {
      $('[data-toggle="popover"]').popover()
  })
  $(function () {
      $('[data-toggle="popover1"]').popover1()
  })
</script>
@endpush