<div class="row">
    <div class="col-md-3">
        <div class="accordionItem p-3">            
            <header class="accordionHeader">
                <img src="{{url('images/job-orientation.svg')}}" style="width:100%" class="imgOrientation">
            </header>
            <div class="row p-2 mt-3 mb-2">
                <div class="col-12 justifyFilter">
                    <div class="title-16">Filter <span class="txtNone">Documents</span> By Departement</div> 
                    <div class="iconFilter">
                        <i class="icons fas fa-bars" id="icons"></i>
                    </div>
                </div>
            </div>
            <div class="accordionContent">
                <div class="col-12">
                    <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="max-height:569px">
                        <ul class="nav nav-pills" role="tablist" style="display: block">
                            <li>
                                <a class="filterDivision active" data-toggle="pill" href="#semuanya" role="tab">
                                    <span class="name text-truncate">All Division</span>
                                </a>
                            </li>
                            @foreach($departemen as $key => $value)
                            <li>
                                <a class="filterDivision" data-toggle="pill" href="#{{str_replace([' & ', ' '], '_', $value['departemen'])}}" role="tab">
                                    <span class="name text-truncate">{{$value['departemen']}}</span>
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
                        <div class="relative" style="width:100%">
                            <input type="text" class="searchText search" placeholder="Search..." required>
                            <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="tab-content">
                        <ul class="list-group list-group-flush">
                            <div class="tab-content">
                                <div class="tab-pane fade show active cobacoba" id="semuanya" role="tabpanel">
                                    <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="min-height:288px;max-height:745px">
                                        @foreach($jobs as $key3 => $value3)
                                            <li class="listGroup cobaanwe" departemen="{{$value3->departemen}}" id="kumaha_atuh{{$value3->id}}" atribut_we="{{$value3->id}}">
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
                                                        @elseif($value3->kategori == 'PPT')
                                                        <img src="{{url('images/iconpack/job_orientation/pp.svg')}}">
                                                        @elseif($value3->kategori == 'RAR')
                                                        <img src="{{url('images/iconpack/job_orientation/rar.svg')}}">
                                                        @elseif($value3->kategori == 'SC')
                                                        <img src="{{url('images/iconpack/job_orientation/code.svg')}}">
                                                        @endif
                                                        <div class="title-14 nama_dokumen text-truncate" style="font-weight:500">{{$value3->nama_dokumen}}</div>
                                                    </div>
                                                    <div class="btn-group dropJob">
                                                        <div class="btnSee">
                                                            <i class="fas fa-eye"></i>
                                                            <div class="seeCount" id="hasil{{$value3->id}}">{{$value3->viewers}}</div>
                                                        </div>
                                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if($value3->kategori == 'LINK')
                                                            <a class="dropdown-item submit_down" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}" href="{{$value3->dokumen}}" target="_blank" ><i class="fs-18 fas fa-arrow-alt-circle-right" style="margin-left:-2px"></i><span style="margin-left:6px">Goes to</span></a> 
                                                            @elseif($value3->kategori == 'IMAGE')
                                                            <a class="dropdown-item submit_media previewImageAtas{{$value3->id}}" onclick="myFunction(this.id)" pic-url="{{ asset('storage/job_orientation/image/'.$value3->dokumen) }}" id="{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @elseif($value3->kategori == 'VIDEO')
                                                            <a class="dropdown-item submit_media previewVideoAtas{{$value3->id}}" id="{{$value3->id}}" onclick="videoAtas(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @elseif($value3->kategori == 'PDF')
                                                            <a class="dropdown-item submit_media previewPDFAtas{{$value3->id}}" id="{{$value3->id}}" onclick="pdfAtas(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @else
                                                            <a class="dropdown-item submit_down" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}" href="{{route('job.download', $value3->id)}}"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                                            @endif
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesAll-{{$value3->kategori}}-{{$value3->id}}"><i class="fs-18 fas fa-info-circle" style="margin-right:7px;margin-left:-2px"></i>Detail Files</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($value3->kategori == 'IMAGE')
                                                @include('more_program.job_orientation.preview.image')
                                            @elseif($value3->kategori == 'VIDEO')
                                                @include('more_program.job_orientation.preview.video')
                                            @elseif($value3->kategori == 'PDF')
                                                @include('more_program.job_orientation.preview.pdf')
                                            @endif
                                            @include('more_program.job_orientation.partials.modal-detail')
                                        @endforeach
                                    </div>
                                </div>
                                @foreach($departemen as $key2 => $value2)
                                <div class="tab-pane fade inibagian" departemen="{{$value2['departemen']}}" id="{{str_replace([' & ', ' '], '_', $value2['departemen'])}}" role="tabpanel">
                                    <?php 
                                       $listjob = collect($jobs)->where('departemen', $value2['departemen']);
                                    ?>
                                    <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="min-height:288px;max-height:745px">
                                        @foreach($listjob as $key3 => $value3)
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
                                                    @elseif($value3->kategori == 'PPT')
                                                    <img src="{{url('images/iconpack/job_orientation/pp.svg')}}">
                                                    @elseif($value3->kategori == 'RAR')
                                                    <img src="{{url('images/iconpack/job_orientation/rar.svg')}}">
                                                    @elseif($value3->kategori == 'SC')
                                                    <img src="{{url('images/iconpack/job_orientation/code.svg')}}">
                                                    @endif
                                                        <div class="title-14 nama_dokumen" style="font-weight:500">{{$value3->nama_dokumen}}</div>
                                                    </div>
                                                    <div class="btn-group dropJob">
                                                        <div class="btnSee">
                                                            <i class="fas fa-eye"></i>
                                                            <div class="seeCount" id="result{{$value3->id}}">{{$value3->viewers}}</div>
                                                        </div>
                                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if($value3->kategori == 'LINK')
                                                            <a class="dropdown-item submit_donwnload" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}" href="{{$value3->dokumen}}" target="_blank" ><i class="fs-18 fas fa-arrow-alt-circle-right" style="margin-left:-2px"></i><span style="margin-left:6px">Goes to</span></a> 
                                                            @elseif($value3->kategori == 'IMAGE')
                                                            <a class="dropdown-item submit_btnqq previewImageBawah{{$value3->id}}" onclick="imageBawah(this.id)" id="{{$value3->id}}" pic-url="{{ asset('storage/job_orientation/image/'.$value3->dokumen) }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @elseif($value3->kategori == 'VIDEO')
                                                            <a class="dropdown-item submit_btnqq previewVideoBawah{{$value3->id}}" id="{{$value3->id}}" onclick="videoBawah(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @elseif($value3->kategori == 'PDF')
                                                            <a class="dropdown-item submit_btnqq previewPDFBawah{{$value3->id}}" id="{{$value3->id}}" onclick="pdfBawah(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @else
                                                            <a href="{{route('job.download', $value3->id)}}" class="dropdown-item submit_donwnload" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                                            @endif
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesBagian-{{$value3->kategori}}-{{$value3->id}}"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($value3->kategori == 'IMAGE')
                                                @include('more_program.job_orientation.preview.image-sub')
                                            @elseif($value3->kategori == 'VIDEO')
                                                @include('more_program.job_orientation.preview.video-sub')
                                            @elseif($value3->kategori == 'PDF')
                                                @include('more_program.job_orientation.preview.pdf-sub')
                                            @endif
                                            @include('more_program.job_orientation.partials.modal-detail-bagian')
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>