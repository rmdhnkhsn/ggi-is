@foreach($waiting_acc as $key => $value)
    <div class="accordion_item">
        <header class="accordion_header">
            <div class="badge bg-purple">
                <i class="iconBadge fas fa-calculator"></i>
                <div class="title">Acc</div>
            </div>
            <div class="desc_accordion text-truncate">
                <div class="description">
                    <div class="desc1">Ticket Number</div>
                    @if($value['status']=='Close')
                    <div class="desc2"><span class="mr-1">:</span> {{$value['branchdetail'] }}-{{$value['tiket'] }}{{$value['no_tiket'] }} <span class="bg-danger px-2 rounded-pill ml-2" style="font-size : 10px">closed</span></div> 
                    @else
                    <div class="desc2"><span class="mr-1">:</span> {{$value['branchdetail'] }}-{{$value['tiket'] }}{{$value['no_tiket'] }}</div> 
                    @endif
                </div>
                <div class="description">
                    <div class="desc1">User</div>
                    <div class="desc2 text-truncate"><span class="mr-1">:</span> {{$value['nama']}}</div> 
                </div>
            </div>
            <div class="ml-auto icons">
                <i class="fas fa-caret-right accordion_iconIT"></i>
            </div>
        </header>
        <div class="accordion_content borderTop">
            <table class="tables2">
                <tr>
                    <td width="30%" class="tbl1">Ticket Number </td>
                    <td width="70%" class="tbl2">{{$value['branchdetail'] }}-{{$value['tiket'] }}{{$value['no_tiket'] }} </td>
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
                    <td width="30%" class="tbl1">Create Date</td>
                    <td width="70%" class="tbl2">{{$value->tgl_create}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Status</td>
                    @if($value->approve==null)
                        <td width="70%" class="tbl2"><span class="text-hijau">Menunggu Approve Manager</span></td> 
                    @elseif($value->approve==1)
                        <td width="70%" class="tbl2"><span class="text-hijau">Approved  by {{$value->manager}}</span></td>
                    @endif
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Approved Date</td>
                    <td width="70%" class="tbl2">{{$value->tgl_approve}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Action</td>
                    <td width="70%" class="tbl2">
                        <div class="justify-start">
                            <form action="{{ route('tiket-acc-assign')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                <input type="hidden" class="form-control" id="status_tiket" name="status_tiket"  Value="On Process">
                                <input type="hidden" class="form-control" id="nik_support" name="nik_support" value="{{ Auth::user()->nik }}" >
                                <input type="hidden" class="form-control" id="nama_support" name="nama_support" value="{{ Auth::user()->nama }}" >
                                <button type="submit" class="btn-blue-md">Assign</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endforeach
