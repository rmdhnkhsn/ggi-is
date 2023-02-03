<form action="{{route ('packing.updateEkspedisi') }}" method="post" enctype="multipart/form-data">
    @csrf  
    <div class="row">
        <div class="col-12">
            <div class="joblist-date">
                <div class="title-20 title-none">Data Resume PL To Ekspedisi</div>
                <div class="flexx" style="margin-right:245px;gap:.5rem">
                    @if (auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA')
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
                                                <input type="date" value="{{$today}}" class="form-control border-input-10" name="tanggal_surat" id="" style="border-radius:0 8px 8px 0">
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
                                        <div class="col-12">
                                            <div class="title-sm">Shipment Date</div>
                                            <div class="input-group flex mt-1 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="inputGroupBlue" style="height:40px;width:55px;border-radius:8px 0 0 8px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" class="form-control border-input-10" name="shipment_date" id="" style="border-radius:0 8px 8px 0">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="title-sm">Placement</div>
                                            <div class="input-group flex mt-1 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-amount-down"></i></span>
                                                </div>
                                                <select class="form-control borderInput" id="" name="tujuan" required>
                                                    <option selected disabled>Select Placement</option>
                                                    <option value="CLN">Cileunyi</option>
                                                    <option value="GM1">Maja 1</option>
                                                    <option value="GM2">Maja 2</option>
                                                </select>
                                            </div>
                                        </div>
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
    @if (auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA')
        <div class="row">
            <div class="col-12 pb-5">
                <div class="cards-scroll scrollX" id="scroll-bar">
                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                    <table id="DTtableCLN" class="table tbl-content-left">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>ID Ekspedisi</th>
                                <th>Style</th>
                                <th>Buyer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_pl_cileunyi as $key => $value)
                            <?php
                                $data_nya = collect($value)->first();
                                $style = collect($value)->implode('style', ', ');
                                // dd($data_nya->id_ekspedisi);
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="check1" id="check{{$data_nya->id_ekspedisi}}">
                                    <input type="hidden" id="cek{{$data_nya->id_ekspedisi}}" name="cek[]" >
                                    <input type="hidden" id="id_ekspedisi" name="id_ekspedisi[]" value="{{ $data_nya->id_ekspedisi }}">
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data_nya->tanggal }}</td>
                                <td>{{ $data_nya->id_ekspedisi }}</td>
                                <td>{{ $style }}</td>
                                <td>{{ $data_nya->buyer }}</td>
                                <td>
                                    <div class="flex" style="gap:.35rem;margin:-6px 0">
                                        <a href="{{route('detail-packing', $data_nya->id_ekspedisi)}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <script>
                                $(document).on('click', '#check{{$data_nya->id_ekspedisi}}', function(){
                                    var status = document.getElementById('check{{ $data_nya->id_ekspedisi }}').value;
                                    if(document.getElementById('check{{ $data_nya->id_ekspedisi }}').checked){
                                    var result = '1';
                                    document.getElementById('cek{{$data_nya->id_ekspedisi }}').value = result;
                                    }
                                    else{
                                    var result = null; 
                                    document.getElementById('cek{{ $data_nya->id_ekspedisi }}').value = result;
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
                    <table id="DTtableOther" class="table tbl-content-left">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>ID Ekspedisi</th>
                                <th>Style</th>
                                <th>Buyer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_branch_lain as $key => $value)
                            <?php
                                $data_nya = collect($value)->first();
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="check1" id="check{{$data_nya->id_ekspedisi}}">
                                    <input type="hidden" id="cek{{$data_nya->id_ekspedisi}}" name="cek[]" >
                                    <input type="hidden" id="id_ekspedisi" name="id_ekspedisi[]" value="{{ $data_nya->id_ekspedisi }}">
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data_nya->tanggal }}</td>
                                <td>{{ $data_nya->id_ekspedisi }}</td>
                                <td>{{ $data_nya->style }}</td>
                                <td>{{ $data_nya->buyer }}</td>
                                <td>
                                    <div class="flex" style="gap:.35rem;margin:-6px 0">
                                        <a href="{{route('detail-packing', $data_nya->id_ekspedisi)}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <script>
                                $(document).on('click', '#check{{$data_nya->id_ekspedisi}}', function(){
                                    var status = document.getElementById('check{{ $data_nya->id_ekspedisi }}').value;
                                    if(document.getElementById('check{{ $data_nya->id_ekspedisi }}').checked){
                                    var result = '1';
                                    document.getElementById('cek{{$data_nya->id_ekspedisi }}').value = result;
                                    }
                                    else{
                                    var result = null; 
                                    document.getElementById('cek{{ $data_nya->id_ekspedisi }}').value = result;
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
    <div class="row">
        <div class="col-12">
            <div class="borderlight2 my-5"></div>
        </div>
        <div class="col-12">
            <ul class="nav nav-tabs sch-md-tabs mb-4" role="tablist">
                @if(auth()->user()->branch == 'CLN' || auth()->user()->branch == 'MAJA')
                <li class="nav-item-show">
                    <a class="nav-link relative active" onclick="invCileunyi()" bagian="shipment" data-toggle="tab" href="#invCileunyi" role="tab"></i>
                        <i class="fs-28 fas fa-book"></i>
                        <div class="f-14">All Branch Shipment</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                @endif
                <li class="nav-item-show">
                    <a class="nav-link relative" onclick="invAll()" data-toggle="tab" href="#invAll" role="tab"></i>
                        <i class="fs-28 fas fa-book"></i>
                        <div class="f-14">Shipment {{auth()->user()->branchdetail}}</div>
                    </a>
                    <div class="sch-slide"></div>
                </li>
            </ul>
            <div class="tab-content card-block">
                <!-- khusus cileunyi  -->
                @if(auth()->user()->branch == 'CLN')
                <div class="tab-pane active" id="invCileunyi" role="tabpanel">
                    @include('warehouse.expedition2.PackingList.partials.inv_cileunyi')
                </div>
                <div class="tab-pane" id="invAll" role="tabpanel">
                    @include('warehouse.expedition2.PackingList.partials.inv_all')
                </div>
                <!-- khusus maja 2 -->
                @elseif(auth()->user()->branch == 'MAJA')
                <div class="tab-pane active" id="invCileunyi" role="tabpanel">
                    @include('warehouse.expedition2.PackingList.partials.inv_cileunyi')
                </div>
                <div class="tab-pane" id="invAll" role="tabpanel">
                    @include('warehouse.expedition2.PackingList.partials.inv_all')
                </div>
                @else
                <!-- selain cileunyi dan maja 2  -->
                <div class="tab-pane active" id="invAll" role="tabpanel">
                    @include('warehouse.expedition2.PackingList.partials.inv_all')
                </div>
                @endif
            </div>
        </div>
    </div>
</form>