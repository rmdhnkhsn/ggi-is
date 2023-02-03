
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
            <?php
            $waiting=collect($data_antri)->where('kategori_tiket',$value['kategori_tiket'])->where('tgl_pengajuan',$value['tgl_pengajuan'])->where('jam_pengajuan','<',$value['jam_pengajuan'])->count();
            
            $waiting_hrd=collect($data_antri)->where('kategori_tiket',$value['kategori_tiket'])->where('tgl_pengajuan',$value['tgl_pengajuan'])->where('branchdetail',$value['branchdetail'])->where('jam_pengajuan','<',$value['jam_pengajuan'])->count();
            $waiting_it=collect($data_antri)->where('kategori_tiket',$value['kategori_tiket'])->where('tgl_pengajuan',$value['tgl_pengajuan'])->where('branchdetail',$value['branchdetail'])->where('jam_pengajuan','<',$value['jam_pengajuan'])->count();
           
            ?>
            @if(($value['kategori_tiket']=='IT Support')&&($waiting_it>'0'))
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <div class="txt-pink fw-6">Menunggu {{$waiting_it}} Tiket</div>
            </div>
            @elseif(($value['kategori_tiket']=='IT DT')&&($waiting>'0'))
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <div class="txt-pink fw-6">Menunggu {{$waiting}} Tiket</div>
            </div>
            @elseif(($value['kategori_tiket']=='HR & GA')&&($waiting_hrd>'0'))
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <div class="txt-pink fw-6">Menunggu {{$waiting_hrd}} Tiket</div>
            </div>
            @else
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <div class="txt-pink fw-6">Menunggu tiket diambil</div>
            </div>
            @endif
            <div class="icons">
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
                    <td width="70%" class="tbl2">{{$value['status']}}</td>
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
                @if($value['status']=='Waiting')
                <tr>
                    <td width="30%" class="tbl1">Action</td>
                    <td width="70%" class="tbl2">
                        <div class="justify-start">               
                            <form action="{{ route('tiket.it.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                <input type="hidden" class="form-control" id="status" name="status"  Value="Close">
                                <button type="submit" class="btn-blue-md closeTiketIt">Close Ticket</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endif
            </table>

        </div>
    </div>
@endforeach

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


@foreach($waiting_doc as $key2 => $value2)
    <div class="accordion_item">
        <header class="accordion_header">
            <div class="badge bg-coklat">
                <i class="fas fa-file-signature iconBadge"></i>
                <div class="title">Doc</div>
            </div>
            <div class="desc_accordion text-truncate">
                <div class="description">
                    <div class="desc1" style="width:168px !important">ETD</div>
                    <div class="desc2"><span class="mr-1">:</span> {{$value2->etd}}</div> 
                </div>
                <div class="description">
                    <div class="desc1" style="width:168px !important">SHIPPER</div>
                    <div class="desc2 text-truncate"><span class="mr-1">:</span> {{$value2->shipper}}</div> 
                </div>
            </div>
            <div class="waiting ml-auto text-right d-inline-block my-auto w-25">
                <div class="txt-pink fw-6">Menunggu tiket diambil</div>
            </div>
            <div class="icons">
                <i class="fas fa-caret-right accordion_iconIT"></i>
            </div>
        </header>
        <div class="accordion_content borderTop">
            <table class="tables2">
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
                    <td width="70%" class="tbl2"> <a href="" data-toggle="modal" data-target="#edit{{$value2['id']}}" class="btn-yellow-md" style="width:140px">Edit</a>
                @include('it_dt.Ticketing.itdt_ticketing.exim.modal.edit')</td>
                </tr>
            </table>
        </div>
    </div>
@endforeach

@foreach($waiting_acc as $key3 => $value3)
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
                @if($value3->approve==null)
                    <div class="txt-pink fw-6">Menunggu Approve Manager</div>
                @elseif($value3->approve==1)
                    <div class="txt-green fw-6" style="font-size : 12px">Pengajuan Disetujui</div>
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
                    <td width="70%" class="tbl2">{{$value3['branchdetail'] }}-{{$value3['tiket'] }}{{$value3['no_tiket'] }}</td>
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
                    <td width="30%" class="tbl1">Rekening</td>
                    <td width="70%" class="tbl2">{{$value3->bank}}-{{$value3->rekening}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Description</td>
                    <td width="70%" class="tbl2">{{$value3->deskripsi}}</td>
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Status</td>
                    @if($value3->approve==null)
                        <td width="70%" class="tbl2"><span class="text-hijau">Menunggu Approve Manager</span></td> 
                    @elseif($value3->approve==1)
                        <td width="70%" class="tbl2">Approved {{$value3->tgl_approve}} by <span class="text-hijau">{{$value3->manager}}</span></td>
                    @endif
                </tr>
                <tr>
                    <td width="30%" class="tbl1">Create Date</td>
                    <td width="70%" class="tbl2">{{$value3->tgl_create}}</td>
                </tr>
                @if($value3->status_tiket=='Waiting')
                <tr>
                    <td width="30%" class="tbl1">Action</td>
                    <td width="70%" class="tbl2">
                        <div class="justify-start">               
                            <form action="{{route('tiket-acc-close')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$value3['id']}}">
                                <input type="hidden" class="form-control" id="status" name="status_tiket"  Value="Close">
                                <button type="submit" class="btn-blue-md closeTiketIt">Close Ticket</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endif
            </table>
        </div>
    </div>
@endforeach

