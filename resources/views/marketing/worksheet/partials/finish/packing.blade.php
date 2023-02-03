
<div class="row">
    @include('marketing.worksheet.partials.finish.revisi')
</div>
<!-- Attention Folding -->
@php
    $folding_note_detail="";
    $folding_file1="";
    $folding_file2="";
    $folding_file3="";
    $folding_file4="";
    $folding_file5="";
    $folding_file6="";
    $folding_file7="";
    $folding_file8="";
    $folding_file9="";
    $folding_file10="";
    $folding_file11="";
    $folding_file12="";
    $folding_guide_original="";
    if ($master_data->packing->where('tipe','FOLDING')->first()!==null) {
        $master_data->packing->where('tipe','FOLDING')->first()->note_detail==null?:$folding_note_detail=$master_data->packing->where('tipe','FOLDING')->first()->note_detail;
        $master_data->packing->where('tipe','FOLDING')->first()->file1==null?:$folding_file1=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file1);
        $master_data->packing->where('tipe','FOLDING')->first()->file2==null?:$folding_file2=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file2);
        $master_data->packing->where('tipe','FOLDING')->first()->file3==null?:$folding_file3=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file3);
        $master_data->packing->where('tipe','FOLDING')->first()->file4==null?:$folding_file4=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file4);
        $master_data->packing->where('tipe','FOLDING')->first()->file5==null?:$folding_file5=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file5);
        $master_data->packing->where('tipe','FOLDING')->first()->file6==null?:$folding_file6=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file6);
        $master_data->packing->where('tipe','FOLDING')->first()->file7==null?:$folding_file7=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file7);
        $master_data->packing->where('tipe','FOLDING')->first()->file8==null?:$folding_file8=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file8);
        $master_data->packing->where('tipe','FOLDING')->first()->file9==null?:$folding_file9=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file9);
        $master_data->packing->where('tipe','FOLDING')->first()->file10==null?:$folding_file10=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file10);
        $master_data->packing->where('tipe','FOLDING')->first()->file11==null?:$folding_file11=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file11);
        $master_data->packing->where('tipe','FOLDING')->first()->file12==null?:$folding_file12=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file12);
        $master_data->packing->where('tipe','FOLDING')->first()->file_guide_original==null?:$folding_guide_original=asset('/upload/'.$master_data->packing->where('tipe','FOLDING')->first()->file_guide);
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-16-dark2">Attention Folding</div>
        <div class="messageGrey mt-2 mb-4">
            <textarea id="att_folding" name="attention_sewing" maxlength="500" placeholder="Uraian Singkat..." readonly>{{$folding_note_detail}}</textarea>
        </div>
    </div>
    @if($folding_file1 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file1}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file1}}" class="imageHover" />
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
    @if($folding_file2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file2}}" class="imageHover" />
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
    @if($folding_file3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file3}}" class="imageHover" />
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
    @if($folding_file4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file4}}" class="imageHover" />
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
    @if($folding_file5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file5}}" class="imageHover" />
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
    @if($folding_file6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file6}}" class="imageHover" />
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
    @if($folding_file7 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file7}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file7}}" class="imageHover" />
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
    @if($folding_file8 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file8}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file8}}" class="imageHover" />
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
    @if($folding_file9 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file9}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file9}}" class="imageHover" />
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
    @if($folding_file10 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file10}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file10}}" class="imageHover" />
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
    @if($folding_file11 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file11}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file11}}" class="imageHover" />
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
    @if($folding_file12 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$folding_file12}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$folding_file12}}" class="imageHover" />
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
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">Document Folding.pdf</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#folding" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="folding" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$folding_guide_original}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
        <div class="borderlight my-3"></div>
    </div>
</div>
<!-- Attention Packing -->
@php
    $packing_note_detail="";
    $packing_file1="";
    $packing_file2="";
    $packing_file3="";
    $packing_file4="";
    $packing_file5="";
    $packing_file6="";
    $packing_guide_original="";
    if ($master_data->packing->where('tipe','PACKING')->first()!==null) {
        $master_data->packing->where('tipe','PACKING')->first()->note_detail==null?:$packing_note_detail=$master_data->packing->where('tipe','PACKING')->first()->note_detail;
        $master_data->packing->where('tipe','PACKING')->first()->file1==null?:$packing_file1=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file1);
        $master_data->packing->where('tipe','PACKING')->first()->file2==null?:$packing_file2=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file2);
        $master_data->packing->where('tipe','PACKING')->first()->file3==null?:$packing_file3=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file3);
        $master_data->packing->where('tipe','PACKING')->first()->file4==null?:$packing_file4=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file4);
        $master_data->packing->where('tipe','PACKING')->first()->file5==null?:$packing_file5=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file5);
        $master_data->packing->where('tipe','PACKING')->first()->file6==null?:$packing_file6=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file6);
        $master_data->packing->where('tipe','PACKING')->first()->file_guide_original==null?:$packing_guide_original=asset('/upload/'.$master_data->packing->where('tipe','PACKING')->first()->file_guide);
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-16-dark2">Attention Packing</div>
        <div class="messageGrey mt-2 mb-4">
            <textarea id="att_packing" name="attention_sewing" maxlength="500" placeholder="Uraian Singkat..." readonly>{{$packing_note_detail}}</textarea>
        </div>
    </div>
    @if($packing_file1 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$packing_file1}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$packing_file1}}" class="imageHover" />
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
    @if($packing_file2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$packing_file2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$packing_file2}}" class="imageHover" />
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
    @if($packing_file3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$packing_file3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$packing_file3}}" class="imageHover" />
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
    @if($packing_file4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$packing_file4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$packing_file4}}" class="imageHover" />
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
    @if($packing_file5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$packing_file5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$packing_file5}}" class="imageHover" />
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
    @if($packing_file6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$packing_file6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$packing_file6}}" class="imageHover" />
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
    @if($packing_guide_original != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">Document Packing.pdf</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#packing_file_guide" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="packing_file_guide" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$packing_guide_original}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
        <div class="borderlight my-3"></div>
    </div>
    @endif
</div>

<!-- More Info  -->
@php
    $info_note_detail="";
    $info_file1="";
    $info_file2="";
    $info_file3="";
    $info_file4="";
    $info_file5="";
    $info_file6="";
    $info_guide_original="";
    if ($master_data->packing->where('tipe','INFO')->first()!==null) {
        $master_data->packing->where('tipe','INFO')->first()->note_detail==null?:$info_note_detail=$master_data->packing->where('tipe','INFO')->first()->note_detail;
        $master_data->packing->where('tipe','INFO')->first()->file1==null?:$info_file1=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file1);
        $master_data->packing->where('tipe','INFO')->first()->file2==null?:$info_file2=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file2);
        $master_data->packing->where('tipe','INFO')->first()->file3==null?:$info_file3=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file3);
        $master_data->packing->where('tipe','INFO')->first()->file4==null?:$info_file4=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file4);
        $master_data->packing->where('tipe','INFO')->first()->file5==null?:$info_file5=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file5);
        $master_data->packing->where('tipe','INFO')->first()->file6==null?:$info_file6=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file6);
        $master_data->packing->where('tipe','INFO')->first()->file_guide_original==null?:$info_guide_original=asset('/upload/'.$master_data->packing->where('tipe','INFO')->first()->file_guide);
    }
@endphp
<div class="row">
    <div class="col-12">
        <div class="title-16-dark2">Attention Information</div>
        <div class="messageGrey mt-2 mb-4">
            <textarea id="att_info" name="attention_sewing" maxlength="500" placeholder="Uraian Singkat..." readonly>{{$folding_note_detail}}</textarea>
        </div>
    </div>
    @if($info_file1 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$info_file1}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$info_file1}}" class="imageHover" />
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
    @if($info_file2 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$info_file2}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$info_file2}}" class="imageHover" />
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
    @if($info_file3 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$info_file3}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$info_file3}}" class="imageHover" />
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
    @if($info_file4 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$info_file4}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$info_file4}}" class="imageHover" />
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
    @if($info_file5 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$info_file5}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$info_file5}}" class="imageHover" />
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
    @if($info_file6 != null)
    <div class="col-xl-2 col-md-4">
        <div class="cards relative h-200">
            <a href="{{$info_file6}}" data-toggle="lightbox" data-gallery="gallery">
                <img src="{{$info_file6}}" class="imageHover" />
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
    @if($info_guide_original != null)
    <div class="col-12">
        <div class="cards" id="accordion">
            <div class="accordionPreviewOrange">
                <div class="title text-truncate">Document Information.pdf</div>
                <button type="button" class="btn-preview-orange w-130" data-toggle="collapse" data-target="#information" aria-expanded="true">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
            </div>
            <div id="information" class="collapse" data-parent="#accordion">
                <div class="cards-20 p-4"> 
                    <iframe  id="pdf-js-viewer" src="{{$info_guide_original}}" width="100%" height="750"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
