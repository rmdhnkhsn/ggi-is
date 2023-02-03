<div class="modal fade" id="assign{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:650px">
        <div class="modal-content" style="border-radius:10px">
            <div class="row">
                <div class="col-12 pt-3 px-4">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
            <div class="row px-4">
                <div class="col-12 text-center mb-3">
                    <span class="title-20">Let’s Schedule This Request</span>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">SR Number</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="sr_number" name="sr_number" value="" placeholder="Input Code...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Sample Code</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="sample_code" name="sample_code" value="{{ $value['sample_code'] }}" placeholder="Input Code..." readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">MD Name</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="md_name" name="md_name" value="{{ $value['nama'] }}" placeholder="Input Name..." readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Agent</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="agen" name="agen" value="" placeholder="Input Agent...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Style</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="style" name="style" value="{{ $value['style'] }}" placeholder="Style...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Item</span>
                    <div class="input-group mt-1 mb-3">
                        <input type="text" class="form-control border-input" id="item" name="item" value="" placeholder="Item...">
                    </div>
                </div>
                <div class="col-12">
                    <span class="title-sm">PIC Pattern</span>
                    <div class="input-group mb-3 mt-1">
                        <div class="input-group-prepend">
                            <span class="input-group-select" for="?">Name</span>
                        </div>
                        <select class="custom-select select2bs4 border-input" id="PIC_pattern" name="PIC_pattern" required>
                            <option value="" selected> Select Name</option>
                            @foreach($dataUser as $key => $value)
                                <option value="{{$value->nama}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="col-12">
                    <span class="title-sm">PIC Pattern</span>
                    <div class="input-group mb-3 mt-1">
                        <div class="input-group-prepend">
                            <span class="input-group-select" for="?">Name</span>
                        </div>
                        <select class="custom-select select2bs4 border-input" id="?" name="name" required>
                            <option disabled value="" selected>Select Name</option>
                                <option name="" value="Agus">Agus</option>    
                        </select>
                    </div>
                </div> --}}
                <div class="col-sm-6">
                    <span class="title-sm">Pattern Start</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="pattern_start" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Pattern Finish</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="pattern_finish" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Cutting Start</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="cutting_start" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Cutting Finish</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="cutting_finish" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Print/ Embro Start</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="embro_start" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Print/ Embro Finish</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="embro_finish" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Sewing Start</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="sewing_start" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="title-sm">Sewing Finish</span>
                    <div class="input-group mt-1 mb-3">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                            </div>
                            <input type="date" class="form-control border-input" name="sewing_finish" placeholder="Select date..."/>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4 mt-2">
                    
                    <button type="submit" class="btn-blue btn-block">{{ $submit }}<i class="ml-2 fas fa-download"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>