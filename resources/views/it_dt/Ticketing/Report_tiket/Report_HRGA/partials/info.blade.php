<div class="modal fade" id="infoTicket{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:480px">
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
                            <td width="40%">No Ticket</td>
                            <td width="60%">{{$value['branchdetail'] }}-{{$value ['no_tiket'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">NIK</td>
                            <td width="60%">{{$value ['nik'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Name</td>
                            <td width="60%">{{$value ['nama'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Departement</td>
                            <td width="60%">{{$value ['bagian'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">IP Address</td>
                            <td width="60%">{{$value ['ip'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">EXT</td>
                            <td width="60%">{{$value ['ext'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Category</td>
                            <td width="60%">{{$value ['judul'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Description</td>
                            <td width="60%">{{$value ['deskripsi'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Create Date</td>
                            <td width="60%">{{$value ['tgl_pengajuan'] }} {{$value['jam_pengajuan']}}</td>
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Problem Image</td>
                            @if($value['foto']!=null)
                            <td width="70%" class="tbl2">
                                <a href="{{ url('/tiket/gbr/'.$value['foto'])}}" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ url('/tiket/gbr/'.$value['foto'])}}" width="80px" style="border-radius:8px" />
                                </a>
                            </td>
                            @else
                            <td width="70%" class="tbl2">image not available</td>
                            @endif
                        </tr>
                        <tr>
                            <td width="30%" class="tbl1">Problem Solved Image</td>
                            @if($value['foto_selesai']!=null)
                            <td width="70%" class="tbl2">
                                <a href="{{ url('/tiket/gbr/'.$value['foto_selesai'])}}" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ url('/tiket/gbr/'.$value['foto_selesai'])}}" width="80px" style="border-radius:8px" />
                                </a>
                            </td>
                            @else
                            <td width="70%" class="tbl2">image not available</td>
                            @endif
                        </tr>
                        <tr>
                            <td width="40%">Status</td>
                            <td width="60%">{{$value ['status'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">IT Support</td>
                            <td width="60%">{{$value ['petugas'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Start Process</td>
                            <td width="60%">{{$value ['tgl_pengerjaan'] }} {{$value['jam_pengerjaan']}}</td>
                        </tr>
                        <tr>
                            <td width="40%">Problem Category</td>
                            <td width="60%">{{$value ['rusak'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Sub Category</td>
                            <td width="60%">{{$value ['sub_rusak'] }}</td>
                        </tr>
                        <!-- ($data->foto != null) -->
                        @if($value['tgl_pending'] != null)
                        <tr>
                            <td width="40%">Pending Date</td>
                            <td width="60%">{{$value ['tgl_pending'] }}</td>
                        </tr>
                        @endif
                        @if($value['pesan_pending'] != null)
                        <tr>
                            <td width="40%">Pending Description</td>
                            <td width="60%">{{$value ['pesan_pending'] }} {{$value['jam_pending']}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td width="40%">Done Description</td>
                            <td width="60%">{{$value ['pesan_selesai'] }}</td>
                        </tr>
                        <tr>
                            <td width="40%">Completion Date</td>
                            <td width="60%">{{$value['tgl_selesai']}} {{$value['jam_selesai']}}</td>
                        </tr>
                        <tr>
                            <td width="40%" >Process Duration</td>
                            <td width="60%" >{{$value['durasi_process']}}</td>
                        </tr>
                        <tr>
                            <td width="40%" >Ticket Duration</td>
                            <td width="60%" >{{$value['durasi_tiket']}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  

