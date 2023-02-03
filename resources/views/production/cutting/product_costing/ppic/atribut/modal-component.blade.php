<form action="{{route('cutting.ppic.component_store', $wo->wo_detail->no_wo)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modal-component" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:720px">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-left">
                            <span class="title-sm">Component</span>
                            <div class="input-group mb-3 mt-2">
                                <select class="form-control input-data-fa" style="width:100%" id="multipleSelectExample" name="component[]" data-placeholder="Select an option" multiple="true" >
                                    @foreach($wo->ppic_component as $key => $value)
                                    @foreach($component as $key2 => $value2)
                                    @if($value->item_number != $value2['item_number'])
                                    <option value="{{$value2['item_number']}}">{{$value2['seq']}} - {{$value2['desc']}} ({{$value2['status']}})</option>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3 mt-2">
                           
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" style="float:right" class="btn pic-btn-save">Save<i class="ml-3 fs-20 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>