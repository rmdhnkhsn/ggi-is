@foreach($process_acc as $key => $value)
    <div class="accordion_item">
        <header class="accordion_header">
            @if($value->kode_pencairan!=null)
            <div class="badge bg-purple">
            @else
            <div class="badge bg-purple">
            @endif
                <i class="fas fa-calculator iconBadge"></i>
                <div class="title">Acc</div>
            </div>

            <div class="desc_accordion text-truncate w-75">
                <div class="description">
                    <div class="desc1">Ticket Number</div>
                    <div class="desc2"><span class="mr-1">:</span> {{$value['branchdetail'] }}-{{$value['tiket'] }}{{$value['no_tiket'] }}</div> 
                </div>
                <div class="description">
                    <div class="desc1">User</div>
                    <div class="desc2 text-truncate"><span class="mr-1">:</span> {{$value['nama']}}</div> 
                </div>
            </div>
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                @if($value->tgl_proses!=null && $value->amount_realisasi!=null)
                    <span class="rounded-pill bg-green ml-auto" style="font-size:12px;padding: .1rem .6rem" data-container="body">Menunggu Verifikasi</span>
                @elseif($value->tgl_proses==null) 
                    <span class="rounded-pill bg-yellow ml-auto" style="font-size:12px;padding: .1rem .6rem" data-container="body">Menunggu Dana Dicairkan</span>
                @else
                    <span class="rounded-pill bg-primary ml-auto" style="font-size:12px;padding: .1rem .6rem" data-container="body">Menunggu Realisasi</span>
                @endif
            </div>
            <div class="icons ml-auto">
                <i class="fas fa-caret-right accordion_iconIT"></i>
            </div>
        </header>
        <div class="accordion_content borderTop">
            <table class="tables2">
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
                <tr>
                    <td width="30%" class="tbl1">Amount</td>
                    <td width="70%" class="tbl2">Rp. {{number_format($value->amount_rencana, 2, ",", ".")}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Account Code</td>
                    <td width="70%" class="tbl2">{{$value->akun_kredit}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Disbursement</td>
                    <td width="70%" class="tbl2">{{$value->pencairan}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Rekening</td>
                    <td width="70%" class="tbl2">{{$value->bank}}-{{$value->rekening}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Description</td>
                    <td width="70%" class="tbl2">{{$value->deskripsi}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Status</td>
                    @if($value->tgl_proses!=null && $value->amount_realisasi!=null)
                        <td width="70%" class="tbl2"><span class="text-blue">Menunggu Verifikasi</span></td>
                    @elseif($value->tgl_proses==null) 
                        <td width="70%" class="tbl2"><span class="text-blue">Menunggu Dana Dicairkan</span></td>
                    @else
                        <td width="70%" class="tbl2"><span class="text-hijau">Menunggu Realisasi</span></td>
                    @endif
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Create Date</td>
                    <td width="70%" class="tbl2">{{$value->tgl_create}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Approved By</td>
                    <td width="70%" class="tbl2">{{$value->tgl_approve}} by {{$value->manager}}</td>
                </tr>

                @if($value->tgl_proses!=null)
                <tr>
                    <td width="30%" class="tbl1">Disbursement</td>
                    <td width="70%" class="tbl2">{{$value->pencairan}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Disbursement Date</td>
                    <td width="70%" class="tbl2">{{$value->tgl_proses}}</td>
                </tr>
                    @if($value->file_1!=null)
                    <td width="30%" class="tbl1">Receipt</td>
                    <td width="70%" class="tbl2">
                        <a href="{{url('/storage/tiket_acc/'.$value->file_1)}}" data-toggle="lightbox" data-gallery="gallery">
                            <img src="{{url('/storage/tiket_acc/'.$value->file_1) }}" class="picture" />
                        </a>
                    </td>
                    @endif
                @endif
                @if($value->amount_realisasi!=null)
                </tr>
                    <td width="30%" class="tbl1">Realisasi</td>
                    <td width="70%" class="tbl2">
                        @foreach($value->file_acc as $key9 => $value9)
                            @if($value9->type=='nota')

                            <a href="{{url('/storage/tiket_acc/'.$value9->file)}}" data-toggle="lightbox" data-gallery="gallery">
                                <img src="{{url('/storage/tiket_acc/'.$value9->file) }}" class="picture" />
                            </a>
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Bukti Transfer</td>
                    <td width="70%" class="tbl2">
                        @foreach($value->file_acc as $key10 => $value10)
                            @if($value10->type=='kembalian')
                            <a href="{{url('/storage/tiket_acc/'.$value10->file)}}" data-toggle="lightbox" data-gallery="gallery">
                                <img src="{{url('/storage/tiket_acc/'.$value10->file) }}" class="picture" />
                            </a>
                            @endif
                        @endforeach
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
                @endif
                
                @if(auth()->user()->nik == $value->nik_support)
                    @if($value->tgl_proses!=null && $value->amount_realisasi!=null)
                    <tr>
                        <td width="30%" class="tbl1">Action</td>
                        <td width="70%" class="tbl2">
                            <div class="justify-start" style="gap:.8rem">
                                <!-- <a href="" data-toggle="modal" data-target="#realisasi{{$value->id}}" class="btn-green-md">Update Realization</a> -->
                                <button id="{{$value->id}}" onclick="RealisasiBalance(this.id)" class="btn-green-md">Verification</button>
                                @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.modal.respon_realisasi')
                            </div>
                        </td>
                    </tr>
                    @elseif($value->tgl_proses==null)
                    <tr>
                        <td width="30%" class="tbl1">Action</td>
                        <td width="70%" class="tbl2">
                            <div class="justify-start" style="gap:.8rem">
                                <a href="" data-toggle="modal" data-target="#pembayaran{{$value->id}}" class="btn-green-md" style="width:140px">Disbursement</a>
                                    @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.modal.respon_process')
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td width="30%" class="tbl1">Action</td>
                        <td width="70%" class="tbl2">
                            <div class="justify-start" style="gap:.8rem">
                                <!-- <a href="" data-toggle="modal" data-target="#realisasi{{$value->id}}" class="btn-green-md">Update Realization</a> -->
                                <button id="{{$value->id}}" onclick="RealisasiBalance(this.id)" class="btn-green-md">Realization</button>
                                @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.modal.respon_realisasi')
                            </div>
                        </td>
                    </tr>
                    @endif
                @endif

            </table>
        </div>
    </div>
@endforeach

