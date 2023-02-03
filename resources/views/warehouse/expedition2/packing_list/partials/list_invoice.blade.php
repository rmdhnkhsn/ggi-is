 @if (auth()->user()->branch == 'CLN')
 <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-20 title-none">Shipment</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 pb-5">
            <div class="cards-scroll scrollX" id="scroll-bar">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable3" class="table tbl-content-left">
                    <thead>
                        <tr>
                            <th>ID</th>    
                            <th>Tanggal</th>
                            <th>No surat Jalan</th>
                            <th>Container Number</th>
                            <th>Seal No</th>
                            <th>Jenis Dokumen</th>
                            <th>No Dokumen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizeForTabelCilenyi as $key =>$value)   
                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value['tanggal_surat'] }}</td>
                            <td>{{ $value['no_surat_jalan'] }}</td>
                            <td>{{ $value['no_kontainer'] }}</td>
                            <td>{{ $value['no_seal'] }}</td>
                            <td>{{ $value['jenis_doct'] }}</td>
                            <td>{{ $value['no_doct'] }}</td>
                            <td>
                                <div class="flex" style="gap:.35rem;margin:-6px 0">
                                    <a href="{{ route('download-packingEkspedisi',$value['kode_ekspedisi']) }}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                    <input type="hidden" id="kode_ekspedisi" name="kode_ekspedisi" value="{{ $value['kode_ekspedisi'] }}">
                                    @if(auth()->user()->departemensubsub != 'EXIM')
                                    <a href="{{ route('edit-details',$value['kode_ekspedisi']) }}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a>
                                    @endif
                                    @if (($value['placement'] == null) && (auth()->user()->branch != 'CLN'))
                                        <button type="button" class="btn-simple-check" data-toggle="modal" data-target="#exampleModalCenter-2{{$value ['kode_ekspedisi'] }}" style="width:120px" ><i class="fs-20 fas fa-check"></i></button>
                                        @else
                                    @endif
                                    <div class="modal fade" id="exampleModalCenter-2{{$value ['kode_ekspedisi'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
                                            <div class="modal-content" style="border-radius:10px">
                                                <div class="row p-4">
                                                    <div class="col-12 justify-sb">
                                                        <div class="title-18">Placement</div>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="borderlight"></div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <form action="{{route ('packing.UpdateSuratjalan', $value['kode_ekspedisi']) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-12">
                                                                <div class="input-group mt-1 mb-3">
                                                                    {{-- <input type="text" class="form-control border-input-10" id="placing" name="placing" placeholder="masukkan placing..." required> --}}
                                                                    <select class="form-control  border-input-10 select2bs4 input-data-fa" id="placement" name="placement">
                                                                        <option  selected> </option>
                                                                        @foreach($dataBranch as $key => $value)
                                                                        <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            {{-- <input type="hidden" id="id_expedisi" name="id_expedisi" value="{{ $value['id_expedisi'] }}"> --}}
                                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                                            <button type="submit" class="btn-blue-md btn-block">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
     <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-20 title-none">Shipment</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 pb-5">
            <div class="cards-scroll scrollX" id="scroll-bar">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <table id="DTtable3" class="table tbl-content-left">
                    <thead>
                        <tr>
                            <th>ID</th>    
                            <th>Invoice</th>
                            <th>No Surat Jalan</th>
                            <th>Container Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizeForTabel as $key =>$value)   
                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value['invoice'] }}</td>
                            <td>{{ $value['no_surat_jalan'] }}{{ $value['no_surat_jalan2'] }}</td>
                            <td>{{ $value['no_kontainer'] }}</td>
                            <td>
                                <div class="flex" style="gap:.35rem;margin:-6px 0">
                                    <a href="{{ route('download-packingEkspedisi',$value['kode_ekspedisi']) }}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                    <input type="hidden" id="kode_ekspedisi" name="kode_ekspedisi" value="{{ $value['kode_ekspedisi'] }}">
                                    {{-- <a href="{{ route('edit-details',$value['kode_ekspedisi']) }}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a> --}}
                                        @if (($value['placement'] == null) && (auth()->user()->branch != 'CLN'))
                                            <button type="button" class="btn-simple-check" data-toggle="modal" data-target="#exampleModalCenter-2{{$value ['kode_ekspedisi'] }}" style="width:120px" ><i class="fs-20 fas fa-check"></i></button>
                                            @else
                                        @endif
                                        <div class="modal fade" id="exampleModalCenter-2{{$value ['kode_ekspedisi'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:500px">
                                            <div class="modal-content" style="border-radius:10px">
                                                <div class="row p-4">
                                                    <div class="col-12 justify-sb">
                                                        <div class="title-18">Placement</div>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="borderlight"></div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <form action="{{route ('packing.UpdateSuratjalan', $value['kode_ekspedisi']) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="col-12">
                                                                <div class="input-group mt-1 mb-3">
                                                                    {{-- <input type="text" class="form-control border-input-10" id="placing" name="placing" placeholder="masukkan placing..." required> --}}
                                                                    <select class="form-control  border-input-10 select2bs4 input-data-fa" id="placement" name="placement">
                                                                        <option  selected> </option>
                                                                        @foreach($dataBranch as $key => $value)
                                                                        <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            {{-- <input type="hidden" id="id_expedisi" name="id_expedisi" value="{{ $value['id_expedisi'] }}"> --}}
                                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                                            <button type="submit" class="btn-blue-md btn-block">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif




           