@extends("layouts.app")
@section("title","Create Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
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
    <div class="row ITticketing pb-4">
    @foreach($filter_menu as $d)
      @include('it_dt.ticketing.itdt_ticketing.MenuTiket.'.$d['blade'])
    @endforeach

    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(".customFileInput").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
  });
</script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });

  // $('.saveCreate').on('click', function (event) {
  //   swal({
  //     position: 'center',
  //     icon: 'success',
  //     title: 'Success',
  //     text: 'Your ticket has been succesfully created',
  //     buttons: false,
  //     timer: 1500
  //   })
  // });

  $('.solvedAlert').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Success',
      text: 'Problem Has Been Solved',
      buttons: false,
      timer: 1500
    })
  });
</script>

<script>
  function Network(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap').hide();

      reader.onload = function (e) {
          $(".fileUploadImg").attr("src", e.target.result);
          $(".fileUploadContent").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeNetwork();
    }
  }
  function removeNetwork() {
    $('.fileUploadInput').replaceWith($('.fileUploadInput').clone());
    $('.fileUploadContent').hide();
    $('.imageUploadWrap').show();
  }
  $('.imageUploadWrap').bind('dragover', function () {
      $('.imageUploadWrap').addClass('image-dropping');
  });
  $('.imageUploadWrap').bind('dragleave', function () {
      $('.imageUploadWrap').removeClass('image-dropping');
  });

  // ====================================================
  function Software(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap2').hide();

      reader.onload = function (e) {
          $(".fileUploadImg2").attr("src", e.target.result);
          $(".fileUploadContent2").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeSoftware();
    }
  }
  function removeSoftware() {
    $('.fileUploadInput2').replaceWith($('.fileUploadInput2').clone());
    $('.fileUploadContent2').hide();
    $('.imageUploadWrap2').show();
  }
  $('.imageUploadWrap2').bind('dragover', function () {
      $('.imageUploadWrap2').addClass('image-dropping');
  });
  $('.imageUploadWrap2').bind('dragleave', function () {
      $('.imageUploadWrap2').removeClass('image-dropping');
  });

  // ====================================================
  function Hardware(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap3').hide();

      reader.onload = function (e) {
          $(".fileUploadImg3").attr("src", e.target.result);
          $(".fileUploadContent3").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeHardware();
    }
  }
  function removeHardware() {
    $('.fileUploadInput3').replaceWith($('.fileUploadInput3').clone());
    $('.fileUploadContent3').hide();
    $('.imageUploadWrap3').show();
  }
  $('.imageUploadWrap3').bind('dragover', function () {
      $('.imageUploadWrap3').addClass('image-dropping');
  });
  $('.imageUploadWrap3').bind('dragleave', function () {
      $('.imageUploadWrap3').removeClass('image-dropping');
  });

  // ====================================================

  function Pinjam(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap4').hide();

      reader.onload = function (e) {
          $(".fileUploadImg4").attr("src", e.target.result);
          $(".fileUploadContent4").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removePinjam();
    }
  }
  function removePinjam() {
    $('.fileUploadInput4').replaceWith($('.fileUploadInput4').clone());
    $('.fileUploadContent4').hide();
    $('.imageUploadWrap4').show();
  }
  $('.imageUploadWrap4').bind('dragover', function () {
      $('.imageUploadWrap4').addClass('image-dropping');
  });
  $('.imageUploadWrap4').bind('dragleave', function () {
      $('.imageUploadWrap4').removeClass('image-dropping');
  });

  // ====================================================

  function Rpa(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrapRPA').hide();

      reader.onload = function (e) {
          $(".fileUploadImgRPA").attr("src", e.target.result);
          $(".fileUploadContentRPA").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeRpa();
    }
  }
  function removeRpa() {
    $('.fileUploadInputRPA').replaceWith($('.fileUploadInputRPA').clone());
    $('.fileUploadContentRPA').hide();
    $('.imageUploadWrapRPA').show();
  }
  $('.imageUploadWrapRPA').bind('dragover', function () {
      $('.imageUploadWrapRPA').addClass('image-dropping');
  });
  $('.imageUploadWrapRPA').bind('dragleave', function () {
      $('.imageUploadWrapRPA').removeClass('image-dropping');
  });

  // ====================================================

  function PU(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrapPU').hide();

      reader.onload = function (e) {
          $(".fileUploadImgPU").attr("src", e.target.result);
          $(".fileUploadContentPU").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removePU();
    }
  }
  function removePU() {
    $('.fileUploadInputPU').replaceWith($('.fileUploadInputPU').clone());
    $('.fileUploadContentPU').hide();
    $('.imageUploadWrapPU').show();
  }
  $('.imageUploadWrapPU').bind('dragover', function () {
      $('.imageUploadWrapPU').addClass('image-dropping');
  });
  $('.imageUploadWrapPU').bind('dragleave', function () {
      $('.imageUploadWrapPU').removeClass('image-dropping');
  });

  // ====================================================

  function JDE(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap5').hide();

      reader.onload = function (e) {
          $(".fileUploadImg5").attr("src", e.target.result);
          $(".fileUploadContent5").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeJDE();
    }
  }
  function removeJDE() {
    $('.fileUploadInput5').replaceWith($('.fileUploadInput5').clone());
    $('.fileUploadContent5').hide();
    $('.imageUploadWrap5').show();
  }
  $('.imageUploadWrap5').bind('dragover', function () {
      $('.imageUploadWrap5').addClass('image-dropping');
  });
  $('.imageUploadWrap5').bind('dragleave', function () {
      $('.imageUploadWrap5').removeClass('image-dropping');
  });

  // ====================================================

  function GCC(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap6').hide();

      reader.onload = function (e) {
          $(".fileUploadImg6").attr("src", e.target.result);
          $(".fileUploadContent6").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeGCC();
    }
  }
  function removeGCC() {
    $('.fileUploadInput6').replaceWith($('.fileUploadInput6').clone());
    $('.fileUploadContent6').hide();
    $('.imageUploadWrap6').show();
  }
  $('.imageUploadWrap6').bind('dragover', function () {
      $('.imageUploadWrap6').addClass('image-dropping');
  });
  $('.imageUploadWrap6').bind('dragleave', function () {
      $('.imageUploadWrap6').removeClass('image-dropping');
  });

  // ====================================================

  function HRIS(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap7').hide();

      reader.onload = function (e) {
          $(".fileUploadImg7").attr("src", e.target.result);
          $(".fileUploadContent7").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeHRIS();
    }
  }
  function removeHRIS() {
    $('.fileUploadInput7').replaceWith($('.fileUploadInput7').clone());
    $('.fileUploadContent7').hide();
    $('.imageUploadWrap7').show();
  }
  $('.imageUploadWrap7').bind('dragover', function () {
      $('.imageUploadWrap7').addClass('image-dropping');
  });
  $('.imageUploadWrap7').bind('dragleave', function () {
      $('.imageUploadWrap7').removeClass('image-dropping');
  });

  // ====================================================

  function SMQC(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      $('.imageUploadWrap8').hide();

      reader.onload = function (e) {
          $(".fileUploadImg8").attr("src", e.target.result);
          $(".fileUploadContent8").show();
      };
      reader.readAsDataURL(input.files[0]);

    } else {
      removeSMQC();
    }
  }
  function removeSMQC() {
    $('.fileUploadInput8').replaceWith($('.fileUploadInput8').clone());
    $('.fileUploadContent8').hide();
    $('.imageUploadWrap8').show();
  }
  $('.imageUploadWrap8').bind('dragover', function () {
      $('.imageUploadWrap8').addClass('image-dropping');
  });
  $('.imageUploadWrap8').bind('dragleave', function () {
      $('.imageUploadWrap8').removeClass('image-dropping');
  });
</script>


<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>

  // A $( document ).ready() block.
  $( document ).ready(function() {

    
    let load = document.getElementsByClassName('formloading');
      Array.from(load).forEach(function (element) {
        element.addEventListener('submit', function() {
            showLoading();
        })
      });
      
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
            }
            }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
               
            }
        })
    }
</script>
@endpush