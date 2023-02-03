@foreach($TiketWaitingBooking as $key => $value)
    <div class="accordion_item">
        <header class="accordion_header">
            <div class="badge bg-green">
                <i class="fas fa-building iconBadge"></i>
                <div class="title">{{$value['ticket_for']}}</div>
            </div>
            <div class="desc_accordion text-truncate">
                <div class="description">
                    <div class="desc1">Ticket Number</div>
                    <div class="desc2"><span class="mr-1">:</span>{{$value['branchdetail'] }}-{{$value['ticket_booked_for'] }}{{$value['booking_id'] }}</div> 
                </div>
                <div class="description">
                    <div class="desc1">User</div>
                    <div class="desc2 text-truncate"><span class="mr-1">:</span> {{$value['nama']}}</div> 
                </div>
            </div>
             <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <div class="txt-pink fw-6"></div>
            </div>
            <div class="icons">
                <i class="fas fa-caret-right accordion_iconIT"></i>
            </div>
        </header>
        <div class="accordion_content borderTop">
            <table class="tables2">
                <tr>
                    <td width="30%" class="tbl1">Ticket Number</td>
                    <td width="70%" class="tbl2">{{$value['branchdetail'] }}-{{$value['ticket_booked_for'] }}{{$value['booking_id'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">NIK</td>
                    <td width="70%" class="tbl2">{{$value['nik'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Name</td>
                    <td width="70%" class="tbl2">{{$value['nama'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Departement</td>
                    <td width="70%" class="tbl2">{{$value['bagian'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Ext</td>
                    <td width="70%" class="tbl2">{{$value['ext'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">IP</td>
                    <td width="70%" class="tbl2">{{$value['ip'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Categori</td>
                    <td width="70%" class="tbl2">{{$value['kategori'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Input Date</td>
                    <td width="70%" class="tbl2">{{$value['tanggal_input'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Booking Date</td>
                    <td width="70%" class="tbl2">{{$value['tanggal_booking'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Booked Room</td>
                    <td width="70%" class="tbl2">{{$value['ruang_meeting'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Room Duration </td>
                    <td width="70%" class="tbl2">
                        <a href="" class="" data-toggle="modal" data-target="#waiting{{ $value['booking_id'] }}">{{ $value['datawaktu'] }} Hour</a>
                        <div class="modal fade" id="waiting{{ $value['booking_id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                                @foreach ($value['detail_booking']  as $key2 =>$value2) 
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
                    </td>
                </tr>
                
                <tr>
                    <td width="30%" class="tbl1">Description</td>
                    <td width="70%" class="tbl2">{{$value['deskripsi'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Action</td>
                    <td width="70%" class="tbl2">
                        <div class="justify-start" style="gap:.6rem">        
                        <button type="submit" class="btn-merah-md" data-toggle="modal" data-target="#exampleModalCenter-2{{$value ['id'] }}" style="width:120px">Cancel</button>
                        </div>
                        <div class="modal fade" id="exampleModalCenter-2{{$value ['id'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                            <form action="{{route ('tiket.bookingCancelAll.update') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <textarea class="form-control border-input-10" id="remark_cancel" name="remark_cancel" placeholder="input message..." style="min-height:90px"></textarea>
                                                </div>
                                                <input type="hidden" id="booking_id" name="booking_id" value="{{ $value['booking_id'] }}">
                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                                <input type="hidden" class="form-control" id="is_cancel" name="is_cancel"  Value="1">
                                                <button type="submit" class="btn-blue-md btn-block">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

        </div>
    </div>
@endforeach
