@extends("layouts.app")
@section("title","Admin Ticketing")
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
<link rel="stylesheet" href="{{asset('/common/css/style_maps.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush
@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row ITticketing pb-4">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-12">
            <div class="cards-18 p-4">
              <div class="btnTicket">
                <div class="title-22 text-left">Dashboard Booking Room</div> 
                <div class="btnTicket2">
                  <a href="{{ route('ticket-monitoring','branch='.$branch->id)}}" class="btn-blue-md">Monitoring Booking<i class="fs-18 ml-3 fas  fa-tv"></i></a>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-start">
                <!-- <span class="title-16">Select Brach :  </span> -->
                <div class="mt-3 flex gap-3 " style="flex-wrap: wrap;" >
                  @foreach($dataBranch as $key=>$value)
                    <div class="wrapperRadio mb-min" onchange="getBranch({{$value->id}})">
                      <input type="radio" name="branch" value="{{$value->id}}" class="radioBlueFlat kode_branch" id="{{$value->id}}" {{ $value->id==$branch->id ? 'checked' : ''}}>
                      <label for="{{$value->id}}" class="optionBlueFlat check">
                          <span class="descBlue">{{$value->nama_branch}}</span>
                      </label>
                    </div>
                  @endforeach
                    <!-- <div class="wrapperRadio mb-min">
                    <input type="radio" name="branch" value="GM-1" class="radioBlueFlat" id="mj1">
                    <label for="mj1" class="optionBlueFlat check">
                        <span class="descBlue">Gistex Majalengka 1</span>
                    </label>
                    </div>
                    <div class="wrapperRadio mb-min">
                    <input type="radio" name="branch" value="GM-2" class="radioBlueFlat" id="mj2">
                    <label for="mj2" class="optionBlueFlat check">
                        <span class="descBlue">Gistex Majalengka 2</span>
                    </label>
                    </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="cards-18 p-4">
              <ul class="nav nav-tabs sr-md-tabs mb-4" role="tablist">
                <li class="nav-item-show">
                  <a class="nav-link relative active" data-toggle="tab" href="#adm_waiting" role="tab"></i>
                    <i class="fs-28 fas fa-hourglass-half"></i>
                    <div class="f-14">Waiting</div>
                    @if($waiting>0)
                    <span class="tabs-badge">{{ $waiting }}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#adm_process" role="tab"></i>
                    <i class="fs-28 fas fa-tools"></i>
                    <div class="f-14">On Process</div>
                    @if($proggres>0)
                    <span class="tabs-badge">{{ $proggres }}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#adm_cancel" role="tab"></i>
                    <i class="fs-28 fas fa-history"></i>
                    <div class="f-14">Cancel</div>
                    @if($cancel>0)
                      <span class="tabs-badge">{{ $cancel }}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#adm_done" role="tab"></i>
                    <i class="fs-28 fas fa-check-double"></i>
                    <div class="f-14">Done</div>
                    @if($done>0)
                      <span class="tabs-badge">{{ $done }}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
              </ul>
              <div class="tab-content card-block">
              <div class="tab-content card-block">
                <div class="tab-pane active" id="adm_waiting" role="tabpanel">
                  @include('it_dt.Ticketing.itdt_ticketing.partials_admin_booking.tab-waiting')
                </div>
                <div class="tab-pane" id="adm_process" role="tabpanel">
                  @include('it_dt.Ticketing.itdt_ticketing.partials_admin_booking.tab-process')
                </div>
                <div class="tab-pane" id="adm_cancel" role="tabpanel">
                  @include('it_dt.Ticketing.itdt_ticketing.partials_admin_booking.tab-cancel')
                </div>
                <div class="tab-pane" id="adm_done" role="tabpanel">
                  @include('it_dt.Ticketing.itdt_ticketing.partials_admin_booking.tab-done')
                </div>
              </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-12">
            <div class="cards-18" style="max-height:855px; padding:1.6rem 1.3rem">
              <div class="row">
                <div class="col-12">
                  <div class="title-16 mb-1" style="font-weight:500">Support</div>
                  <div class="cards-scroll pr-1 mt-1 scrollY" id="scroll-bar" style="max-height:378px">
                    @foreach($data_admin as $key => $value)
                    <div class="technician">
                      <div class="tech-icon"><i class="fas fa-user-cog"></i></div>
                      <div class="tech-desc">
                        <div class="tech-name text-truncate">{{$value['nama']}}</div> 
                          <div class="tech-status text-truncate"><span class="txt-ygreen fw-500">Ready to serve</span></div> 
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('it_dt.Ticketing.itdt_ticketing.partials.adminChat.floating-chat')
  </div>
</section>
@endsection

@push("scripts")

<script>
  function getBranch(selected) {
    location.replace("{{ url('itd/ticket/admin-version-booking?branch=') }}"+selected)
    // console.log(selected)
  }
</script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $('.select2bs5').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordion_item')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordion_header')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordion_content')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

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

<script>
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

  function search_error(elem) {
    var error=$(elem).val();
    // console.log(error);

    if (error!==''||error!=='undefined') {
      var data=get_error(error);

      if (!jQuery.isEmptyObject(data)) {
        // alert(JSON.stringify(data.gp_tun));
      const option = document.getElementsByClassName('option2');
      Array.from(option).forEach(function (element) {
        element.innerHTML ='';
      });
    
      for (const property in data) {
        Array.from(option).forEach(function (element) {
              const node = document.createElement("option");
              const textnode = document.createTextNode(property);
              node.appendChild(textnode);
              element.appendChild(node);
      });
      }
      } else {

      }

    }
  }


</script>

<script>
  // const buttontoggle = document.getElementById("btn-legend");
  // const legend = document.getElementsByClassName("floating-legends")[0];
  // buttontoggle.addEventListener('click', function () {
  //     legend.classList.toggle('fade-in');
  //     legend.classList.toggle('fade-Out');
  //     console.log('ok');
  // });

  
  // $(".magnify").jfMagnify();
  // the jfMagnify plugin and other demo files can be found
  // https://github.com/fonstok/jfMagnify
  // $(document).ready(function () {
  //   var scaleNum = 2;
  //   $(".magnify").jfMagnify();
  //   $('.plus').click(function () {
  //       scaleNum += 1;
  //       if (scaleNum >= 10) {
  //           scaleNum = 10;
  //       };
  //       $(".magnify").data("jfMagnify").scaleMe(scaleNum);
  //   });
  //   $('.minus').click(function () {
  //       scaleNum -= 1;
  //       if (scaleNum <= 1) {
  //           scaleNum = 1;
  //       };
  //       $(".magnify").data("jfMagnify").scaleMe(scaleNum);
  //   });
  //   $('.magnify_glass').animate({
  //       'top': '60%',
  //       'left': '60%'
  //   }, {
  //       duration: 2000,
  //       progress: function () {
  //           $(".magnify").data("jfMagnify").update();
  //       },
  //       easing: "easeOutElastic"
  //   });
  // });
</script>
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
  // $.ajaxSetup({
  //       headers: {
  //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       }
  //     });

  // function search_error(elem) {
  //   var error=$(elem).val();
  //   // console.log(error);

  //   if (error!==''||error!=='undefined') {
  //     var data=get_error(error);

  //     if (!jQuery.isEmptyObject(data)) {
  //       // alert(JSON.stringify(data.gp_tun));
  //     const option = document.getElementsByClassName('option2');
  //     Array.from(option).forEach(function (element) {
  //       element.innerHTML ='';
  //     });
    
  //     for (const property in data) {
  //       Array.from(option).forEach(function (element) {
  //             const node = document.createElement("option");
  //             const textnode = document.createTextNode(property);
  //             node.appendChild(textnode);
  //             element.appendChild(node);
  //     });
  //     }
  //     } else {

  //     }

  //   }
  // }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 210000);
    })
</script>
<script>
  //  jQuery(document).ready(function($) {
  //   $.ajaxSetup({
  //       headers: {
  //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       }
  //   }); 

  // // ==========================================================
  // function Process(input) {
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();
  //     $('.imageUploadWrap4').hide();

  //     reader.onload = function (e) {
  //         $(".fileUploadImg4").attr("src", e.target.result);
  //         $(".fileUploadContent4").show();
  //     };
  //     reader.readAsDataURL(input.files[0]);

  //   } else {
  //     removeProcess();
  //   }
  // }
  // function removeProcess() {
  //   $('.fileUploadInput4').replaceWith($('.fileUploadInput4').clone());
  //   $('.fileUploadContent4').hide();
  //   $('.imageUploadWrap4').show();
  // }
  // $('.imageUploadWrap4').bind('dragover', function () {
  //     $('.imageUploadWrap4').addClass('image-dropping');
  // });
  // $('.imageUploadWrap4').bind('dragleave', function () {
  //     $('.imageUploadWrap4').removeClass('image-dropping');
  // });
  //   // ==========================================================
  //   function Pending(input) {
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();
  //     $('.imageUploadWrap5').hide();

  //     reader.onload = function (e) {
  //         $(".fileUploadImg5").attr("src", e.target.result);
  //         $(".fileUploadContent5").show();
  //     };
  //     reader.readAsDataURL(input.files[0]);

  //   } else {
  //     removePending();
  //   }
  // }
  // function removePending() {
  //   $('.fileUploadInput5').replaceWith($('.fileUploadInput5').clone());
  //   $('.fileUploadContent5').hide();
  //   $('.imageUploadWrap5').show();
  // }
  // $('.imageUploadWrap5').bind('dragover', function () {
  //     $('.imageUploadWrap5').addClass('image-dropping');
  // });
  // $('.imageUploadWrap5').bind('dragleave', function () {
  //     $('.imageUploadWrap5').removeClass('image-dropping');
  // });

//  function sendMessageAdmin() {
//       $.ajax({
//           data: $('#formSubmitMessageAdmin').serialize(),
//           url: '{{ route("ticketing.store-message") }}',           
//           type: "post",
//           dataType: 'json',            
//           success: function (data) {
//               // alert("success!")
//           },
//           error: function (xhr, status, error) {
//               alert(xhr.responseText);
//           }
//       });
//     }

  // showChatHistoryAdmin()
  // function showChatHistoryAdmin() {
  //   // console.log("show-chat-history-admin")
  //   $.ajax({
  //       url: '{{ route("ticketing.show-chat-history-admin") }}',           
  //       type: "get",
  //       dataType: 'json',            
  //       success: function (data) {
  //         if (data.length == 0) {
  //           $("#noHistory").addClass("active")
  //         }else{
  //           $("#chatHistory").addClass("active")
  //         }

  //         html = ``
  //         for (let i = 0; i < data.length; i++) {
  //           html +=
  //             `<div class="chatHistory show-message-admin" data-nama="`+data[i].nama+`" data-user_nik="`+data[i].nik+`">
  //               <a href="#directChat" aria-controls="directChat" role="tab" data-toggle="tab">
  //                   <div class="content1">
  //                       <div class="name">`+data[i].nama+`</div>
  //                       <div class="bagian">`+data[i].nik+`</div>
  //                   </div>
  //                   <div class="content2">
  //                       <!-- <div class="pills">new</div> -->
  //                       <i class="fas fa-chevron-right"></i>
  //                   </div>
  //               </a>
  //           </div>`
  //         }
  //         $(".list-history-admin").html(html)
  //       },
  //       error: function (xhr, status, error) {
  //           alert(xhr.responseText);
  //       }
  //   })
  // }

  // $('body').on('click','.show-message-admin', function(){
  //   var user_nik = $(this).data("user_nik")
  //   var nama = $(this).data("nama")
  //   $("#formSubmitMessageAdmin .to_nik").val(user_nik)
  //   $("#formSubmitMessageAdmin .nama").val(nama)

  //   showMessageAdmin(user_nik)
  // })

  // function showMessageAdmin(user_nik) {
  //   console.log(user_nik)
  //     $.ajax({
  //         url: '{{ route("ticketing.show-message-admin") }}',           
  //         type: "post",
  //         dataType: 'json',         
  //         data: {
  //           user_nik: user_nik
  //         },
  //         success: function (data) {
  //           html=``
  //           for (let i = 0; i < data.length; i++) {
  //             if(data[i].support_name == "{{ auth()->user()->nik }}") {

  //               // ini utk sebelah kanan ( yg submit)
  //               var message = `<div class="rightChat"><span>`+data[i].pesan+`</span></div>`
  //             }else{

  //               // ini utk sebelah kiri (dari org lain yg chat)
  //               var message = `<div class="leftChat"><span>`+data[i].pesan+`</span></div>`
  //             }
  //             html += message
  //           }
  //           $(".list-message-admin").html(html)
  //         },
  //         error: function (xhr, status, error) {
  //             alert(xhr.responseText);
  //         }
  //     });
  //   }
  //    $(document).ready(function(){
  //     // console.log("ggi_is_database_ticketing-message-notification");
  //       window.Echo.channel('ggi_is_database_ticketing-message-notification')
  //       .listen('.listen', (e) => {
  //         // ini event ketika ada pesan masuk maupun  yang submit 

  //         if(e.message.user.nik == "{{ auth()->user()->nik }}") {

  //           // ini utk sebelah kanan (kita yg submit)
  //           var message = `
  //             <div class="rightChat"><span>`+e.message.message+`</span></div>
  //             `
  //         }else{

  //           // ini utk sebelah kiri (dari org lain yg chat)
  //           var message = `<div class="leftChat"><span>`+e.message.message+`</span></div>`
  //         }
  //         $(".list-message-admin").append(message)
  //         // ini isi parameter nya
  //         console.log(e);
  //       });
  //   })

  //   $('body').on('click','#formSubmitMessageAdmin .submit', function(){
  //     sendMessageAdmin()
  //   });
  // })

</script>
@endpush