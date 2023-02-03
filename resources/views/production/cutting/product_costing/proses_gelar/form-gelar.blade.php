@extends("layouts.app")
@section("title","Form Gelar")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")

<section class="content">
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-12 justify-center">
          <span class="ctg-ppic-title">Form Gelar</span>
        </div>
      </div>
      <div class="row pb-5">
          <div class="col-md-9 mr-auto ml-auto">
            <div class="row">
              <div class="col-xl-6 col-lg-6 mb-2">
                <div class="fa-cards flex">
                  <div class="fa-start-time">
                    Start Time
                  </div>
                  <div class="fa-start-desc">
                    @if($tanggal_mulai != null)
                      {{$tanggal_mulai->start_time}}
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 mb-2">
                <div class="fa-cards flex">
                  <div class="fa-proses-time">
                    Process Time
                  </div>
                  <div class="fa-proses-desc">
                    <div id="timerz">
                      <span id="hours">00:</span>
                      <span id="minutes">00:</span>    
                      <span id="seconds">00</span>    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 mb-2">
                <div class="fa-cards p-3 scrollX" id="scroll-bar">
                  <table class="wp-table title-content2 text-left no-wrap">
                      <tr>
                          <td width="55%" class="fw-6">Form ID</td>
                          <td width="45%" class="fw-4">Form {{$form->id}}</td>
                      </tr>
                      <tr>
                          <td width="55%" class="fw-6">Tanggal</td>
                          <td width="45%" class="fw-4">{{$form->date}}</td>
                      </tr>
                  </table>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 mb-2">
                <div class="fa-cards h-109 p-3">
                  <div class="cards-scroll pb-1 scrollX" id="scroll-bar">
                    <table class="wp-table title-content2 text-center no-wrap">
                      <thead class="bg-thead">
                        <tr>
                          <th>Panjang Marker</th>
                          <th>Lebar Marker</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{$form->panjang_marker}}</td>
                          <td>{{$form->lebar_marker}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 mb-2">
                <div class="fa-cards h-148 p-3 scrollX" id="scroll-bar">
                  <div class="cards-scroll pr-1 h-115 scroll" id="scroll-bar">
                    <table class="wp-table title-content2 text-left no-wrap" data-toggle="modal" data-target="#modal_gelar" style="cursor:pointer">
                      <tr>
                        <th>WO</th>
                        <th>Buyer</th>
                        <th>Color</th>
                        <th>Qty</th>
                        <th>P-Kain</th>
                      </tr>
                      @foreach($form->gelaran_wo as $key => $value)
                      <tr>
                        <td>{{$value->no_wo}}</td>
                        <td>{{$value->buyer}}</td>
                        <td>{{$value->color}}</td>
                        <td>{{$value->total_qty}}</td>
                        <td>{{$value->pemakaian_kain}}</td>
                      </tr>
                      @endforeach
                    </table>
                    <div class="modal fade" id="modal_gelar" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content" style="border-radius:10px">
                          <div class="row">
                            <div class="col-12 pt-3 px-4">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                              </button>
                            </div>
                          </div>
                          <div class="row p-3">
                              <div class="col-12">
                                <table class="wp-table title-content2 table-striped no-wrap">
                                  <thead>
                                    <tr>
                                      <th class="text-left">Daftar Kain</th>
                                      <th>Total Qty</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($form->pemakaian_kain as $key5 => $value5)
                                    <tr>
                                      <td class="text-left">{{$value5->color}}</td>
                                      <td>{{$value5->consumption}}</td>
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
              <div class="col-xl-6 col-lg-6 mb-2">
                <div class="fa-cards p-3 scrollX" id="scroll-bar">
                  <table class="wp-table title-content2 text-center no-wrap">
                    @include('production.cutting.product_costing.proses_gelar.partials.assortmarker')
                  </table>
                </div>
              </div>
            </div>
            <div class="row mt-mins">
              @include('production.cutting.product_costing.proses_gelar.partials.proses_gelar')
              @include('production.cutting.product_costing.proses_gelar.partials.form-modal')
              @include('production.cutting.product_costing.proses_gelar.partials.breakdown_qty') 
            </div>
            <form id="finish" action="{{ route('gelar.finish')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="wp-input-group-select">Remarks</span>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$form->id}}">
                    <input type="hidden" name="proses" id="proses" value="Proses Gelar">
                    <input type="hidden" name="sequence" id="sequence" value="20">
                    <input type="hidden" id="start_time" name="start_time" value="{{$tanggal_mulai->start_time}}">  
                    <input type="hidden" id="finish_time" name="finish_time" value="{{$finish}}">  
                    <input type="hidden" id="input_jam" name="hours">  
                    <input type="hidden" id="input_menit" name="minutes">  
                    <input type="hidden" id="input_detik" name="seconds">  
                    <select class="form-control border-input" id="remark" name="remark">
                        <option {{ $form->remark == 'Tidak Istirahat' ? 'selected' : ''}} value="Tidak Istirahat">Tidak Istirahat</option>
                        <option {{ $form->remark == 'Istirahat' ? 'selected' : ''}} value="Istirahat">Istirahat</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <a href="{{route('cutting.pemakaian_kain', $form->id)}}" class="btn-blue w-100">Print Label Kain<i class="ml-2 fs-20 fas fa-print"></i></a>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn-blue w-100">Finish<i class="ml-2 fs-20 fas fa-arrow-right"></i></button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>
    document.getElementById('finish').addEventListener('submit', function() {
        showLoading();
    });
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
                }, 10000)
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

</script>
<script>
    if (sessionStorage.getItem("total_detik")) {
        var detik = sessionStorage.getItem("total_detik");
    } else {
        var detik = 0;
    }

    var totalSeconds = 0;
    var counter = function () {
      ++totalSeconds;
      if (totalSeconds == 0) {
          sessionStorage.setItem("total_detik", totalSeconds);
          detik = 0;
        } else {
          detik =  parseInt(detik) + 1;

          sessionStorage.setItem("total_detik", detik);
        }
        var hour = Math.floor(detik /3600);
        var minute = Math.floor((detik - hour*3600)/60);
        var seconds = detik - (hour*3600 + minute*60);
        if(hour < 10)
          hour = "0"+hour;
        if(minute < 10)
          minute = "0"+minute;
        if(seconds < 10)
          seconds = "0"+seconds;
        document.getElementById("hours").innerHTML = hour+':';
        document.getElementById("minutes").innerHTML = minute+':';
        document.getElementById("seconds").innerHTML = seconds;
        
        $('#input_jam').val(hour);
        $('#input_menit').val(minute);
        $('#input_detik').val(seconds);

    };
    var interval = setInterval(counter, 1000);

 
</script>
<script>
function add_more() {
  document.getElementById("table_gelar")
  .insertRow(-1).innerHTML =                                                                                                                                                                                                                                     
  '<tr> <td><select class="dropdown-select" id="no_wo[]" name="no_wo[]" required="required"><option selected></option> @foreach($dataWO as $key => $value)<option value="{{$key}}">{{$key}}</option>@endforeach</select></td><td><div class="input-group"><input type="text" class="form-control border-input" id="no_roll[]" name="no_roll[]" placeholder=""><input type="hidden" class="form-control border-input" id="form_id[]" name="form_id[]" value="{{$form->id}}" placeholder=""></div></td><td> <select class="dropdown-select" id="color[]" name="color[]" required="required"><option selected></option>@foreach($color as $key => $value)<option value="{{$key}}">{{$key}}</option>@endforeach</select></td><td><div class="input-group"><input type="text" class="form-control border-input" id="qty_roll[]" name="qty_roll[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="qty_gelar[]" name="qty_gelar[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="qty_potong[]" name="qty_potong[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="terpakai[]" name="terpakai[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="tidak_terpakai[]" name="tidak_terpakai[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="keterangan[]" name="keterangan[]" placeholder=""></div></td></tr>';
}
</script>
<script>
function tambah_lagi() {
  document.getElementById("table_add")
  .insertRow(-1).innerHTML =                                                                                                                                                                                                                                     
  '<tr> <td><select class="dropdown-select" id="no_wo[]" name="no_wo[]" required="required"><option selected></option> @foreach($dataWO as $key => $value)<option value="{{$key}}">{{$key}}</option>@endforeach</select></td><td><div class="input-group"><input type="text" class="form-control border-input" id="no_roll[]" name="no_roll[]" placeholder=""><input type="hidden" class="form-control border-input" id="form_id[]" name="form_id[]" value="{{$form->id}}" placeholder=""></div></td><td> <select class="dropdown-select" id="color[]" name="color[]" required="required"><option selected></option>@foreach($color as $key => $value)<option value="{{$key}}">{{$key}}</option>@endforeach</select></td><td><div class="input-group"><input type="text" class="form-control border-input" id="qty_roll[]" name="qty_roll[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="qty_gelar[]" name="qty_gelar[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="qty_potong[]" name="qty_potong[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="terpakai[]" name="terpakai[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="tidak_terpakai[]" name="tidak_terpakai[]" placeholder=""></div></td><td><div class="input-group"><input type="text" class="form-control border-input" id="keterangan[]" name="keterangan[]" placeholder=""></div></td></tr>';
}
</script>

@endpush