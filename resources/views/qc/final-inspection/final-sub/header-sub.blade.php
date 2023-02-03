@extends("layouts.app")
@section("title","Final-Inspection")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-inspection.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">

@endpush



@push("sidebar")
  @include('qc.final-inspection.layouts.navbar2')
@endpush

@section("content")
<div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-4 mb-2 mr-auto ml-auto">
            <div class="menu-bar">
              <div class="navigation">
                <ul>
                  <li class="list active">
                    <a href="{{ route('finali.header',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-user-tag"></i>
                      </span>
                      <span class="text">Header</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.photos',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-camera-retro"></i>
                      </span>
                      <span class="text">Photos</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.defects',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-ban"></i>
                      </span>
                      <span class="text">Defects</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.quality',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-cogs"></i>
                      </span>
                      <span class="text">Quality</span>
                    </a>
                  </li>
                  <li class="list">
                    <a href="{{ route('finali.conclusion',[$inspection->F4801_DOCO, $finalInspection->id])}}">
                      <span class="icon">
                        <i class="fas fa-comments"></i>
                      </span>
                      <span class="text">Conclusion</span>
                    </a>
                  </li>
                  <div class="indicator"></div>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-accordion">
              <div class="wrapper-accordion">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="accordion__item mb-4">
                      <header class="accordion__header">
                        <div class="row row-title1 mr-2 ml-2">
                          <div class="col-10">
                            <h3 class="accordion__title">PRODUCTION INFORMATION</h3>
                          </div>
                          <div class="col-2 text-right">
                          <i class="fas fa-plus accordion__icon"></i>
                          </div>  
                        </div>
                      </header>
                      <div class="accordion__content">
                        <table class="table-header title-content">
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">WO</td>
                            <td width="50%">{{ $inspection['F4801_DOCO']}}</td>
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">PO</td>
                            <td width="50%">{{ $inspection['F4801_VR01']}}</td>
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">Style</td>
                            <td width="50%">{{ $inspection['F4801_DL01']}}</td>
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">BUYER</td>
                            <td width="50%">{{ $namaBuyer }}</td> 
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">ETD</td>
                            <td width="50%">{{ $inspection['F4801_DRQJ']}}</td>
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">Fabric Description</td>
                            <td width="50%">{{ $inspection['F4801_STRX']}}</td>
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">INSPECTOR NAME</td>
                            <td width="50%">{{ $finalInspection->name_inspector ?? 'No Name' }}</td>
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">START INSPECTION</td>
                            @if ($finalInspection && $finalInspection->waktu_inspector)
                              <td width="50%">
                                {{ \Carbon\Carbon::parse($finalInspection->waktu_inspector )->locale('id')->format('d-m-Y H:i:s') }}
                              </td>
                            @else
                              <td>-</td>
                            @endif
                            <td width="1%"></td>
                          </tr>
                          <tr>
                            <td width="1%"></td>
                            <td width="35%" class="fw-5">FINISH INSPECTION</td>
                            @if ($finalInspection && $finalInspection->finish_inspector)
                              <td width="50%">
                                {{ \Carbon\Carbon::parse($finalInspection->finish_inspector)->locale('id')->format('d-m-Y H:i:s') }}
                              </td>
                            @else
                              <td>-</td>
                            @endif
                            <td width="1%"></td>
                          </tr>
                        </table>
                        <div class="row mb-4">
                          <div class="col-lg-4"> 
                            {{--  kode javascript --}}
                            {{-- cegah tag href nya(preventDefault).  butuh submit form aja --}}
                            @if ($finalInspection)
                             
                              @if ($finalInspection->measurement == NULL && $finalInspection->finish_inspector == NULL &&$finalInspection->start_inspector != NULL)
                                <button type="button" disabled class="btn btn-startins mt-3 mb-4" id="start-inspect"
                                >Inspection is in progress...</button>
                              @elseif(strtolower($finalInspection->measurement) == 'fail')
                                <a class="btn btn-startins mt-3 mb-4" id="start-inspect"
                                  href="{{ route('finali.header.restartInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                  onclick="event.preventDefault();getElementById('restart-inspection-form').submit()"
                                >Restart Inspection</a>
                                <form action="{{ route('finali.header.restartInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                      id="restart-inspection-form" class="d-none"
                                      method="post">
                                  @csrf
                                  @method('PUT')
                                </form>
                              @elseif(strtolower($finalInspection->hasil_defect) == 'fail')
                                <a class="btn btn-startins mt-3 mb-4" id="start-inspect"
                                  href="{{ route('finali.header.restartInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                  onclick="event.preventDefault();getElementById('restart-inspection-form').submit()"
                                >Restart Inspection</a>
                                <form action="{{ route('finali.header.restartInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                      id="restart-inspection-form" class="d-none"
                                      method="post">
                                  @csrf
                                  @method('PUT')
                                </form>
                              @elseif(strtolower($finalInspection->hasil_validate) == 'fail')
                                <a class="btn btn-startins mt-3 mb-4" id="start-inspect"
                                  href="{{ route('finali.header.restartInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                  onclick="event.preventDefault();getElementById('restart-inspection-form').submit()"
                                >Restart Inspection</a>
                                <form action="{{ route('finali.header.restartInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                      id="restart-inspection-form" class="d-none"
                                      method="post">
                                  @csrf
                                  @method('PUT')
                                </form>
                              @elseif($finalInspection->name_inspector == NULL && $finalInspection->start_inspector == NULL)
                                <a class="btn btn-startins mt-3 mb-4" id="start-inspect"
                                  href="{{ route('finali.header.startInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                  onclick="event.preventDefault();getElementById('start-inspection-form').submit()"
                                >Start Inspection</a>
                                <form action="{{ route('finali.header.startInspection', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                      id="start-inspection-form" class="d-none"
                                      method="post">
                                  @csrf
                                  @method('PUT')
                                </form>
                              @endif
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="accordion__item mb-4">
                      <header class="accordion__header">
                        <div class="row row-title1 mr-2 ml-2">
                          <div class="col-10">
                            <h3 class="accordion__title">PRODUCTION STATUS</h3>
                          </div>
                          <div class="col-2 text-right">
                          <i class="fas fa-plus accordion__icon"></i>
                          </div>  
                        </div>
                      </header>
                      <div class="accordion__content">
                        <form action="{{ route('finali.header.updateInspectionProduction', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                              id="start-inspection-level" method="post" >
                          @csrf
                          @method('PUT')
                          <table class="table-header title-content">
                            <tr>
                              <td width="1%"></td>
                              <td width="30%" class="fw-5">FABRIC %</td>
                              <td width="50%"><input type="text" class="form-control" id="fabric_validate" name="fabric_validate"></td>
                              <td width="1%"></td>
                            </tr>
                            <tr>
                              <td width="1%"></td>
                              <td width="30%" class="fw-5">CUTTING %</td>
                              <td width="50%"><input type="text" class="form-control" id="cutting" name="cutting"></td>
                              <td width="1%"></td>
                            </tr>
                            <tr>
                              <td width="1%"></td>
                              <td width="30%" class="fw-5">FINISHING %</td>
                              <td width="50%"><input type="text" class="form-control" id="finishing" name="finishing"></td>
                              <td width="1%"></td>
                            </tr>
                            <tr>
                              <td width="1%"></td>
                              <td width="30%" class="fw-5">PACKING %</td>
                              <td width="50%"><input type="text" class="form-control" id="packing" name="packing"></td>
                              <td width="1%"></td>
                            </tr>
                          </table>

                          <div class="d-flex justify-content-start">
                            @if ($finalInspection && $finalInspection->fabric_validate && $finalInspection->sample != NULL)
                              <button type="submit" class="btn btn-startins mt-2 mb-2" id="start-inspect">EDIT</button>
                            @else
                              <button type="submit" class="btn btn-startins mt-2 mb-4" id="start-inspect">SAVE </button>
                            @endif 
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="accordion__item mb-4">
                      <header class="accordion__header">
                        <div class="row row-title1 mr-2 ml-2">
                          <div class="col-10">
                            <h3 class="accordion__title">VALIDATIONS AND CHECKLISTS</h3>
                          </div>
                          <div class="col-2 text-right">
                          <i class="fas fa-plus accordion__icon"></i>
                          </div>  
                        </div>
                      </header>
                      <div class="accordion__content">
                        <div class="container-fluid p-2">
                          <form action="{{ route('finali.header.updateValidationChecklist', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                id="start-inspection-form"
                                method="post">
                            @csrf
                            @method('PUT') 
                              <div class="row mr-2 ml-2"><!-- PATTERN -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">PATTERN</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="pattern" value="CONFORM" class="conform-radio" id="conform-radio-pattern" 
                                    {{ $finalInspection ? ($finalInspection->pattern == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-pattern" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="pattern" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-pattern" 
                                    {{ $finalInspection ? ($finalInspection->pattern == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-pattern" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="pattern" value="N/A" class="na-radio" id="na-radio-pattern" 
                                    {{ $finalInspection ? ($finalInspection->pattern == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-pattern" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 
                              <div class="row mr-2 ml-2 mt-2"><!-- SIZE SET SAMPLE -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">SIZE SET SAMPLE</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="size_set" value="CONFORM" class="conform-radio" id="conform-radio-size_set" 
                                    {{ $finalInspection ? ($finalInspection->size_set == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-size_set" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="size_set" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-size_set" 
                                    {{ $finalInspection ? ($finalInspection->size_set == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-size_set" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="size_set" value="N/A" class="na-radio" id="na-radio-size_set" 
                                    {{ $finalInspection ? ($finalInspection->size_set == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-size_set" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 
                              <div class="row mr-2 ml-2 mt-2"><!-- PP SAMPLE -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">PP SAMPLE</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="pp" value="CONFORM" class="conform-radio" id="conform-radio-pp" 
                                    {{ $finalInspection ? ($finalInspection->pp == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-pp" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="pp" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-pp" 
                                    {{ $finalInspection ? ($finalInspection->pp == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-pp" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="pp" value="N/A" class="na-radio" id="na-radio-pp" 
                                    {{ $finalInspection ? ($finalInspection->pp == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-pp" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 
                              <div class="row mr-2 ml-2 mt-2"><!-- PRINT -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">PRINT / EMBROIDERY</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="print" value="CONFORM" class="conform-radio" id="conform-radio-print" 
                                    {{ $finalInspection ? ($finalInspection->print == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-print" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="print" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-print" 
                                    {{ $finalInspection ? ($finalInspection->print == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-print" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="print" value="N/A" class="na-radio" id="na-radio-print" 
                                    {{ $finalInspection ? ($finalInspection->print == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-print" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- SHELL FABRIC -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">SHELL FABRIC</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="shell" value="CONFORM" class="conform-radio" id="conform-radio-shell" 
                                    {{ $finalInspection ? ($finalInspection->shell == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-shell" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="shell" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-shell" 
                                    {{ $finalInspection ? ($finalInspection->shell == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-shell" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="shell" value="N/A" class="na-radio" id="na-radio-shell" 
                                    {{ $finalInspection ? ($finalInspection->shell == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-shell" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 

                              <div class="row mr-2 ml-2 mt-2"><!-- LOT SHADE / COLOR -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">LOT SHADE / COLOR</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="lot" value="CONFORM" class="conform-radio" id="conform-radio-lot" 
                                    {{ $finalInspection ? ($finalInspection->lot == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-lot" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="lot" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-lot" 
                                    {{ $finalInspection ? ($finalInspection->lot == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-lot" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="lot" value="N/A" class="na-radio" id="na-radio-lot" 
                                    {{ $finalInspection ? ($finalInspection->lot == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-lot" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 

                              <div class="row mr-2 ml-2 mt-2"><!-- LINING -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">LINING</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="lining" value="CONFORM" class="conform-radio" id="conform-radio-lining" 
                                    {{ $finalInspection ? ($finalInspection->lining == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-lining" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="lining" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-lining" 
                                    {{ $finalInspection ? ($finalInspection->lining == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-lining" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="lining" value="N/A" class="na-radio" id="na-radio-lining" 
                                    {{ $finalInspection ? ($finalInspection->lining == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-lining" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 

                              <div class="row mr-2 ml-2 mt-2"><!-- INTERLINING -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">INTERLINING</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="interlining" value="CONFORM" class="conform-radio" id="conform-radio-interlining" 
                                    {{ $finalInspection ? ($finalInspection->interlining == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-interlining" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="interlining" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-interlining" 
                                    {{ $finalInspection ? ($finalInspection->interlining == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-interlining" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="interlining" value="N/A" class="na-radio" id="na-radio-interlining" 
                                    {{ $finalInspection ? ($finalInspection->interlining == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-interlining" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 

                              <div class="row mr-2 ml-2 mt-2"><!-- THREAD COLOR / SIZE -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">THREAD COLOR / SIZE</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="thread" value="CONFORM" class="conform-radio" id="conform-radio-thread" 
                                    {{ $finalInspection ? ($finalInspection->thread == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-thread" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="thread" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-thread" 
                                    {{ $finalInspection ? ($finalInspection->thread == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-thread" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="thread" value="N/A" class="na-radio" id="na-radio-thread" 
                                    {{ $finalInspection ? ($finalInspection->thread == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-thread" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 

                              <div class="row mr-2 ml-2 mt-2"><!-- MAIN / SIZE LABEL -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">MAIN / SIZE LABEL</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="size_label" value="CONFORM" class="conform-radio" id="conform-radio-size_label" 
                                    {{ $finalInspection ? ($finalInspection->size_label == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-size_label" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="size_label" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-size_label" 
                                    {{ $finalInspection ? ($finalInspection->size_label == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-size_label" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="size_label" value="N/A" class="na-radio" id="na-radio-size_label" 
                                    {{ $finalInspection ? ($finalInspection->size_label == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-size_label" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 

                              <div class="row mr-2 ml-2 mt-2"><!-- CARE / CONTENT LABEL -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">CARE / CONTENT LABEL</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="content_label" value="CONFORM" class="conform-radio" id="conform-radio-content_label" 
                                    {{ $finalInspection ? ($finalInspection->content_label == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-content_label" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="content_label" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-content_label" 
                                    {{ $finalInspection ? ($finalInspection->content_label == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-content_label" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="content_label" value="N/A" class="na-radio" id="na-radio-content_label" 
                                    {{ $finalInspection ? ($finalInspection->content_label == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-content_label" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div> 
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- SUPPLIER LABEL -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">SUPPLIER LABEL</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="supplier_label" value="CONFORM" class="conform-radio" id="conform-radio-supplier_label" 
                                    {{ $finalInspection ? ($finalInspection->supplier_label == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-supplier_label" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="supplier_label" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-supplier_label" 
                                    {{ $finalInspection ? ($finalInspection->supplier_label == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-supplier_label" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="supplier_label" value="N/A" class="na-radio" id="na-radio-supplier_label" 
                                    {{ $finalInspection ? ($finalInspection->supplier_label == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-supplier_label" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- CO LABEL -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">CO LABEL</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="co_label" value="CONFORM" class="conform-radio" id="conform-radio-co_label" 
                                    {{ $finalInspection ? ($finalInspection->co_label == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-co_label" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="co_label" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-co_label" 
                                    {{ $finalInspection ? ($finalInspection->co_label == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-co_label" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="co_label" value="N/A" class="na-radio" id="na-radio-co_label" 
                                    {{ $finalInspection ? ($finalInspection->co_label == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-co_label" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- ZIP / SNAP / RIVET / BUTTON / SPARE -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">ZIP / SNAP / RIVET / BUTTON / SPARE</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="zip" value="CONFORM" class="conform-radio" id="conform-radio-zip" 
                                    {{ $finalInspection ? ($finalInspection->zip == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-zip" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="zip" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-zip" 
                                    {{ $finalInspection ? ($finalInspection->zip == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-zip" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="zip" value="N/A" class="na-radio" id="na-radio-zip" 
                                    {{ $finalInspection ? ($finalInspection->zip == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-zip" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- SHADE LOT / FIRST BATH -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">SHADE LOT / FIRST BATH</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="shade_lot" value="CONFORM" class="conform-radio" id="conform-radio-shade_lot" 
                                    {{ $finalInspection ? ($finalInspection->shade_lot == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-shade_lot" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="shade_lot" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-shade_lot" 
                                    {{ $finalInspection ? ($finalInspection->shade_lot == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-shade_lot" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="shade_lot" value="N/A" class="na-radio" id="na-radio-shade_lot" 
                                    {{ $finalInspection ? ($finalInspection->shade_lot == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-shade_lot" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- COL / CAST / HANG FEEL -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">COL / CAST / HANG FEEL</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="col" value="CONFORM" class="conform-radio" id="conform-radio-col" 
                                    {{ $finalInspection ? ($finalInspection->col == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-col" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="col" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-col" 
                                    {{ $finalInspection ? ($finalInspection->col == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-col" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="col" value="N/A" class="na-radio" id="na-radio-col" 
                                    {{ $finalInspection ? ($finalInspection->col == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-col" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- WHISKER / E-D EFFECT -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">WHISKER / E-D EFFECT</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="whisker" value="CONFORM" class="conform-radio" id="conform-radio-whisker" 
                                    {{ $finalInspection ? ($finalInspection->whisker == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-whisker" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="whisker" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-whisker" 
                                    {{ $finalInspection ? ($finalInspection->whisker == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-whisker" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="whisker" value="N/A" class="na-radio" id="na-radio-whisker" 
                                    {{ $finalInspection ? ($finalInspection->whisker == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-whisker" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- TINTING / DYEING -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">TINTING / DYEING</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="tinting" value="CONFORM" class="conform-radio" id="conform-radio-tinting" 
                                    {{ $finalInspection ? ($finalInspection->tinting == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-tinting" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="tinting" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-tinting" 
                                    {{ $finalInspection ? ($finalInspection->tinting == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-tinting" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="tinting" value="N/A" class="na-radio" id="na-radio-tinting" 
                                    {{ $finalInspection ? ($finalInspection->tinting == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-tinting" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- HAND SAND / BRUSH -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">HAND SAND / BRUSH</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="hand_sand" value="CONFORM" class="conform-radio" id="conform-radio-hand_sand" 
                                    {{ $finalInspection ? ($finalInspection->hand_sand == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-hand_sand" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="hand_sand" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-hand_sand" 
                                    {{ $finalInspection ? ($finalInspection->hand_sand == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-hand_sand" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="hand_sand" value="N/A" class="na-radio" id="na-radio-hand_sand" 
                                    {{ $finalInspection ? ($finalInspection->hand_sand == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-hand_sand" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- GRINDING / DESTROY -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">GRINDING / DESTROY</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="grinding" value="CONFORM" class="conform-radio" id="conform-radio-grinding" 
                                    {{ $finalInspection ? ($finalInspection->grinding == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-grinding" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="grinding" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-grinding" 
                                    {{ $finalInspection ? ($finalInspection->grinding == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-grinding" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="grinding" value="N/A" class="na-radio" id="na-radio-grinding" 
                                    {{ $finalInspection ? ($finalInspection->grinding == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-grinding" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- HANG / WASH TAG -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">HANG / WASH TAG</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="hang" value="CONFORM" class="conform-radio" id="conform-radio-hang" 
                                    {{ $finalInspection ? ($finalInspection->hang == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-hang" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="hang" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-hang" 
                                    {{ $finalInspection ? ($finalInspection->hang == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-hang" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="hang" value="N/A" class="na-radio" id="na-radio-hang" 
                                    {{ $finalInspection ? ($finalInspection->hang == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-hang" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- WAIST TAG -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">WAIST TAG</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="waist_tag" value="CONFORM" class="conform-radio" id="conform-radio-waist_tag" 
                                    {{ $finalInspection ? ($finalInspection->waist_tag == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-waist_tag" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="waist_tag" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-waist_tag" 
                                    {{ $finalInspection ? ($finalInspection->waist_tag == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-waist_tag" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="waist_tag" value="N/A" class="na-radio" id="na-radio-waist_tag" 
                                    {{ $finalInspection ? ($finalInspection->waist_tag == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-waist_tag" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- JOKER / FLASHER -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">JOKER / FLASHER</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="joker" value="CONFORM" class="conform-radio" id="conform-radio-joker" 
                                    {{ $finalInspection ? ($finalInspection->joker == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-joker" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="joker" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-joker" 
                                    {{ $finalInspection ? ($finalInspection->joker == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-joker" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="joker" value="N/A" class="na-radio" id="na-radio-joker" 
                                    {{ $finalInspection ? ($finalInspection->joker == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-joker" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- POLY BAG / STICKER -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">POLY BAG / STICKER</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="poly_bag" value="CONFORM" class="conform-radio" id="conform-radio-poly_bag" 
                                    {{ $finalInspection ? ($finalInspection->poly_bag == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-poly_bag" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="poly_bag" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-poly_bag" 
                                    {{ $finalInspection ? ($finalInspection->poly_bag == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-poly_bag" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="poly_bag" value="N/A" class="na-radio" id="na-radio-poly_bag" 
                                    {{ $finalInspection ? ($finalInspection->poly_bag == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-poly_bag" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- TICKET PRICE -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">TICKET PRICE</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="ticket" value="CONFORM" class="conform-radio" id="conform-radio-ticket" 
                                    {{ $finalInspection ? ($finalInspection->ticket == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-ticket" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="ticket" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-ticket" 
                                    {{ $finalInspection ? ($finalInspection->ticket == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-ticket" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="ticket" value="N/A" class="na-radio" id="na-radio-ticket" 
                                    {{ $finalInspection ? ($finalInspection->ticket == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-ticket" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- BELT TAG / LEATHER PATCH -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">BELT TAG / LEATHER PATCH</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="belt_tag" value="CONFORM" class="conform-radio" id="conform-radio-belt_tag" 
                                    {{ $finalInspection ? ($finalInspection->belt_tag == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-belt_tag" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="belt_tag" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-belt_tag" 
                                    {{ $finalInspection ? ($finalInspection->belt_tag == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-belt_tag" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="belt_tag" value="N/A" class="na-radio" id="na-radio-belt_tag" 
                                    {{ $finalInspection ? ($finalInspection->belt_tag == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-belt_tag" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- SPARE YARN -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">SPARE YARN</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="spare_yarn" value="CONFORM" class="conform-radio" id="conform-radio-spare_yarn" 
                                    {{ $finalInspection ? ($finalInspection->spare_yarn == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-spare_yarn" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="spare_yarn" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-spare_yarn" 
                                    {{ $finalInspection ? ($finalInspection->spare_yarn == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-spare_yarn" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="spare_yarn" value="N/A" class="na-radio" id="na-radio-spare_yarn" 
                                    {{ $finalInspection ? ($finalInspection->spare_yarn == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-spare_yarn" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- HANGER -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">HANGER</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="hanger" value="CONFORM" class="conform-radio" id="conform-radio-hanger" 
                                    {{ $finalInspection ? ($finalInspection->hanger == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-hanger" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="hanger" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-hanger" 
                                    {{ $finalInspection ? ($finalInspection->hanger == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-hanger" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="hanger" value="N/A" class="na-radio" id="na-radio-hanger" 
                                    {{ $finalInspection ? ($finalInspection->hanger == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-hanger" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- SHIPPING MARK -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">SHIPPING MARK</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="shipping" value="CONFORM" class="conform-radio" id="conform-radio-shipping" 
                                    {{ $finalInspection ? ($finalInspection->shipping == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-shipping" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="shipping" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-shipping" 
                                    {{ $finalInspection ? ($finalInspection->shipping == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-shipping" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="shipping" value="N/A" class="na-radio" id="na-radio-shipping" 
                                    {{ $finalInspection ? ($finalInspection->shipping == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-shipping" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row mr-2 ml-2 mt-2"><!-- FABRIC TEST REPORT -->
                                <div class="col-xl-3">
                                  <div class="title-content fw-5">FABRIC TEST REPORT</div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="fabric" value="CONFORM" class="conform-radio" id="conform-radio-fabric" 
                                    {{ $finalInspection ? ($finalInspection->fabric == 'CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="conform-radio-fabric" class="option option-1">
                                      <i class="icon-sub fas fa-check-circle"></i>
                                      <span class="radio-title">CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio"> 
                                    <input type="radio" name="fabric" value="NOT-CONFORM" class="nonConform-radio" id="nonConform-radio-fabric" 
                                    {{ $finalInspection ? ($finalInspection->fabric == 'NOT-CONFORM' ? 'checked' : '') : '' }}>
                                    <label for="nonConform-radio-fabric" class="option option-2">
                                      <i class="icon-sub fas fa-times-circle"></i>
                                      <span class="radio-title">NOT-CONFORM</span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-xl-3 col-md-4 mt-2">
                                  <div class="wrapper-radio">
                                    <input type="radio" name="fabric" value="N/A" class="na-radio" id="na-radio-fabric" 
                                    {{ $finalInspection ? ($finalInspection->fabric == 'N/A' ? 'checked' : '') : '' }}>
                                    <label for="na-radio-fabric" class="option option-3">
                                      <i class="icon-sub fas fa-exclamation-circle"></i>
                                      <span class="radio-title">N/A</span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-startins mt-5 mb-4" id="start-inspect">SAVE</button>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- Inspection Level -->
                  <div class="col-lg-12">
                    <div class="accordion__item mb-4">
                      <header class="accordion__header">
                        <div class="row row-title1 mr-2 ml-2">
                          <div class="col-10">
                            <h3 class="accordion__title">INSPECTION METHOD & LEVEL</h3>
                          </div>
                          <div class="col-2 text-right">
                          <i class="fas fa-plus accordion__icon"></i>
                          </div>  
                        </div>
                      </header>
                       <form action="{{ route('finali.header.updateInspectionMethod', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                                id="start-inspection-level"
                                method="post">
                            @csrf
                            @method('PUT')
                        <div class="accordion__content">
                          <table class="table-header conclusion-content">
                            <tr>
                              <td width="3%"></td>
                              <td width="25%" class="fw-5">INSPECTION LEVEL</td>
                              <td width="69%">
                              <select class="form-control" id="inspection_level" name="inspection_level">
                                  <option>{{ $finalInspection->inspection_level }}</option>
                                  <option>I</option>
                                  <option>II</option>
                                  <option>III</option>
                                </select>
                              </td>
                              <td width="3%"></td>
                            </tr>
                            <tr>
                              <td width="3%"></td>
                              <td width="25%" class="fw-5">INSPECTION METHOD</td>
                              <td width="69%">
                                  <select class="form-control" id="inspection_method" name="inspection_method">
                                  <option>{{ $finalInspection->inspection_method }}</option>
                                  <option>NORMAL</option>
                                  <option>TIGHTENED</option>
                                </select>
                              </td>
                              <td width="3%"></td>
                            </tr>
                            <tr>
                              <td width="3%"></td>
                              <td width="25%" class="fw-5">AQL</td>
                              <td width="69%">
                                <select class="form-control" id="aql" name="aql">
                                  <option>{{ $finalInspection->aql }}</option>
                                  <option>1.0</option>
                                  <option>2.5</option>
                                  <option>4.0</option>
                                </select>
                              </td>
                              <td width="3%"></td>
                            </tr>
                          </table>
                          @if ($finalInspection && $finalInspection->inspection_level && $finalInspection->inspection_method && $finalInspection->sample != NULL)
                            <button type="submit" class="btn btn-startins mt-2 mb-2" id="start-inspect">EDIT</button>
                          @else
                              <button type="submit" class="btn btn-startins mt-2 mb-2" id="start-inspect">SAVE</button>
                          @endif
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--INSPECTION QUANTITIES -->
                  <div class="col-lg-12">
                    <div class="accordion__item mb-4">
                      <header class="accordion__header">
                        <div class="row row-title1 mr-2 ml-2">
                          <div class="col-10">
                            <h3 class="accordion__title">INSPECTION QUANTITIES</h3>
                          </div>
                          <div class="col-2 text-right">
                          <i class="fas fa-plus accordion__icon"></i>
                          </div>  
                        </div>
                      </header>
                      <form action="{{ route('finali.header.updateInspectionQuantities', [$inspection['F4801_DOCO'], $finalInspection->id]) }}"
                              id="start-inspection-level" method="post" >
                          @csrf
                          @method('PUT')
                              <div class="accordion__content">
                                <table class="table-header conclusion-content">
                                  <tr>
                                    <td width="3%"></td>
                                    <td width="25%" class="fw-5">QUANTITY ORDER (QTY)</td>
                                    <td width="69%">
                                          <div class="field">    
                                          <input type="text" class="form-control" id="inspected_qty" name="inspected_qty" value="{{ $inspection['F4801_UORG']}}">
                                    </td>
                                    <td width="3%"></td>
                                  </tr>
                                  <tr>
                                    <td width="3%"></td>
                                    <td width="25%" class="fw-5">SAMPLE SIZE</td>
                                    <td width="69%">
                                 @if($finalInspection->inspection_method == 'NORMAL' && $finalInspection->inspection_level == 'I' && $finalInspection->aql == '1.0' ) 
                                        {{ $records['sample2']}}
                                        @else
                                        {{ $records['sample']}}
                                        @endif
                                    </td>
                                    <td width="3%"></td>
                                  </tr>
                                </table>      
                                <div class="d-flex justify-content-start">
                                    @if ($finalInspection && $finalInspection->inspected_qty && $finalInspection->sample != NULL)
                                      <button type="submit" class="btn btn-startins mt-2 mb-2" id="start-inspect">EDIT</button>
                                    @else
                                      <button type="submit" class="btn btn-startins mt-2 mb-4" id="start-inspect">SAVE </button>
                                    @endif 
                                </div>
                              </div>
                            </div>
                          </div>
                    </form>
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
<script src="{{asset('assets/js/toastr.min.js')}}"></script>

@if(Session::has('start'))
  <script>
    toastr.success("{!!Session::get('start')!!}");
  </script>
@endif

<script>
  const list = document.querySelectorAll('.list');
  function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
  }
    list.forEach((item) =>
    item.addEventListener('click',activeLink));
</script>

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordion__header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordion__content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          // accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>
@endpush
