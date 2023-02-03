
<div class="row">
    @include('marketing.worksheet.partials.finish.revisi')
</div>
@php
    $fabric1="";
    $fabric2="";
    $fabric3="";
    $fabric4="";
    $fabric5="";
    $fabric6="";
    $attention_cutting="";
    if ($master_data->attention_cutting != null) {
        $master_data->attention_cutting->fabric_image==null?:$fabric1=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image);
        $master_data->attention_cutting->fabric_image2==null?:$fabric2=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image2);
        $master_data->attention_cutting->fabric_image3==null?:$fabric3=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image3);
        $master_data->attention_cutting->fabric_image4==null?:$fabric4=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image4);
        $master_data->attention_cutting->fabric_image5==null?:$fabric5=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image5);
        $master_data->attention_cutting->fabric_image6==null?:$fabric6=asset('/marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image6);
        $master_data->attention_cutting->attention_sewing==null?:$attention_cutting=$master_data->attention_cutting->attention_sewing;
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-20-blue">Fabric Material</div>
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
                        <th>CUTTING WAY</th>
                        <th>PART</th>
                        <th>CSP</th>
                        <th>REMARK</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($master_data->material_fabric as $key => $value)
                    <tr>
                        <td>{{$value->line_cpnb}}</td>
                        <td>{{$value->material1}}</td>
                        <td>{{$value->material2}}</td>
                        <td>{{$value->colorway}}</td>
                        <td>{{$value->cutting_way}}</td>
                        <td>{{$value->port}}</td>
                        <td>{{$value->consumption}}</td>
                        <td>{{$value->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="title-14 text-left">Attention or Guide Cutting</div>
        <div class="messageGrey mt-2 mb-4">
            <textarea id="konten" name="attention_sewing" maxlength="500" placeholder="Uraian Singkat..." readonly>{{$attention_cutting}}</textarea>
        </div>
    </div>
</div>
<div class="row">
    @if($fabric1 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$fabric1}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$fabric1}}" class="imageHover" />
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
    @if($fabric2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$fabric2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$fabric2}}" class="imageHover" />
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
    @if($fabric3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$fabric3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$fabric3}}" class="imageHover" />
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
    @if($fabric4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$fabric4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$fabric4}}" class="imageHover" />
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
    @if($fabric5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$fabric5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$fabric5}}" class="imageHover" />
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
    @if($fabric6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$fabric6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$fabric6}}" class="imageHover" />
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
</div>
