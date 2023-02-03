    <button class="legend-button2" id="btn-legend">
        <i class="fas fa-headset" id="icons"></i>
    </button>

    <div class="floating-legends fade-Out">
      <div class="floating-contents">
        <div class="tab-content" id="tab-content">
            <div class="tab-pane" id="noHistory" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul">HI, , {{ auth()->user()->nama }}</div>
                    <div class="sub-judul">Search tutorial and help here</div>
                </div>
                <div class="bodyChat">
                    <div class="troubleTitle">Looking for tutorials or<br/> looking for help</div>
                    <img src="{{url('images/iconpack/ticketing/troubleshoot.svg')}}">
                </div>
                <div class="buttonBottom">
                    <div class="relative">
                        <a href="#kategori" class="btn-blue-md justify-sb" aria-controls="kategori" role="tab" data-toggle="tab">Send Massage<i class="fs-20 fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
            <div class="tab-pane " id="chatHistory" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul">HI, {{ auth()->user()->nama }}</div>
                    <div class="sub-judul">Search tutorial and help here</div>
                </div>
                <div class="bodyChatLeft">
                    <div class="troubleTitle text-left">Chat History</div>
                    <div class="cards-scroll mt-2 pr-1 scrollY list-history-user" id="scrollBlue" style="height:274px">
                        {{-- <div class="chatHistory">
                            <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                                <div class="content1">
                                    <div class="name">Agus Sugandi</div>
                                    <div class="bagian">Digital Transformation</div>
                                </div>
                                <div class="content2">
                                    <!-- <div class="pills">new</div> -->
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                        <div class="chatHistory">
                            <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                                <div class="content1">
                                    <div class="name">Miftah Septyan</div>
                                    <div class="bagian">IT</div>
                                </div>
                                <div class="content2">
                                    <!-- <div class="pills">new</div> -->
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                        <div class="chatHistory">
                            <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                                <div class="content1">
                                    <div class="name">Andri Mulyadi</div>
                                    <div class="bagian">Digital Transformation</div>
                                </div>
                                <div class="content2">
                                    <!-- <div class="pills">new</div> -->
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                        <div class="chatHistory">
                            <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                                <div class="content1">
                                    <div class="name">Andri Mulyadi</div>
                                    <div class="bagian">Digital Transformation</div>
                                </div>
                                <div class="content2">
                                    <!-- <div class="pills">new</div> -->
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                        <div class="chatHistory">
                            <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
                                <div class="content1">
                                    <div class="name">Andri Mulyadi</div>
                                    <div class="bagian">Digital Transformation</div>
                                </div>
                                <div class="content2">
                                    <!-- <div class="pills">new</div> -->
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="buttonBottom">
                    <div class="relative">
                        <a href="#kategori" class="btn-blue-md justify-sb" aria-controls="kategori" role="tab" data-toggle="tab">Send Massage<i class="fs-20 fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="kategori" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul">HI, Hendra Sugandi</div>
                    <div class="sub-judul">Ask something, select a category below</div>
                </div>
                <div class="cards-scroll mt-2 pr-1 scrollY" id="scrollBlue" style="height:350px">
                    @foreach ($category as $key =>$value)
                        
                    <div class="chatHistory2 show-list-question" data-bagian="{{ $value['bagian'] }}">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">{{ $value['bagian'] }}</div>
                        </a>
                    </div>
                    @endforeach
                    {{-- <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">GCC</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">JDE</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">HRIS</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">PAYROLL BCA</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">PAYROLL NIAGA</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">COMPLIANCE</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">UMUM</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">UMUM</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">UMUM</div>
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="tab-pane" id="document" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul">Related Document</div>
                    <div class="sub-judul">Look for tutorials on job orientation</div>
                </div>
                <input type="text" class="form-control chatSearch" placeholder="search documents...">
                <div class="cards-scroll mt-3 pr-1 scrollY" id="scrollBlue" style="height:250px">
                     @foreach ($dataJobOrientation as $key =>$value)
                        <div class="chatHistory2">
                            <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                                <div class="content">{{ $value['nama_dokumen'] }}</div>
                            </a>
                        </div>
                    @endforeach

                    {{-- <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">Tutorial Step input PO</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">Tutorial Update Status Sales Order (Bom Command)</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content"> Tutorial Input Confirm Shipment</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">Tutorial Input Inventory Transfer (IT)</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">Tutorial Penarikan Data Ledger View di JDE</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">Tutorial Penarikan Data Pemasukan Barang</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">Tutorial Import & Export data SMV ke GCC</div>
                        </a>
                    </div>
                    <div class="chatHistory2">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">
                            <div class="content">Tutorial Custom zabuto calendar</div>
                        </a>
                    </div> --}}
                </div>
                <div class="bottomChat">
                    <div class="relative justify-center" style="gap:.8rem">
                        <a href="#directChat" class="btn-blue-md" style="width:100%" aria-controls="directChat" role="tab" data-toggle="tab">Direct Chat<i class="fs-20 ml-3 fas fa-headset"></i></a>
                        <a href="#" class="btn-outline-blue-md" style="width:100%">Lihat Lainnya<i class="fs-20 ml-3 fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="directChat" role="tabpanel">
                <div class="floating-header">
                    <div class="float-judul">HI, {{ auth()->user()->nama }}</div>
                    <div class="sub-judul" style="margin-top:-3px">{{ auth()->user()->departemensubsub }}</div>
                </div>
                <div class="cards-scroll scrollY pr-1" id="scrollBlue" style="height:300px">
                    <div class="list-message"> 
                    </div>
                    
                    <div class="leftChat">
                        <div class="respon">
                            <!-- <img src="{{url('images/iconpack/ticketing/cust2.svg')}}">
                            <div class="desc text-truncate">
                                <div class="name">Ramadhon Ikhsan Prasetya</div>
                                <div class="txt">Merespon</div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <form id="formSubmitMessage">
                    <input type="hidden" name="bagian" class="bagian">
                    <input type="hidden" name="message_from" value="user">
                    <input type="hidden" name="to_nik" class="to_nik">
                    <div class="bottomChat">
                        <div class="relative">
                            <div class="sendChat">
                                <input type="text" class="form-control message" name="message" placeholder="ketik pesan...">
                                <button type="button" class="submit iconSubmit"><i class="fas fa-paper-plane"></i></button>
                            </div>
                            <input type="file" class="d-none" name="" id="attachment">
                            <label for="attachment"><i class="fas fa-paperclip"></i></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
            });

            // $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function () {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
            });
        })
    </script>