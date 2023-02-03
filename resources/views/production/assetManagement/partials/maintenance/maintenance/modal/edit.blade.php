<div class="modal fade" id="edit{{$value['id']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:640px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.maintenance.editMaintenanceAssets')}}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" id="id" name="id" value="{{$value['id']}}">
                <input type="hidden" id="id_machine" name="id_machine" value="{{$value['id_machine']}}">
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Edit Data Maintenance</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Spv</div>
                        <div class="input-group mt-1 mb-3">
                            <div class="flex">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                            <select class="form-control borderInput pointer" id="" name="spv" required>
                                <option selected disabled>{{$value['spv']}}</option>
                                @foreach ($user as $key4 =>$value4)
                                    <option name="{{ $value4['fullname'] }}">{{ $value4['fullname'] }}</option> 
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Maintenance</div>
                        <div class="input-group mt-1 mb-3">
                            <div class="flex">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-tools"></i></span>
                            </div>
                            <select class="form-control borderInput pointer" id="" name="maintenance" required>
                                <option selected disabled>{{$value['maintenance']}}</option>
                            @foreach ($maintenance as $key3 =>$value3)
                                    <option name="{{ $value3['maintenance'] }}">{{ $value3['maintenance'] }}</option> 
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Condition</div>
                        <div class="input-group mt-1 mb-3">
                            <div class="flex">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-heartbeat"></i></span>
                            </div>
                            <select class="form-control borderInput pointer" id="kondisi" name="kondisi" required>
                                <option selected disabled>{{$value['kondisi']}}</option>
                                @foreach ($kondisi as $key2 =>$value2)
                                    <option name="{{ $value2['condition'] }}">{{ $value2['condition'] }}</option> 
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn-blue-md w-100">Save & Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>