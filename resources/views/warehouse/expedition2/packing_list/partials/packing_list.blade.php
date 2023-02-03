<form action="{{route ('packing.updateEkspedisi') }}" method="post" enctype="multipart/form-data">
    @csrf  
    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-20 title-none">Data Resume PL To Ekspedisi</div>
                <div class="flexx" style="margin-right:245px;gap:.5rem">
                    @if (auth()->user()->branch == 'CLN')
                        <a href="" class="btn-blue-md" data-toggle="modal" data-target="#addPacking">ADD DATA <i class="ml-2 fs-18 fas fa-plus"></i></a>
                        <div class="modal fade" id="addPacking" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
                                <div class="modal-content" style="border-radius:10px">
                                    <div class="row pt-3 px-4">
                                        <div class="col-12 justify-sb">
                                            <div class="title-20">Shipment Information Details</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="borderlight"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 px-4">
                                        <div class="col-12">
                                            <span class="title-sm">Invoice No</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="invoice" value="" placeholder="masukan Nomor Invoice..." style="border-radius:8px" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="title-sm">No Surat Jalan</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan" value="" placeholder="masukan nomor Surat jalan..." style="border-radius:8px" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan2" value="" placeholder="masukan nomor surat jalan..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="title-sm">Container No / Trucking No</div>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_kontainer" value="" placeholder="masukan nomor container..." style="border-radius:8px" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="title-sm text-white">X</div>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_kontainer2" value="" placeholder="masukan nomor container..." style="border-radius:8px" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="title-sm">Seal No</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_seal" value="" placeholder="masukan nomor seal..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_seal2" value="" placeholder="masukan nomor seal..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="title-sm">Jenis Dokumen</div>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="jenis_doct" value="" placeholder="masukan jenis dokumen.." style="border-radius:8px">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="title-sm">No Dokumen</div>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_doct" value="" placeholder="masukan nomor dokumen..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="title-sm">Tanggal</div>
                                            <div class="input-group flex mt-1 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="inputGroupBlue" style="height:40px;width:55px;border-radius:8px 0 0 8px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" class="form-control border-input-10" name="tanggal_surat" id="" style="border-radius:0 8px 8px 0">
                                            </div>
                                        </div>
                                        <div class="col-12 justify-start mb-4 mt-2">
                                            <button type="submit" class="btn-blue-md">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="" class="btn-blue-md" data-toggle="modal" data-target="#addPacking">ADD DATA <i class="ml-2 fs-18 fas fa-plus"></i></a>
                        <div class="modal fade" id="addPacking" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:700px">
                                <div class="modal-content" style="border-radius:10px">
                                    <div class="row pt-3 px-4">
                                        <div class="col-12 justify-sb">
                                            <div class="title-20">Tambah Keterangan Packing List</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="borderlight"></div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 px-4">
                                        {{-- <div class="col-12">
                                            <span class="title-sm">Invoice No</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="invoice" value="" placeholder="masukan nomor Surat jalan..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <span class="title-sm">No Surat Jalan</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan" value="" placeholder="masukan nomor Surat jalan..." style="border-radius:8px">
                                            </div>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan2" value="" placeholder="masukan nomor surat jalan..." style="border-radius:8px">
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <span class="title-sm">Invoice No</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="invoice" value="" placeholder="masukan nomor Surat jalan..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="title-sm">No Surat Jalan</div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan" value="" placeholder="masukan nomor Surat jalan..." style="border-radius:8px" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_surat_jalan2" value="" placeholder="masukan nomor surat jalan..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <span class="title-sm">Container No / Trucking No</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_kontainer" value="" placeholder="masukan deskripsi..." style="border-radius:8px">
                                            </div>
                                        </div>
                                        {{-- <div class="col-12">
                                            <span class="title-sm">Seal No</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_seal" value="" placeholder="masukan nomor kontainer..." style="border-radius:8px">
                                            </div>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_seal2" value="" placeholder="masukan nomor kontainer..." style="border-radius:8px">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-12">
                                            <span class="title-sm">Jenis Dokument</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="jenis_doct" value="" placeholder="masukan nomor seal..." style="border-radius:8px">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-12">
                                            <span class="title-sm">No Dokument</span>
                                            <div class="input-group mt-1 mb-3">
                                                <input type="text" class="form-control border-input-10" id="" name="no_doct" value="" placeholder="masukan nomor seal..." style="border-radius:8px">
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-12">
                                            <span class="title-sm">Tanggal</span>
                                            <div class="input-group flex mt-1 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="inputGroupBlue" style="width:55px;border-radius:8px 0 0 8px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" class="form-control border-input-10" name="tanggal_surat" id="" style="border-radius:0 8px 8px 0">
                                            </div>
                                        </div> --}}
                                        <div class="col-12 justify-start mb-4 mt-2">
                                            <button type="submit" class="btn-blue-md">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (auth()->user()->branch == 'CLN')
        <div class="row">
            <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                    <table id="DTtable" class="table tbl-content-left">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Placement</th>
                                <th>ID Ekspedisi</th>
                                <th>Style</th>
                                <th>Buyer</th>
                                {{-- <th>OR</th>
                                <th>WO</th>
                                <th>Buyer</th>
                                <th>QTY Size</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataExpedisiCilenyiAll as $key =>$value)
                                
                            <tr>
                                <td>
                                    <input type="checkbox" class="check1" id="check{{$value['id_ekspedisi']}}">
                                    <input type="hidden" id="cek{{$value['id_ekspedisi']}}" name="cek[]" >
                                    <input type="hidden" id="id_ekspedisi" name="id_ekspedisi[]" value="{{ $value['id_ekspedisi'] }}">
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value['tanggal'] }}</td>
                                <td>{{ $value['placement'] }}</td>
                                <td>{{ $value['id_ekspedisi'] }}</td>
                                <td>{{ $value['style'] }}</td>
                                <td>{{ $value['buyer'] }}</td>
                                {{-- <td>{{ $value['or_number'] }}</td>
                                <td>{{ $value['wo'] }}</td>
                                <td>{{ $value['buyer'] }}</td>
                                <td>{{ $value['qty'] }}</td> --}}
                                <td>
                                    <div class="flex" style="gap:.35rem;margin:-6px 0">
                                        <a href="{{route('detail-packing', $value['id_ekspedisi'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                </td>
                            
                            </tr>
                            <script>
                                $(document).on('click', '#check{{$value['id_ekspedisi']}}', function(){
                                    var status = document.getElementById('check{{ $value['id_ekspedisi'] }}').value;
                                    if(document.getElementById('check{{ $value['id_ekspedisi'] }}').checked){
                                    var result = '1';
                                    document.getElementById('cek{{$value['id_ekspedisi'] }}').value = result;
                                    }
                                    else{
                                    var result = null; 
                                    document.getElementById('cek{{ $value['id_ekspedisi'] }}').value = result;
                                    }    
                                }); 
                            </script>
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                    <table id="DTtable2" class="table tbl-content-left">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Tanggal</th>
                                {{-- <th>Placement</th> --}}
                                <th>ID Ekspedisi</th>
                                {{-- <th>OR</th>
                                <th>WO</th>
                                <th>Buyer</th>
                                <th>Style</th>
                                <th>QTY Size</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataExpedisiPerID as $key =>$value)
                            <tr>
                                <td>
                                    <input type="checkbox" class="check1" id="check{{$value['id_ekspedisi']}}">
                                    <input type="hidden" id="cek{{$value['id_ekspedisi']}}" name="cek[]" >
                                    <input type="hidden" id="id_ekspedisi" name="id_ekspedisi[]" value="{{ $value['id_ekspedisi'] }}">
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value['tanggal'] }}</td>
                                {{-- <td>{{ $value['placement'] }}</td> --}}
                                <td>{{ $value['id_ekspedisi'] }}</td>
                                {{-- <td>{{ $value['or_number'] }}</td>
                                <td>{{ $value['wo'] }}</td>
                                <td>{{ $value['buyer'] }}</td>
                                <td>{{ $value['style'] }}</td>
                                <td>{{ $value['qty'] }}</td> --}}
                                <td>
                                    <div class="flex" style="gap:.35rem;margin:-6px 0">
                                        <a href="{{route('detail-packing', $value['id_ekspedisi'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                </td>
                            
                            </tr>
                            <script>
                                $(document).on('click', '#check{{$value['id_ekspedisi']}}', function(){
                                    var status = document.getElementById('check{{ $value['id_ekspedisi'] }}').value;
                                    if(document.getElementById('check{{ $value['id_ekspedisi'] }}').checked){
                                    var result = '1';
                                    document.getElementById('cek{{$value['id_ekspedisi'] }}').value = result;
                                    }
                                    else{
                                    var result = null; 
                                    document.getElementById('cek{{ $value['id_ekspedisi'] }}').value = result;
                                    }    
                                }); 
                            </script>
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</form>