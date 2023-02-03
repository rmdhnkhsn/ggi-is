@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart3.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2GreyFull.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/toastr.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<style>
  .nav-tabs {
    border-bottom: none !important
  }
</style>
@endpush

@push("sidebar")
  @include('production.layouts.navbar_sewing')
@endpush
@section("content")
<section class="content position-relative">
  <div class="container-fluid accordionIcon">
    <div class="row">
      <div class="col-md-6">
        <div class="cardFlat" style="margin-bottom:-1px">
          <ul class="nav nav-tabs blue-md-tabs2 justify-start d-flex" role="tablist">
            <li class="nav-item-show flex-fill">
              <a href="#" class="nav-link active">Daily Sewing</a>
              <div class="blue-slide2 w-50"></div>
            </li>
            <li class="nav-item-show flex-fill">
              <a href="{{route('prd.sewing.persiapan')}}" class="nav-link">Persiapan Sewing</a>
              <div class="blue-slide2 w-50"></div>
            </li>
          </ul>
        </div>
        <div class="cardFlat p-4">
          <form id="upload" name="custForm" action="{{route ('prd.sewing.import')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <div class="title-24-dark2">Upload Document Output Sewing</div>
              </div>
              <div class="col-12 mb-3">
                <div class="title-sm">Upload Document</div>
                <div class="customFile mt-1">
                  <input type="file" class="customFileInput" id="customFile" name="file" value="" accept=".xlsx, .xls, .csv" required >
                  <label class="customFileLabelsBlue" for="customFile">
                      <span class="chooseFile"></span>
                  </label>
                </div>
                <div class="alert-upload">**Tidak diperbolehkan untuk upload lebih dari satu tanggal produksi.</div>  
              </div>
              @foreach($dataBranch as $db)
                <div class="col-md-6">
                  <div class="justify-start">
                    <div class="radioContainer">
                      <input type="radio" name="branch" id="{{$db->branchdetail}}" class="radioCustomInput" value="{{$db->id}}" checked>
                      <label for="{{$db->branchdetail}}" class="radioCustoms"></label>
                    </div>
                    <label for="{{$db->branchdetail}}" class="label-radio">{{$db->nama_branch}}</label>
                  </div>
                </div>
              @endforeach
              <div class="col-12 mt-3">

                @if(count($loss_target_line)==0)
                  <button type="submit" class="btn-blue-md w-100">Simpan <i class="fs-18 ml-3 fas fa-caret-right"></i></button>
                @else
                  <div class="alert-upload">Harap isi dahulu alasan disamping agar dapat mengupload sewing</div>  
                @endif
              </div>
            </div>
          </form>
        </div>
        <div class="dotSpace my-4">
          <div class="dot1"></div>
          <div class="dot2"></div>
          <div class="dot3"></div>
          <div class="dot4"></div>
        </div>
      </div>
      <div class="col-md-6">
        @if($errors->any())
        <div class="accordionItem">
          <header class="accordionHeaders">
            <div class="dangerIcon">
              <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="justify-sb w-100">
              <div class="judul no-wrap">WO TIDAK MATCH</div>
              <div class="icons">
                <div class="chevron">
                  <i class="fas fa-angle-left"></i>
                </div>
              </div>
            </div>
          </header>
          <div class="accordionContents">
            <div class="bodyContent">
              <div class="row">
                <div class="col-12">
                  <div class="card-close-pink mt-2 py-1 px-2">
                    <div class="title-12-grey3">HARAP HUBUNGI PPIC</div>
                    <div class="justify-start">
                      <div class="txt-pink">**WO Tidak Match dengan Line atau WO Belum di schedule, Silahkan upload ulang file excel daily output sewing, Jika WO Tersebut sudah dischedule.</div>
                      <button type="button" class="close-icon mb-3" data-effect="fadeOut"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <div class="cards-scroll scrollY maxh-300" id="scroll-bar-sm">
                    <!-- <table class="tables3 tbl-content-cost no-wrap">
                      <thead class="stickyHeader2 bg-thead2">
                        <tr>
                          <th>NO</th>
                          <th>WO</th>
                          <th>LINE</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>175456</td>
                          <td>1A</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>175456</td>
                          <td>1A</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>175456</td>
                          <td>1B</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>175456</td>
                          <td>1C</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>175456</td>
                          <td>1D</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>175456</td>
                          <td>1E</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>175456</td>
                          <td>1E</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>175456</td>
                          <td>1E</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td>175456</td>
                          <td>1E</td>
                        </tr>
                      </tbody>
                    </table> -->
                      <ul class="list-group mb-2">
                        @foreach ($errors->all() as $error)
                          <li class="list-group-item title-14-dark2">{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if(count($loss_target_line)>0)
        <div class="accordionItem" style="max-height:500px">
          <header class="accordionHeaders">
            <div class="dangerIcon">
              <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="justify-sb w-100">
              <div class="judul no-wrap">TARGET TIDAK TERCAPAI</div>
              <div class="icons">
                <div class="chevron">
                  <i class="fas fa-angle-left"></i>
                </div>
              </div>
            </div>
          </header>
          <div class="accordionContents">
            <div class="bodyContent">
              <form action="{{route('prd.sewing.targetlostupdate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="card-close-pink mt-2 py-1 px-2">
                      <div class="title-12-grey3">BERIKUT DAFTAR TARGET TIDAK TERCAPAI LINE SEWING</div>
                      <div class="justify-sb">
                        <div class="txt-pink">**Silahkan isi alasan, Kenapa tidak tercapainya target pada tanggal tersebut.</div>
                        <button type="button" class="close-icon" data-effect="fadeOut" style="margin-top:-8px"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-3">
                    <div class="cards-scroll scrollY maxh-300" id="scroll-bar-sm">
                      <table class="tables3 tbl-content-cost no-wrap">
                        <thead class="stickyHeader bg-thead2">
                          <tr>
                            <th>FACTORY</th>
                            <th>LINE</th>
                            <th>TANGGAL</th>
                            <th>ALASAN</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($loss_target_line as $d)
                          <input type="hidden" name="ids[]" value="{{$d->id}}">
                          <tr>
                            <td>{{$d->factory}}</td>
                            <td>{{$d->line}}</td>
                            <td>{{$d->tanggal}}</td>
                            <td>
                              <div class="container-tbl-btn">
                                <select class="form-control borderInput select2bs4 pointer" name="reason[]">
                                  <option value="" selected disabled>Pilih Alasan</option>
                                  <option value="Mesin rusak">Mesin rusak</option>  
                                  <option value="Tunggu mika">Tunggu mika</option>  
                                  <option value="Output persiapan kurang">Output persiapan kurang</option>  
                                  <option value="Absensi">Absensi</option>  
                                  <option value="Ganti style">Ganti style</option>  
                                  <option value="Quality issue">Quality issue</option> 
                                  <option value="Kurang supply hanca cutting">Kurang supply hanca cutting</option>    
                                  <option value="Temporary order, style berikutnya belum siap">Temporary order, style berikutnya belum siap</option>    
                                  <option value="Ganti reject / mengerjakan balance order">Ganti reject / mengerjakan balance order</option>    
                                  <option value="Issue preparation (material blm datang, belum PPM, belum approve jalan produksi)">Issue preparation (material blm datang, belum PPM, belum approve jalan produksi)</option>     
                                  <option value="Target tercapai, cost tidak">Target tercapai, cost tidak</option>
                                </select>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="borderLight"></div>
                <div class="accordionFooter">
                  <button type="submit" class="btn-blue-md">Simpan <i class="fs-18 ml-2 fas fa-caret-right"></i></button>
                </div>
              </form>
            </div>
          </div> 
        </div>
        @endif
      </div>
    </div>

    <div class="row mt-3 pb-4">
      <div class="col-12">
        <div class="cardPart">
          <div class="cardHead">
            <div class="joblist-date p-3 gap-3">
              <div class="title-20-dark2 no-wrap mt-1">Data Monitoring Production [PLOT]</div>
              <div class="margin-date justify-start" style="gap:.6rem">
                <div class="title-sm title-none">Filter</div>
                <div class="title-none">:</div>
                <div class="input-group date" id="report_date" data-target-input="nearest">
                  <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                    <div class="inputGroupBlue" ><i class="fs-20 fas fa-calendar-alt"></i> <span class="fs-14"></span><i class="ml-2 fas fa-caret-down"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input borderInput" data-target="#report_date" value="{{$bulan}}" placeholder="Select Date" style="width: 130px"/>
                </div>
              </div>
              <input type="hidden" id="month" type="text" value="{{$bulan}}" />
            </div>
          </div>
          <div class="section3"></div>
          <div class="cardBody p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable" class="tables3 tbl-content-cost no-wrap" style="width:100%">
                    <thead class="bg-thead2">
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>WO Number</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Line</th>
                        <th>Branch</th>
                        <th>Today</th>
                        <th>Order(WO)</th>
                        <th>Terpenuhi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=0;?>
                      @foreach ($Qty_Output as $key => $value)
                      <?php $no++;?>
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{ $value['tanggal'] }}</td>
                        <td>{{ $value['wo'] }}</td>
                        <td>{{ $value['buyer'] }}</td>
                        <td>{{ $value['style'] }}</td>
                        <td>{{ $value['line'] }}</td>
                        <td>{{ $value['branchdetail'] }}</td>
                        <td>{{ $value['output_day'] }}</td>
                        <td>{{ $value['qty_order'] }}</td>
                        <td>{{ $value['total_output'] }}</td>
                      </tr>            
                      @endforeach  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <div class="col-12 mt-3">
        <div class="cardPart">
          <div class="cardHead">
            <div class="joblist-date p-3 gap-3">
              <div class="title-20-dark2 no-wrap mt-1">Data Monitoring Production [UNPLANNED]</div>
              <button class="btn-blue-md" style="opacity:0">x</button>
            </div>
          </div>
          <div class="section3"></div>
          <div class="cardBody p-3">
            <div class="row">
              <div class="col-12 pb-5">
                <button id="btnSearch"><i class="fas fa-search"></i></button>  
                <div class="cards-scroll scrollX" id="scroll-bar">
                  <table id="DTtable2" class="tables3 tbl-content-cost no-wrap" style="width:100%">
                    <thead class="bg-thead2">
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>WO Number</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Line</th>
                        <th>Branch</th>
                        <th>Today</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=0;?>
                      @foreach ($result as $key2 => $value2)
                        <?php $no++;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $value2['tanggal'] }}</td>
                            <td>{{ $value2['wo'] }}</td>
                            <td>{{ $value2['buyer'] }}</td>
                            <td>{{ $value2['style'] }}</td>
                            <td>{{ $value2['line'] }}</td>
                            <td>{{ $value2['branchdetail'] }}</td>
                            <td>{{ $value2['total_outpot'] }}</td>
                        </tr>            
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
@if(Session::has('error'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    var meseg = "{{Session::get('error')}}";
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: meseg
      })
    }
  </script>
@endif

@if(Session::has('noMatch'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    // var meseg = "{{Session::get('noMatch')}}";
    // var a="{{(session()->get('noMatch'))}}"
    // console.log('a');
    // window.onload = function() { 
    //     Swal.fire({
    //     icon: 'error',
    //     title: 'Oops...',
    //     text: meseg
    //   })
    // }
  </script>
@endif

@if(Session::has('success'))
  <script>
    // toastr.success("{!!Session::get('success')!!}");
    window.onload = function() {
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Data Berhasil Disimpan',
      showConfirmButton: false,
      timer: 1500
      })
    };
  </script>
@endif

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollX : '100%',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
      scrollX : '100%',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>
  
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>
    document.getElementById('upload').addEventListener('submit', function() {
        showLoading();
    });
    function showSuccessAlert(){
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 5500
        })
    }
    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'Please Wait . . .',
            html: ' ',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                showSuccessAlert()
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }

  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '190px');
  });

  $('.close-icon').on('click',function() {
    $(this).closest('.card-close-pink').fadeOut();
  })

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<!-- <script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    $('#report_date2').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
      if (filter_count > 0) {
        var month = $("#report_date").find("input").val();
        location.replace("{{ url('prd/sewing?filter=') }}"+month) 
      }
      filter_count++
    })
    var month = $("#month").val();
    $('.input-date-fa').val(month)
  });
</script> -->

<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    $('#report_date2').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
    
    // var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
      // if (filter_count > 0) {
        var month = $("#report_date").find("input").val();
        location.replace("{{ url('prd/sewing?filter=') }}"+month) 
      // }
      // filter_count++
    })
    // var month = $("#month").val();
    // $('.input-date-fa').val(month)
  });
</script>
<script>
  $( document ).ready(function() {
    const toggleItem = (item) =>{
      console.log('sip')
      const accordionContent = item.querySelector('.accordionContents')

      if(item.classList.contains('accordion-open')){
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
      }else{
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
      }
    }

    const accordionItem = document.querySelectorAll('.accordionItem')
    const openItem = document.querySelector('.accordion-open')
    toggleItem(accordionItem[0])
    if(openItem && openItem!== item){
      toggleItem(openItem)
    }

    accordionItem.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeaders')

      accordionHeader.addEventListener('click', () =>{
        const openItem = document.querySelector('.accordion-open')
        
        toggleItem(item)

        if(openItem && openItem!== item){
            toggleItem(openItem)
        }
      })
    })
  });

</script>
@endpush