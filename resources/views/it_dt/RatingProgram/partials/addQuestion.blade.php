<div class="modal fade" id="addQuest" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content p-4" style="border-radius:10px">
        <form action="{{route('userfeedback.store')}}" onsubmit="validate_form();" id="frmUserfeedback" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 justify-sb">
                    <div class="title-20">Survey Question</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12 mb-4">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12">
                    <div class="title-sm">System Name</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:46px"><i class="fs-20 fas fa-spell-check"></i></span>
                        </div>
                        <input type="text" class="form-control border-input-10 h-38" id="sistem" name="sistem" placeholder="Enter system name">
                    </div>
                </div>
                <div class="col-12">
                    <div class="title-sm">Route</div>
                    <div class="input-group flex mt-1 mb-3">
                        <div class="input-group-prepend">
                            <span class="inputGroupBlue" style="width:46px"><i class="fs-20 fas fa-network-wired"></i></span>
                        </div>
                        <select class="form-control border-input-10 pointer select2bs4" id="url" name="url">
                            <option selected value="">Select route name</option>
                            @foreach($route_name as $key9=>$value9)
                                <option value="{{$value9}}"name="url">{{$value9}}</option>   
                            @endforeach 
                        </select>
                    </div>
                </div>
                <div class="col-12 mb-1">
                    <div class="title-sm">Question Status</div>
                </div>
                <div class="col-md-6">
                    <div class="wrapperRadio mb-3">
                        <input type="radio" name="isaktif" value="1" class="radioBlue" id="active">
                        <label for="active" class="optionBlue check">
                            <span class="descBlue">Active</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapperRadio mb-3">
                        <input type="radio" name="isaktif" value="0" class="radioOrange" id="inactive">
                        <label for="inactive" class="optionOrange check">
                            <span class="descOrange">Inactive</span>
                        </label>
                    </div>
                </div>
                <div class="col-12 mt-2 mb-4">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12 justify-sb mb-3">
                    <div class="title-18">Question List</div>
                    <button id="addRow" type="button" class="btn-blue-md">Add<i class="fs-18 ml-2 fas fa-plus"></i> </button>
                </div>
                <div class="noQuest" id="noQuest">
                    <img src="{{url('images/iconpack/feedback/no-quest.svg')}}">
                </div>
            </div>
            <div id="newRow"></div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="" class="btn-outline-merah-md btn-block" data-dismiss="modal" aria-label="Close">Cancel<img src="{{url('images/iconpack/feedback/cancel.svg')}}" class="ml-2"></a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn-blue-md btn-block" onclick="return confirm('Save Data ?')"> Save <i class="fs-18 ml-3 fas fa-download"></i></button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>