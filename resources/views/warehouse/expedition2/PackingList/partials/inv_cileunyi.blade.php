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
                        <th>Kode Ekspedisi</th>    
                        <th>Buyer</th>
                        <th>Branch</th>
                        <th>Placement</th>
                        <th>No surat Jalan</th>
                        <th>Container Number</th>
                        <th>Seal No</th>
                        <th>Jenis Dokumen</th>
                        <th>No Dokumen</th>
                        @if(auth()->user()->branch == 'MAJA')
                        <th>Status</th>
                        @endif
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recap_inv as $key => $value)
                    <?php
                        $TotalResult = collect($value)
                                    ->groupBy('no_seal')
                                    ->map(function ($item) {
                                        return array_merge(...$item->toArray());
                                    })->values()->toArray();
                    // dd($TotalResult);
                        $siDatanya = collect($TotalResult)->first();
                        // dd($siDatanya); 
                        // 
                    ?>
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $siDatanya['buyer'] }}</td>
                        <td>{{ $siDatanya['branch'] }} ({{$siDatanya['branchdetail']}})</td>
                        <td>{{ $siDatanya['tujuan'] }}</td>
                        <td>{{ $siDatanya['no_surat_jalan'] }}</td>
                        <td>{{ $siDatanya['no_kontainer'] }}</td>
                        <td>{{ $siDatanya['no_seal'] }}</td>
                        <td>{{ $siDatanya['jenis_doct'] }}</td>
                        <td>{{ $siDatanya['no_doct'] }}</td>   
                        @if(auth()->user()->branch == 'MAJA')
                            @if($siDatanya['no_kontainer'] && $siDatanya['no_seal'] && $siDatanya['jenis_doct'] && $siDatanya['no_doct'])
                            <td style="color:green;">Completed</td>
                            @else
                            <td style="color:red;">Not Complete</td>
                            @endif
                        @endif 
                        <td>
                            <div class="flex" style="gap:.35rem;margin:-6px 0">
                                <a href="{{ route('download-packingEkspedisi',$siDatanya['kode_ekspedisi']) }}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                @if(auth()->user()->departemensubsub != 'EXIM')
                                <a href="{{ route('edit-details',$siDatanya['kode_ekspedisi']) }}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a>
                                @endif
                                <!-- @if (($siDatanya['placement'] == null) && (auth()->user()->branch != 'CLN'))
                                <button type="button" class="btn-simple-check" data-toggle="modal" data-target="#exampleModalCenter-2{{$siDatanya['kode_ekspedisi'] }}" style="width:120px" ><i class="fs-20 fas fa-check"></i></button>
                                <div class="modal fade" id="exampleModalCenter-2{{$siDatanya['kode_ekspedisi'] }}" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
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
                                                    <form action="{{route ('packing.UpdateSuratjalan', $siDatanya['kode_ekspedisi']) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col-12">
                                                            <div class="input-group mt-1 mb-3">
                                                                <select class="form-control  border-input-10 select2bs4 input-data-fa" id="placement" name="placement">
                                                                    <option  selected> </option>
                                                                    @foreach($dataBranch as $key => $value)
                                                                    <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="id" name="id" value="{{$value['id']}}">
                                                        <button type="submit" class="btn-blue-md btn-block">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif -->
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>