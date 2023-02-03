@extends("layouts.app")
@section("title","Accounting")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('caccounting.all_branch')}}" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-file-invoice"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Validate Waiting</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('cc.ticket.accounting')}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-ticket-alt"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Accounting Ticket</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-12 mb-3">
        <div class="prc-analytics">Analytics</div>
      </div>
      <div class="col-xl-6">
        <div class="cards bg-card p-4 h-410">
          <div class="row mb-2">
            <div class="col-12 justify">
              <span class="po-pending">Invoice Validate Waiting</span>
              <!-- <a href="" class="prc-seeAll">See All<i class="icon-seeAll fas fa-arrow-right"></i></a> -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="cards-scroll scrollY pr-1" id="scrollBar" style="max-height:335px">
                @foreach($invoice as $key)
                <div class="alerttt">
                  <a href="http://10.8.150.31/invoiceexport?status=3&jde_code={{$key->jde_code}}" data-target="#Purchasing" title="View Info" target="_blank">
                    <div class="prc-alert alert-revisi">
                      <div class="prc-bg-count bg-kuning">
                        <span class="prc-count">{{$key->invoice_count}}</span>
                        <span class="prc-count2">Invoice</span>
                      </div>
                      <!-- <div class="prc-bg-count2 bg-merah">
                        <span class="prc-count">234</span>
                        <span class="prc-count2">Delay</span>
                      </div> -->
                      <div class="prc-originator-name truncate" style="left:85px;">
                        {{$key->supplier}}
                      </div>
                        <i class="prc-icon-revisi infoDanger fas fa-exclamation-triangle"></i>
                    </div>
                  </a>
                </div>
                @endforeach
              </div>
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