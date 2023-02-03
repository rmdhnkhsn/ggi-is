@extends("layouts.app")
@section("title","Final-Inspection")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-inspection.css')}}">
@endpush



@push("sidebar")
  @include('qc.final-inspection.layouts.navbar2')
@endpush

@section("content")
<section class="content">
      <div class="container-fluid">
        <div class="filter-container" id="filter-container">
        </div>
        <div class="col-lg-12">
          <div class="card" id="inspections">
            <div class="card-body">
              <h4 class="card-title"></h4>
              <div class="list-wrapper pt-2 inspection-container">
                @forelse ($inspection as $key => $value)
                  <div class="content">
                    <a class="link-content" href="{{ route('finali.header', [$value->F4801_DOCO]) }}" style="text-decoration:none">
                      <div class="row mb-4 border-bottom">
                        <div class="col-6">
                          <div class="wo_">
                            <b class="judul_">WO</b> {{ $value['F4801_DOCO'] }}
                          </div>
                        </div>
                        <div class="col-6 text-right">
                          @if ($value  && $value->finish_inspector  && $value->start_inspector == null)
                            @elseif($value->start_inspector == null)
                              <span class="new_ badge-new">
                                  <td width="50%">
                                    NEW
                                  </td>
                                </span>
                            @elseif(strtolower($value->measurement) == 'fail')
                                <span class="fail_ badge-fail">
                                  <td width="50%">
                                    {{ $value->measurement }}
                                  </td>
                              </span>
                            @elseif(strtolower($value->hasil_defect) == 'fail')
                                <span class="fail_ badge-fail">
                                  <td width="50%">
                                    {{ $value->hasil_defect }}
                                  </td>
                              </span>
                           
                            @elseif(strtolower($value->hasil_defect) == 'pass')
                                <span class="pass_ badge-pass">
                                  <td width="50%">
                                    {{ $value->hasil_defect }}
                                  </td>
                              </span>
                           
                            @elseif(strtolower($value->hasil_validate) == 'fail')
                                <span class="fail_ badge-fail">
                                  <td width="50%">
                                    {{ $value->hasil_validate }}
                                  </td>
                              </span>
                            @elseif(strtolower($value->hasil_validate) == 'pass')
                                <span class="pass_ badge-pass">
                                  <td width="50%">
                                    {{ $value->hasil_validate }}
                                  </td>
                              </span>
                           
                            @elseif(strtolower($value->measurement) == 'pass')
                                <span class="pass_ badge-pass">
                                  <td width="50%">{{ $value->measurement }}</td>
                                </span>
                          @endif 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="item-desc_">
                            <div div class="buyer_ mb-1"><b class="judul_">No PO</b>  {{ $value['F4801_VR01'] }}
                              <div class="buyer_ mb-1"><b class="judul_">Item Description</b> {{ $value['F4801_DL01'] }}
                                <div div class="buyer_ mb-1"><b class="judul_">Buyer</b> {{ \App\ListBuyer::find($value->F4801_AN8)->F0101_ALPH }}
                                <div class="qty_ mb-1"><b class="judul_">Quantity Order</b>  {{ $value['F4801_UORG'] }}
                                
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                         
                      <div class="col-6">
                        <div class="buyer_ mb-1">
                          <b class="judul_">Inspector Name</b>
                          {{ $value->name_inspector ?? '' }}
                        </div>
                        <div class="buyer_ mb-1"><b class="judul_">Start Inspection</b> 
                          @if ($value->waktu_inspector)
                            <td width="50%">
                              {{ \Carbon\Carbon::parse($value->waktu_inspector)->locale('id')->format('d-m-Y H:i:s')}}
                            </td>
                          @else
                            <td>-</td>
                          @endif
                        </div>
                        <div class="buyer_ mb-1"> 
                          <b class="judul_">Finish Inspection</b>  
                            @if ($value->finish_inspector)
                              <td width="50%">
                                {{ \Carbon\Carbon::parse($value->finish_inspector)->locale('id')->format('d-m-Y H:i:s')}}
                              </td>
                            @else
                              <td>-</td>
                            @endif
                        </div>
                        </div>
                      </div>
                  
                    </a>  
                  </div> {{-- penutup div content --}}
                @empty
                  <div class="alert alert-danger" role="alert">
                    Data WO yang Anda Cari Tidak Tersedia !  
                  </div>
                  <a href="{{ url()->previous() }}"class="btn btn-secondary">
                    <i class="fas fa-angle-double-left">
                    Back
                    </i>
                  </a>
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@push("scripts")

@endpush
