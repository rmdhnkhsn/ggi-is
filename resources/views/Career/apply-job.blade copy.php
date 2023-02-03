@include('Career.layouts.header')
@include('Career.layouts.navbar')

  <div class="content-wrapper bg-career">
    <div class="content-header"></div>
    <section class="content pt-4 Career">
      <div class="container-fluid">
        <div class="row px-4" style="padding-bottom:7rem">
          <div class="col-12 mb-5">
            <div class="filterCareer">
              <div class="selectFactory">
                <i class="iconDrop fas fa-city"></i>
                <select id="" name="">
                  <option selected disabled>All Factory</option>
                  <option value="Gistex Cileunyi">Gistex Cileunyi</option>
                  <option value="Gistex Maja 1">Gistex Maja 1</option>
                </select>
              </div>
              <div class="selectDept">
                <i class="iconDrop fas fa-network-wired"></i>
                <select id="" name="">
                  <option selected disabled>Departement</option>
                  <option value="IT & DT">IT & DT</option>
                  <option value="Marketing">Marketing</option>
                </select>
              </div>
              <div class="container-form">
                <input type="text" placeholder="Search..." required>
                <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="cards" style="padding: 2.6rem">
              <div class="row">
                <div class="col-12">
                  <div class="title-20">Description</div>
                  <div class="borderOrange2"></div>
                  <div class="sub-title-14 mt-3">
                    As an ERM Associate, you will be responsible for the implementation of the Enterprise Risk Management as well as perform as 2nd line of defense function for the company. The role involves ensuring a rigorous risk.
                  </div>
                  <div class="sub-title-14 my-1" style="font-weight:600">
                    Job Desk
                  </div>
                  <div class="sub-title-14 px-2">
                    <li>Membuat Information Architecture (IA)</li>
                    <li>Merancang Wireframing, Storyboards, Prototyping, Mockups dan User Flow</li>
                    <li>Membuat Prototype Desain User Experience (UX) Web</li>
                    <li>Merancang User Interface (UI) Web</li>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="title-20">Requirements</div>
                  <div class="borderOrange2"></div>
                  <div class="sub-title-14 mt-3">
                    As an ERM Associate, you will be responsible for the implementation of the Enterprise Risk Management as well as perform as 2nd line of defense function for the company. The role involves ensuring a rigorous risk.
                  </div>
                  <div class="sub-title-14 mt-1 px-2">
                    <li>S1 DKV, IT, or similar major, fresh graduate welcome to apply</li>
                    <li>Age Max 25th</li>
                    <li>Active in english speaking</li>
                    <li>Min 1 year experience</li>
                    <li>Figma. Potoshop, Corel Draw, Adobe XD</li>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="title-20">Benefits</div>
                  <div class="borderOrange2"></div>
                  <div class="sub-title-14 mt-3">
                    As an ERM Associate, you will be responsible for the implementation of the Enterprise Risk Management as well as perform as 2nd line of defense function for the company. The role involves ensuring a rigorous risk.
                  </div>
                  <div class="sub-title-14 mt-1 px-2">
                    <li>Tunjanagan BPJS Kesehatan</li>
                    <li>Tunjangan BPJS Ketenaga kerjaan</li>
                    <li>Mesh untuk karyawan luar kota</li>
                    <li>Snack</li>
                    <li>Jenjang Karir</li>
                    <li>Range Gaji 4.000.000 ~ 5.000.000</li>
                  </div>
                </div>
                <div class="col-12 my-5">
                  <div class="borderGrey"></div>
                </div>
                <div class="col-12 mb-5">
                  <div class="title-24 text-center">Apply This Job</div> 
                  <div class="title-14-grey text-center">You must fill out the form below to apply for this job</div>
                  <div class="justify-center mt-1">
                    <div class="borderOrange"></div>
                  </div>
                </div>
                <div class="col-md-6 my-2">
                  <span class="title-sm">NIK</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your nik number...">
                  </div>
                </div>
                <div class="col-md-6 my-2">
                  <span class="title-sm">Name</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your name...">
                  </div>
                </div>
                <div class="col-md-6 my-2">
                  <span class="title-sm">Gender</span>
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="inputGroupOrange">Gender</span>
                    </div>
                      <select class="form-control border-input-10 select2bs4" name="" id="">
                        <option selected disabled>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 my-2">
                  <span class="title-sm">Date Of Birth</span>
                  <div class="input-group date mt-1" id="Date" data-target-input="nearest">
                    <div class="input-group-append datepiker" data-target="#Date" data-toggle="datetimepicker">
                      <div class="inputGroupOrange"><span class="fs-14">Date</span><i class="fas fa-caret-down" style="font-size:18px"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control datetimepicker-input border-input-10" data-target="#Date" placeholder="Select Date"/>
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Address</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your address...">
                  </div>
                </div>
                <div class="col-md-6 my-2">
                  <span class="title-sm">Major</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your major...">
                  </div>
                </div>
                <div class="col-md-4 my-2">
                  <span class="title-sm">Education</span>
                  <div class="input-group mt-1">
                    <div class="input-group-prepend">
                      <span class="inputGroupOrange">Education</span>
                    </div>
                      <select class="form-control border-input-10 select2bs4" name="" id="">
                        <option selected disabled>Your Education</option>
                        <option value="UPI">UPI</option>
                        <option value="UNPAD">UNPAD</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2 my-2">
                  <span class="title-sm">IPK/GPA</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your IPK...">
                  </div>
                </div>
                <div class="col-md-6 my-2">
                  <span class="title-sm">Email</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your email...">
                  </div>
                </div>
                <div class="col-md-6 my-2">
                  <span class="title-sm">Telphone</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your telphone...">
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Short Resume</span>
                  <div class="messageGrey mt-1">
                    <textarea class="form-control border-input-10" name="" placeholder="tell me briefly about yourself..." style="height:90px"></textarea>
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Award 1</span>
                  <span class="txt-pink">*Fill in if you have award history</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your award...">
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Award 2</span>
                  <span class="txt-pink">*Fill in if you have award history</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your award...">
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Award 3</span>
                  <span class="txt-pink">*Fill in if you have award history</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your award...">
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Award 4</span>
                  <span class="txt-pink">*Fill in if you have award history</span>
                  <div class="input-group mt-1">
                    <input type="text" class="form-control border-input-10" id="" name="" placeholder="your award...">
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Aplication Letter</span>
                  <span class="txt-pink">*Format Must be in Pdf Format</span>
                  <div class="customFile mt-2">
                    <input type="file" class="customFileInput" id="customFile" name="" value="">
                    <label class="customFileLabelsOrange" for="customFile">
                    <span class="chooseFile"></span></label>
                  </div>
                </div>
                <div class="col-12 my-2">
                  <span class="title-sm">Award</span>
                  <span class="txt-pink">*Format Must be in Pdf Format</span>
                  <div class="customFile mt-2">
                    <input type="file" class="customFileInput" id="customFile" name="" value="">
                    <label class="customFileLabelsOrange" for="customFile">
                    <span class="chooseFile"></span></label>
                  </div>
                </div>
                <div class="col-12 mt-5">
                  <button type="submit" class="btn-orange-md">Submit Application</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cards sticky-top-career" style="padding: 28px 25px">
              <img src="{{url('images/career.png')}}">
              <div class="title-32 uppercase truncate my-3">Staff UI UX & Product Designer</div>
              <div class="statusJob">
                <i class="iconJob fas fa-city"></i>
                <div class="title2">HR & GA</div>
              </div>
              <div class="statusJob">
                <i class="iconJob fas fa-network-wired"></i>
                <div class="title2">Gistex Cileunyi</div>
              </div>
              <div class="statusJob">
                <i class="iconJob fas fa-users"></i>
                <div class="title2">10 People</div>
              </div>
              <div class="buttonJob mt-3">
                <a href="{{ route('apply-job') }}" class="btn-orange-md">Apply Job</a>
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

<script>
  $('#Date').datetimepicker({
    format: 'DD/MM/YY',
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