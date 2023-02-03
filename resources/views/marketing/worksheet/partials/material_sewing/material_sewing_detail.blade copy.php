<form action="{{ route('worksheet.detail_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="master_id" name="master_id" value="{{$master_data->id}}">
    @if($master_data->material_sewing_detail == null)
    <div class="row mt-2 mb-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Sewing</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Sewing.." name="attention_sewing" id="attention_sewing" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Sewing Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Sewing guide.." name="sewing_guide" id="sewing_guide" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-sew').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-sew">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-sew" type='file' id="sewing_image" name="sewing_image" value="" onchange="readURL_sew(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-sew">
                    <img class="file-upload-image-sew mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_sew()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Label</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Label.." name="attention_label" id="attention_label" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Label Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Label guide.." name="label_guide" id="label_guide" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-label').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-label">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-label" type='file' id="label_image" name="label_image" value="" onchange="readURL_label(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-label">
                    <img class="file-upload-image-label mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_label()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Ironing</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Ironing.." name="attention_ironing" id="attention_ironing" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Ironing Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Ironing guide.." name="ironing_guide" id="ironing_guide" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-iron').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-iron">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-iron" type='file' id="ironing_image" name="ironing_image" value="" onchange="readURL_iron(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-iron">
                    <img class="file-upload-image-iron mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_iron()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Trimming</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Trimming.." name="attention_trimming" id="attention_trimming" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Trimming Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Trimming guide.." name="trimming_guide" id="trimming_guide" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-trim').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-trim">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-trim" type='file' id="trimming_image" name="trimming_image" value="" onchange="readURL_trim(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-trim">
                    <img class="file-upload-image-trim mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_trim()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @else
    <div class="row mt-2 mb-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Sewing</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Attention Sewing.." name="attention_sewing" id="attention_sewing" value="" style="height:160px">{{$master_data->material_sewing_detail->sewing_guide}}</textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Sewing Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Sewing guide.." name="sewing_guide" id="sewing_guide" value="" style="height:160px">{{$master_data->material_sewing_detail->sewing_guide}}</textarea>
            </div>
        </div>
        @if($master_data->material_sewing_detail->sewing_image != null)
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <img class="image-upload-wrap" src="{{ url('marketing/worksheet/material_sewing/sewing/'.$master_data->material_sewing_detail->sewing_image) }}">   
                <input type="hidden" name="sewing_image" id="sewing_image" value="{{$master_data->material_sewing_detail->sewing_image}}">
            </div>
        </div>
        @else
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-sew').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-sew">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-sew" type='file' id="sewing_image" name="sewing_image" value="" onchange="readURL_sew(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-sew">
                    <img class="file-upload-image-sew mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_sew()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Label</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Label.." name="attention_label" id="attention_label" value="" style="height:160px">{{$master_data->material_sewing_detail->attention_label}}</textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Label Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Label guide.." name="label_guide" id="label_guide" value="" style="height:160px">{{$master_data->material_sewing_detail->label_guide}}</textarea>
            </div>
        </div>
        @if($master_data->material_sewing_detail->label_image != null)
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <img class="image-upload-wrap" src="{{ url('marketing/worksheet/material_sewing/label/'.$master_data->material_sewing_detail->label_image) }}">   
                <input type="hidden" name="label_image" id="label_image" value="{{$master_data->material_sewing_detail->label_image}}">
            </div>
        </div>
        @else
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-label').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-label">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-label" type='file' id="label_image" name="label_image" value="" onchange="readURL_label(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-label">
                    <img class="file-upload-image-label mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_label()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Ironing</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Ironing.." name="attention_ironing" id="attention_ironing" value="" style="height:160px">{{$master_data->material_sewing_detail->attention_ironing}}</textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Ironing Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Ironing guide.." name="ironing_guide" id="ironing_guide" value="" style="height:160px">{{$master_data->material_sewing_detail->ironing_guide}}</textarea>
            </div>
        </div>
        @if($master_data->material_sewing_detail->ironing_image != null)
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <img class="image-upload-wrap" src="{{ url('marketing/worksheet/material_sewing/ironing/'.$master_data->material_sewing_detail->ironing_image) }}">   
                <input type="hidden" name="ironing_image" id="ironing_image" value="{{$master_data->material_sewing_detail->ironing_image}}">
            </div>
        </div>
        @else
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-iron').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-iron">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-iron" type='file' id="ironing_image" name="ironing_image" value="" onchange="readURL_iron(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-iron">
                    <img class="file-upload-image-iron mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_iron()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Trimming</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Trimming.." name="attention_trimming" id="attention_trimming" value="" style="height:160px">{{$master_data->material_sewing_detail->attention_trimming}}</textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Trimming Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre Trimming guide.." name="trimming_guide" id="trimming_guide" value="" style="height:160px">{{$master_data->material_sewing_detail->trimming_guide}}</textarea>
            </div>
        </div>
        @if($master_data->material_sewing_detail->trimming_image != null)
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <img class="image-upload-wrap" src="{{ url('marketing/worksheet/material_sewing/trimming/'.$master_data->material_sewing_detail->trimming_image) }}">   
                <input type="hidden" name="trimming_image" id="trimming_image" value="{{$master_data->material_sewing_detail->trimming_image}}">
            </div>
        </div>
        @else
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-trim').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-trim">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-trim" type='file' id="trimming_image" name="trimming_image" value="" onchange="readURL_trim(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-trim">
                    <img class="file-upload-image-trim mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_trim()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif