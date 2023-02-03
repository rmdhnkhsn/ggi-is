    <!-- <button class="legend-button2" id="btn-legend">
        <i class="fas fa-headset" id="icons"></i>
    </button>

    <div class="floating-legends fade-Out">
      <div class="floating-contents">
        <div class="tab-content" id="tab-content">
            <div class="tab-pane active" id="first" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul">HI,  {{ auth()->user()->nama }}</div>
                    <div class="sub-judul">they need your help</div>
                </div>
                <div class="bodyChatLeft">
                    <div class="troubleTitle text-left">Chat History</div>
                    <div class="cards-scroll mt-2 pr-1 scrollY list-history-admin" id="scrollBlue" style="height:274px">

                    </div>
                </div>
                <div class="buttonBottom">
                    <div class="relative">
                        <a href="#employeeList" class="btn-blue-md justify-sb" aria-controls="employeeList" role="tab" data-toggle="tab">Send Massage<i class="fs-20 fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="employeeList" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul">Employees List</div>
                    <div class="sub-judul">Do two-way communication</div>
                </div>
                <input type="text" class="form-control chatSearch search2 search-employee" minlength="3" placeholder="search employee name...">
                <div class="cards-scroll mt-3 pr-1 scrollY list-employee" id="scrollBlue" style="height:300px">
                    {{-- <div class="chatHistory">
                        <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                            <div class="content1">
                                <div class="name">Miftah Septyan</div>
                                <div class="bagian">332100185 - IT</div>
                            </div>
                            <div class="content2">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                    <div class="chatHistory">
                        <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                            <div class="content1">
                                <div class="name">Karina</div>
                                <div class="bagian">332100185 - HR & GA</div>
                            </div>
                            <div class="content2">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                    <div class="chatHistory">
                        <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                            <div class="content1">
                                <div class="name">Anika</div>
                                <div class="bagian">332100185 - Accounting</div>
                            </div>
                            <div class="content2">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                    <div class="chatHistory">
                        <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                            <div class="content1">
                                <div class="name">Yusuf</div>
                                <div class="bagian">332100185 - PPIC</div>
                            </div>
                            <div class="content2">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="tab-pane" id="directChat" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul"> {{ auth()->user()->nama }}</div>
                    <div class="sub-judul" style="margin-top:-3px"> {{ auth()->user()->departemensubsub }}</div>
                </div>
                <div class="cards-scroll scrollY pr-1" id="scrollBlue" style="height:300px">
                    {{-- <div class="list-message">
                        <div class="rightChat"><span>p</span></div>
                        <div class="rightChat"><span>p</span></div>
                        <div class="rightChat"><span>p</span></div>
                        <div class="animations">
                            <div class="txt">Menunggu Respon</div>
                            <div class="dot-pulse"></div>
                        </div>
                        <div class="leftChat">
                            <div class="respon">
                                <img src="{{url('images/iconpack/ticketing/cust2.svg')}}">
                                <div class="desc text-truncate">
                                    <div class="name">Ramadhon Ikhsan Prasetya</div>
                                    <div class="txt">Merespon</div>
                                </div>
                            </div>
                        </div>
                        <div class="leftChat"><span>lorem</span></div>
                        <div class="leftChat"><span>lorem</span></div>
                        <div class="leftChat"><span>Lorem ipsum dolor sit amet.</span></div>
                        <div class="leftChat"><span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, neque. Sed, error!</span></div>
                        <div class="rightChat"><span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, neque. Sed, error!</span></div>
        
                        <div class="rightPict">
                            <div class="pictChat">
                                <a href="{{url('images/tes.jpg')}}" data-toggle="lightbox2" data-gallery="gallery">
                                    <img src="{{url('images/tes.jpg')}}" class="pictureChat" />
                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="list-message-admin"> 
                    </div>
                </div>
                <form id="formSubmitMessageAdmin">
                    <input type="hidden" name="message_from" value="admin">
                    <input type="hidden" name="to_nik" class="to_nik">
                    <input type="hidden" name="nama" class="nama">
                    <div class="bottomChat">
                        <div class="relative">
                            <div class="sendChat">
                                <input type="text" class="form-control" name="message" id="write" placeholder="ketik pesan...">
                                <button type="button" class="submit iconSubmit"><i class="fas fa-paper-plane"></i></button>
                            </div>
                            <input type="file" class="d-none" name="gambar" id="attachment">
                            <label for="attachment"><i class="fas fa-paperclip"></i></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

    <script>
        $('#icons').click(function() {         
            if($(this).hasClass('fa-headset')){
                $(this).removeClass('fa-headset');
                $(this).addClass('fa-times');
            }
            else if($(this).hasClass('fa-times')){
                $(this).removeClass('fa-times');
                $(this).addClass('fa-headset');
            }        
        });
    </script> -->