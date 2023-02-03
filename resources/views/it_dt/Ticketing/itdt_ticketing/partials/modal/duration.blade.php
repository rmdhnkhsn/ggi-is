<div class="modal fade" id="duration{{ $value['booking_id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:430px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row p-4">
                <div class="col-12 justify-sb">
                    <div class="title-18">Room Duration</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="col-12">
                    <div class="borderlight"></div>
                </div>
                <div class="col-12">
                    <table class="tables2">
                        @foreach ($value['detail_booking'] as $key2 =>$value2) 
                            <tr>
                                <td width="50%" class="tbl1"> 
                                    <div class="mt-2">{{ $value2['waktu_start'] }}-{{ $value2['waktu_finish'] }}</div>
                                </td>
                                <td width="50%" class="tbl2">
                                <button type="submit" class="btn-merah-md" data-toggle="modal" data-target="#exampleModalCenterWaiting{{$value ['id'] }}" style="width:120px">Cancel</button>
                                <div class="modal fade" id="exampleModalCenterWaiting{{$value ['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
                                        <div class="modal-content" style="border-radius:10px">
                                            <div class="row p-4">
                                                <div class="col-12 justify-sb">
                                                    <div class="title-18">Reason Cancel</div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <div class="borderlight"></div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <form action="{{route ('tiket.bookingCancel.update') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <textarea class="form-control border-input-10" id="remark_cancel" name="remark_cancel" placeholder="input message..." style="min-height:90px"></textarea>
                                                        </div>
                                                        <input type="hidden" id="id" name="id" value="{{ $value['id'] }}">
                                                        <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                                        <input type="hidden" class="form-control" id="status_booking" name="status_booking"  Value="CANCEL">
                                                        <button type="submit" class="btn-blue-md btn-block">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>