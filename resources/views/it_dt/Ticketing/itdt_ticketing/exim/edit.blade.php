@extends("layouts.app")
@section("title","Admin Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-4">
            <form class="row formloading" id="myForm" action="{{route('update-ticket-doc')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="col-md-6">
                    <div class="cards p-4" style="min-height:558px">
                        <div class="col-12">
                            <div class="title-20 text-left">Update Ticket</div>
                            <div class="borderlight mb-3"></div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm mb-1">Nomor Aju</div>
                            <input type="hidden" class="form-control borderInput mb-3" name="id" value="{{$data->id}}" >
                            <input type="text" class="form-control borderInput mb-3" name="no_aju" value="{{$data->no_aju}}" placeholder="Nomor Aju..." >
                        </div>
                        <div class="col-12">
                            <div class="title-sm mb-1">Nomor BC23</div>
                            <input type="text" class="form-control borderInput mb-3" name="no_bc23" value="{{$data->no_bc23}}" placeholder="Nomor BC23..." >
                        </div>
                        <div class="col-12">
                            <div class="title-sm mb-1">Tanggal</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control borderInput" id="tanggal" name="tanggal" value="{{$data->tanggal}}" placeholder="Tanggal..." >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">ETA JKT</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control borderInput"  name="eta_jkt" value="{{$data->eta_jkt}}" placeholder="ETD..." >
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="title-sm">ETA GTX</div>
                            <div class="input-group flex mt-1 mb-3">
                                <div class="input-group-prepend">
                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                </div>
                                <input onchange="swipebutton(this)" type="date" class="form-control borderInput" id="eta_gtx" name="eta_gtx" value="{{$data->eta_gtx}}">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="button" id="btn-save" class="btn-blue-md btn-block saveCreate">Update Ticket</button>
                            <!-- <button type="button" id="btn-save" class="btn-green-md btn-block saveCreate">Done Ticket</button> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cards p-4" style="min-height:558px">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-20 text-left">Informasi Ticket</div>
                                <div class="borderlight mb-3"></div>
                            </div>
                            <div class="col-12">
                                <table class="tables2 tbl-content">
                                    <tr>
                                        <td width="40%" class="fw-500">VESSEL</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->vessel}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">ETD</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->etd}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">JUMLAH KEMASAN</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->jum_kemasan}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">JENIS KEMASAN</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->jenis_kemasan}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">SHIPPER</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->etd}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">ORDER</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->order_ticket}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">NO.BL/AWB</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->no_bl}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">BERAT</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->berat}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">Nilai Import</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->mata_uang}} {{number_format($data->jum_devisa, 2, ",", ".")}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">FORWADER</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->forwader}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">KETERANGAN</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->keterangan}}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" class="fw-500">TANGGAL CREATE</td>
                                        <td width="60%"><span class="mr-2">:</span>{{$data->tgl_pengajuan}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="cards p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="title-20 text-left">Documents</div>
                                <div class="borderlight mb-3"></div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    @if($data->packing_list != NULL)
                                        @if(substr($data->packing_list,-3)=='pdf')
                                        <div class="col-12" id="accordion1">
                                            <div class="title-sm mb-1">Packing List</div>
                                            <div class="cards">
                                                <div class="accordionPreviewRed justify-sb2">
                                                    <div class="name">
                                                        <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                        <div class="title text-truncate">{{$data->packing_list}}</div>
                                                    </div>
                                                    <div class="justify-center gap-6">
                                                        @if($data->packing_list_terima==null)
                                                        <div class="flex mt-2">
                                                            <input type="checkbox" class="check1" id="packing" value="1" name="packing_list_terima">
                                                            <label for="packing" class="label-checkbox">Receive</label>
                                                        </div>
                                                        @else
                                                        <input type="hidden" id=""  value="1" name="packing_list_terima">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        @endif
                                                        <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                                    <div class="cards-20 p-4"> 
                                                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->packing_list)) }}" width="100%" height="750"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12">
                                            <div class="title-sm mb-1">Packing List</div>
                                            <div class="accordionPreviewBlue justify-sb2 w-100">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                    <div class="title text-truncate">{{$data->packing_list}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->packing_list_terima==null)
                                                        <div class="flex mt-2">
                                                            <input type="checkbox" class="check1" id="packing" value="1" name="packing_list_terima">
                                                            <label for="packing" class="label-checkbox">Receive</label>
                                                        </div>
                                                    @else
                                                        <input type="hidden" id=""  value="1" name="packing_list_terima">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                    @endif
                                                    <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->packing_list)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    @if($data->invoice != NULL)
                                        @if(substr($data->invoice,-3)=='pdf')
                                        <div class="col-12" id="accordion2">
                                            <div class="title-sm mb-1">Invoice</div>
                                            <div class="cards">
                                                <div class="accordionPreviewRed justify-sb2">
                                                    <div class="name">
                                                        <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                        <div class="title text-truncate">{{$data->invoice}}</div>
                                                    </div>
                                                    <div class="justify-center gap-6">
                                                        @if($data->invoice_terima==null)
                                                        <div class="flex mt-2">
                                                            <input type="checkbox" class="check1" id="invoice" value="1" name="invoice_terima">
                                                            <label for="invoice" class="label-checkbox">Receive</label>
                                                        </div>
                                                        @else
                                                        <input type="hidden" id=""  value="1" name="invoice_terima">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                        @endif
                                                        <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion2">
                                                    <div class="cards-20 p-4"> 
                                                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->invoice)) }}" width="100%" height="750"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12">
                                            <div class="title-sm mb-1">Invoice</div>
                                            <div class="accordionPreviewBlue justify-sb2 w-100">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                    <div class="title text-truncate">{{$data->invoice}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->invoice_terima==null)
                                                        <div class="flex mt-2">
                                                            <input type="checkbox" class="check1" id="invoice" value="1" name="invoice_terima">
                                                            <label for="invoice" class="label-checkbox">Receive</label>
                                                        </div>
                                                    @else
                                                        <input type="hidden" id=""  value="1" name="invoice_terima">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                    @endif
                                                    <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->invoice)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    @if($data->bl_doc != NULL)
                                        @if(substr($data->bl_doc,-3)=='pdf')
                                        <div class="col-12" id="accordion3">
                                            <div class="title-sm mb-1">BL Dari Supplier</div>
                                            <div class="cards">
                                                <div class="accordionPreviewRed justify-sb2 w-100">
                                                    <div class="name">
                                                        <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                        <div class="title text-truncate">{{$data->bl_doc}}</div>
                                                    </div>
                                                    <div class="justify-center gap-6">
                                                        @if($data->bl_doc_terima==null)
                                                            <div class="flex mt-2">
                                                                <input type="checkbox" class="check1" id="bl_supp" value="1" name="bl_doc_terima">
                                                                <label for="bl_supp" class="label-checkbox">Receive</label>
                                                            </div>
                                                        @else
                                                            <input type="hidden" id=""  value="1" name="bl_doc_terima">
                                                            <i class="checkSuccess fas fa-check-circle"></i>
                                                        @endif
                                                        <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion3">
                                                    <div class="cards-20 p-4"> 
                                                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->bl_doc)) }}" width="100%" height="750"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12">
                                            <div class="title-sm mb-1">BL Dari Supplier</div>
                                            <div class="accordionPreviewBlue justify-sb2 w-100">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                    <div class="title text-truncate">{{$data->bl_doc}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->bl_doc_terima==null)
                                                        <div class="flex mt-2">
                                                            <input type="checkbox" class="check1" id="bl_supp" value="1" name="bl_doc_terima">
                                                            <label for="bl_supp" class="label-checkbox">Receive</label>
                                                        </div>
                                                    @else
                                                        <input type="hidden" id=""  value="1" name="bl_doc_terima">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                    @endif
                                                    <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->bl_doc)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    @if($data->doc_1 != NULL)
                                        @if(substr($data->doc_1,-3)=='pdf')
                                        <div class="col-12" id="accordion4">
                                            <div class="title-sm mb-1">Document Lainnya</div>
                                            <div class="cards">
                                                <div class="accordionPreviewRed justify-sb2 w-100">
                                                    <div class="name">
                                                        <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                        <div class="title text-truncate">{{$data->doc_1}}</div>
                                                    </div>
                                                    <div class="justify-center gap-6">
                                                        @if($data->doc_1_terima==null)
                                                            <div class="flex mt-2">
                                                                <input type="checkbox" class="check1" id="lainnya" value="1" name="doc_1_terima">
                                                                <label for="lainnya" class="label-checkbox">Receive</label>
                                                            </div>
                                                        @else
                                                            <input type="hidden" id=""  value="1" name="doc_1_terima">
                                                            <i class="checkSuccess fas fa-check-circle"></i>
                                                        @endif
                                                        <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion4">
                                                    <div class="cards-20 p-4"> 
                                                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_1)) }}" width="100%" height="750"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12">
                                            <div class="title-sm mb-1">Document Lainnya</div>
                                            <div class="flex gap-6">
                                                <div class="accordionPreviewBlue justify-sb2 w-100">
                                                    <div class="name">
                                                        <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                        <div class="title text-truncate">{{$data->doc_1}}</div>
                                                    </div>
                                                    <div class="justify-center gap-6">
                                                        @if($data->doc_1_terima==null)
                                                            <div class="flex mt-2">
                                                                <input type="checkbox" class="check1" id="lainnya" value="1" name="doc_1_terima">
                                                                <label for="lainnya" class="label-checkbox">Receive</label>
                                                            </div>
                                                        @else
                                                            <input type="hidden" id=""  value="1" name="doc_1_terima">
                                                            <i class="checkSuccess fas fa-check-circle"></i>
                                                        @endif
                                                        <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->doc_1)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    @if($data->doc_2 != NULL)
                                        @if(substr($data->doc_2,-3)=='pdf')
                                        <div class="col-12" id="accordion5">
                                            <div class="cards">
                                                <div class="accordionPreviewRed justify-sb2 w-100">
                                                    <div class="name">
                                                        <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                        <div class="title text-truncate">{{$data->doc_2}}</div>
                                                    </div>
                                                    <div class="justify-center gap-6">
                                                        @if($data->doc_2_terima==null)
                                                            <div class="flex mt-2">
                                                                <input type="checkbox" class="check1" id="lainnya2" value="1" name="doc_2_terima">
                                                                <label for="lainnya2" class="label-checkbox">Receive</label>
                                                            </div>
                                                        @else
                                                            <input type="hidden" id=""  value="1" name="doc_2_terima">
                                                            <i class="checkSuccess fas fa-check-circle"></i>
                                                        @endif
                                                        <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion5">
                                                    <div class="cards-20 p-4"> 
                                                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_2)) }}" width="100%" height="750"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12">
                                            <div class="accordionPreviewBlue justify-sb2 w-100">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                    <div class="title text-truncate">{{$data->doc_2}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->doc_2_terima==null)
                                                        <div class="flex mt-2">
                                                            <input type="checkbox" class="check1" id="lainnya2" value="1" name="doc_2_terima">
                                                            <label for="lainnya2" class="label-checkbox">Receive</label>
                                                        </div>
                                                    @else
                                                        <input type="hidden" id=""  value="1" name="doc_2_terima">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                    @endif
                                                    <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->doc_2)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    @if($data->doc_3 != NULL)
                                        @if(substr($data->doc_3,-3)=='pdf')
                                        <div class="col-12" id="accordion6">
                                            <div class="cards w-100">
                                                <div class="accordionPreviewRed justify-sb2 w-100">
                                                    <div class="name">
                                                        <img src="{{url('images/iconpack/icon-pdf.svg')}}">
                                                        <div class="title text-truncate">{{$data->doc_3}}</div>
                                                    </div>
                                                    <div class="justify-center gap-6">
                                                        @if($data->doc_3_terima==null)
                                                            <div class="flex mt-2">
                                                                <input type="checkbox" class="check1" id="lainnya3" value="1" name="doc_3_terima">
                                                                <label for="lainnya3" class="label-checkbox">Receive</label>
                                                            </div>
                                                        @else
                                                            <input type="hidden" id=""  value="1" name="doc_3_terima">
                                                            <i class="checkSuccess fas fa-check-circle"></i>
                                                        @endif
                                                        <button type="button" class="btn-preview-red w-130" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Preview <i class="ml-2 fs-16 fas fa-eye"></i></button>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion6">
                                                    <div class="cards-20 p-4"> 
                                                        <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('storage/tiket_exim/'.$data->doc_3)) }}" width="100%" height="750"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12">
                                            <div class="accordionPreviewBlue justify-sb2 w-100">
                                                <div class="name">
                                                    <img src="{{url('images/iconpack/icon-file.svg')}}">
                                                    <div class="title text-truncate">{{$data->doc_3}}</div>
                                                </div>
                                                <div class="justify-center gap-6">
                                                    @if($data->doc_3_terima==null)
                                                        <div class="flex mt-2">
                                                            <input type="checkbox" class="check1" id="lainnya3" value="1" name="doc_3_terima">
                                                            <label for="lainnya3" class="label-checkbox">Receive</label>
                                                        </div>
                                                    @else
                                                        <input type="hidden" id=""  value="1" name="doc_3_terima">
                                                        <i class="checkSuccess fas fa-check-circle"></i>
                                                    @endif
                                                    <a class="btn-preview-blue w-130" href="{{route('tiket.doc.download',$data->doc_3)}}">Download<i class="fs-16 ml-2 fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
    function swipebutton(arg) {
        const tombol = document.querySelector('#btn-save'); 
        if(arg.value == '' ) {
            tombol.classList.remove('btn-green-md');
            tombol.classList.add('btn-blue-md');
            tombol.innerHTML = "Update Data";            
        } else {
            tombol.classList.remove('btn-blue-md');
            tombol.classList.add('btn-green-md');
            tombol.innerHTML = "Done";
        }
    }

    const save = document.getElementById('btn-save');
    save.addEventListener('click', function() {
        let eta_gtx=document.getElementById('eta_gtx').value;
        let tgl=document.getElementById('tanggal').value;
       
        if( eta_gtx!="" && tgl!=""){
            swal({
              title: 'Are you sure Done?',
              icon: 'warning',
              buttons: ["CANCEL", "DONE"],
            })
            .then(function(value) {
                if (value) {
                    document.getElementById('myForm').submit();
                }
            });
        }
        else{
            swal({
              title: 'Are you sure Update?',
              icon: 'warning',
              buttons: ["CANCEL", "UPDATE"],
            })
            .then(function(value) {
                if (value) {
                document.getElementById('myForm').submit();
                }
            });
        }
        

    });
</script>

@endpush