<!-- Modal -->
<form action="#" id="form-measurement" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="master_id" id="master_id" value="{{$master_data->id}}">
    <input type="hidden" name="id" id="id" value="0">

    <div class="modal fade" id="modal-form-measurement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border-radius:10px">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>  
                    </div> 
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <span class="ms-add-title" id="form-title">Measurement</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <span class="general-identity-title">Select Type</span>
                            <select class="custom-select" id="tipe" name="tipe">
                                <option value="SPEC">SPEC</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <span class="general-identity-title">POM</span>
                        <div class="field mt-2">
                            <input type="text" id="pom" name="pom" placeholder="POM..." required>
                        </div>
                    </div>
                    <div class="col-6">
                        <span class="general-identity-title">Description</span>
                        <div class="field mt-2">
                            <input type="text" id="description" name="description" placeholder="Description...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <span class="general-identity-title">Tol(+)</span>
                        <div class="field mt-2">
                            <input type="text" id="tol_positif" name="tol_positif" placeholder="Tol(+)...">
                        </div>
                    </div>
                    <div class="col-6">
                        <span class="general-identity-title">Tol(-)</span>
                        <div class="field mt-2">
                            <input type="text" id="tol_negatif" name="tol_negatif" placeholder="Tol(-)...">
                        </div>
                    </div>
                </div>

                @foreach ($master_data->rekap_size->toArray() as $column => $field)
                    @if (str_contains($column,'size')&&($field!==null))
                    <div class="row">
                        <div class="col-12">
                            <span class="general-identity-title">Size {{$field}}</span>
                            <div class="field mt-2">
                                <input type="text" id="{{$column}}" name="{{$column}}" placeholder="Size {{$field}}">
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <button type="submit" id="submit" class="btn ws-btn-save">Save<i class="ml-3 fas fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
</form>



