@extends("layouts.app")
@section("title","Detail Done")
@push("styles")
<meta http-equiv="Content-Type" content="text/html; charset=ENCODING HERE">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="cards">
          <div class="row">
            <div class="col-12 justify-center py-4">
              <div class="title-30 text-center">Tracking Sample Request</div>
            </div>
            <div class="col-12">
              <div class="bg-tracking h-185">
                <div class="cards-scroll scrollX" id="scroll-bar2">
                  <ul>
      
                    <li class="progress-item-check">
                       @if (($dataSample2->departement_trecking == 'PATTERN')|| ($dataSample2->departement_trecking == 'DEV')|| ($dataSample2->departement_trecking == 'CUTTING')|| ($dataSample2->departement_trecking == 'SEWING') || ($dataSample2->departement_trecking == 'FINISH'))
                        <li class="progress-item-check">
                          <img src="{{url('images/iconpack/sample_request/check.svg')}}" class="icon-stepbar"> 
                      @else
                        <li class="progress-item">
                          <img src="{{url('images/iconpack/sample_request/accepting.svg')}}" class="icon-stepbar">
                       @endif
                      <div class="stepbar one">
                        <span>1</span>
                      </div>
                      <p class="title-stepbar">Accepting</p>
                    </li>
                      @if (($dataSample2->departement_trecking == 'PATTERN')|| ($dataSample2->departement_trecking == 'DEV')|| ($dataSample2->departement_trecking == 'CUTTING')|| ($dataSample2->departement_trecking == 'SEWING') || ($dataSample2->departement_trecking == 'FINISH'))
                        <li class="progress-item-check">
                          <img src="{{url('images/iconpack/sample_request/check.svg')}}" class="icon-stepbar"> 
                      @else
                        <li class="progress-item">
                          <img src="{{url('images/iconpack/sample_request/pattern.svg')}}" class="icon-stepbar">
                       @endif
                      <div class="stepbar two">
                        <span>2</span>
                      </div>
                      <p class="title-stepbar">Pattern</p>
                    </li>
                    @if (($dataSample2->departement_trecking == 'DEV')|| ($dataSample2->departement_trecking == 'CUTTING')|| ($dataSample2->departement_trecking == 'SEWING') || ($dataSample2->departement_trecking == 'FINISH'))
                        <li class="progress-item-check">
                          <img src="{{url('images/iconpack/sample_request/check.svg')}}" class="icon-stepbar"> 
                      @else
                        <li class="progress-item">
                          <img src="{{url('images/iconpack/sample_request/qc.svg')}}" class="icon-stepbar">
                       @endif
                      <div class="stepbar two">
                        <span>3</span>
                      </div>
                      <p class="title-stepbar">Development</p>
                    </li>
                      
                      @if (($dataSample2->departement_trecking == 'CUTTING') || ($dataSample2->departement_trecking == 'SEWING')||($dataSample2->departement_trecking == 'FINISH'))
                        <li class="progress-item-check">
                          <img src="{{url('images/iconpack/sample_request/check.svg')}}" class="icon-stepbar"> 
                      @else
                        <li class="progress-item">
                          <img src="{{url('images/iconpack/sample_request/cutting.svg')}}" class="icon-stepbar">
                       @endif
                      <div class="stepbar three">
                        <span>4</span>
                      </div>
                      <p class="title-stepbar">Cutting</p>
                    </li>
                      @if (($dataSample2->departement_trecking == 'SEWING' )|| ($dataSample2->departement_trecking == 'FINISH'))
                        <li class="progress-item-check">
                          <img src="{{url('images/iconpack/sample_request/check.svg')}}" class="icon-stepbar"> 
                      @else
                        <li class="progress-item">
                          <img src="{{url('images/iconpack/sample_request/sewing.svg')}}" class="icon-stepbar">
                       @endif
                      <div class="stepbar four">
                        <span>5</span>
                      </div>
                      <p class="title-stepbar">Sewing</p>
                    </li>
                    @if ($dataSample2->departement_trecking == 'FINISH')
                        <li class="progress-item-check">
                          <img src="{{url('images/iconpack/sample_request/check.svg')}}" class="icon-stepbar"> 
                      @else
                        <li class="progress-item">
                          <img src="{{url('images/iconpack/sample_request/finish.svg')}}" class="icon-stepbar">
                       @endif                     
                      <div class="stepbar six">
                        <span>6</span>
                      </div>
                      <p class="title-stepbar">Finish</p>
                    </li>
      
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row p-4"> 
            <div class="col-12 mb-3">
              <span class="title-20B">Details Request</span>
              <div class="line-title"></div>
            </div>
            <div class="col-5">
              <a href="{{url('storage/'.$dataSample2['foto'])}}" data-toggle="lightbox" data-gallery="gallery">
                  <img src="{{url('storage/'.$dataSample2['foto'])}}" class="img-details-req"/>
              </a>
            </div>
            <div class="col-7 px-2">
              <table class="table-none table-16 text-left mt-2">
                <tbody>
                  <tr>
                    <td width="45%" style="font-weight:600">NO SR</td> 
                    <td width="55%">: {{ $dataSample2->sr_number }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Sample Code</td> 
                    <td width="55%">: {{ $dataSample2->sample_code }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Accepting Date</td> 
                    <td width="55%">: {{ $dataSample2->Accepting_date }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Due Date</td> 
                    <td width="55%">: {{ $dataSample2->tanggal }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Agent</td> 
                    <td width="55%">: {{ $dataSample2->agen }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Buyer</td> 
                    <td width="55%">: {{ $dataSample2->buyer }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Style</td> 
                    <td width="55%">: {{ $dataSample2->style }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Item</td> 
                    <td width="55%">: {{ $dataSample2->item }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Status Sample</td> 
                    <td width="55%">: {{ $dataSample2->departement_trecking }}</td>
                  </tr>
                  {{-- <tr>
                    <td width="45%" style="font-weight:600">Total Qty</td> 
                    <td width="55%">: {{ $dataSample2['total_size'] }}</td>
                  </tr> --}}
                  <tr>
                    <td width="45%" style="font-weight:600">Pattern Finish Date</td> 
                    <td width="55%">: {{ $dataSample2->pattern_finish }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Cutting Finish Date</td> 
                    <td width="55%">: {{ $dataSample2->cutting_finish }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Print/ Embro Date</td> 
                    <td width="55%">: {{ $dataSample2->embro_finish }}</td>
                  </tr>
                  <tr>
                    <td width="45%" style="font-weight:600">Sewing Date</td> 
                    <td width="55%">: {{ $dataSample2->sewing_finish }}</td>
                  </tr>
                  <tr class=>
                    <td width="45%" style="font-weight:600">Result</td> 
                    <td width="55%">: 
                       @if (($dataSample2->result== 'WIP'))
                            <span class="wip-badge">{{ $dataSample2->result }}</span>
                        @elseif(($dataSample2->result == 'LATE'))
                            <span class="late-badge">{{ $dataSample2->result }}</span>
                        @elseif(($dataSample2->result == 'OK'))
                            <span class="ok-badge">{{ $dataSample2->result }}</span>
                        @else
                          
                        @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row p-4">
            <div class="col-12">
              <div id="accordion">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                    <i class="accord-icon fas fa-file-contract"></i>   
                    <div class="accordion-title">Sample Request</div>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="cards accordion-body">
                      @if($dataSample2->sample_doc != NULL)
                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/'.$dataSample2->sample_doc)) }}" width="100%" height="750"></iframe>
                      @else
                        <div class="alert alert-danger" role="alert">
                          <span class="no-data">Tidak ada data untuk ditampilkan</span>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-lightbox" id="accordion">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                    <i class="accord-icon fas fa-file-contract"></i>   
                    <div class="accordion-title">Techpack</div>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="cards accordion-body text-center"> 
                      @if($dataSample2->techpack_doc != NULL)
                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/'.$dataSample2->techpack_doc)) }}" width="100%" height="750"></iframe>
                      @else
                        <div class="alert alert-danger" role="alert">
                          <span class="no-data">Tidak ada data untuk ditampilkan</span>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row px-4">
            <div class="col-12 mb-4">
              <div class="title-24 text-center">Details Daily Update Sample Request</div>
            </div>
            <div class="col-12">
              <div id="accordion">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#detailPattern" aria-expanded="true" aria-controls="detailPattern" id="headingOne">
                    <div class="accHeaderIcon">
                      <img src="{{url('images/iconpack/sample_request/pattern-white.svg')}}" style="margin-left:-10px">  
                    </div>
                    <div class="accHeaderTitle"><span class="accordion-title">Daily Pattern</span></div>
                  </div>
                  <div id="detailPattern" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="cards accordion-body">
                      <table class="table tbl-content">
                        <thead>
                          <tr>
                            <th width="20%">Date</th>
                            <th width="20%">User</th>
                            <th width="60%">Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dailyPattern as $key => $value)
                          <tr>
                            <td>{{ $value['tanggal_pattern'] }}</td>
                            <td>{{ $value['user_pattern'] }}</td>
                            <td>{{ $value['remark_pattern'] }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-lightbox" id="accordion">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#detailDev" aria-expanded="true" aria-controls="detailDev" id="headingOne">
                    <div class="accHeaderIcon">
                      <img src="{{url('images/iconpack/sample_request/qc-white.svg')}}">  
                    </div>
                    <div class="accHeaderTitle"><span class="accordion-title">Daily Development</span></div>
                  </div>
                  <div id="detailDev" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="cards accordion-body">
                      <table class="table tbl-content">
                        <thead>
                          
                          <tr>
                            <th width="20%">Date</th>
                            <th width="20%">User</th>
                            <th width="60%">Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataSampleCutting as $key => $value) 
                          <tr>
                            <td>{{ $value['tanggal_dev'] }}</td>
                            <td>{{ $value['user_dev'] }}</td>
                            <td>{{ $value['remark_dev'] }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-lightbox" id="accordion">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#detailCutting" aria-expanded="true" aria-controls="detailCutting" id="headingOne">
                    <div class="accHeaderIcon">
                      <img src="{{url('images/iconpack/sample_request/cutting-white.svg')}}">  
                    </div>
                    <div class="accHeaderTitle"><span class="accordion-title">Daily Cutting</span></div>
                  </div>
                  <div id="detailCutting" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="cards accordion-body">
                      <table class="table tbl-content">
                        <thead>
                          <tr>
                            <th width="20%">Date</th>
                            <th width="20%">User</th>
                            <th width="60%">Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dailyCutting as $key => $value) 
                          <tr>
                            <td>{{ $value['tanggal_cutting'] }}</td>
                            <td>{{ $value['user_cutting'] }}</td>
                            <td>{{ $value['remark_cutting'] }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-lightbox" id="accordion">
                <div class="cards">
                  <div class="card-header accordion-header" data-toggle="collapse" data-target="#detailSew" aria-expanded="true" aria-controls="detailSew" id="headingOne">
                    <div class="accHeaderIcon">
                      <img src="{{url('images/iconpack/sample_request/sewing-white.svg')}}" style="margin-left:-7px">  
                    </div>
                    <div class="accHeaderTitle"><span class="accordion-title">Daily Sewing</span></div>
                  </div>
                  <div id="detailSew" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="cards accordion-body">
                      <table class="table tbl-content">
                        <thead>
                          <tr>
                            <th width="20%">Date</th>
                            <th width="20%">User</th>
                            <th width="60%">Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($dailySewing as $key => $value) 
                          <tr>
                            <td>{{ $value['tanggal_sewing'] }}</td>
                            <td>{{ $value['user_sewing'] }}</td>
                            <td>{{ $value['remark_sewing'] }}</td>
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

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

@endpush