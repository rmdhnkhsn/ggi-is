@foreach($done_acc as $key => $value)
<div class="accordion_item">
    <header class="accordion_header">
        <div class="badge bg-purple">
            <i class="fas fa-calculator iconBadge"></i>
            <div class="title">Acc</div>
        </div>
        <div class="desc_accordion text-truncate w-75">
            <div class="description">
                <div class="desc1">Ticket Number</div>
                @if($value->status_tiket=='Close')
                <div class="desc2"><span class="mr-1">:</span> {{$value['branchdetail'] }}-{{$value['tiket'] }}{{$value['no_tiket'] }} <span class="bg-danger px-2 rounded-pill ml-2" style="font-size : 10px">Closed</span></div> 
                @else
                <div class="desc2"><span class="mr-1">:</span> {{$value['branchdetail'] }}-{{$value['tiket'] }}{{$value['no_tiket'] }}</div> 
                @endif
            </div>
            <div class="description">
                <div class="desc1">User</div>
                <div class="desc2 text-truncate"><span class="mr-1">:</span> {{$value['nama']}}</div> 
            </div>
        </div>
        <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <span class="px-2 rounded-pill ml-2 bg-primary w-50 d-block text-truncate ml-auto" style="font-size : 10px" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Assign By">{{$value['nama_support']}}</span>
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
                <td width="30%" class="tbl1">Create Date</td>
                <td width="70%" class="tbl2">{{$value->tgl_create}}</td>
            </tr>
            @if($value->status_tiket=='Done')
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
                    @if($value->file_1!==null) 
                        <a href="{{url('/storage/tiket_acc/'.$value->file_1)}}" data-toggle="lightbox" data-gallery="gallery">
                            <img src="{{url('/storage/tiket_acc/'.$value->file_1) }}" class="picture" />
                        </a>
                    @else
                        <img src="{{url('images/noimg.jpg')}}" width="60px">
                    @endif
                </td>
            </tr>
            <tr>
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
            <!-- <tr>
                <td width="30%" class="tbl1">Description Pencairan</td>
                <td width="70%" class="tbl2">{{$value->desc_pencairan}}</td>
            </tr> -->
            <tr>
                <td width="30%" class="tbl1">Description Done</td>
                <td width="70%" class="tbl2">{{$value->desc_done}}</td>
            </tr>
            @endif
        </table>

    </div>
</div>
@endforeach
