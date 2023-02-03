@extends("layouts.app")
@section("title","Factory Audit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

@endpush
@push("sidebar")
  @include('qc.factory_audit.layouts.navbar')
@endpush

@section("content")
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 justify-center">
              <span class="main-title">FA Report Detail</span>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="fa-report-cards h-200">
                    <div class="fa-report-title">PO Number</div>
                    <div class="fa-report-desc text-truncate">{{ $data->po_number }}</div>
                    <div class="fa-report-title mt-2">Buyer Name</div>
                    <div class="fa-report-desc text-truncate">{{ $data->buyer }}</div>
                    <div class="fa-report-title mt-2">Style</div>
                    <div class="fa-report-desc text-truncate">{{ $data->style }}</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="fa-report-cards h-200">
                    <div class="fa-report-title">Article</div>
                    <div class="fa-report-desc text-truncate">{{ $data->article }}</div>
                    <div class="fa-report-title mt-2">Color</div>
                    <div class="fa-report-desc text-truncate">{{ $data->color }}</div>
                    <div class="fa-report-title mt-2">Auditor</div>
                    <div class="fa-report-desc text-truncate">{{ $data->auditor_name }}</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="fa-report-cards h-200">
                    <div class="fa-report-title">Shipment TOD</div>
                    <div class="fa-report-desc text-truncate">{{ $data->tanggal }}</div>
                    <div class="fa-report-title mt-2">Destination</div>
                    <div class="fa-report-desc text-truncate">{{ $data->destination }}</div>
                    <div class="fa-report-title mt-2">Order QTY</div>
                    <div class="fa-report-desc text-truncate">{{ $data->order_qty }}</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="fa-report-cards h-200">
                    <div class="fa-report-title">Total Carton</div>
                    <div class="fa-report-desc text-truncate">{{ $data->total_carton }}</div>
                    <div class="fa-report-title mt-2">Sample Carton</div>
                    <div class="fa-report-desc text-truncate">{{ $data->sample_carton }}</div>
                    <div class="fa-report-title mt-2">Sample Pcs</div>
                    <div class="fa-report-desc text-truncate">{{ $data->sample_pcs }}</div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="fa-report-cards">
                    <div class="flex">
                        <div class="fa-count">
                            <div class="fa-count-badge">1</div>
                        </div>
                        <div class="fa-header-table justify-sb">
                            <div class="date">
                                <div class="title">FA Date</div>
                                <div class="desc">{{ $data->tanggal }}</div>
                            </div>
                            <div class="reject">
                                <div class="title">Total Reject</div>
                                <div class="desc">{{ $data->total_reject_pcs }}</div>
                            </div>
                            <div class="result">
                                <div class="title">Audit Result</div>
                                @if ($data->status == 'fail')
                                <div class="desc"><span class="txt-failed">{{ $data->status }}</span></div> 
                                @else
                                <div class="desc"><span class="txt-pased">{{ $data->status }}</span></div> 
                                @endif
                            </div>
                            <div class="data">
                                <div class="desc"><span class="txt-primary">FA Data</span></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row scrollX" id="scroll-bar">
                        <div class="col-12">
                            <table class="table fa-tbl-content no-wrap">
                                <thead>
                                    <tr>
                                        <th width="10%">NO</th>
                                        <th width="65%">Remark</th>
                                        <th width="25%">Quantity Reject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                        @foreach ($fa_data as $key=>$value )
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value['remark'] }}</td>
                                                <td>{{ $value['qty_reject'] }}</td>
                                            </tr>
                                            <?php $no++ ;?>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="fa-report-cards">
                    <div class="flex">
                        <div class="fa-count">
                            <div class="fa-count-badge2">2</div>
                        </div>
                        <div class="fa-header-table justify-sb">
                            <div class="date">
                                <div class="title">FA Date</div>
                                <div class="desc">{{ $data->updated_at }}</div>
                            </div>
                            <div class="reject">
                                <div class="title">Total Reject</div>
                                <div class="desc">{{ $data->total_reject}}</div>
                            </div>
                            <div class="result">
                                <div class="title">Audit Result</div>
                               @if ($data->revisian == 'fail')
                                <div class="desc"><span class="txt-failed">{{ $data->revisian }}</span></div> 
                                @else
                                <div class="desc"><span class="txt-pased">{{ $data->revisian }}</span></div> 
                                @endif
                            </div>
                            <div class="data">
                                <div class="desc"><span class="txt-failed">Revision</span></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row scrollX" id="scroll-bar">
                        <div class="col-12">
                            <table class="table fa-tbl-content no-wrap">
                                <thead>
                                    <tr>
                                        <th width="10%">NO</th>
                                        <th width="65%">Remark</th>
                                        <th width="25%">Quantity Reject</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                    <?php $no=1;?>
                                        @foreach ($revision as $key=>$value )
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value['remark'] }}</td>
                                                <td>{{ $value['qty_reject'] }}</td>
                                            </tr>
                                            <?php $no++ ;?>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 my-2">
                <span class="title-14">Image</span>
            </div>
            <div class="col-md-2">
                @if ($data->photo_1)
                    <a href="{{ url("file_factory/$data->photo_1") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("file_factory/$data->photo_1") }}" class="fa-images mt-lightbox">
                    </a>
                @else
                    
                @endif 
            </div>
            <div class="col-md-2">
                @if ($data->photo_2)
                    <a href="{{ url("file_factory/$data->photo_2") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("file_factory/$data->photo_2") }}" class="fa-images mt-lightbox">
                    </a>
                @else
                    
                @endif 
            </div>
            <div class="col-md-2">
                @if ($data->photo_3)
                    <a href="{{ url("file_factory/$data->photo_3") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("file_factory/$data->photo_3") }}" class="fa-images mt-lightbox">
                    </a>
                @else
                    
                @endif 
            </div>
            <div class="col-md-2">
                @if ($data->photo_4)
                    <a href="{{ url("file_factory/$data->photo_4") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("file_factory/$data->photo_4") }}" class="fa-images mt-lightbox">
                    </a>
                @else
                    
                @endif 
            </div>

            <div class="col-12 my-2 mt-4">
                <span class="title-14">Validator</span>
            </div>
            <div class="col-md-3">
                <div class="cards h-170">
                    <div class="row">
                      <div class="col-12">
                        <a href="{{ url("signature/$data->signature") }}" class="fa-ttd" data-toggle="lightbox" data-gallery="gallery">
                            <img src="{{ url("signature/$data->signature") }}" class="fa-ttd">
                        </a>
                      </div>
                      <div class="col-12 text-right">
                          <div class="desc-ttd mr-2">Auditor</div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cards h-170">
                    <div class="row">
                      <div class="col-12">
                        <a href="{{ url("signature_spv/$data->signature_spv") }}" class="fa-ttd" data-toggle="lightbox" data-gallery="gallery">
                            <img src="{{ url("signature_spv/$data->signature_spv") }}" class="fa-ttd">
                        </a>
                      </div>
                      <div class="col-12 text-right">
                          <div class="desc-ttd mr-2">SPV</div>
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
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

@endpush