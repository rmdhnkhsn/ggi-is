<div class="row">
    @include('marketing.worksheet.partials.finish.revisi')
</div>
<div class="row">
    <div class="col-12">
        <div class="title-20-blue">Thread</div>
    </div>
    <div class="col-12 my-2">     
        <div class="cards-scroll scrollX" id="scroll-bar">   
            <table class="table tbl-content">
                <thead>
                    <tr class="bg-thead">
                        <th>LINE</th>
                        <th>DESC 1</th>
                        <th>DESC 2</th>
                        <th>COLOR WAY</th>
                        <th>COLOR NAME</th>
                        <th>CSP</th>
                        <th>PART</th>
                        <th>ADD DESC</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($master_data->material_sewing as $key => $value)
                    <tr>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->material1}}</td>
                      <td>{{$value->material2}}</td>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->port}}</td>
                      <td>{{$value->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div class="title-20-blue">INAC (Accesoris)</div>
    </div>
    <div class="col-12 my-2">     
        <div class="cards-scroll scrollX" id="scroll-bar">   
            <table class="table tbl-content">
                <thead>
                    <tr class="bg-thead">
                        <th>LINE</th>
                        <th>DESC 1</th>
                        <th>DESC 2</th>
                        <th>COLOR WAY</th>
                        <th>COLOR NAME</th>
                        <th>CSP</th>
                        <th>PART</th>
                        <th>DESC</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($master_data->material_sewing_inac as $key => $value)
                    <tr>
                      <td>{{$value->line_cpnb}}</td>
                      <td>{{$value->material1}}</td>
                      <td>{{$value->material2}}</td>
                      <td>{{$value->colorway}}</td>
                      <td>{{$value->color}}</td>
                      <td>{{$value->consumption}}</td>
                      <td>{{$value->part}}</td>
                      <td>{{$value->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div class="title-20-blue">Packaging</div>
    </div>
    <div class="col-12 my-2">     
        <div class="cards-scroll scrollX" id="scroll-bar">   
            <table class="table tbl-content">
                <thead>
                    <tr class="bg-thead">
                        <th>LINE</th>
                        <th>DESC </th>
                        <th>DETAIL</th>
                        <th>CONSUMPTION</th>
                        <th>ADD DESC</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($master_data->material_sewing_packaging as $key => $value)
                    <tr>
                        <td>{{$value->line_cpnb}}</td>
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
</div>
<!-- ATTENTION SEWING -->
@php
    $attention_sewing="";
    $sewing_guide="";
    $sewing_image="";
    $sewing_image2="";
    $sewing_image3="";
    $sewing_image4="";
    $sewing_image5="";
    $sewing_image6="";
    $sewing_pdf="";
    if ($master_data->material_sewing_detail!==null) {
        $master_data->material_sewing_detail->attention_sewing==null?:$attention_sewing=$master_data->material_sewing_detail->attention_sewing;
        $master_data->material_sewing_detail->sewing_guide==null?:$sewing_guide=$master_data->material_sewing_detail->sewing_guide;
        $master_data->material_sewing_detail->sewing_image==null?:$sewing_image=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image);
        $master_data->material_sewing_detail->sewing_image2==null?:$sewing_image2=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image2);
        $master_data->material_sewing_detail->sewing_image3==null?:$sewing_image3=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image3);
        $master_data->material_sewing_detail->sewing_image4==null?:$sewing_image4=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image4);
        $master_data->material_sewing_detail->sewing_image5==null?:$sewing_image5=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image5);
        $master_data->material_sewing_detail->sewing_image6==null?:$sewing_image6=asset('/marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image6);
        $master_data->material_sewing_detail->sewing_pdf==null?:$sewing_pdf=asset('/marketing/worksheet/material_sewing/sewing/file/'.$master_data->material_sewing_detail->sewing_pdf);
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-16-dark2">Attention Sewing</div>
        <!-- <div class="cards p-3 mt-2">
            <div class="row gap-4">
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Keterangan Sewing</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Panduan Sewing</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
            </div>
        </div> -->
        @if($attention_sewing != null)
        <div class="messageGrey mt-2 mb-4">
            <textarea id="att_sewing" name="attention_sewing" maxlength="500" placeholder="Uraian Singkat..." readonly>{{$attention_sewing}}</textarea>
        </div>
        @endif
    </div>
    @if($sewing_image != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$sewing_image}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$sewing_image}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($sewing_image2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$sewing_image2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$sewing_image2}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($sewing_image3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$sewing_image3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$sewing_image3}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($sewing_image4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$sewing_image4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$sewing_image4}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($sewing_image5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$sewing_image5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$sewing_image5}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($sewing_image6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$sewing_image6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$sewing_image6}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($sewing_pdf != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->material_sewing_detail->sewing_pdf}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#collapse" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="collapse" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$sewing_pdf}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
        <div class="borderlight my-3"></div>
    </div>
    @endif
</div>
<!-- ATTENTION LABEL -->
@php
    $attention_label="";
    $label_guide="";
    $label_image="";
    $label_image2="";
    $label_image3="";
    $label_image4="";
    $label_image5="";
    $label_image6="";
    $label_pdf="";
    if ($master_data->material_sewing_detail!==null) {
        $master_data->material_sewing_detail->attention_label==null?:$attention_label=$master_data->material_sewing_detail->attention_label;
        $master_data->material_sewing_detail->label_guide==null?:$label_guide=$master_data->material_sewing_detail->label_guide;
        $master_data->material_sewing_detail->label_image==null?:$label_image=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image);
        $master_data->material_sewing_detail->label_image2==null?:$label_image2=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image2);
        $master_data->material_sewing_detail->label_image3==null?:$label_image3=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image3);
        $master_data->material_sewing_detail->label_image4==null?:$label_image4=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image4);
        $master_data->material_sewing_detail->label_image5==null?:$label_image5=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image5);
        $master_data->material_sewing_detail->label_image6==null?:$label_image6=asset('/marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image6);
        $master_data->material_sewing_detail->label_pdf==null?:$label_pdf=asset('/marketing/worksheet/material_sewing/label/file/'.$master_data->material_sewing_detail->label_pdf);
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-16-dark2">Attention Label</div>
        <!-- <div class="cards p-3 mt-2">
            <div class="row gap-4">
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Keterangan Label</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Panduan Label</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
            </div>
        </div> -->
        @if($attention_label != null)
        <div class="messageGrey mt-2 mb-4">
            <textarea id="att_label" name="attention_label" maxlength="500" placeholder="Uraian Singkat..." readonly>{{$attention_label}}</textarea>
        </div>
        @endif
    </div>
    @if($label_image != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$label_image}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$label_image}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($label_image2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$label_image2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$label_image2}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($label_image3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$label_image3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$label_image3}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($label_image4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$label_image4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$label_image4}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($label_image5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$label_image5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$label_image5}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($label_image6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$label_image6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$label_image6}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($label_pdf != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->material_sewing_detail->label_pdf}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#collapse2" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="collapse2" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe id="pdf-js-viewer" src="{{$label_pdf}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
        <div class="borderlight my-3"></div>
    </div>
    @endif
</div>
<!-- ATTENTION IRONING -->
@php
    $attention_ironing="";
    $ironing_guide="";
    $ironing_image="";
    $ironing_image2="";
    $ironing_image3="";
    $ironing_image4="";
    $ironing_image5="";
    $ironing_image6="";
    $ironing_pdf="";
    if ($master_data->material_sewing_detail!==null) {
        $master_data->material_sewing_detail->attention_ironing==null?:$attention_ironing=$master_data->material_sewing_detail->attention_ironing;
        $master_data->material_sewing_detail->ironing_guide==null?:$ironing_guide=$master_data->material_sewing_detail->ironing_guide;
        $master_data->material_sewing_detail->ironing_image==null?:$ironing_image=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image);
        $master_data->material_sewing_detail->ironing_image2==null?:$ironing_image2=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image2);
        $master_data->material_sewing_detail->ironing_image3==null?:$ironing_image3=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image3);
        $master_data->material_sewing_detail->ironing_image4==null?:$ironing_image4=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image4);
        $master_data->material_sewing_detail->ironing_image5==null?:$ironing_image5=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image5);
        $master_data->material_sewing_detail->ironing_image6==null?:$ironing_image6=asset('/marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image6);
        $master_data->material_sewing_detail->ironing_pdf==null?:$ironing_pdf=asset('/marketing/worksheet/material_sewing/ironing/file/'.$master_data->material_sewing_detail->ironing_pdf);
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-16-dark2">Attention Ironing</div>
        <!-- <div class="cards p-3 mt-2">
            <div class="row gap-4">
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Keterangan Ironing</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Panduan Ironing</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
            </div>
        </div> -->
        @if($attention_ironing != null)
        <div class="messageGrey mt-2 mb-4">
            <textarea id="att_ironing" name="attention_ironing" maxlength="500" placeholder="Uraian Singkat...">{{$attention_ironing}}</textarea>
        </div>
        @endif
    </div>
    @if($ironing_image != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$ironing_image}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$ironing_image}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($ironing_image2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$ironing_image2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$ironing_image2}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($ironing_image3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$ironing_image3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$ironing_image3}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($ironing_image4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$ironing_image4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$ironing_image4}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($ironing_image5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$ironing_image5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$ironing_image5}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($ironing_image6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$ironing_image6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$ironing_image6}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($ironing_pdf != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->material_sewing_detail->ironing_pdf}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#collapse3" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="collapse3" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$ironing_pdf}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
        <div class="borderlight my-3"></div>
    </div>
    @endif
</div>
<!-- ATTENTION TRIMMING -->
@php
    $attention_trimming="";
    $trimming_guide="";
    $trimming_image="";
    $trimming_image2="";
    $trimming_image3="";
    $trimming_image4="";
    $trimming_image5="";
    $trimming_image6="";
    $trimming_pdf="";
    if ($master_data->material_sewing_detail!==null) {
        $master_data->material_sewing_detail->attention_trimming==null?:$attention_trimming=$master_data->material_sewing_detail->attention_trimming;
        $master_data->material_sewing_detail->trimming_guide==null?:$trimming_guide=$master_data->material_sewing_detail->trimming_guide;
        $master_data->material_sewing_detail->trimming_image==null?:$trimming_image=asset('/marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image);
        $master_data->material_sewing_detail->trimming_image2==null?:$trimming_image2=asset('/marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image2);
        $master_data->material_sewing_detail->trimming_image3==null?:$trimming_image3=asset('/marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image3);
        $master_data->material_sewing_detail->trimming_image4==null?:$trimming_image4=asset('/marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image4);
        $master_data->material_sewing_detail->trimming_image5==null?:$trimming_image5=asset('/marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image5);
        $master_data->material_sewing_detail->trimming_image6==null?:$trimming_image6=asset('/marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image6);
        $master_data->material_sewing_detail->trimming_pdf==null?:$trimming_pdf=asset('/marketing/worksheet/material_sewing/trimming/file/'.$master_data->material_sewing_detail->trimming_pdf);
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-16-dark2">Attention Trimming</div>
        <!-- <div class="cards p-3 mt-2">
            <div class="row gap-4">
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Keterangan Trimming</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="title-14-dark2 mb-1">Panduan Trimming</div>
                    <ul class="ml-min14">
                        <li class="title-14-dark3">Point 1</li>
                        <li class="title-14-dark3">Point 2</li>
                        <li class="title-14-dark3">Point 3</li>
                    </ul>
                </div>
            </div>
        </div> -->
        @if($attention_trimming != null)
        <div class="messageGrey mt-2 mb-4">
            <textarea id="att_trimming" name="attention_trimming" maxlength="500" placeholder="Uraian Singkat...">{{$attention_trimming}}</textarea>
        </div>
        @endif
    </div>
    @if($trimming_image != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$trimming_image}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$trimming_image}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($trimming_image2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$trimming_image2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$trimming_image2}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($trimming_image3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$trimming_image3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$trimming_image3}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($trimming_image4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$trimming_image4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$trimming_image4}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($trimming_image5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$trimming_image5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$trimming_image5}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($trimming_image6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$trimming_image6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$trimming_image6}}" class="imageHover" />
                <div class="objectHover">
                    <div class="justify-center">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="justify-center">
                        <div class="text">Preview Image</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
    @if($trimming_pdf != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">{{$master_data->material_sewing_detail->trimming_pdf}}</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#collapse4" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="collapse4" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$trimming_pdf}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
