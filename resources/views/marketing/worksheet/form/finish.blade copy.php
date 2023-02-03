@extends("layouts.app")
@section("title","Worksheet")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-marketing.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/css/style2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/dist/css/adminlte.min.css')}}">
@endpush

@push("sidebar")
  @include('marketing.worksheet.layouts.navbar')
@endpush

@section("content")
  <section class="content f-poppins">
    <div class="container-fluid">
      <div class="row py-4">
        <div class="col-12">
          <div class="ws-title-wo">
            WORKSHEET {{strtoupper($master_data->general_identity->buyer)}} – {{strtoupper($master_data->general_identity->style_code)}} {{strtoupper($master_data->general_identity->style_name)}}
          </div>
          <div class="ws-desc-tambahan mb-2">
              {{$master_data->general_identity->description}}
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-4 pb-3">
            <div class="kotak_dua">
                <span class="judul_biru">Product Details</span>
                <div class="row mt-3">
                    <div class="col-lg-5 col-5">
                        <p class="title">OR Number</p>
                        <p class="title">Article</p>
                        <p class="title">Product Name</p>
                        <p class="title">Style</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="isi">: {{$master_data->general_identity->nomor_or}}</p>
                        <p class="isi">: {{$master_data->general_identity->article}}</p>
                        <p class="isi">: {{$master_data->general_identity->product_name}}</p>
                        <p class="isi">: {{$master_data->general_identity->style_code}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pb-3">
            <div class="kotak_dua">
                <span class="judul_biru">Buyer Details</span>
                <div class="row mt-3">
                    <div class="col-lg-5 col-5">
                        <p class="title">Buyer</p>
                        <p class="title">Ship To</p>
                        <p class="title">Contract No</p>
                        <p class="title">Garmen PO</p>
                    </div>
                    <div class="col-lg-7 col-7">
                        <p class="isi">: {{$master_data->general_identity->buyer}}</p>
                        <p class="isi">: {{$master_data->general_identity->ship_to}}</p>
                        <p class="isi">: {{$master_data->general_identity->contract}}</p>
                        <p class="isi">: {{$master_data->no_po}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pb-3">
            <div class="kotak_dua flex-center h-pants">
              <img src="{{ url('marketing/worksheet/general_identity/'.$master_data->general_identity->file) }}" class="image-pants"> 
            </div>
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
            <div class="row">
              <div class="col-12">
                <div class="ws-judul">Breakdown Quantity Order</div>
              </div>
            </div>
            <div class="row mt-2 scroll-x" id="scroll-bar">
              <div class="col-12">
                <table class="table table-bordered table-striped no-wrap text-center">
                  <thead>
                    <tr>
                      <th>Style</th>
                      <th>Color Code</th>
                      <th>Color Name</th>
                      <th>Garmen Ex-Fact</th>
                      <!-- <th>S</th>
                      <th>M</th>
                      <th>L</th>
                      <th>XL</th> -->
                      @foreach ($master_data->rekap_size->toArray() as $column => $field)
                          @if (str_contains($column,'size')&&($field!==null))
                            <th>{{$field}}</th>
                          @endif
                      @endforeach
                      <th>Total</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($master_data->rekap_breakdown->toArray() as $key=>$value)
                    @php $i=1 @endphp
                      <tr>
                        <td>{{$master_data->general_identity->first()->style_code}}</td>
                        <td>{{$value['color_code']}}</td>
                        <td>{{$value['color_name']}}</td>
                        <td>{{$master_data->ex_fact}}</td>
                        @foreach ($master_data->rekap_size->toArray() as $column => $field)
                            @if (str_contains($column,'size')&&($field!==null))
                              <td>{{$value['size'.$i]}}</td>
                              @php $i+=1 @endphp
                            @endif
                        @endforeach
                        <td>{{$value['total_size']}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if($master_data->material_fabric != null)
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
            <div class="row">
              <div class="col-12">
                <div class="ws-judul">Materials - Fabric</div>
              </div>
            </div>
            <div class="row mt-2 scroll-x" id="scroll-bar">
              <div class="col-12">
                <table class="table table-bordered table-striped no-wrap text-center">
                  <thead>
                    <tr>
                      <th>Color way</th>
                      <th>Cutting way</th>
                      <th>Part</th>
                      <th>Material 1 (Description 1)</th>
                      <th>Material 2 (Description 2)</th>
                      <th>Color</th>
                      <th>Consump</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($master_data->material_fabric as $key=>$value)
                    <tr>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->cutting_way}}</td>
                      <td>{{$value->port}}</td>
                      <td>{{$value->material1}}</td>
                      <td>{{$value->material2}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->description}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @if($master_data->attention_cutting != null)
            <div class="row mt-2">
              <div class="col-12">
                <div class="ws-text-attention">Attention</div>
              </div>
            </div>
            <div class="row mt-2 scroll-x" id="scroll-bar">
              <div class="col-12 text-center">
                <table class="table table-bordered">
                  <thead class="ws-tbl-blue no-wrap">
                    <tr>
                      <th class="text-center" width="34%">Attention Cutting</th>
                      <th class="text-center" width="33%">Cutting Guide</th>
                      <th class="text-center" width="33">Image</th>
                    </tr>
                  </thead>
                  <tbody class="text-left">
                    <tr>
                      <td>
                        <div class="ws-message-finish mt-2">
                          <textarea name="attention_sewing" id="attention_sewing" style="height:160px" readonly>{{$master_data->attention_cutting->attention_sewing}}</textarea>
                        </div>
                      </td>
                      <td>
                        <div class="ws-message-finish mt-2">
                          <textarea name="attention_sewing" id="attention_sewing" style="height:160px" readonly>{{$master_data->attention_cutting->sewing_guide}}</textarea>
                        </div>
                      </td>
                      <td>
                        @if($master_data->attention_cutting->fabric_image != null)
                        <a href="{{ url('marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                          <center><img src="{{ url('marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image) }}" class="image-finish"></center>
                        </a>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
      @endif
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
            @if($master_data->material_sewing != null)
            <div class="row">
              <div class="col-12">
                <div class="ws-judul">Materials - Sewing</div>
              </div>
            </div>
            <div class="row mt-2 scroll-x" id="scroll-bar">
              <div class="col-12">
                <table class="table table-bordered table-striped no-wrap text-center">
                  <thead>
                    <tr>
                      <th>Color way</th>
                      <th>Part</th>
                      <th>Material 1 (Description 1)</th>
                      <th>Material 2 (Description 2)</th>
                      <th>Color</th>
                      <th>Consump</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing as $key=>$value)
                      <tr>
                        <td>{{$value->colorway}}</td>
                        <td>{{$value->port}}</td>
                        <td>{{$value->material1}}</td>
                        <td>{{$value->material2}}</td>
                        <td>{{$value->color}}</td>
                        <td>{{$value->consumption}}</td>
                        <td>{{$value->description}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif

            @if($master_data->material_sewing_inac != null)
            <div class="row mt-3">
              <div class="col-12">
                <div class="ws-judul">Material - INAC</div>
              </div>
            </div>
            <div class="row mt-2 scroll-x" id="scroll-bar">
              <div class="col-12">
                <table class="table table-bordered table-striped no-wrap text-center">
                  <thead>
                    <tr>
                      <th>Color way</th>
                      <th>Cutting way</th>
                      <th>Part</th>
                      <th>Material 1 (Description 1)</th>
                      <th>Position</th>
                      <th>Color</th>
                      <th>Consump</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing_inac as $key=>$value)
                      <tr>
                        <td>{{$value->colorway}}</td>
                        <td>{{$value->cutting_way}}</td>
                        <td>{{$value->port}}</td>
                        <td>{{$value->material1}}</td>
                        <td>{{$value->material2}}</td>
                        <td>{{$value->color}}</td>
                        <td>{{$value->consumption}}</td>
                        <td>{{$value->description}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif

            @if($master_data->material_sewing_packaging != null)
            <div class="row mt-3">
              <div class="col-12">
                <div class="ws-judul">Material - Packaging</div>
              </div>
            </div>
            <div class="row mt-2 scroll-x" id="scroll-bar">
              <div class="col-12">
                <table class="table table-bordered table-striped no-wrap text-center">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Detail</th>
                      <th>Consumption</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->material_sewing_packaging as $key=>$value)
                      <tr>
                        <td>{{$value->item}}</td>
                        <td>{{$value->detail}}</td>
                        <td>{{$value->consumption}}</td>
                        <td>{{$value->description}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif

            @if($master_data->material_sewing_detail != null)
              <div class="row mt-3">
                <div class="col-12">
                  <div class="ws-text-attention-pink">Attention</div>
                </div>
              </div>              
              <div class="row mt-3">
                <div class="col-12">
                  <div class="ws-text-attention">Sewing - Thread</div>
                </div>
              </div>
              @if($master_data->material_sewing_detail->attention_sewing != null || $master_data->material_sewing_detail->sewing_guide != null)
              <!-- Attention & Guide -->
              <div class="row mt-2 scroll-x" id="scroll-bar">
                <div class="col-12 text-center">
                  <table class="table table-bordered">
                    <thead class="ws-tbl-blue no-wrap">
                      <tr>
                        <th class="text-center" width="50%">Attention Sewing</th>
                        <th class="text-center" width="50%">Sewing Guide</th>
                      </tr>
                    </thead>
                    <tbody class="text-left">
                      <tr>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_sewing" id="attention_sewing" style="height:160px" readonly>{{$master_data->material_sewing_detail->attention_sewing}}</textarea>
                          </div>
                        </td>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_sewing" id="attention_sewing" style="height:160px" readonly>{{$master_data->material_sewing_detail->sewing_guide}}</textarea>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              @endif
              <div class="row mt-2">
                @if($master_data->material_sewing_detail->sewing_image != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->sewing_image2 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image2) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image2) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->sewing_image3 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image3) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image3) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->sewing_image4 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image4) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image4) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->sewing_image5 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image5) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image5) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->sewing_image6 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image6) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image6) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
              </div>          
              @if($master_data->material_sewing_detail->sewing_pdf != null)
              <div class="accordion" id="accordionGroup">
                <div class="card">
                    <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="false" aria-controls="collapseOne-1">
                      <div class="card-header accordion-effect" id="headingOne">
                        <div class="title-headers flex flex-row justify-between">
                          <div class="ms-sub-judul mt-2 mb-1">{{$master_data->material_sewing_detail->sewing_pdf}}</div>
                        </div>
                      </div>
                    </a>
                    <div id="collapseOne-1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">
                      <div class="card-body">
                      <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/material_sewing/sewing/file/'.$master_data->material_sewing_detail->sewing_pdf)) }}" width="100%" height="750"></iframe>
                      </div>
                    </div>
                </div>
              </div>
              @endif

              <!-- label  -->
              <div class="row mt-3">
                <div class="col-12">
                  <div class="ws-text-attention">Label</div>
                </div>
              </div>
              @if($master_data->material_sewing_detail->attention_label != null || $master_data->material_sewing_detail->label_guide != null)
              <!-- Attention & Guide -->
              <div class="row mt-2 scroll-x" id="scroll-bar">
                <div class="col-12 text-center">
                  <table class="table table-bordered">
                    <thead class="ws-tbl-blue no-wrap">
                      <tr>
                        <th class="text-center" width="50%">Attention Label</th>
                        <th class="text-center" width="50%">Label Guide</th>
                      </tr>
                    </thead>
                    <tbody class="text-left">
                      <tr>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_label" id="attention_label" style="height:160px" readonly>{{$master_data->material_sewing_detail->attention_label}}</textarea>
                          </div>
                        </td>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_label" id="attention_label" style="height:160px" readonly>{{$master_data->material_sewing_detail->label_guide}}</textarea>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              @endif
              <div class="row mt-2">
                @if($master_data->material_sewing_detail->label_image != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->label_image2 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image2) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image2) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->label_image3 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image3) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image3) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->label_image4 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image4) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image4) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->label_image5 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image5) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image5) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->label_image6 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image6) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image6) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
              </div>          
              @if($master_data->material_sewing_detail->label_pdf != null)
              <div class="accordion" id="accordionGroup">
                <div class="card">
                    <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne-2" aria-expanded="false" aria-controls="collapseOne-2">
                      <div class="card-header accordion-effect" id="headingOne">
                        <div class="title-headers flex flex-row justify-between">
                          <div class="ms-sub-judul mt-2 mb-1">{{$master_data->material_sewing_detail->label_pdf}}</div>
                        </div>
                      </div>
                    </a>
                    <div id="collapseOne-2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">
                      <div class="card-body">
                      <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/material_sewing/label/file/'.$master_data->material_sewing_detail->label_pdf)) }}" width="100%" height="750"></iframe>
                      </div>
                    </div>
                </div>
              </div>
              @endif

              <!-- Ironing  -->
              <div class="row mt-3">
                <div class="col-12">
                  <div class="ws-text-attention">Ironing</div>
                </div>
              </div>
              @if($master_data->material_sewing_detail->attention_ironing != null || $master_data->material_sewing_detail->ironing_guide != null)
              <!-- Attention & Guide -->
              <div class="row mt-2 scroll-x" id="scroll-bar">
                <div class="col-12 text-center">
                  <table class="table table-bordered">
                    <thead class="ws-tbl-blue no-wrap">
                      <tr>
                        <th class="text-center" width="50%">Attention Ironing</th>
                        <th class="text-center" width="50%">Ironing Guide</th>
                      </tr>
                    </thead>
                    <tbody class="text-left">
                      <tr>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_ironing" id="attention_ironing" style="height:160px" readonly>{{$master_data->material_sewing_detail->attention_ironing}}</textarea>
                          </div>
                        </td>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_ironing" id="attention_ironing" style="height:160px" readonly>{{$master_data->material_sewing_detail->ironing_guide}}</textarea>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              @endif
              <div class="row mt-2">
                @if($master_data->material_sewing_detail->ironing_image != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->ironing_image2 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image2) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image2) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->ironing_image3 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image3) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image3) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->ironing_image4 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image4) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image4) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->ironing_image5 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image5) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image5) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->ironing_image6 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image6) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image6) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
              </div>          
              @if($master_data->material_sewing_detail->ironing_pdf != null)
              <div class="accordion" id="accordionGroup">
                <div class="card">
                    <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne-3" aria-expanded="false" aria-controls="collapseOne-3">
                      <div class="card-header accordion-effect" id="headingOne">
                        <div class="title-headers flex flex-row justify-between">
                          <div class="ms-sub-judul mt-2 mb-1">{{$master_data->material_sewing_detail->ironing_pdf}}</div>
                        </div>
                      </div>
                    </a>
                    <div id="collapseOne-3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">
                      <div class="card-body">
                      <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/material_sewing/ironing/file/'.$master_data->material_sewing_detail->ironing_pdf)) }}" width="100%" height="750"></iframe>
                      </div>
                    </div>
                </div>
              </div>
              @endif

              <!-- Trimming  -->
              <div class="row mt-3">
                <div class="col-12">
                  <div class="ws-text-attention">Trimming</div>
                </div>
              </div>
              @if($master_data->material_sewing_detail->attention_trimming != null || $master_data->material_sewing_detail->trimming_guide != null)
              <!-- Attention & Guide -->
              <div class="row mt-2 scroll-x" id="scroll-bar">
                <div class="col-12 text-center">
                  <table class="table table-bordered">
                    <thead class="ws-tbl-blue no-wrap">
                      <tr>
                        <th class="text-center" width="50%">Attention Trimming</th>
                        <th class="text-center" width="50%">Trimming Guide</th>
                      </tr>
                    </thead>
                    <tbody class="text-left">
                      <tr>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_trimming" id="attention_trimming" style="height:160px" readonly>{{$master_data->material_sewing_detail->attention_trimming}}</textarea>
                          </div>
                        </td>
                        <td>
                          <div class="ws-message-finish mt-2">
                            <textarea name="attention_trimming" id="attention_trimming" style="height:160px" readonly>{{$master_data->material_sewing_detail->trimming_guide}}</textarea>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              @endif
              <div class="row mt-2">
                @if($master_data->material_sewing_detail->trimming_image != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->trimming_image2 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image2) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image2) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->trimming_image3 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image3) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image3) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->trimming_image4 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image4) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image4) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->trimming_image5 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image5) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image5) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
                @if($master_data->material_sewing_detail->trimming_image6 != null)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                  <div class="cards bg-card flex-center h-200">
                    <a href="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image6) }}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image6) }}" class="image-folding" alt="No Image"/>
                    </a>        
                  </div>
                </div>
                @endif
              </div>          
              @if($master_data->material_sewing_detail->trimming_pdf != null)
              <div class="accordion" id="accordionGroup">
                <div class="card">
                    <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne-4" aria-expanded="false" aria-controls="collapseOne-4">
                      <div class="card-header accordion-effect" id="headingOne">
                        <div class="title-headers flex flex-row justify-between">
                          <div class="ms-sub-judul mt-2 mb-1">{{$master_data->material_sewing_detail->trimming_pdf}}</div>
                        </div>
                      </div>
                    </a>
                    <div id="collapseOne-4" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">
                      <div class="card-body">
                      <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/material_sewing/trimming/file/'.$master_data->material_sewing_detail->trimming_pdf)) }}" width="100%" height="750"></iframe>
                      </div>
                    </div>
                </div>
              </div>
              @endif
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="cards bg-card p-4">
            <div class="row mt-2">
              <div class="col-12">
                <div class="justify-sb">
                  <span class="ws-judul">Measurement Report</span>
                </div>
              </div>
            </div>

            @if($spec != 0)
            <div class="ms-sub-judul mt-2 mb-1">Spec</div>
            <div class="row mt-2 scroll-x" id="scroll-bar">
              <div class="col-12">
                <table class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th width="150px">POM</th>
                      <th width="600px">Description</th>
                      <th width="70px">Tol(+)</th>
                      <th width="70px">Tol(-)</th>
                      @foreach ($master_data->rekap_size->toArray() as $column => $field)
                          @if (str_contains($column,'size')&&($field!==null))
                            <th>{{$field}}</th>
                          @endif
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($master_data->measurement->where('tipe','SPEC')->toArray() as $key => $value)
                    @php $i=1 @endphp
                      <tr>
                        <td>{{$value['pom']}}</td>
                        <td>{{$value['description']}}</td>
                        <td>{{$value['tol_positif']}}</td>
                        <td>{{$value['tol_negatif']}}</td>
                        @foreach ($master_data->rekap_size->toArray() as $column => $field)
                            @if (str_contains($column,'size')&&($field!==null))
                              <td>{{$value['size'.$i]}}</td>
                              @php $i+=1 @endphp
                            @endif
                        @endforeach
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif

            <div class="ms-sub-judul mt-2 mb-1">File Measurement</div>
            @if($master_data->file_measurement != null)
            <div class="accordion" id="accordionGroup">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <div class="card-header accordion-effect" id="headingOne">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">{{$master_data->file_measurement}}</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/measurement/'.$master_data->file_measurement)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @if($master_data->file1 != null)
            <div class="accordion" id="accordionGroup1">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                    <div class="card-header accordion-effect" id="headingOne1">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">{{$master_data->file1}}</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne1" class="collapse" aria-labelledby="headingOne1" data-parent="#accordionGroup1">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/measurement/'.$master_data->file1)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @if($master_data->file2 != null)
            <div class="accordion" id="accordionGroup2">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                    <div class="card-header accordion-effect" id="headingOne2">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">{{$master_data->file2}}</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionGroup2">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/measurement/'.$master_data->file2)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @if($master_data->file3 != null)
            <div class="accordion" id="accordionGroup3">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
                    <div class="card-header accordion-effect" id="headingOne3">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">{{$master_data->file3}}</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne3" class="collapse" aria-labelledby="headingOne3" data-parent="#accordionGroup3">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/measurement/'.$master_data->file3)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @if($master_data->file4 != null)
            <div class="accordion" id="accordionGroup4">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne4">
                    <div class="card-header accordion-effect" id="headingOne4">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">{{$master_data->file4}}</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne4" class="collapse" aria-labelledby="headingOne4" data-parent="#accordionGroup4">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/measurement/'.$master_data->file4)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @if($master_data->file5 != null)
            <div class="accordion" id="accordionGroup5">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="false" aria-controls="collapseOne5">
                    <div class="card-header accordion-effect" id="headingOne5">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">{{$master_data->file5}}</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne5" class="collapse" aria-labelledby="headingOne5" data-parent="#accordionGroup5">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/marketing/worksheet/measurement/'.$master_data->file5)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>

      <div class="row">
        @php
            $file1="";
            $file2="";
            $file3="";
            $file4="";
            $file5="";
            $file6="";
            $folding_guide_original="";
            $note_detail="";
            $note_attention="";
            if ($folding != 0) {
              $master_data->packing->where('tipe','FOLDING')->first()->file1==null?:$file1=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file1);
              $master_data->packing->where('tipe','FOLDING')->first()->file2==null?:$file2=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file2);
              $master_data->packing->where('tipe','FOLDING')->first()->file3==null?:$file3=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file3);
              $master_data->packing->where('tipe','FOLDING')->first()->file4==null?:$file4=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file4);
              $master_data->packing->where('tipe','FOLDING')->first()->file5==null?:$file5=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file5);
              $master_data->packing->where('tipe','FOLDING')->first()->file6==null?:$file6=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file6);
              $master_data->packing->where('tipe','FOLDING')->first()->file_guide_original==null?:$folding_guide_original=$master_data->packing->where('tipe','FOLDING')->first()->file_guide_original;
              $master_data->packing->where('tipe','FOLDING')->first()->note_detail==null?:$note_detail=$master_data->packing->where('tipe','FOLDING')->first()->note_detail;
              $master_data->packing->where('tipe','FOLDING')->first()->note_attention==null?:$note_attention=$master_data->packing->where('tipe','FOLDING')->first()->note_attention;
            }
        @endphp
        <div class="col-12">
          <div class="cards bg-card px-4 py-4">
            @if($file1 != null || $file2 != null || $file3 != null || $file4 != null || $file5 != null || $file6 != null 
                || $note_detail != null || $note_attention != null || $folding_guide_original != null)
            <div class="row mt-2">
              <div class="col-12 justify-sb">
                <span class="ws-judul">Folding</span>
                @if($folding_guide_original != null )
                <a href="{{route('worksheet.folding.download', $master_data->id)}}" class="ws-download-excel">Download File<i class="ml-3 fas fa-download"></i></a>
                @endif
              </div>
            </div>
            <div class="row mt-2">
              @if($file1 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file1}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file1}}" class="image-folding" alt="No Image">
                  </a>
                </div>
              </div>
              @endif

              @if($file2 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file2}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file2}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file3 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file3}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file3}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file4 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file4}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file4}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file5 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file5}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file5}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file6 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file6}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file6}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

            </div>
            @if($note_detail != null || $note_attention != null)
            <div class="row mt-2">
              <div class="col-sm-6">
                <span class="ws-judul-2">Folding Detail</span>
                <div class="ws-message mt-2">
                  <textarea name="remark" id="remark" readonly>{{$note_detail}}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <span class="ws-judul-2">Attention Folding</span>
                <div class="ws-message mt-2">
                  <textarea name="remark" id="remark" readonly>{{$note_attention}}</textarea>
                </div>
              </div>
            </div>
            @endif
            @if($folding_guide_original != null)
            <div class="accordion" id="accordionGroup6">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="false" aria-controls="collapseOne6">
                    <div class="card-header accordion-effect" id="headingOne6">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">Folding File</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne6" class="collapse" aria-labelledby="headingOne6" data-parent="#accordionGroup6">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file_guide)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @endif

            @php
            $file1="";
            $file2="";
            $file3="";
            $file4="";
            $file5="";
            $file6="";
            $note_detail="";
            $note_attention="";
            $packing_guide_original="";
            if ($packing != 0) {
              $master_data->packing->where('tipe','PACKING')->first()->file1==null?:$file1=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file1);
              $master_data->packing->where('tipe','PACKING')->first()->file2==null?:$file2=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file2);
              $master_data->packing->where('tipe','PACKING')->first()->file3==null?:$file3=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file3);
              $master_data->packing->where('tipe','PACKING')->first()->file4==null?:$file4=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file4);
              $master_data->packing->where('tipe','PACKING')->first()->file5==null?:$file5=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file5);
              $master_data->packing->where('tipe','PACKING')->first()->file6==null?:$file6=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file6);
              $master_data->packing->where('tipe','PACKING')->first()->note_detail==null?:$note_detail=$master_data->packing->where('tipe','PACKING')->first()->note_detail;
              $master_data->packing->where('tipe','PACKING')->first()->note_attention==null?:$note_attention=$master_data->packing->where('tipe','PACKING')->first()->note_attention;
              $master_data->packing->where('tipe','PACKING')->first()->file_guide_original==null?:$packing_guide_original=$master_data->packing->where('tipe','PACKING')->first()->file_guide_original;
  
            }
            @endphp

            @if($file1 != null || $file2 != null || $file3 != null || $file4 != null || $file5 != null || $file6 != null 
                || $note_detail != null || $note_attention != null || $packing_guide_original != null)
            <div class="row mt-4">
              <div class="col-12 justify-sb">
                <span class="ws-judul">Packing</span>
                @if($packing_guide_original != null)
                <a href="{{route('worksheet.packing.download', $master_data->id)}}" class="ws-download-excel">Download File<i class="ml-3 fas fa-download"></i></a>
                @endif
              </div>
            </div>
            <div class="row mt-2">
              @if($file1 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file1}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file1}}" class="image-folding" alt="No Image"/>
                  </a>              
                </div>
              </div>
              @endif

              @if($file2 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file2}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file2}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file3 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file3}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file3}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file4 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file4}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file4}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file5 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file5}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file5}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file6 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file6}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file6}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif
            </div>
            @if($note_detail != null || $note_attention != null)
            <div class="row mt-2">
              <div class="col-sm-6">
                <span class="ws-judul-2">Packing Detail</span>
                <div class="ws-message mt-2">
                  <textarea name="remark" id="remark" value="" readonly>{{$note_detail}}</textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <span class="ws-judul-2">Attention Packing</span>
                <div class="ws-message mt-2">
                  <textarea name="remark" id="remark" value="" readonly>{{$note_attention}}</textarea>
                </div>
              </div>
            </div>
            @endif 
            @if($packing_guide_original != null)
            <div class="accordion" id="accordionGroup7">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="false" aria-controls="collapseOne7">
                    <div class="card-header accordion-effect" id="headingOne7">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">Packing File</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne7" class="collapse" aria-labelledby="headingOne7" data-parent="#accordionGroup7">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file_guide)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @endif

            @php
            $file1="";
            $file2="";
            $file3="";
            $file4="";
            $file5="";
            $file6="";
            $note_detail="";
            $note_attention="";
            $info_guide_original="";
            if ($info != null) {
              $master_data->packing->where('tipe','INFO')->first()->file1==null?:$file1=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file1);
              $master_data->packing->where('tipe','INFO')->first()->file2==null?:$file2=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file2);
              $master_data->packing->where('tipe','INFO')->first()->file3==null?:$file3=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file3);
              $master_data->packing->where('tipe','INFO')->first()->file4==null?:$file4=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file4);
              $master_data->packing->where('tipe','INFO')->first()->file5==null?:$file5=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file5);
              $master_data->packing->where('tipe','INFO')->first()->file6==null?:$file6=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file6);
              $master_data->packing->where('tipe','INFO')->first()->note_detail==null?:$note_detail=$master_data->packing->where('tipe','INFO')->first()->note_detail;
              $master_data->packing->where('tipe','INFO')->first()->note_attention==null?:$note_attention=$master_data->packing->where('tipe','INFO')->first()->note_attention;
              $master_data->packing->where('tipe','INFO')->first()->file_guide_original==null?:$info_guide_original=$master_data->packing->where('tipe','INFO')->first()->file_guide_original;
            }
            @endphp
            @if($file1 != null || $file2 != null || $file3 != null || $file4 != null || $file5 != null || $file6 != null 
                || $note_detail != null || $note_attention != null || $info_guide_original != null)
            <div class="row mt-4">
              <div class="col-12 justify-sb">
                <span class="ws-judul">More Information</span>
                @if($info_guide_original != null)
                <a href="{{route('worksheet.info.download', $master_data->id)}}" class="ws-download-excel">Download File<i class="ml-3 fas fa-download"></i></a>
                @endif
              </div>
            </div>
            <div class="row mt-2">
              @if($file1 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file1}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file1}}" class="image-folding" alt="No Image"/>
                  </a>        
                </div>
              </div>
              @endif

              @if($file2 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file2}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file2}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file3 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file3}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file3}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file4 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file4}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file4}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file5 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file5}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file5}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif

              @if($file6 != null)
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="cards bg-card flex-center h-200">
                  <a href="{{$file6}}" class="image-folding" data-toggle="lightbox" data-gallery="gallery">
                    <img src="{{$file6}}" class="image-folding" alt="No Image"/>
                  </a>
                </div>
              </div>
              @endif
            </div>
            @if($note_detail != null || $note_attention != null)
            <div class="row mt-2">
              <div class="col-sm-12">
                <span class="ws-judul-2">More Info Detail</span>
                <div class="ws-message mt-2">
                  <textarea name="remark" id="remark" value="" readonly>{{$note_detail}}</textarea>
                </div>
              </div>
            </div>
            @endif 
            @if($info_guide_original != null)
            <div class="accordion" id="accordionGroup8">
              <div class="card">
                  <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="false" aria-controls="collapseOne8">
                    <div class="card-header accordion-effect" id="headingOne8">
                      <div class="title-headers flex flex-row justify-between">
                        <div class="ms-sub-judul mt-2 mb-1">Info File</div>
                      </div>
                    </div>
                  </a>
                  <div id="collapseOne8" class="collapse" aria-labelledby="headingOne8" data-parent="#accordionGroup8">
                    <div class="card-body">
                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file_guide)) }}" width="100%" height="750"></iframe>
                    </div>
                  </div>
              </div>
            </div>
            @endif
            @endif
          </div>
        </div>
      </div>

      <a href="{{route('worksheet.general_print', $master_data->id)}}" class="fixed-print"><i class="fas fa-print"></i></a>
      <a href="#" class="BackToTop"><i class="fas fa-arrow-up"></i></a>
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection

@push("scripts")

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.ws-accordion__item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.ws-accordion__header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.ws-accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.ws-accordion__content')

      if(item.classList.contains('ws-accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('ws-accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('ws-accordion-open')
      }
  }
</script>

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
