<div class="modal fade" id="editOrder{{$value->id}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <form action="{{ route('cutting.ppic.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row p-4">
                    <div class="col-12 justify-sb">
                        <div class="title-20">Edit Cutting Order</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight"></div>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$value->id}}">
                    <div class="col-12">
                        <div class="title-sm">WO</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:40px;width:60px"><i class="fs-20 fas fa-list-ol"></i></span>
                            </div>
                            <input type="text" class="form-control border-input-10" id="no_wo" name="no_wo" value="{{$value->no_wo}}" placeholder="select wo number..." required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Factory</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:40px;width:60px"><i class="fs-20 fas fa-building"></i></span>
                            </div>
                            <select class="form-control border-input-10 pointer" id="factory" name="factory">
                                <option  selected>Select Factory</option>
                                @foreach($address as $key2 => $value2)
                                <option value="{{$value2->id}}" {{ $value2->kode_jde == $value->factory ? 'selected="selected"' : '' }}>{{$value2->nama_branch}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Start Date</div>{{$value->start_date}}
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:40px;width:60px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control border-input-10" id="production_date" name="production_date" value="{{$value->production_date}}" placeholder="select date..." required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-sm">Estimated Date Completed</div>
                        <div class="input-group flex mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" for="" style="height:40px;width:60px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control border-input-10" id="estimation_complete" name="estimation_complete" value="{{$value->estimation_complete}}" placeholder="select date..." required>
                        </div>
                    </div>
                    <div class="col-12 justify-end mt-4">
                        <button type="submit" class="btn-blue-md">Update<i class="fs-18 ml-2 fas fa-download"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>