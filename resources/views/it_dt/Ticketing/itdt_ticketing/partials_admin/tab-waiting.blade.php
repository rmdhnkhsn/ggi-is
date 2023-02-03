@foreach($TiketWaitingIT as $key => $value)
    <div class="accordion_item">
        <header class="accordion_header">
            @if($value['kategori_tiket']=='IT Support' || $value['kategori_tiket']=='IT RPA')
                <div class="badge bg-kuning">
                    @if($value['judul']=='Software')
                    <i class="fas fa-robot iconBadge"></i>
                    <div class="title">{{$value['judul']}}</div>
                    @elseif($value['judul']=='Hardware')
                    <i class="fas fa-desktop iconBadge"></i>
                    <div class="title">{{$value['judul']}}</div>
                    @elseif($value['judul']=='Network')
                    <i class="fas fa-wifi iconBadge"></i>
                    <div class="title">{{$value['judul']}}</div>
                    @elseif($value['judul']=='Peminjaman')
                    <i class="fas fa-credit-card iconBadge"></i>
                    <div class="title">{{$value['judul']}}</div>
                    @elseif($value['judul']=='RPA')
                    <i class="fas fa-keyboard iconBadge"></i>
                    <div class="title">{{$value['judul']}}</div>
                    @endif
                </div>
                @elseif($value['kategori_tiket']=='IT DT')
                <div class="badge bg-biru">
                    @if($value['judul']=='JDE')
                    <img src="{{url('images/iconpack/ticketing/jde.svg')}}" class="imgJDE" />
                    <div class="title">{{$value['judul']}}</div>
                    @elseif($value['judul']=='GCC')
                    <img src="{{url('images/iconpack/ticketing/gcc.svg')}}" />
                    <div class="title">{{$value['judul']}}</div>
                    @elseif($value['judul']=='HRIS')
                    <img src="{{url('images/iconpack/ticketing/hris.svg')}}" />
                    <div class="title">{{$value['judul']}}</div>
                    @elseif($value['judul']=='SMQC')
                    <img src="{{url('images/iconpack/ticketing/smqc.svg')}}" class="imgSMQC" />
                    <div class="title">{{$value['judul']}}</div>
                    @endif
                </div>
                @elseif($value['kategori_tiket']=='HR & GA')
                <div class="badge bg-green">
                    @if($value['judul']=='Compliance')
                    <i class="fas fa-exclamation-triangle iconBadge"></i>
                    <div class="title">Compl</div>
                    @elseif(($value['judul']=='Permintaan makanan di jam lembur')||($value['judul']=='Umum Lainnya'))
                    <i class="fas fa-user-cog iconBadge"></i>
                    <div class="title">Umum</div>
                    @elseif(($value['judul']=='Membersihkan Toilet')||($value['judul']=='Membersihkan Ruangan')||($value['judul']=='Isi Ulang Galon')||($value['judul']=='Penggantian Lampu')||($value['judul']=='Lainnya'))
                    <i class="fas fa-broom iconBadge"></i>
                    <div class="title">PU</div>
                    @elseif(($value['judul']=='BCA')||($value['judul']=='CIMB NIAGA'))
                    <i class="fas fa-hand-holding-usd iconBadge"></i>
                    <div class="title">Payroll</div>
                    @endif
                </div>
            @endif
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
                    <td width="70%" class="tbl2">{{$value['nik'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Name</td>
                    <td width="70%" class="tbl2">{{$value['nama'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Department</td>
                    <td width="70%" class="tbl2">{{$value['bagian'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">IP Address</td>
                    <td width="70%" class="tbl2">{{$value['ip'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Ext</td>
                    <td width="70%" class="tbl2">{{$value['ext'] }}</td>
                </tr>
                <tr>
                    @if($value['kategori_tiket']=='HR & GA')
                    <td width="30%" class="tbl1">Category</td>
                    @else
                    <td width="30%" class="tbl1">Error</td>
                    @endif
                    <td width="70%" class="tbl2">{{$value['judul'] }}</td>
                </tr>
                <tr>
                    @if($value['kategori_tiket']=='HR & GA')
                    <td width="30%" class="tbl1">Description</td>
                    @else
                    <td width="30%" class="tbl1">Error Description</td>
                    @endif
                    <td width="70%" class="tbl2">{{$value['deskripsi'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Create Date</td>
                    <td width="70%" class="tbl2">{{$value['tgl_pengajuan']}} {{$value['jam_pengajuan']}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Status</td>
                    <td width="70%" class="tbl2">{{$value['status'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Problem Image</td>
                    @if($value['foto']!=null)
                    <td width="70%" class="tbl2">
                        <a href="{{ url('/tiket/gbr/'.$value['foto'])}}" data-toggle="lightbox" data-gallery="gallery">
                            <img src="{{ url('/tiket/gbr/'.$value['foto'])}}" class="picture" />
                        </a>
                    </td>
                    @else
                    <td width="70%" class="tbl2">image not available</td>
                    @endif
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Action</td>
                    <td width="70%" class="tbl2">
                        <div class="justify-start">
                            @if($value['status']=='Waiting')
                            <form action="{{ route('tiket.it.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                <input type="hidden" class="form-control" id="status" name="status"  Value="On Process">
                                <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{ Auth::user()->nik }}" >
                                <input type="hidden" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ Auth::user()->nama }}" >
                                <input type="hidden" class="form-control" id="tgl_pengerjaan" name="tgl_pengerjaan"  Value="{{$tgl}}">
                                <input type="hidden" class="form-control" id="jam_pengerjaan" name="jam_pengerjaan"  Value="{{$jam}}">
                                <input type="hidden" class="form-control" id="deskripsi1" name="deskripsi1" value="{{$value['deskripsi']}}">
                                <input type="hidden" class="form-control" id="nik" name="nik" value="{{$value['nik']}}">

                                <button type="submit" class="btn-blue-md">Assign</button>
                            </form>
                            @elseif($value['status']=='Close')
                            <a href="" data-toggle="modal" data-target="#solved{{$value['id']}}" class="btn-green-md" style="width:140px">Solved</a>
                                @include('it_dt.Ticketing.itdt_ticketing.partials_admin.modal.respon_process')
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endforeach
