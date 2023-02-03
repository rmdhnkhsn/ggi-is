@extends("layouts.flat_breadcrumb.app")
@section("title","EDIT PRE-FINAL")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTables-cardPart.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<style>
  .content-wrapper {
    background: white !important
  }
</style>
@endpush

@section("content")
<section class="content">
  <div class="container-fluid pb-5">
    <form action="">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cardFlat p-4">
            <div class="row">
              <div class="col-12">
                <div class="title-24-dark mb-4">Inspection Info</div>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Inspect Date</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control borderInput" name="" id="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Shipment Periode / TOD</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control borderInput" name="" id="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="title-sm">PO Number</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-sort-numeric-down"></i></span>
                  </div>
                  <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                    <option selected disabled>Select PO Number</option>
                    <option name="112233">112233</option>    
                    <option name="556688">556688</option>    
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Buyer</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Buyer" readonly>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Color</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-palette"></i></span>
                  </div>
                  <select class="form-control borderInput select2bs4 pointer" id="" name="" required>
                    <option selected disabled>Select Color</option>
                    <option name="BLK">BLK</option>    
                    <option name="CYN">CYN</option>    
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Style</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Style" readonly>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Item</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Item" readonly>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Destination</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Destination">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Qty Order</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Qty Order" readonly>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Sample Size</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Sample Size" readonly>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Pass</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Pass">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Fail</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Fail">
              </div>
              <div class="col-12">
                <div class="title-sm">Inspect Result</div>
                <div class="flexx gap-5 mt-1 mb-3">
                  <div class="wrapperRadio w-100">
                    <input type="radio" name="result" value="" class="radioGreen" id="PASS">
                    <label for="PASS" class="optionGreen check">
                      <span class="descGreen">PASS</span>
                    </label>
                  </div>
                  <div class="wrapperRadio w-100">
                    <input type="radio" name="result" value="" class="radioRed" id="FAIL">
                    <label for="FAIL" class="optionRed check">
                      <span class="descRed">FAIL</span>
                    </label>
                  </div>
                </div>  
              </div>
              <div class="col-md-6">
                <div class="title-sm">Qty Check (Pcs)</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Qty Check (Pcs)">
              </div>
              <div class="col-md-6">
                <div class="title-sm">Qty Check (Ctn)</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Qty Check (Ctn)" readonly>
              </div>
              <div class="col-md-6">
                <div class="title-sm">CTN No</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input CTN No" readonly>
              </div>
              <div class="col-md-6">
                <div class="title-sm">Total Defect</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Total Defect" readonly>
              </div>
              <div class="col-12">
                <div class="title-sm">Quality Comments</div>
                <input type="text" class="form-control borderInput mt-1 mb-3" name="" id="" placeholder="Input Quality Comments">
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="dotSpace mt-3 mb-4">
                  <div class="dot1"></div>
                  <div class="dot2"></div>
                  <div class="dot3"></div>
                  <div class="dot4"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 accordionFlat">
                <div class="title-24-dark mb-4">Documents Inspection</div>
                <div class="accordionItems">
                  <header class="accordionHeaders">
                    <div class="title-16-dark3">TYPE OF DEFECT</div>
                    <div class="justify-start gap-4">
                      <img src="{{url('images/iconpack/double-check-blue.svg')}}">
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
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Scratches/Holes</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" value="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Slub</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Broken Stitch</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Skip Stitch</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Pleated</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Purckering</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Fractured</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Hi Low</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Trimming</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Dirty</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Sticker</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                        <div class="col-lg-3 col-md-6">
                          <div class="title-sm">Other Defect</div>
                          <input type="text" class="form-control borderInput mt-1 mb-3" id="" name="" placeholder="Input Qty">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="dotSpace mt-2 mb-4">
                            <div class="dot1"></div>
                            <div class="dot2"></div>
                            <div class="dot3"></div>
                            <div class="dot4"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="justify-center w-100">
                            <div class="title-sm no-wrap">Total Defect : </div>
                            <input type="text" class="form-control borderInput ml-2" id="" name="" placeholder="Total Defect" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordionItems">
                  <header class="accordionHeaders">
                    <div class="title-16-dark3">PICTURE DEFECT</div>
                    <div class="justify-start gap-4">
                      <img src="{{url('images/iconpack/double-check-blue.svg')}}">
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
                        <div class="col-md-6">
                          <div class="uploadPreviewImg">
                            <div class="imageUpload">
                              <button class="d-none" type="button" id="images" onclick="$('.uploadInput').trigger('click')">Select Image</button>
                              <input class="uploadInput" type='file' id="images" name="" onchange="readURL(this);" accept="image/*" />
                              <i class="iconUpload fas fa-cloud-upload-alt"></i>
                              <div class="dragText">
                                <span class="english">Click or Drag and Drop</span> your photo here. <br/>JPG, PNG, JPEG
                              </div>
                            </div> 
                            <div class="fileUploadContent">
                              <img class="uploadImg" src="" alt="Image Format Only" data-toggle="lightbox" />
                              <button type="button" onclick="removeUpload()" class="removeImage">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="uploadPreviewImg">
                            <div class="imageUpload2">
                              <button class="d-none" type="button" id="images" onclick="$('.uploadInput2').trigger('click')">Select Image</button>
                              <input class="uploadInput2" type='file' id="images" name="" onchange="readURL2(this);" accept="image/*" />
                              <i class="iconUpload fas fa-cloud-upload-alt"></i>
                              <div class="dragText">
                                <span class="english">Click or Drag and Drop</span> your photo here. <br/>JPG, PNG, JPEG
                              </div>
                            </div> 
                            <div class="fileUploadContent2">
                              <img class="uploadImg2" src="" alt="Image Format Only" data-toggle="lightbox" />
                              <button type="button" onclick="removeUpload2()" class="removeImage">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="uploadPreviewImg">
                            <div class="imageUpload3">
                              <button class="d-none" type="button" id="images" onclick="$('.uploadInput3').trigger('click')">Select Image</button>
                              <input class="uploadInput3" type='file' id="images" name="" onchange="readURL3(this);" accept="image/*" />
                              <i class="iconUpload fas fa-cloud-upload-alt"></i>
                              <div class="dragText">
                                <span class="english">Click or Drag and Drop</span> your photo here. <br/>JPG, PNG, JPEG
                              </div>
                            </div> 
                            <div class="fileUploadContent3">
                              <img class="uploadImg3" src="" alt="Image Format Only" data-toggle="lightbox" />
                              <button type="button" onclick="removeUpload3()" class="removeImage">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="uploadPreviewImg">
                            <div class="imageUpload4">
                              <button class="d-none" type="button" id="images" onclick="$('.uploadInput4').trigger('click')">Select Image</button>
                              <input class="uploadInput4" type='file' id="images" name="" onchange="readURL4(this);" accept="image/*" />
                              <i class="iconUpload fas fa-cloud-upload-alt"></i>
                              <div class="dragText">
                                <span class="english">Click or Drag and Drop</span> your photo here. <br/>JPG, PNG, JPEG
                              </div>
                            </div> 
                            <div class="fileUploadContent4">
                              <img class="uploadImg4" src="" alt="Image Format Only" data-toggle="lightbox" />
                              <button type="button" onclick="removeUpload4()" class="removeImage">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="uploadPreviewImg">
                            <div class="imageUpload5">
                              <button class="d-none" type="button" id="images" onclick="$('.uploadInput5').trigger('click')">Select Image</button>
                              <input class="uploadInput5" type='file' id="images" name="" onchange="readURL5(this);" accept="image/*" />
                              <i class="iconUpload fas fa-cloud-upload-alt"></i>
                              <div class="dragText">
                                <span class="english">Click or Drag and Drop</span> your photo here. <br/>JPG, PNG, JPEG
                              </div>
                            </div> 
                            <div class="fileUploadContent5">
                              <img class="uploadImg5" src="" alt="Image Format Only" data-toggle="lightbox" />
                              <button type="button" onclick="removeUpload5()" class="removeImage">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="uploadPreviewImg">
                            <div class="imageUpload6">
                              <button class="d-none" type="button" id="images" onclick="$('.uploadInput6').trigger('click')">Select Image</button>
                              <input class="uploadInput6" type='file' id="images" name="" onchange="readURL6(this);" accept="image/*" />
                              <i class="iconUpload fas fa-cloud-upload-alt"></i>
                              <div class="dragText">
                                <span class="english">Click or Drag and Drop</span> your photo here. <br/>JPG, PNG, JPEG
                              </div>
                            </div> 
                            <div class="fileUploadContent6">
                              <img class="uploadImg6" src="" alt="Image Format Only" data-toggle="lightbox" />
                              <button type="button" onclick="removeUpload6()" class="removeImage">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordionItems">
                  <header class="accordionHeaders">
                    <div class="title-16-dark3">MEASUREMENT PICTURE</div>
                    <div class="justify-start gap-4">
                      <img src="{{url('images/iconpack/double-check-blue.svg')}}">
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
                          <div class="uploadPreviewImg">
                            <div class="imageUpload7">
                              <button class="d-none" type="button" id="images" onclick="$('.uploadInput7').trigger('click')">Select Image</button>
                              <input class="uploadInput7" type='file' id="images" name="" onchange="readURL7(this);" accept="image/*" />
                              <i class="iconUpload fas fa-cloud-upload-alt"></i>
                              <div class="dragText">
                                <span class="english">Click or Drag and Drop</span> your photo here. <br/>JPG, PNG, JPEG
                              </div>
                            </div> 
                            <div class="fileUploadContent7">
                              <img class="uploadImg7" src="" alt="Image Format Only" data-toggle="lightbox" />
                              <button type="button" onclick="removeUpload7()" class="removeImage">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 flex gap-4 mt-4">
                <a href="{{ route('qa.prefinal.index')}}" class="btnSoftBlue w-100">Discard</a>
                <button type="submit" class="btn-blue-md saveInspect w-100">Save Inspection</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section> 

@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script>
  $('.saveInspect').on('click', function (event) {
    swal({
      type: 'success',
      title: 'Inspection Created',
      text: 'Data Inspection Ditambahkan',
      button: false,
      timer: 2000
    })
  });
</script>
<script type="text/javascript">
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =>{
    const accordionHeader = item.querySelector('.accordionHeaders')

    accordionHeader.addEventListener('click', () =>{
      const openItem = document.querySelector('.accordion-open')
      
      toggleItem(item)

      if(openItem && openItem!== item){
          toggleItem(openItem)
      }
    })
  })

  const toggleItem = (item) =>{
    const accordionContent = item.querySelector('.accordionContents')

    if(item.classList.contains('accordion-open')){
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    }else{
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }
</script>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUpload').hide();

      reader.onload = function (e) {
        $(".uploadImg").attr("src", e.target.result);
        $(".fileUploadContent").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload();
    }
  }

  function removeUpload() {
    $('.uploadInput').replaceWith($('.uploadInput').clone());
    $('.fileUploadContent').hide();
    $('.imageUpload').show();
  }
  $('.imageUpload').bind('dragover', function () {
    $('.imageUpload').addClass('image-dropping');
  });
  $('.imageUpload').bind('dragleave', function () {
    $('.imageUpload').removeClass('image-dropping');
  });

  // =============================

  function readURL2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUpload2').hide();

      reader.onload = function (e) {
        $(".uploadImg2").attr("src", e.target.result);
        $(".fileUploadContent2").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload2();
    }
  }

  function removeUpload2() {
    $('.uploadInput2').replaceWith($('.uploadInput2').clone());
    $('.fileUploadContent2').hide();
    $('.imageUpload2').show();
  }
  $('.imageUpload2').bind('dragover', function () {
    $('.imageUpload2').addClass('image-dropping');
  });
  $('.imageUpload2').bind('dragleave', function () {
    $('.imageUpload2').removeClass('image-dropping');
  });

  // =============================

  function readURL3(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUpload3').hide();

      reader.onload = function (e) {
        $(".uploadImg3").attr("src", e.target.result);
        $(".fileUploadContent3").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload3();
    }
  }

  function removeUpload3() {
    $('.uploadInput3').replaceWith($('.uploadInput3').clone());
    $('.fileUploadContent3').hide();
    $('.imageUpload3').show();
  }
  $('.imageUpload3').bind('dragover', function () {
    $('.imageUpload3').addClass('image-dropping');
  });
  $('.imageUpload3').bind('dragleave', function () {
    $('.imageUpload3').removeClass('image-dropping');
  });

  // =============================

  function readURL4(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUpload4').hide();

      reader.onload = function (e) {
        $(".uploadImg4").attr("src", e.target.result);
        $(".fileUploadContent4").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload4();
    }
  }

  function removeUpload4() {
    $('.uploadInput4').replaceWith($('.uploadInput4').clone());
    $('.fileUploadContent4').hide();
    $('.imageUpload4').show();
  }
  $('.imageUpload4').bind('dragover', function () {
    $('.imageUpload4').addClass('image-dropping');
  });
  $('.imageUpload4').bind('dragleave', function () {
    $('.imageUpload4').removeClass('image-dropping');
  });

  // =============================

  function readURL5(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUpload5').hide();

      reader.onload = function (e) {
        $(".uploadImg5").attr("src", e.target.result);
        $(".fileUploadContent5").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload5();
    }
  }

  function removeUpload5() {
    $('.uploadInput5').replaceWith($('.uploadInput5').clone());
    $('.fileUploadContent5').hide();
    $('.imageUpload5').show();
  }
  $('.imageUpload5').bind('dragover', function () {
    $('.imageUpload5').addClass('image-dropping');
  });
  $('.imageUpload5').bind('dragleave', function () {
    $('.imageUpload5').removeClass('image-dropping');
  });

  // =============================

  function readURL6(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUpload6').hide();

      reader.onload = function (e) {
        $(".uploadImg6").attr("src", e.target.result);
        $(".fileUploadContent6").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload6();
    }
  }

  function removeUpload6() {
    $('.uploadInput6').replaceWith($('.uploadInput6').clone());
    $('.fileUploadContent6').hide();
    $('.imageUpload6').show();
  }
  $('.imageUpload6').bind('dragover', function () {
    $('.imageUpload6').addClass('image-dropping');
  });
  $('.imageUpload6').bind('dragleave', function () {
    $('.imageUpload6').removeClass('image-dropping');
  });

  // =============================

  function readURL7(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUpload7').hide();

      reader.onload = function (e) {
        $(".uploadImg7").attr("src", e.target.result);
        $(".fileUploadContent7").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload7();
    }
  }

  function removeUpload7() {
    $('.uploadInput7').replaceWith($('.uploadInput7').clone());
    $('.fileUploadContent7').hide();
    $('.imageUpload7').show();
  }
  $('.imageUpload7').bind('dragover', function () {
    $('.imageUpload7').addClass('image-dropping');
  });
  $('.imageUpload7').bind('dragleave', function () {
    $('.imageUpload7').removeClass('image-dropping');
  });
</script>
@endpush