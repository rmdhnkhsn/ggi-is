@include('Career.layouts.header')
@include('Career.layouts.navbar')

<div class="content-wrapper bg-career">
  <div class="content-header"></div>
    <section class="content pt-4 Career">
      <div class="container-fluid">
        <div class="row pdCustom" style="padding-bottom:7rem">
          <div class="col-12 mb-5">
          </div>
          <div class="col-lg-8">
            <div class="cards" style="padding:2.6rem">
              <div class="row">
                <div class="col-12">
                  <div class="title-20">Description</div>
                  <div class="borderOrange2"></div>
                  <div class="sub-title-14 mt-3">
                    {!! $data->ers_vacancy->uraian_singkat !!}
                  </div>
                  <div class="sub-title-14 my-1" style="font-weight:600">
                    Job Desk
                  </div>
                  {!! $data->ers_vacancy->jobdesk !!}
                </div>
                <div class="col-12 mt-4">
                  <div class="title-20">Requirements</div>
                  <div class="borderOrange2"></div>
                  <div class="sub-title-14 mt-1 px-2">
                    <li>{{$data->note5}} {{$data->note6}}</li>
                    <li>@if($data->num1 != null)
                        Age Min {{$data->num1}} - Max {{$data->ers_vacancy->maximal_usia}}th
                        @else
                        Age Max {{$data->ers_vacancy->maximal_usia}}th
                        @endif
                    </li>
                    <li>{{$data->note8}}</li>
                    <li>Min {{$data->note7}} year experience</li>
                    <li>{{$data->ers_vacancy->info_lainnya}}</li>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="title-20">Benefits</div>
                  <div class="borderOrange2"></div>
                  <div class="sub-title-14 mt-3">
                    {!! $data->ers_vacancy->other_benefit !!}
                    Range Gaji Rp. {{number_format($data->ers_vacancy->minimal_salary, 2, ",", ".")}} - Rp. {{number_format($data->ers_vacancy->maximal_salary, 2, ",", ".")}}
                  </div>
                </div>
                <div class="col-12 my-5" id="ApplyJob">
                  <div class="borderGrey"></div>
                </div>
              </div>
              <form action="{{ route('applicant-job')}}" id="tes_simpan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 mb-5">
                    <div class="title-24 text-center">Apply This Job</div> 
                    <div class="title-14-grey text-center">You must fill out the form below to apply for this job</div>
                    <div class="justify-center mt-1">
                      <div class="borderOrange"></div>
                    </div>
                  </div>
                  <input type="hidden" id="ers_id" name="ers_id" value="{{$data->ers_id}}">
                  <div class="col-md-6 my-2">
                    <span class="title-sm">NIK (KTP)</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="nik" name="nik" placeholder="your nik number..." required>
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <span class="title-sm">Name</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="nama" name="nama" placeholder="your name..." required>
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <span class="title-sm">Gender</span>
                    <div class="input-group flex mt-1">
                      <div class="input-group-prepend">
                        <span class="inputGroupOrange"><i class="fas fa-venus-mars" style="font-size:20px"></i></span>
                      </div>
                      <select class="form-control border-input-10 select2bs4" name="gender" id="gender">
                          <option selected disabled>Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <span class="title-sm">Date Of Birth</span>
                    <div class="input-group date mt-1">
                      <div class="input-group-append">
                        <div class="inputGroupOrange"><i class="fas fa-calendar-alt" style="font-size:20px"></i></div>
                      </div>
                      <input type="date" id="ttl" name="ttl" class="form-control border-input-10" placeholder="Select Date"/>
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Address</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="address" name="address" placeholder="your address...">
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <span class="title-sm">Education</span>
                    <div class="input-group flex mt-1">
                      <div class="input-group-prepend">
                        <span class="inputGroupOrange"><i class="fas fa-graduation-cap" style="font-size:20px"></i></span>
                      </div>
                        <select class="form-control border-input-10 select2bs4" name="education" id="education">
                          <option selected disabled>Your Education</option>
                          <option value="1">Elementary Schools (SD)</option>
                          <option value="2">Junior High School (SMP/SLTP)</option>
                          <option value="3">Senior High School (SMA/SLTA)</option>
                          <option value="4">D1</option>
                          <option value="5">D2</option>
                          <option value="6">D3</option>
                          <option value="7">S1</option>
                          <option value="8">S2</option>
                          <option value="9">S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 my-2">
                    <span class="title-sm">Major</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="major" name="major" placeholder="your major...">
                    </div>
                  </div>
                  <div class="col-md-2 my-2">
                    <span class="title-sm">IPK/GPA</span>
                    <div class="input-group mt-1">
                      <input type="number" step="0.01" class="form-control border-input-10" id="ipk" name="ipk" placeholder="your IPK...">
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <span class="title-sm">Email</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="email" name="email" placeholder="your email..." required>
                    </div>
                  </div>
                  <div class="col-md-6 my-2">
                    <span class="title-sm">Telphone Connect WA</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="tlp" name="tlp" placeholder="your telphone...">
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Short Resume</span>
                    <div class="messageGrey mt-1">
                      <textarea class="form-control border-input-10" name="short_resume" placeholder="tell me briefly about yourself..." style="height:90px"></textarea>
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Aplication Letter</span>
                    <span class="txt-pink">*Format Must be in Pdf Format</span>
                    <div class="customFile mt-2">
                      <input type="file" class="customFileInput" id="customFile" name="application_letter" value="" accept=".pdf">
                      <label class="customFileLabelsOrange" for="customFile">
                      <span class="chooseFile"></span></label>
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Award 1</span>
                    <span class="txt-pink">*Fill in if you have award history</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="award1" name="award1" placeholder="your award...">
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Award 2</span>
                    <span class="txt-pink">*Fill in if you have award history</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="award2" name="award2" placeholder="your award...">
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Award 3</span>
                    <span class="txt-pink">*Fill in if you have award history</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="award3" name="award3" placeholder="your award...">
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Award 4</span>
                    <span class="txt-pink">*Fill in if you have award history</span>
                    <div class="input-group mt-1">
                      <input type="text" class="form-control border-input-10" id="award4" name="award4" placeholder="your award...">
                    </div>
                  </div>
                  <div class="col-12 my-2">
                    <span class="title-sm">Award</span>
                    <span class="txt-pink">*Insert All Award in One Document & Format Must be in Pdf Format</span>
                    <div class="customFile mt-2">
                      <input type="file" class="customFileInput" id="customFileAward" name="award" value="" accept=".pdf">
                      <label class="customFileLabelsOrange" for="customFileAward">
                      <span class="chooseFile"></span></label>
                    </div>
                  </div>
                  <div class="col-12 mt-5">
                    <button type="submit" class="btn-orange-md">Submit Application</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cards sticky-top-career" style="padding: 28px 25px">
              <img src="{{url('images/career.png')}}">
              <div class="title-32 uppercase truncate my-3">{{ Str::upper($data['string4']) }}</div>
              <div class="statusJob">
                <i class="iconJob fas fa-city"></i>
                <div class="title2">{{$data['string4']}}</div>
              </div>
              <div class="statusJob">
                <i class="iconJob fas fa-network-wired"></i>
                <div class="title2">{{$data->ers_vacancy->penempatan}}</div>
              </div>
              <div class="statusJob">
                <i class="iconJob fas fa-users"></i>
                <div class="title2">{{$data['string3']}} People</div>
              </div>
              <div class="buttonJob mt-3">
                <!-- <a href="{{ route('apply-job', $data['ers_id']) }}" class="btn-orange-md">Apply Job</a> -->
                <a href="#ApplyJob" class="btn-orange-md">Apply Job</a>
              </div>
              <div class="more text-center" style="margin-top:2.5rem">
                <div class="title-14-grey">Not what you had in mind?</div>
                <a href="" class="btn-details">See Related Job</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@include('Career.layouts.footer')
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
@if(Session::has('nik_kosong'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'NIK Tidak Boleh Kosong !'
      })
    }
  </script>
@endif
@if(Session::has('sudah_lamar'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Anda Sudah Pernah Melamar Posisi Ini !'
      })
    }
  </script>
@endif
<script>
  document.getElementById('tes_simpan').addEventListener('submit', function() {
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
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
                // showSuccessAlert()
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
  $(document).ready(function(){
    const options = document.getElementsByClassName('select2-selection--single');
    Array.from(options).forEach(function (element) {
        element.style = "height : 40px !important";
    });
	});
  // ===========
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  $('#Date').datetimepicker({
    format: 'YYYY-MM-DD',
    showButtonPanel: false
  })
  $(".customFileInput").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabelsOrange").addClass("selected").html(fileName).css('padding-left', '190px');
  });
</script>
<script>
  function readURL_fa(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('.image-upload-wrap-fa').hide();

          reader.onload = function (e) {
              $(".file-upload-image-fa").attr("src", e.target.result);
              $(".file-upload-content-fa").show();
              $('.image-title').html(input.files[0]);
              // $('.image-title').html(input.files[0].name);
          };

          reader.readAsDataURL(input.files[0]);

      } else {
          removeUpload_fa();
      }
  }

  function removeUpload_fa() {
      $('.file-upload-input-fa').replaceWith($('.file-upload-input-fa').clone());
      $('.file-upload-content-fa').hide();
      $('.image-upload-wrap-fa').show();
  }
  $('.image-upload-wrap-fa').bind('dragover', function () {
      $('.image-upload-wrap-fa').addClass('image-dropping');
  });
  $('.image-upload-wrap-fa').bind('dragleave', function () {
      $('.image-upload-wrap-fa').removeClass('image-dropping');
  });
</script>