
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
                <div class="title">Pinjam</div>
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
                    <td width="30%" class="tbl1">Support</td>
                    <td width="70%" class="tbl2">{{$value['nama_petugas']}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Start Process</td>
                    <td width="70%" class="tbl2">{{$value['tgl_pengerjaan']}} {{$value['jam_pengerjaan']}}</td>
                </tr>
            </table>
        </div>
    </div>
@endforeach

@foreach($TiketProcessBooking as $key => $value)
    <div class="accordion_item">
        <header class="accordion_header">
            <div class="badge bg-green">
                <i class="fas fa-building iconBadge"></i>
                <div class="title">{{$value['ticket_for']}}</div>
            </div>
            <div class="desc_accordion text-truncate">
                <div class="description">
                    <div class="desc1">Ticket Number</div>
                    <div class="desc2"><span class="mr-1">:</span>{{$value['branchdetail'] }}-{{$value['ticket_for'] }}{{$value['booking_id'] }}</div> 
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
                    <td width="70%" class="tbl2">{{$value['branchdetail'] }}-{{$value['ticket_for'] }}{{$value['booking_id'] }}</td>
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
                    <td width="30%" class="tbl1">IP Address</td>
                    <td width="70%" class="tbl2">{{$value['ip'] }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Category</td>
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
                        <a href="" class="" data-toggle="modal" data-target="#duration{{$value['booking_id'] }}">{{ $value['datawaktu'] }} Hour</a>
                        @include('it_dt.Ticketing.itdt_ticketing.partials.modal.duration')
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
                                                    <textarea class="form-control border-input-10" id="remark_cancel" name="remark_cancel" placeholder="input message..." style="min-height:90px" required></textarea>
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
                {{-- @endif --}}
            </table>

        </div>
    </div>
@endforeach
@foreach($process_doc as $key2 => $value2)
    <div class="accordion_item">
        <header class="accordion_header">
            <div class="badge bg-coklat">
                <i class="fas fa-file-signature iconBadge"></i>
                <div class="title">Doc</div>
            </div>
            <div class="desc_accordion text-truncate w-75">
                <div class="description">
                    <div class="desc1">ETD</div>
                    <div class="desc2"><span class="mr-1">:</span> {{$value2->etd}}</div> 
                </div>
                <div class="description">
                    <div class="desc1">SHIPPER</div>
                    <div class="desc2 text-truncate"><span class="mr-1">:</span> {{$value2->shipper}}</div> 
                </div>
            </div>
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <span class="px-2 rounded-pill ml-2 bg-primary w-50 d-block text-truncate ml-auto" style="font-size : 10px" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Assign By">{{$value2->nama_support}}</span>
            </div>
            <div class="icons ml-auto">
                <i class="fas fa-caret-right accordion_iconIT"></i>
            </div>
        </header>
        <div class="accordion_content borderTop">
            <table class="tables2">
                <tr>
                    <td width="30%" class="tbl1">Nomor Aju</td>
                    <td width="70%" class="tbl2">{{$value2->no_aju }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Nomor BC23</td>
                    <td width="70%" class="tbl2">{{$value2->no_bc23 }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Tanggal</td>
                    <td width="70%" class="tbl2">{{$value2->tanggal }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Vessel</td>
                    <td width="70%" class="tbl2">{{$value2->vessel }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">ETD</td>
                    <td width="70%" class="tbl2">{{$value2->etd }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">ETA JKT</td>
                    <td width="70%" class="tbl2">{{$value2->eta_jkt }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">ETA GTX</td>
                    <td width="70%" class="tbl2">{{$value2->eta_gtx }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Jumlah Kemasan</td>
                    <td width="70%" class="tbl2">{{$value2->jum_kemasan }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Jenis Kemasan</td>
                    <td width="70%" class="tbl2">{{$value2->jenis_kemasan }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">SHIPPER</td>
                    <td width="70%" class="tbl2">{{$value2->shipper }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">ORDER</td>
                    <td width="70%" class="tbl2">{{$value2->order_ticket }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">NO. BL / AWB</td>
                    <td width="70%" class="tbl2">{{$value2->no_bl }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Berat</td>
                    <td width="70%" class="tbl2">{{$value2->berat}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Nilai Import</td>
                    <td width="70%" class="tbl2">{{$value2->mata_uang}} {{number_format($value2->jum_devisa, 2, ",", ".")}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">PURCHASING</td>
                    <td width="70%" class="tbl2">{{$value2->nama }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Tanggal Create</td>
                    <td width="70%" class="tbl2">{{$value2->tgl_pengajuan }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Forwader</td>
                    <td width="70%" class="tbl2">{{$value2->forwader }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Keterangan</td>
                    <td width="70%" class="tbl2">{{$value2->keterangan }}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Action</td>
                    <td width="70%" class="tbl2"><a href="{{route('tiket.doc.detail',$value2->id)}}" class="btn-icon-blue"><i class="fas fa-info"></i></a></td>
                </tr>
            </table>
        </div>
    </div>
@endforeach
@foreach($process_acc as $key3 => $value3)
    <div class="accordion_item">
        <header class="accordion_header">
            <div class="badge bg-purple">
                <i class="fas fa-calculator iconBadge"></i>
                <div class="title">Acc</div>
            </div>
            <div class="desc_accordion text-truncate">
                <div class="description">
                    <div class="desc1">Ticket Number</div>
                    <div class="desc2"><span class="mr-1">:</span> {{$value3->no_tiket}}</div> 
                </div>
                <div class="description">
                    <div class="desc1">User</div>
                    <div class="desc2 text-truncate"><span class="mr-1">:</span> {{$value3->nama}}</div> 
                </div>
            </div>
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                @if($value3->tgl_proses!=null && $value3->amount_realisasi!=null)
                    <span class="rounded-pill bg-green ml-auto" style="font-size:12px;padding: .1rem .6rem" data-container="body">Menunggu Verifikasi</span>
                @elseif($value3->tgl_proses==null) 
                    <span class="rounded-pill bg-yellow ml-auto" style="font-size:12px;padding: .1rem .6rem" data-container="body">Menunggu Dana Dicairkan</span>
                @else
                    <span class="rounded-pill bg-primary ml-auto" style="font-size:12px;padding: .1rem .6rem" data-container="body">Menunggu Realisasi</span>
                @endif
            </div>
            <div class="icons">
                <i class="fas fa-caret-right accordion_iconIT"></i>
            </div>
        </header>
        <div class="accordion_content borderTop">
            <table class="tables2">
                <tr>
                    <td width="30%" class="tbl1">Ticket Number</td>
                    <td width="70%" class="tbl2">{{$value3->no_tiket}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">NIK</td>
                    <td width="70%" class="tbl2">{{$value3->nik}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Nama</td>
                    <td width="70%" class="tbl2">{{$value3->nama}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Department</td>
                    <td width="70%" class="tbl2">{{$value3->bagian}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Category </td>
                    <td width="70%" class="tbl2">{{$value3->kategori}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Amount</td>
                    <td width="70%" class="tbl2">Rp. {{number_format($value3->amount_rencana, 2, ",", ".")}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Account Code</td>
                    <td width="70%" class="tbl2">{{$value3->akun_kredit}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Disbursement</td>
                    <td width="70%" class="tbl2">{{$value3->pencairan}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Description</td>
                    <td width="70%" class="tbl2">{{$value3->deskripsi}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Rekening</td>
                    <td width="70%" class="tbl2">{{$value3->bank}}-{{$value3->rekening}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Create Date</td>
                    <td width="70%" class="tbl2">{{$value3->tgl_create}}</td>
                </tr> 
                <tr>
                    <td width="30%" class="tbl1">Approved By</td>
                    <td width="70%" class="tbl2">{{$value3->tgl_approve}} by {{$value3->manager}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Accounting</td>
                    <td width="70%" class="tbl2">{{$value3->nama_support}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Status</td>
                    @if($value3->tgl_proses!=null && $value3->amount_realisasi!=null)
                        <td width="70%" class="tbl2">Menunggu verifikasi</td>
                    @elseif($value3->tgl_proses==null)
                        <td width="70%" class="tbl2">Menunggu Dana Dicairkan</td>
                    @else
                        <td width="70%" class="tbl2">Menunggu Realisasi</td>
                    @endif
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Disbursement</td>
                    <td width="70%" class="tbl2">{{$value3->pencairan}}</td>
                </tr>
                @if($value3->tgl_proses!=null)
                <tr>
                    <td width="30%" class="tbl1">Disbursement Date</td>
                    <td width="70%" class="tbl2">{{$value3->tgl_proses}}</td>
                </tr>
                    @if($value3->file_1!=null)
                    <td width="30%" class="tbl1">Receipt</td>
                    <td width="70%" class="tbl2">
                        <a href="{{url('/storage/tiket_acc/'.$value3->file_1)}}" data-toggle="lightbox" data-gallery="gallery">
                            <img src="{{url('/storage/tiket_acc/'.$value3->file_1) }}" class="picture" />
                        </a>
                    </td>
                    @endif
                @endif
                <tr>
                    <td width="30%" class="tbl1">Amount</td>
                    <td width="70%" class="tbl2">Rp. {{number_format($value3->amount_rencana, 2, ",", ".")}}</td>
                </tr>
                @if($value3->amount_realisasi!=null)
                <tr>
                    <td width="30%" class="tbl1">Realisasi</td>
                    <td width="70%" class="tbl2">
                        @foreach($value3->file_acc as $key9 => $value9)
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
                        @foreach($value3->file_acc as $key10 => $value10)
                            @if($value10->type=='kembalian')
                            <a href="{{url('/storage/tiket_acc/'.$value10->file)}}" data-toggle="lightbox" data-gallery="gallery">
                                <img src="{{url('/storage/tiket_acc/'.$value10->file) }}" class="picture" />
                            </a>
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Amount Realisasi</td>
                    <td width="70%" class="tbl2">Rp. {{number_format($value3->amount_realisasi, 2, ",", ".")}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Balance</td>
                    <td width="70%" class="tbl2">Rp. {{number_format($value3->amount_rencana-$value3->amount_realisasi, 2, ",", ".")}}</td>
                </tr>
                @endif
                @if($value3->tgl_proses!=null && $value3->amount_realisasi==null)
                    <tr>
                        <td width="30%" class="tbl1">Action</td>
                        <td width="70%" class="tbl2">
                            <div class="justify-start" style="gap:.8rem">
                                <button id="{{$value3->id}}" onclick="RealisasiBalance(this.id)" class="btn-green-md">Realization</button>
                                @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.modal.User_respon_realisasi')
                            </div>
                        </td>
                    </tr>
                @elseif($value3->tgl_proses!=null && $value3->amount_realisasi!=null)
                    <tr>
                        <td width="30%" class="tbl1">Action</td>
                        <td width="70%" class="tbl2">
                            <div class="justify-start" style="gap:.8rem">
                                <button id="{{$value3->id}}" onclick="RealisasiBalance(this.id)" class="btn-green-md">Edit</button>
                                @include('it_dt.Ticketing.itdt_ticketing.Accounting.partials_admin.modal.User_respon_realisasi')
                            </div>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endforeach
