<div class="row">
    <div class="col-md-3">
        <div class="accordionItem p-3">            
            <header class="accordionHeader">
                <img src="{{url('images/job-orientation.svg')}}" style="width:100%" class="imgOrientation">
            </header>
            <div class="row p-2 mt-3">
                @if(auth()->user()->statuskontrak == 'PROBATION')
                <div class="col-12">
                    <div class="title-16">Comprehension Test</div>
                    <div class="justify-start my-2">
                        <a href="{{ route('start-modul-probation', auth()->user()->nik) }}" class="btn-blue">Probation<i class="ml-2 fs-18 fas fa-chevron-right"></i></a>
                    </div>
                </div>
                @endif
                <div class="col-12 my-3">
                    <div class="borderlight"></div>
                </div>
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
                                    <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="min-height:288px;max-height:745px">
                                        @foreach($listjob as $key3 => $value3)
                                            <li class="listGroup cobaanwe" id="kumaha_atuh{{$value3->id}}" atribut_we="{{$value3->id}}">
                                                <div class="justify-sb marginMinY">
                                                    <!-- Filter ICON -->
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
                                                        <!-- Jumlah Verif  -->
                                                        @if($value3->verif1 != null && $value3->verif2 != null && $value3->verif3 != null)
                                                        <div class="popVerify">
                                                            <div class="icon check">
                                                                <div class="tooltip no-wrap">
                                                                    Verified 3 People
                                                                </div>
                                                                <i class="fas fa-check-circle"></i>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- Viewers  -->
                                                        <div class="btnSee">
                                                            <i class="fas fa-eye"></i>
                                                            <div class="seeCount" id="hasil{{$value3->id}}">{{$value3->viewers}}</div>
                                                        </div>
                                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <!-- Preview  -->
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
                                                            <!-- Modal Detail  -->
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesAll-{{$value3->kategori}}-{{$value3->id}}"><i class="fs-18 fas fa-info-circle" style="margin-right:7px;margin-left:-2px"></i>Detail Files</a>
                                                            
                                                            <!-- Modal Edit  -->
                                                            @if($value3->created_by == auth()->user()->nik)
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-{{$value3->id}}"><i class="fs-18 fas fa-pencil-alt" style="margin-right:5px"></i>Edit Document</a>
                                                            @endif

                                                            <!-- Modal Verif  -->
                                                            @if($value3->verif1 == null || $value3->verif2 == null || $value3->verif3 == null)
                                                                @if($value3->verif1 != auth()->user()->nik && $value3->verif2 != auth()->user()->nik && $value3->verif3 != auth()->user()->nik)
                                                                <form action="{{ route('job.verif')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" id="id" value="{{$value3->id}}">
                                                                    <input type="hidden" name="verif" id="verif" value="{{auth()->user()->nik}}">
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Verify this document?');" style="color:#0CAE63"><i class="fs-18 fas fa-check-circle" style="margin-left:-2px;margin-right:7px"></i>Verify</button>
                                                                </form>
                                                                @else
                                                                <form action="{{ route('job.unverif')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" id="id" value="{{$value3->id}}">
                                                                    <input type="hidden" name="verif" id="verif" value="{{auth()->user()->nik}}">
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Disverify this document?');"><i class="fs-18 fas fa-times-circle" style="margin-left:-2px;margin-right:7px"></i>Disverify</button>
                                                                </form>
                                                                @endif
                                                            @endif
                                                            @if($value3->verif1 != null && $value3->verif2 != null && $value3->verif3 != null)
                                                                @if($value3->verif1 == auth()->user()->nik || $value3->verif2 == auth()->user()->nik || $value3->verif3 == auth()->user()->nik)
                                                                <form action="{{ route('job.unverif')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" id="id" value="{{$value3->id}}">
                                                                    <input type="hidden" name="verif" id="verif" value="{{auth()->user()->nik}}">
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Disverify this document?');"><i class="fs-18 fas fa-times-circle" style="margin-left:-2px;margin-right:7px"></i>Disverify</button>
                                                                </form>
                                                                @endif
                                                            @endif

                                                            <!-- Delete  -->
                                                            @if($value3->created_by == auth()->user()->nik)
                                                            <a class="dropdown-item deleteFile" style="color:#FB5B5B" href="{{route('job.delete', $value3->id)}}"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                                            @endif
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
                                            @include('more_program.job_orientation.partials.form-edit')
                                        @endforeach
                                    </div>
                                </div>
                                @foreach($bagian as $key2 => $value2)
                                <div class="tab-pane fade inibagian" departemen="{{$value2['departemen']}}" bagian="{{$value2['departemensubsub']}}" id="{{str_replace([' & ', ' '], '_', $value2['departemen'])}}-{{str_replace([' & ', ' '], '_', $value2['departemensubsub'])}}" role="tabpanel">
                                    <?php 
                                        $listjobs = collect($jobs)->where('departemen', $value['departemen'])->where('bagian', $value2['departemensubsub']);
                                    ?>
                                    <div class="cards-scroll pr-2 scrollY" id="scroll-bar" style="min-height:288px;max-height:745px">
                                        @foreach($listjobs as $key3 => $value3)
                                            <li class="listGroup inti_bagian" id="kumaha_nya{{$value3->id}}" atribut_nih="{{$value3->id}}">
                                                <div class="justify-sb marginMinY">
                                                    <!-- Filter ICON  -->
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
                                                        <!-- Jumlah Verify  -->
                                                        @if($value3->verif1 != null && $value3->verif2 != null && $value3->verif3 != null)
                                                        <div class="popVerify">
                                                            <div class="icon check">
                                                                <div class="tooltip no-wrap">
                                                                    Verified 3 People
                                                                </div>
                                                                <i class="fas fa-check-circle"></i>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <!-- Viewers  -->
                                                        <div class="btnSee">
                                                            <i class="fas fa-eye"></i>
                                                            <div class="seeCount" id="result{{$value3->id}}">{{$value3->viewers}}</div>
                                                        </div>
                                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <!-- Preview -->
                                                            @if($value3->kategori == 'LINK')
                                                            <a class="dropdown-item submit_donwnload" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}" href="{{$value3->dokumen}}" target="_blank" ><i class="fs-18 fas fa-arrow-alt-circle-right" style="margin-left:-2px"></i><span style="margin-left:6px">Goes to</span></a> 
                                                            @elseif($value3->kategori == 'IMAGE')
                                                            <a class="dropdown-item submit_btnqq previewImageBawah{{$value3->id}}" onclick="imageBawah(this.id)" id="{{$value3->id}}" pic-url="{{ asset('storage/job_orientation/image/'.$value3->dokumen) }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @elseif($value3->kategori == 'VIDEO')
                                                            <!-- <a class="dropdown-item submit_media previewVideoAtas{{$value3->id}}" id="{{$value3->id}}" onclick="videoAtas(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a> -->
                                                            <a class="dropdown-item submit_btnqq previewVideoBawah{{$value3->id}}" id="{{$value3->id}}" onclick="videoBawah(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @elseif($value3->kategori == 'PDF')
                                                            <a class="dropdown-item submit_btnqq previewPDFBawah{{$value3->id}}" id="{{$value3->id}}" onclick="pdfBawah(this.id)" pic-url="{{ $value3->dokumen }}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="fs-18 fas fa-eye" style="margin-right:6px;margin-left:-3px"></i>Preview</a>
                                                            @else
                                                            <a href="{{route('job.download', $value3->id)}}" class="dropdown-item submit_donwnload" id="image{{$value3->id}}" atribut_we="{{$value3->id}}" viewers_na="{{$value3->viewers}}"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                                            @endif

                                                            <!-- Modal Detail  -->
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detailFilesBagian-{{$value3->kategori}}-{{$value3->id}}"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                                            
                                                            <!-- Modal Edit  -->
                                                            @if($value3->created_by == auth()->user()->nik)
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editBagian-{{$value3->id}}"><i class="fs-18 fas fa-pencil-alt" style="margin-right:5px"></i>Edit Document</a>
                                                            @endif

                                                            <!-- Buat Verify  -->
                                                            @if($value3->verif1 == null || $value3->verif2 == null || $value3->verif3 == null)
                                                                @if($value3->verif1 != auth()->user()->nik && $value3->verif2 != auth()->user()->nik && $value3->verif3 != auth()->user()->nik)
                                                                <form action="{{ route('job.verif')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" id="id" value="{{$value3->id}}">
                                                                    <input type="hidden" name="verif" id="verif" value="{{auth()->user()->nik}}">
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Verify this document?');" style="color:#0CAE63"><i class="fs-18 fas fa-check-circle" style="margin-left:-2px;margin-right:7px"></i>Verify</button>
                                                                </form>
                                                                @else
                                                                <form action="{{ route('job.unverif')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" id="id" value="{{$value3->id}}">
                                                                    <input type="hidden" name="verif" id="verif" value="{{auth()->user()->nik}}">
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Disverify this document?');"><i class="fs-18 fas fa-times-circle" style="margin-left:-2px;margin-right:7px"></i>Disverify</button>
                                                                </form>
                                                                @endif
                                                            @endif
                                                            <!-- Unverify  -->
                                                            @if($value3->verif1 != null && $value3->verif2 != null && $value3->verif3 != null)
                                                                @if($value3->verif1 == auth()->user()->nik || $value3->verif2 == auth()->user()->nik || $value3->verif3 == auth()->user()->nik)
                                                                <form action="{{ route('job.unverif')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" id="id" value="{{$value3->id}}">
                                                                    <input type="hidden" name="verif" id="verif" value="{{auth()->user()->nik}}">
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Disverify this document?');"><i class="fs-18 fas fa-times-circle" style="margin-left:-2px;margin-right:7px"></i>Disverify</button>
                                                                </form>
                                                                @endif
                                                            @endif

                                                            <!-- Delete  -->
                                                            @if($value3->created_by == auth()->user()->nik)
                                                            <a href="{{route('job.delete', $value3->id)}}" class="dropdown-item deleteFile" style="color:#FB5B5B"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                                            @endif
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
                                            @include('more_program.job_orientation.partials.form-editBagian')
                                        @endforeach
                                    </div>
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