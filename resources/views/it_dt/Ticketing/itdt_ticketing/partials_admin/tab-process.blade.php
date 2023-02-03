@foreach($TiketProcessIT as $key => $value)
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
                <span class="px-2 rounded-pill ml-2 bg-primary w-50 d-block text-truncate ml-auto" style="font-size : 10px" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Assign By">{{$value['nama_petugas']}}</span>
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
                    <td width="70%" class="tbl2">{{$value['tgl_pengajuan'] }} {{$value['jam_pengajuan']}}</td>
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
                    <td width="30%" class="tbl1">Support</td>
                    <td width="70%" class="tbl2">{{$value['nama_petugas']}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Start Process</td>
                    <td width="70%" class="tbl2">{{$value['tgl_pengerjaan']}} {{$value['jam_pengerjaan']}}</td>
                </tr>
                @if(auth()->user()->nik == $value['petugas'])
                <tr>
                    <td width="30%" class="tbl1">Action</td>
                    <td width="70%" class="tbl2">
                        <div class="justify-start" style="gap:.8rem">
                            <a href="" data-toggle="modal" data-target="#solved{{$value['id']}}" class="btn-green-md" style="width:140px">Solved</a>
                                @include('it_dt.Ticketing.itdt_ticketing.partials_admin.modal.respon_process')
                            <a href="" data-toggle="modal" data-target="#pending{{$value['id']}}" class="btn-merah-md" style="width:140px">Pending</a>
                                @include('it_dt.Ticketing.itdt_ticketing.partials_admin.modal.respon_process_pending')
                        </div>
                    </td>
                </tr>
                @endif
                </table>
        </div>
    </div>
@endforeach

