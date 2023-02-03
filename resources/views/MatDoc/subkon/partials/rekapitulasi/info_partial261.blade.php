@extends("layouts.app")
@section("title","Subkon")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-subkon2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
        <div class="flat-card pd-tbl-header">
            <div>
                <h3>Detail</h3>
            </div>
            <div class="flex">
                <div class="sb-header-table justify-sb">
                    <div class="j-first flex">
                        <div class="sj">
                            <div class="title">Nomor AJU SJ</div>
                            <div class="desc">{{$no_aju['no_aju']}}</div>
                        </div>
                        <div class="doc">
                            <div class="title">Nomor Aju Dokumen</div>
                            <div class="desc">{{$no_aju['dok_aju']}}</div>
                        </div>
                        <div class="daftar">
                            <div class="title">Nomor Daftar</div>
                            <div class="desc">{{$no_aju['no_daftar']}}</div> 
                        </div>
                        <div class="daftar">
                            <div class="title">BM</div>
                            <div class="desc">{{number_format($no_aju['bm'], 2, ",", ".")}}</div> 
                        </div>
                        <div class="daftar">
                            <div class="title">PPN</div>
                            <div class="desc">{{number_format($no_aju['ppn'], 2, ",", ".")}}</div> 
                        </div>
                        <div class="daftar">
                            <div class="title">PPH</div>
                            <div class="desc">{{number_format($no_aju['pph'], 2, ",", ".")}}</div> 
                        </div>
                        <div class="fa-container-action flex">
                        </div>
                    </div>
                    <div class="sb-date flex">
                        <div class="desc mr-3">{{$no_aju['tanggal']}}</div> 
                    </div>
                </div>
            </div>
            <div class="row scrollX" id="scroll-bar">
                <div class="col-12">
                    <table class="table sb-tbl-content no-wrap">
                        <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Jenis Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patrial_aju as $key=>$value)
                            <tr>
                                <td>{{$value['item_number']}}</td>
                                <td>{{$value['deskripsi']}}</td>
                                <td>{{$value['qty']}}</td>
                                <td>{{$value['satuan']}}</td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="position-relative">
                <div class="sb-header-table justify-sb position-relative w-100">
                <div class="j-first flex">
                    <div class="jaminan position-absolute d-flex my-au">
                    <h3>Nilai jaminan : Rp {{number_format($no_aju['total_jaminan'], 2, ",", ".")}}</h3>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="row my-4">
                @if($dok->gbr1 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr1") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr1") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr2 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr2") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr2") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr3 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr3") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr3") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr4 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr4") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr4") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr5 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr5") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr5") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr6 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr6") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr6") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr7 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr7") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr7") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr8 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr8") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr8") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr9 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr9") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr9") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
                @if($dok->gbr10 != NULL)
                <div class="col-pj my-2">
                    <a href="{{ url("matdok/subkon/$dok->gbr10") }}" class="fa-images" data-toggle="lightbox" data-gallery="gallery">
                        <img src="{{ url("matdok/subkon/$dok->gbr10") }}" class="fa-images mt-lightbox">
                    </a>
                </div>
                @endif
            </div>

            <div class="row">
                @if($dok->file1 != NULL)
                <div class="col-12" id="accordion1">
                    <div class="cards">
                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                            <i class="accord-icon fas fa-file-contract"></i>   
                            <div class="accordion-title">{{$dok->file1}}</div>
                        </div>
                        <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                            <div class="cards accordion-body text-center"> 
                                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('matdok/subkon/'.$dok->file1)) }}" width="100%" height="750"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($dok->file2 != NULL)
                <div class="col-12" id="accordion2">
                    <div class="cards">
                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                            <i class="accord-icon fas fa-file-contract"></i>   
                            <div class="accordion-title">{{$dok->file2}}</div>
                        </div>
                        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion2">
                            <div class="cards accordion-body text-center"> 
                                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('matdok/subkon/'.$dok->file2)) }}" width="100%" height="750"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($dok->file3 != NULL)
                <div class="col-12" id="accordion3">
                    <div class="cards">
                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                            <i class="accord-icon fas fa-file-contract"></i>   
                            <div class="accordion-title">{{$dok->file3}}</div>
                        </div>
                        <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion3">
                            <div class="cards accordion-body text-center"> 
                                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('matdok/subkon/'.$dok->file3)) }}" width="100%" height="750"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($dok->file4 != NULL)
                <div class="col-12" id="accordion4">
                    <div class="cards">
                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo4" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                            <i class="accord-icon fas fa-file-contract"></i>   
                            <div class="accordion-title">{{$dok->file4}}</div>
                        </div>
                        <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion4">
                            <div class="cards accordion-body text-center"> 
                                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('matdok/subkon/'.$dok->file4)) }}" width="100%" height="750"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($dok->file4 != NULL)
                <div class="col-12" id="accordion5">
                    <div class="cards">
                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                            <i class="accord-icon fas fa-file-contract"></i>   
                            <div class="accordion-title">{{$dok->file5}}</div>
                        </div>
                        <div id="collapseTwo5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion5">
                            <div class="cards accordion-body text-center"> 
                                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('matdok/subkon/'.$dok->file5)) }}" width="100%" height="750"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($dok->file4 != NULL)
                <div class="col-12" id="accordion6">
                    <div class="cards">
                        <div class="card-header accordion-header" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                            <i class="accord-icon fas fa-file-contract"></i>   
                            <div class="accordion-title">{{$dok->file6}}</div>
                        </div>
                        <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion6">
                            <div class="cards accordion-body text-center"> 
                                <iframe  id="pdf-js-viewer" src="{{ url('/web/viewer.html?file='.asset('matdok/subkon/'.$dok->file6)) }}" width="100%" height="750"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>       
  </div>
</section>
@endsection

@push("scripts")
<script>
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

@endpush