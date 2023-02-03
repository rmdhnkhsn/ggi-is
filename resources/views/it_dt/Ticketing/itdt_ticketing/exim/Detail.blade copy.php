@extends("layouts.app")
@section("title","Admin Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker2.css')}}">
@endpush
@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="row" style="padding:20px 24px">
                                <div class="col-12 justify-sb">
                                    <div class="title-20">Detail Ticket</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="borderlight"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Nomor Aju</div>
                                    <input type="hidden" class="form-control border-input-10 mb-3" name="id" value="{{$data->id}}" placeholder="Nomor Aju..." >
                                    <input type="hidden" class="form-control border-input-10 mb-3" name="process" value="update">
                                    <input type="text" class="form-control border-input-10 mb-3" name="no_aju" value="{{$data->no_aju}}" placeholder="Nomor Aju..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Nomor BC23</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="no_bc23" value="{{$data->no_bc23}}" placeholder="Nomor BC23..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Tanggal</div>
                                    <input type="date" class="form-control border-input-10 mb-3" name="tanggal" value="{{$data->tanggal}}" placeholder="Tanggal..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Vessel</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="vessel" value="{{$data->vessel}}" placeholder="Vessel..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">ETD</div>
                                    <input type="date" class="form-control border-input-10 mb-3" name="etd" value="{{$data->etd}}" placeholder="ETD..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">ETA JKT</div>
                                    <input type="date" class="form-control border-input-10 mb-3" name="eta_jkt" value="{{$data->eta_jkt}}" placeholder="ETD..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">ETA GTX</div>
                                    <input type="date" class="form-control border-input-10 mb-3" name="eta_gtx" value="{{$data->eta_gtx}}" required >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Jumlah Kemasan</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="jum_kemasan" value="{{$data->jum_kemasan}}" required >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Jenis Kemasan</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="jenis_kemasan" value="{{$data->jenis_kemasan}}" required >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">SHIPPER</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="shipper" value="{{$data->shipper}}" required >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">ORDER</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="order_ticket" value="{{$data->order_ticket}}" required >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">NO. BL / AWB</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="no_bl" value="{{$data->no_bl}}" required >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Berat</div>
                                    <input type="number" step="0.01" class="form-control border-input-10 mb-3" name="berat" value="{{$data->berat}}" placeholder="Berat..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Jumlah Devisa (Import)</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="jum_devisa" value="{{$data->jum_devisa}}" placeholder="Jumlah Devisa..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">NAMA PURCHASING</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="nama" value="{{$data->nama}}" placeholder="Forwader..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Tanggal Create</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="tgl_pengajuan" value="{{$data->tgl_pengajuan}}" placeholder="Forwader..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Forwader</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="forwader" value="{{$data->forwader}}" placeholder="Forwader..." >
                                </div>
                                <div class="col-md-6">
                                    <div class="title-sm mb-1">Keterangan</div>
                                    <input type="text" class="form-control border-input-10 mb-3" name="keterangan" value="{{$data->keterangan}}" placeholder="Keterangan..." >
                                </div>
                                
                                @if($data->packing_list != NULL)
                                    @if(substr($data->packing_list,-3)=='pdf')
                                    <div class="col-12" id="accordion1">
                                        <div class="cards">
                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                                                <i class="accord-icon fas fa-file-contract"></i>   
                                                <div class="accordion-title">{{$data->packing_list}}</div>
                                            </div>
                                            <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                                <div class="cards accordion-body text-center"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->packing_list)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <a class="btn-icon-blue" href="{{route('tiket.doc.download',$data->packing_list)}}"><i class="fas fa-download"></i></a>
                                    </div>
                                    @endif
                                @endif


                                @if($data->invoice != NULL)
                                    @if(substr($data->invoice,-3)=='pdf')
                                    <div class="col-12" id="accordion2">
                                        <div class="cards">
                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                                                <i class="accord-icon fas fa-file-contract"></i>   
                                                <div class="accordion-title">{{$data->invoice}}</div>
                                            </div>
                                            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion2">
                                                <div class="cards accordion-body text-center"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->invoice)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <a class="btn-icon-blue" href="{{route('tiket.doc.download',$data->packing_list)}}"><i class="fas fa-download"></i></a>

                                    </div>
                                    @endif
                                @endif
                                @if($data->bl_doc != NULL)
                                    @if(substr($data->bl_doc,-3)=='pdf')
                                    <div class="col-12" id="accordion3">
                                        <div class="cards">
                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                                                <i class="accord-icon fas fa-file-contract"></i>   
                                                <div class="accordion-title">{{$data->bl_doc}}</div>
                                            </div>
                                            <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion3">
                                                <div class="cards accordion-body text-center"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->bl_doc)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div  class="col-12">
                                        <a class="btn-icon-blue" href="{{route('tiket.doc.download',$data->packing_list)}}"><i class="fas fa-download"></i></a>
                                    </div>
                                    @endif
                                @endif
                                @if($data->doc_1 != NULL)
                                    @if(substr($data->doc_1,-3)=='pdf')
                                    <div class="col-12" id="accordion4">
                                        <div class="cards">
                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                                                <i class="accord-icon fas fa-file-contract"></i>   
                                                <div class="accordion-title">{{$data->doc_1}}</div>
                                            </div>
                                            <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion4">
                                                <div class="cards accordion-body text-center"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_1)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div  class="col-12">
                                        <a class="btn-icon-blue" href="{{route('tiket.doc.download',$data->packing_list)}}"><i class="fas fa-download"></i></a>
                                    </div>
                                    @endif
                                @endif
                                @if($data->doc_2 != NULL)
                                    @if(substr($data->doc_2,-3)=='pdf')
                                    <div class="col-12" id="accordion5">
                                        <div class="cards">
                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                                                <i class="accord-icon fas fa-file-contract"></i>   
                                                <div class="accordion-title">{{$data->doc_2}}</div>
                                            </div>
                                            <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion5">
                                                <div class="cards accordion-body text-center"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_2)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div  class="col-12">
                                        <a class="btn-icon-blue" href="{{route('tiket.doc.download',$data->packing_list)}}"><i class="fas fa-download"></i></a>
                                    </div>
                                    @endif
                                @endif
                                @if($data->doc_3 != NULL)
                                    @if(substr($data->doc_3,-3)=='pdf')
                                    <div class="col-12" id="accordion6">
                                        <div class="cards">
                                            <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                                                <i class="accord-icon fas fa-file-contract"></i>   
                                                <div class="accordion-title">{{$data->doc_3}}</div>
                                            </div>
                                            <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion6">
                                                <div class="cards accordion-body text-center"> 
                                                    <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_3)) }}" width="100%" height="750"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div  class="col-12">
                                        <a class="btn-icon-blue" href="{{route('tiket.doc.download',$data->packing_list)}}"><i class="fas fa-download"></i></a>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push("scripts")

@endpush