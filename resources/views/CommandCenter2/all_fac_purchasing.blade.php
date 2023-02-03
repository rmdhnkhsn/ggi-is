@extends("layouts.app")
@section("title","Purchasing")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="prc-analytics">Analytics</span>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="cards bg-card p-4 h-410 scroll" id="scroll-bar">
              <div class="row mb-2">
                <div class="col-12 justify">
                  <span class="po-pending">PO Item Due Date By Originator <em style="font-size: 11px;">(*delay=promised date exceed, due date=next 14 days)</em></span>
                  <!-- <a href="" class="prc-seeAll">See All<i class="icon-seeAll fas fa-arrow-right"></i></a> -->
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  @foreach($po->groupBy('f4311_torg') as $key=>$value)
                  <div class="alerttt">
                      <a href="{{route('cpurchasing.po_delayed_detail',['originator'=>$key])}}" data-target="#Purchasing" title="View Info">
                        <div class="prc-alert alert-revisi">
                          <div class="prc-bg-count bg-kuning">
                            <span class="prc-count">{{$value->where('due_receipt_days','>=',0)->count()}}</span>
                            <span class="prc-count2">Due Date</span>
                          </div>
                          <div class="prc-bg-count2 bg-merah">
                            <span class="prc-count">{{$value->where('due_receipt_days','<',0)->count()}}</span>
                            <span class="prc-count2">Delay</span>
                          </div>
                          <span class="prc-originator-name truncate">
                              {{$key}}
                          </span>
                            <i class="prc-icon-revisi fas fa-exclamation-triangle"></i>
                        </div>
                      </a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="cards bg-card p-4 h-410 scroll" id="scroll-bar">
              <div class="row mb-2">
                <div class="col-12 justify">
                  <span class="po-pending">Latest 5 PO Due Date</span>
                  <a href="{{route('cpurchasing.po_delayed_detail')}}" class="prc-seeAll">See All<i class="icon-seeAll fas fa-arrow-right"></i></a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  @foreach($po->take(5) as $data)
                  <div class="alerttt">
                    <!-- <a class="prc-modal" data-toggle="modal" data-target="#Purchasing3" title="View Info">  -->
                      <div class="prc-alert {{$data->due_receipt_days>0?'alert-kuning':'alert-merah'}}">
                        <div class="{{$data->due_receipt_days>0?'prc-bg-kuning bg-kuning':'prc-bg-merah bg-merah'}}">
                        </div>
                        <div class="row">
                          <div class="col-10">
                            <span class="prc-desc">
                              <div class="text-truncate"><b class="fw-600">{{$data->f4311_doco.'/'.$data->f4311_dcto.'/'.$data->f4311_kcoo}}</b> late {{$data->due_receipt_days}} days</div>
                              <div>Originator : {{$data->f4311_torg}}</div>
                            </span>
                          </div>
                          <div class="col-2">
                            <i class="{{$data->due_receipt_days>0?'prc-icon-kuning':'prc-icon-merah'}} fas fa-exclamation-triangle"></i>
                          </div>
                        </div>
                      </div>
                    <!-- </a> -->
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </section>
@endsection

@push("scripts")

@endpush