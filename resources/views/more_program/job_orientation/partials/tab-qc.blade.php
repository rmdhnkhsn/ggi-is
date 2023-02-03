<div class="row">
    <div class="col-md-3">
        <div class="cards p-3">
            <img src="{{url('images/job-orientation.svg')}}" style="width:100%" class="imgOrientation">
            <div class="row p-2 mt-3">
                <div class="col-12 justifyFilter">
                    <div class="title-16">Filter <span class="txtNone">Documents</span> By Division</div> 
                    <div class="iconFilter">
                        <i class="icons fas fa-bars" id="icons"></i>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="cards-scroll heightRes pr-2 scrollY" id="scrollBar" style="height:540px">
                        <a href="#" class="filterDivision active" onclick="addActive(event)"><span class="name text-truncate">All Division</span></a>
                        <a href="#" class="filterDivision" onclick="addActive(event)"><span class="name text-truncate">QC Kain</span></a>
                        <a href="#" class="filterDivision" onclick="addActive(event)"><span class="name text-truncate">QC Gudang</span></a>
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
                            <input type="text" class="searchText" placeholder="Search..." required>
                            <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
                        </div>
                        <a href="{{ route('job.upload') }}" class="btn-blue" style="border-radius:10px;padding:0 20px"><span class="uploadName">Upload Document</span><i class="fas fa-file-upload"></i></a> 
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="tab-content">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="justify-sb marginMinY">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/word.svg')}}">
                                        <div class="title-14" style="font-weight:500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, blanditiis! Nam sed autem ratione perferendis aspernatur dignissimos iure aliquam maxime fugiat voluptatum doloribus, odit voluptatibus optio facere enim id quo!</div>
                                    </div>
                                    <div class="btn-group dropJob">
                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                            <a class="dropdown-item" href="#"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                            <a class="dropdown-item" style="color:#FB5B5B" href="#"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="justify-sb marginMinY">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/jpg.svg')}}">
                                        <div class="title-14" style="font-weight:500">Admin Purchasing Work Flow</div>
                                    </div>
                                    <div class="btn-group dropJob">
                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                            <a class="dropdown-item" href="#"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                            <a class="dropdown-item" style="color:#FB5B5B" href="#"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="justify-sb marginMinY">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/excel.svg')}}">
                                        <div class="title-14" style="font-weight:500">Cara hitung FOB</div>
                                    </div>
                                    <div class="btn-group dropJob">
                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                            <a class="dropdown-item" href="#"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                            <a class="dropdown-item" style="color:#FB5B5B" href="#"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="justify-sb marginMinY">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/pdf.svg')}}">
                                        <div class="title-14" style="font-weight:500">RPA Rekap Order</div>
                                    </div>
                                    <div class="btn-group dropJob">
                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                            <a class="dropdown-item" href="#"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                            <a class="dropdown-item" style="color:#FB5B5B" href="#"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="justify-sb marginMinY">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/video.svg')}}">
                                        <div class="title-14" style="font-weight:500">Tutorial Cara Membuat Rekap Order</div>
                                    </div>
                                    <div class="btn-group dropJob">
                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                            <a class="dropdown-item" href="#"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                            <a class="dropdown-item" style="color:#FB5B5B" href="#"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="justify-sb marginMinY">
                                    <div class="justify-start text-truncate mr-3" style="gap:1rem">
                                        <img src="{{url('images/iconpack/job_orientation/link.svg')}}">
                                        <div class="title-14" style="font-weight:500">Tutorial Cara Membuat Rekap Order</div>
                                    </div>
                                    <div class="btn-group dropJob">
                                        <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="mr-2 fs-18 fas fa-file-download"></i>Download</a>
                                            <a class="dropdown-item" href="#"><i class="fs-18 fas fa-info-circle" style="margin-right:6px;margin-left:-2px"></i>Detail Files</a>
                                            <a class="dropdown-item" style="color:#FB5B5B" href="#"><i class="mr-2 fs-18 fas fa-trash"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="col-12 text-center mt-4">
                                <a href="#" class="btn-leadMore">Lead More...</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>