    <form action="{{ route('packing.storePartList', $data->id)}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="modal fade" id="createPartials{{  $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
                <div class="modal-content" style="border-radius:10px">
                    <div class="row">
                        <div class="col-12 pt-3 px-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row px-4 pb-4">
                        <div class="col-12 text-center mb-3">
                            <span class="title-20">Create Packing List</span>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Packing List</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input-10" id="packing_list" name="packing_list" placeholder="masukkan packing list..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Color_Code</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input-10" id="color_code" name="color_code" placeholder="masukkan color_code..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Article</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input-10" id="article" name="article" placeholder="masukkan article..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">QTY</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input-10" id="qty" name="qty" placeholder="masukkan qty..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">NW</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input-10" id="NW" name="NW" placeholder="masukkan NW..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">GW</span>
                            <div class="input-group mt-1 mb-3">
                                <input type="text" class="form-control border-input-10" id="GW" name="GW" placeholder="masukkan GW..." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="title-sm">Select Date</span>
                            <div class="input-group date mt-1 mb-3">
                                <div class="input-group-append">
                                    <div class="custom-calendar " style="height:40px; border-radius:10px 0 0 10px">
                                        <div class="justify-center px-2">Date<i class="ml-2 fas fa-calendar-alt"></i></div>                  
                                    </div>
                                </div>
                                <input type="date" class="form-control border-input-10" id="tanggal" name="tanggal"/>
                            </div>
                        </div>
                    </div>
                    <div class="row px-4 mb-3">
                        <div class="col-12">
                            <span class="title-sm">Detail Carton</span>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group date mt-1 mb-2">
                                <div class="input-group-append">
                                    <div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:75px">
                                        <span>Carton</span>                  
                                    </div>
                                </div>
                                <input type="text" class="form-control border-input-10" name="carton" placeholder="carton..."/>
                            </div>
                        </div>
                        @foreach ($sizeForTabel as $key =>$value)
                        <div class="col-md-4">
                            <div class="input-group date mt-1 mb-2">
                                <div class="input-group-append">
                                    <div class="custom-calendar" style="height:40px; border-radius:10px 0 0 10px; width:75px">
                                        <span>{{ $value['nama_size'] }}</span>                  
                                    </div>
                                </div>
                                <input type="hidden" class="form-control border-input-10" name="nama_size[]" value="{{ $value['nama_size'] }}" placeholder="size..."/>
                                <input type="text" class="form-control border-input-10" name="jumlah_size[]" placeholder="size..."/>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-12 my-2">
                            <button id="addCarton" type="button" class="btn-green-md">Add Carton<i class="ml-2 fs-16 fas fa-plus"></i> </button>
                        </div> --}}
                    </div>
                    <div id="newRowPartials"></div>
                    <div class="row px-4 pb-4">
                        <div class="col-12">
                            <div class="borderlight"></div>
                        </div>
                        <div class="col-12 justify-end mt-3">
                        <input type="hidden" id="id" name="id" value="{{$data->id }}">
                            <button type="submit" class="btn-blue-md save">Save<i class="ml-2 fas fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>