<div class="modal fade" id="detail{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:720px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 py-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row px-3">
                <div class="col-12">
                    <table class="table info-content">
                        <tr>
                            <td width="30%" class="tbl1">Ticket Number</td>
                            <td width="70%" class="tbl2">{{$value['branchdetail'] }}-{{$value['tiket'] }}{{$value['no_tiket'] }}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">NIK</td>
                            <td width="70%" class="tbl2">{{$value->nik}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Nama</td>
                            <td width="70%" class="tbl2">{{$value->nama}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Department</td>
                            <td width="70%" class="tbl2">{{$value->bagian}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Category </td>
                            <td width="70%" class="tbl2">{{$value->kategori}}</td>
                        </tr>
                        <!-- <tr>
                            <td width="30%" class="tbl1">Amount</td>
                            <td width="70%" class="tbl2">Rp. {{number_format($value->amount_rencana, 2, ",", ".")}}</td>
                        </tr> -->
                        <tr>
                            <td width="30%" class="tbl1">Account Code</td>
                            <td width="70%" class="tbl2">{{$value->akun_kredit}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Description</td>
                            <td width="70%" class="tbl2">{{$value->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Create Date</td>
                            <td width="70%" class="tbl2">{{$value->tgl_create}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Approved By</td>
                            <td width="70%" class="tbl2">{{$value->tgl_approve}} by {{$value->manager}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Disbursement</td>
                            <td width="70%" class="tbl2">{{$value->pencairan}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Disbursement Date</td>
                            <td width="70%" class="tbl2">{{$value->tgl_proses}}</td>
                        </tr>
                            <td width="30%" class="tbl1">Receipt</td>
                            <td width="70%" class="tbl2">
                              <div class="row">
                                @if($value->file_1!==null) 
                                  <div class="col-lg-4">
                                    <a href="{{url('/storage/tiket_acc/'.$value->file_1)}}" data-toggle="lightbox" data-gallery="gallery">
                                        <img src="{{url('/storage/tiket_acc/'.$value->file_1) }}" class="imgAccounting" />
                                    </a>
                                  </div>
                                @else
                                    <img src="{{url('images/noimg.jpg')}}" width="60px">
                                @endif
                              </div>
                            </td>
                        </tr>
                        </tr>
                            <td width="30%" class="tbl1">Realisasi</td>
                            <td width="70%" class="tbl2">
                                <div class="row">
                                @foreach($value->file_acc as $key9 => $value9)
                                    @if($value9->type=='nota')
                                        <div class="col-lg-4 mb-2">
                                            <a href="{{url('/storage/tiket_acc/'.$value9->file)}}" data-toggle="lightbox" data-gallery="gallery">
                                                <img src="{{url('/storage/tiket_acc/'.$value9->file) }}" class="imgAccounting"/>
                                            </a>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        </tr>
                            <td width="30%" class="tbl1">Bukti Transfer</td>
                            <td width="70%" class="tbl2">
                                <div class="row">
                                @foreach($value->file_acc as $key10 => $value10)
                                    @if($value10->type=='kembalian')
                                        <div class="col-lg-4 mb-2">
                                            <a href="{{url('/storage/tiket_acc/'.$value10->file)}}" data-toggle="lightbox" data-gallery="gallery">
                                                <img src="{{url('/storage/tiket_acc/'.$value10->file) }}" class="imgAccounting"/>
                                            </a>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Amount</td>
                            <td width="70%" class="tbl2">Rp. {{number_format($value->amount_rencana, 2, ",", ".")}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Amount Realisasi</td>
                            <td width="70%" class="tbl2">Rp. {{number_format($value->amount_realisasi, 2, ",", ".")}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Balance</td>
                            <td width="70%" class="tbl2">Rp. {{number_format($value->amount_rencana-$value->amount_realisasi, 2, ",", ".")}}</td>
                        </tr>
                        
                        <tr>
                            <td width="30%" class="tbl1">Description Done</td>
                            <td width="70%" class="tbl2">{{$value->desc_done}}</td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>  

