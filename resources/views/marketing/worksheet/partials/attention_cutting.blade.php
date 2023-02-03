<div class="row">
    <div class="col-12">
        <div class="ws-judul-2">Create Attention Cutting</div>
    </div>
</div>
<form action="{{ route('material_fabric.update_images')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="master_id" id="master_id" value="{{$master_data->id}}">
    @if($master_data->attention_cutting == null)    
    <div class="row mt-2 mb-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Cutting</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention cutting.." name="attention_cutting" id="attention_cutting" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Cutting Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre cutting guide.." name="cutting_guide" id="cutting_guide" value="" style="height:160px"></textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-cutt').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-cutt">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-cutt" type='file' id="file" name="file" value="" onchange="readURL_cutt(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-cutt">
                    <img class="file-upload-image-cutt mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_cutt()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row mt-2 mb-2">
        <div class="col-sm-4">
            <span class="ws-sub-title">Attention Cutting</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre attention Cutting.." name="attention_cutting" id="attention_cutting" style="height:160px">{{$master_data->attention_cutting->attention_sewing}}</textarea>
            </div>
        </div>
        <div class="col-sm-4">
            <span class="ws-sub-title">Cutting Guide</span>
            <div class="ws-message mt-2">
                <textarea placeholder="Write youre cutting guide.." name="cutting_guide" id="cutting_guide" style="height:160px">{{$master_data->attention_cutting->sewing_guide}}</textarea>
            </div>
        </div>
        @if($master_data->attention_cutting->fabric_image != null)
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <img class="image-upload-wrap" src="{{ url('marketing/worksheet/material_fabric/'.$master_data->attention_cutting->fabric_image) }}">   
                <input type="hidden" name="file" id="file" value="{{$master_data->attention_cutting->fabric_image}}">
            </div>
        </div>
        @else
        <div class="col-sm-4">
            <span class="ws-sub-title">Image</span>
            <div class="file-upload-ws">
                <button class="file-upload-btn-ws" type="button" onclick="$('.file-upload-input-cutt').trigger( 'click' )">Select Image</button>
                <div class="image-upload-wrap-cutt">
                    <i class="icon-upload-ws fas fa-upload"></i>
                    <input class="file-upload-input-cutt" type='file' id="file" name="file" value="" onchange="readURL_cutt(this);" accept="image/*" />
                    <div class="drag-text-ws">
                        <h5>Or Drop Images Here</h5>
                    </div>
                </div>
                <div class="file-upload-content-cutt">
                    <img class="file-upload-image-cutt mt-2" src="#" alt=" Image Format Only" />
                    <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload_cutt()" class="remove-image-ws"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif