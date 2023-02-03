<div class="row">
    <div class="col-md-3">
        <div class="accordionItem p-3">            
            <header class="accordionHeader">
                <img src="{{url('images/job-orientation.svg')}}" style="width:100%" class="imgOrientation">
            </header>
            <div class="row p-2 mt-3">
                <div class="col-12 justifyFilter">
                    <div class="title-16">Filter <span class="txtNone">Documents</span> By Division</div> 
                    <div class="iconFilter">
                        <i class="icons fas fa-bars" id="icons"></i>
                    </div>
                </div>
            </div>
            <?php 
                $bagian = collect($bagian)->where('departemen', $value['departemen']);
            ?>
            <div class="accordionContent">
                <div class="col-12">
                    <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="max-height:569px">
                        <ul class="nav nav-pills" role="tablist" style="display:grid;gap:.2rem !important">
                            <li>
                                <a class="filterDivision active" data-toggle="pill" href="#All-{{str_replace([' & ', ' '], '_', $value['departemen'])}}" role="tab">
                                    <span class="name text-truncate">All Division</span>
                                </a>
                            </li>
                            @foreach($bagian as $key2 => $value2)
                            <li>
                                <a class="filterDivision" data-toggle="pill" href="#{{str_replace([' & ', ' '], '_', $value2['departemen'])}}-{{str_replace([' & ', ' '], '_', $value2['departemensubsub'])}}" role="tab">
                                    <span class="name text-truncate">{{$value2['departemensubsub']}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="cards p-4">
            <div class="row">
                <div class="col-12">
                    <div class="title-24 text-center mb-3 mt-4" style="font-weight:600">Search Documents</div>
                    <div class="justify-center" style="gap:.7rem !important">
                        <div class="relative" style="width:60%">
                            <input type="text" class="searchText search" placeholder="Search..." required>
                            <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
                        </div>
                        <a href="{{ route('job.upload') }}" class="btn-blue" style="border-radius:10px;padding:0 20px"><span class="uploadName">Upload Document</span><i class="fas fa-file-upload"></i></a> 
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="tab-content">
                        <ul class="list-group list-group-flush">
                            <div class="tab-content">
                                <?php 
                                $listjob = collect($jobs)->where('departemen', $value['departemen']);
                                ?>
                                <div class="tab-pane fade show active cobacoba" coba_atribut="{{$value['departemen']}}" id="All-{{str_replace([' & ', ' '], '_', $value['departemen'])}}" role="tabpanel">
                                    @foreach($listjob as $key3 => $value3)
                                        <li class="listGroup cobaanwe" id="kumaha_atuh{{$value3->id}}" atribut_we="{{$value3->id}}">
                                            <div class="justify-sb marginMinY">
                                                <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                                    @if($value3->kategori == 'IMAGE')
                                                    <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}">
                                                    @elseif($value3->kategori == 'VIDEO')
                                                    <img src="{{url('images/iconpack/job_orientation/video.svg')}}">
                                                    @elseif($value3->kategori == 'LINK')
                                                    <img src="{{url('images/iconpack/job_orientation/link.svg')}}">
                                                    @elseif($value3->kategori == 'PDF')
                                                    <img src="{{url('images/iconpack/job_orientation/pdf.svg')}}">
                                                    @elseif($value3->kategori == 'EXCEL')
                                                    <img src="{{url('images/iconpack/job_orientation/excel.svg')}}">
                                                    @elseif($value3->kategori == 'WORD')
                                                    <img src="{{url('images/iconpack/job_orientation/word.svg')}}">
                                                    @endif
                                                    <div class="title-14 nama_dokumen" style="font-weight:500">{{$value3->nama_dokumen}}</div>
                                                </div>
                                                <div class="btn-group dropJob">
                                                    <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if($value3->kategori == 'LINK')
                                                        <a class="dropdown-item" href="{{$value3->dokumen}}" target="_blank" ><i class="fs-18 fas fa-arrow-alt-circle-right" style="margin-left:-2px"></i><span style="margin-left:6px">Goes to</span></a> 
                                                        @else
                                                        <a class="dropdown-item" href="{{route('job.download', $value3->id)}}"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                                        @endif
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesAll-{{$value3->kategori}}-{{$value3->id}}"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                                        <a class="dropdown-item deleteFile" style="color:#FB5B5B" href="{{route('job.delete', $value3->id)}}"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @include('more_program.job_orientation.partials.modal-detail')
                                    @endforeach
                                </div>
                                @foreach($bagian as $key2 => $value2)
                                <div class="tab-pane fade inibagian" departemen="{{$value2['departemen']}}" bagian="{{$value2['departemensubsub']}}" id="{{str_replace([' & ', ' '], '_', $value2['departemen'])}}-{{str_replace([' & ', ' '], '_', $value2['departemensubsub'])}}" role="tabpanel">
                                    <?php 
                                        $listjobs = collect($jobs)->where('departemen', $value['departemen'])->where('bagian', $value2['departemensubsub']);
                                    ?>
                                    @foreach($listjobs as $key3 => $value3)
                                        <li class="listGroup inti_bagian" id="kumaha_nya{{$value3->id}}" atribut_nih="{{$value3->id}}">
                                            <div class="justify-sb marginMinY">
                                                <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                                @if($value3->kategori == 'IMAGE')
                                                <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}">
                                                @elseif($value3->kategori == 'VIDEO')
                                                <img src="{{url('images/iconpack/job_orientation/video.svg')}}">
                                                @elseif($value3->kategori == 'LINK')
                                                <img src="{{url('images/iconpack/job_orientation/link.svg')}}">
                                                @elseif($value3->kategori == 'PDF')
                                                <img src="{{url('images/iconpack/job_orientation/pdf.svg')}}">
                                                @elseif($value3->kategori == 'EXCEL')
                                                <img src="{{url('images/iconpack/job_orientation/excel.svg')}}">
                                                @elseif($value3->kategori == 'WORD')
                                                <img src="{{url('images/iconpack/job_orientation/word.svg')}}">
                                                @endif
                                                    <div class="title-14 nama_dokumen" style="font-weight:500">{{$value3->nama_dokumen}}</div>
                                                </div>
                                                <div class="btn-group dropJob">
                                                    <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if($value3->kategori == 'LINK')
                                                        <a class="dropdown-item" href="{{$value3->dokumen}}" target="_blank" ><i class="fs-18 fas fa-arrow-alt-circle-right" style="margin-left:-2px"></i><span style="margin-left:6px">Goes to</span></a> 
                                                        @else
                                                        <a class="dropdown-item" href="{{route('job.download', $value3->id)}}"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                                        @endif
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesBagian-{{$value3->kategori}}-{{$value3->id}}"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                                        <a href="{{route('job.delete', $value3->id)}}" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @include('more_program.job_orientation.partials.modal-detail-bagian')
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            <!-- <div class="col-12 text-center mt-4">
                                <a href="#" class="btn-leadMore">Lead More...</a>
                            </div> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>