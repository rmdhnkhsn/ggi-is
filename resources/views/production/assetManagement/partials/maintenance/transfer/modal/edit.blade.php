<div class="modal fade" id="edit{{$value['id']}}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:720px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form  action="{{route('asset.maintenance.editTransferAssets')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 justify-sb">
                        <div class="title-18">Edit Data Transfer</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="borderlight2"></div>
                    </div>
                    <div class="col-12"> 
                        <div class="title-sm">Mechanic</div>
                        <div class="input-group mt-1 mb-3">
                            <div class="flex">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                            </div>
                            <input type="hidden" id="id" name="id" value="{{$value['id']}}">
                            <input type="hidden" id="id_machine" name="id_machine" value="{{$value['id_machine']}}">
                            <input type="text" class="form-control borderInput" name="created_by" id="" value="{{ auth()->user()->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Transaction</div>
                        <div class="input-group mt-1 mb-3">
                            <div class="flex">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-random"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" name="status" id="" value="Transfer" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Date</div>
                        <div class="input-group mt-1 mb-3">
                            <div class="input-group-prepend">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control borderInput" name="date" id="" value="{{ $date }}" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title-sm">Destination</div>
                        <div class="input-group mt-1 mb-3">
                            <div class="flex">
                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-truck"></i></span>
                            </div>
                            <select class="form-control borderInput pointer select2bs4" id="" name="location" required>
                                <option selected disabled>{{$value['location']}}</option>
                                @foreach ($dataLokasi as $key2 =>$value2)
                                <option name="{{ $value2['id'] }}">{{ $value2['tipe'] }}/{{ $value2['nama'] }}</option>    
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