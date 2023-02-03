@extends("layouts.app")
@section("title","Ticketing")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style_maps.css')}}">

<link rel="stylesheet" href="{{asset('/common/css/Guide/playlist-plugin.css')}}">
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
                <div class="title-22 text-left">Support Ticketing</div>
                <div class="btnTicket2">
                  @if($support!=null)
                    @if($support->bagian=='IT Support')
                    <a href="{{ route('admin-ticket-it')}}" class="btn-green-md">Dashboard<i class="fs-18 ml-3 fas fa-tools"></i></a>
                    @elseif($support->bagian=='IT DT')
                    <a href="{{ route('admin-ticket-dt')}}" class="btn-green-md">Dashboard<i class="fs-18 ml-3 fas fa-tools"></i></a>
                    @elseif($support->bagian=='HR & GA')
                    <a href="{{ route('admin-ticket-hrd')}}" class="btn-green-md">Dashboard<i class="fs-18 ml-3 fas fa-tools"></i></a>
                    @elseif($support->bagian=='RECEPTIONIST')
                    <a href="{{ route('admin-ticket-booking')}}" class="btn-green-md">Dashboard<i class="fs-18 ml-3 fas fa-tools"></i></a>
                    @endif
                  @elseif(auth()->user()->role == 'SYS_ADMIN')
                    <a href="{{ route('admin-ticket-dt')}}" class="btn-green-md">Dashboard<i class="fs-18 ml-3 fas fa-tools"></i></a>
                  @elseif(auth()->user()->nik == 'GISCA')
                    <a href="{{ route('tiket.it.booking')}}" class="btn-green-md">Dashboard<i class="fs-18 ml-3 fas fa-tools"></i></a>
                  @endif
                  <a href="{{ route('create-ticket')}}" class="btn-blue-md">Create Ticket<i class="fs-18 ml-3 fas fa-ticket-alt"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="cards-18 p-4" style="min-height:100vh">
              <ul class="nav nav-tabs sr-md-tabs mb-4" role="tablist" id="myTab">
                <li class="nav-item-show">
                  <a class="nav-link relative active show" data-toggle="tab" href="#waiting" role="tab"></i>
                    <i class="fs-28 fas fa-hourglass-half"></i>
                    <div class="f-14">Waiting</div>
                    @if($waiting>0)
                    <span class="tabs-badge">{{$waiting}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#process" role="tab"></i>
                    <i class="fs-28 fas fa-tools"></i>
                    <div class="f-14">On Process</div>
                    @if($proggres>0)
                    <span class="tabs-badge">{{$proggres}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#pending" role="tab"></i>
                    <i class="fs-28 fas fa-history"></i>
                    <div class="f-14">Pending</div>
                    @if($pending>0)
                    <span class="tabs-badge">{{$pending}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
                <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#done" role="tab"></i>
                    <i class="fs-28 fas fa-check-double"></i>
                    <div class="f-14">Done</div>
                    @if($done>0)
                    <span class="tabs-badge">{{$done}}</span>
                    @endif
                  </a>
                  <div class="sr-slide"></div>
                </li>
              </ul>
              <div class="tab-content card-block">
                <div class="tab-pane active" id="waiting" role="tabpanel">
                  @if($waiting>0)
                    @include('it_dt.Ticketing.itdt_ticketing.partials.tab-waiting')
                  @else
                  <div class="no-ticket-queue">
                    <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                    <span class="no-ticket-capt">No Ticket Yet</span>
                  </div>
                  @endif
                </div>
                <div class="tab-pane" id="process" role="tabpanel">
                  @if($proggres>0)
                    @include('it_dt.Ticketing.itdt_ticketing.partials.tab-process')
                  @else
                  <div class="no-ticket-queue">
                    <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                    <span class="no-ticket-capt">No Ticket Yet</span>
                  </div>
                  @endif
                </div>
                <div class="tab-pane" id="pending" role="tabpanel">
                  @if($pending>0)
                    @include('it_dt.Ticketing.itdt_ticketing.partials.tab-pending')
                  @else
                  <div class="no-ticket-queue">
                    <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                    <span class="no-ticket-capt">No Ticket Yet</span>
                  </div>
                  @endif
                </div>
                <div class="tab-pane" id="done" role="tabpanel">
                  @if($done>0)
                    @include('it_dt.Ticketing.itdt_ticketing.partials.tab-done')
                  @else
                  <div class="no-ticket-queue">
                    <img src="{{url('images/iconpack/noticket.svg')}}"><br>
                    <span class="no-ticket-capt">No Ticket Yet</span>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-12">
            <div class="cards-18" style="padding:1.6rem 1.3rem">
              <div class="row">
                <div class="col-12">
                  <div class="title-16 mb-1" style="font-weight:500">IT Support</div>
                  <div class="cards-scroll pr-1 mt-1 scrollY" id="scroll-bar" style="max-height:378px">
                    @foreach($it_support as $key => $value)
                    <div class="technician">
                      <div class="tech-icon"><i class="fas fa-user-cog"></i></div>
                      <div class="tech-desc">
                        <div class="tech-name text-truncate">{{$value['nama']}}</div>
                        @if($value['proses']!=null)
                          <div class="tech-status text-truncate"><span class="txt-blue fw-500">ON Progress</span> {{$value['branchdetail']}} -{{$value['no']}} </div> 
                        @else
                          <div class="tech-status text-truncate"><span class="txt-ygreen fw-500">Ready to serve</span></div> 
                        @endif
                      </div>
                    </div>
                    @endforeach
                  </div>

                  <div class="title-16 mb-1 mt-3" style="font-weight:500">DT Support</div>
                  <div class="cards-scroll pr-1 mt-1 scrollY" id="scroll-bar" style="max-height:378px">
                    @foreach($it_dt as $key => $value)
                    <div class="technician">
                      <div class="tech-icon"><i class="fas fa-user-cog"></i></div>
                      <div class="tech-desc">
                        <div class="tech-name text-truncate">{{$value['nama']}}</div> 
                        @if($value['proses']!=null)
                          <div class="tech-status text-truncate"><span class="txt-blue fw-500">ON Progress</span> {{$value['branchdetail']}} -{{$value['no']}} </div> 
                        @else
                          <div class="tech-status text-truncate"><span class="txt-ygreen fw-500">Ready to serve</span></div> 
                        @endif
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="title-16 mb-1 mt-3" style="font-weight:500">HR & GA Support </div>
                  <div class="cards-scroll pr-1 mt-1 scrollY" id="scroll-bar" style="max-height:378px">
                    @foreach($hr_support as $key => $value)
                    <div class="technician">
                      <div class="tech-icon"><i class="fas fa-user-cog"></i></div>
                      <div class="tech-desc">
                        <div class="tech-name text-truncate">{{$value['nama']}}</div> 
                        @if($value['proses']!=null)
                          <div class="tech-status text-truncate"><span class="txt-blue fw-500">ON Progress</span> {{$value['branchdetail']}} -{{$value['no']}} </div> 
                        @else
                          <div class="tech-status text-truncate"><span class="txt-ygreen fw-500">Ready to serve</span></div> 
                        @endif
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
    @include('it_dt.Ticketing.itdt_ticketing.partials.floating-chat')
  </div>


</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/questCovid/jquery.2.2.0.js')}}"></script>
<script src="{{asset('common/js/questCovid/bootstrap.3.3.7.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
 
    $('body').on('click','.next-tab', function(){
        var next = $('.nav-tabs > .active').next('li');
        if(next.length){
            next.find('a').trigger('click');
            setTimeout(1000);
        }else{
            $('#myTabs a:first').tab('show');
        }
    });

    $('body').on('click','.next-tab-answer1', function(){
        var next = $('.nav-tabs > .active').next('li');
        if(next.length){
            $('#myTabs a[href="#questThree"]').tab('show');
            document.getElementById("jawabankedua").value = "Tidak Berpergian";
            setTimeout(1000);
        }else{
            $('#myTabs a:first').tab('show');
        }
    });

    $('body').on('click','.next-tab-answer7', function(){
        var next = $('.nav-tabs > .active').next('li');
        console.log(next)
        if(next.length){
            // $('#myTabs a[href="#questThree"]').tab('show');
            $("#simpantujuh").append(`
            <button type="submit" class="btn-orange-md" style="margin-top:2.8rem;position:relative;z-index:20">Selesai</button>`);
            document.getElementById("jawabanketujuh").value = "Tidak Ada";
            setTimeout(1000);
        }else{
            $('#myTabs a:first').tab('show');
        }
    });

    $('body').on('click','.previous-tab', function(){
        var prev = $('.nav-tabs > .active').prev('li')
        if(prev.length){
            prev.find('a').trigger('click');
        }else{
            $('#myTabs a:last').tab('show');
        }
    });
</script>



<script>
    /*=============== ACCORDION ===============*/
  $(document).ready(function(){
	  // $('[data-toggle="popover"]').popover();
	});


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
  $('.closeTiketIt').on('click', function (event) {
    event.preventDefault();
    const submited = event.target.parentElement;
    swal({
        title: 'Are you sure?',
        text: 'Ticket will be cancelled, waiting to be confirmed',
        icon: 'warning',
        buttons: ["cancel", "yes"],
    }).then(function(value) {
        if (value) {
            submited.submit();
        }
    });
  });
</script>
@if(Session::has('error'))
  <script>
    var meseg = "{{Session::get('error')}}";
    window.onload = function() { 
      swal({
      position: 'center',
      type: 'error',
      icon: 'error',
      title: 'Attention',
      text: meseg,
      showConfirmButton: false,
      timer: 2000
    })

    }
  </script>
@endif
@if(Session::has('success')) 
  <script>
    var message = "{{Session::get('success')}}";
    window.onload = function() {
      swal({
      position: 'center',
      type: 'success',
      icon: 'success',
      title: 'Ticket Created',
      text: message,
      showConfirmButton: false,
      timer: 2000
    })

    }
  </script>
@endif

<script src="{{asset('common/js/magnify.js')}}"></script>
<script>

  const buttontoggle = document.getElementById("btn-legend");
    const legend = document.getElementsByClassName("floating-legends")[0];
    buttontoggle.addEventListener('click', function () {
        legend.classList.toggle('fade-in');
        legend.classList.toggle('fade-Out');
         console.log('ok');
    });

    
    // $(".magnify").jfMagnify();
    // the jfMagnify plugin and other demo files can be found
    // https://github.com/fonstok/jfMagnify
    $(document).ready(function () {
        var scaleNum = 2;
        // $(".magnify").jfMagnify();
        $('.plus').click(function () {
            scaleNum += 1;
            if (scaleNum >= 10) {
                scaleNum = 10;
            };
            $(".magnify").data("jfMagnify").scaleMe(scaleNum);
        });
        $('.minus').click(function () {
            scaleNum -= 1;
            if (scaleNum <= 1) {
                scaleNum = 1;
            };
            $(".magnify").data("jfMagnify").scaleMe(scaleNum);
        });
        $('.magnify_glass').animate({
            'top': '60%',
            'left': '60%'
        }, {
            duration: 2000,
            progress: function () {
                $(".magnify").data("jfMagnify").update();
            },
            easing: "easeOutElastic"
        });
    });
</script>


@if(Session::has('tess')) 
  <script>
    var message = "{{Session::get('tess')}}";
    window.onload = function() {
      swal({
      position: 'center',
      type: 'warning',
      button : true,
      icon: 'warning',
      title: 'Pemberitahuan',
      text: message,
      showConfirmButton: true,
    })
    }
  </script>
@endif

<script>
var username='{{Auth::user()->nik}}';
// alert(username);

var is_open=localStorage.getItem(username);
if (is_open==null) {
  // message_info();

  window.onload = function() {
      swal({
      position: 'center',
      type: 'warning',
      button : true,
      icon: 'warning',
      title: 'Pemberitahuan',
      text: '(Ticketing v.2) Sistem Ticketing Telah Diperbarui, IT Ticketing berganti nama menjadi Ticketing, Silahkan gunakan sistem ticketing dengan versi terbaru.',
      showConfirmButton: true,
    })
    }

  localStorage.setItem(username, username);
}
</script>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
  jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 

    function sendMessage() {
      $.ajax({
          data: $('#formSubmitMessage').serialize(),
          url: '{{ route("ticketing.store-message") }}',           
          type: "post",
          dataType: 'json',            
          success: function (data) {
              // alert("success!")
          },
          error: function (xhr, status, error) {
              alert(xhr.responseText);
          }
      });
    }


    showMessage()
    function showMessage() {
      $.ajax({
          url: '{{ route("ticketing.show-message") }}',           
          type: "get",
          dataType: 'json',            
          success: function (data) {
            html=``
            for (let i = 0; i < data.length; i++) {
              if(data[i].nik == "{{ auth()->user()->nik }}") {

                // ini utk sebelah kanan ( yg submit)
                var message = `<li style="background-color: red">(right) `+data[i].nama+`<br>  `+data[i].pesan+`</li>`
              }else{

                // ini utk sebelah kiri (dari org lain yg chat)
                var message = `<li style="background-color: grey">(left) `+data[i].nama+`<br>  `+data[i].pesan+`</li>`
              }
              html += message
            }
            $(".list-message").html(html)
          },
          error: function (xhr, status, error) {
              alert(xhr.responseText);
          }
      });
    }

    $(document).ready(function(){
        // window.Echo.channel('ggi_is_database_ticketing-message-notification')
        // .listen('.listen', (e) => {
        //   // ini event ketika ada pesan masuk maupun  yang submit 

        //   if(e.message.user.nik == "{{ auth()->user()->nik }}") {

        //     // ini utk sebelah kanan (kita yg submit)
        //     var message = `
        //       <li style="background-color: red">(right) `+e.message.user.nama+`<br>  `+e.message.message+`</li>
        //       `
        //   }else{

        //     // ini utk sebelah kiri (dari org lain yg chat)
        //     var message = `<li style="background-color: grey">(left) `+e.message.user.nama+`<br>  `+e.message.message+`</li>`
        //   }
        //   $(".list-message").append(message)

        //   // ini isi parameter nya
        //   console.log(e)
        // })
    })

    $('body').on('click','#formSubmitMessage .submit', function(){
      sendMessage()
    });

    $(document).ready(function(){
      // $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      //     localStorage.setItem('activeTab', $(e.target).attr('href'));
      // });
      // var activeTab = localStorage.getItem('activeTab');
      // if(activeTab){
      //     $('#myTab a[href="' + activeTab + '"]').tab('show');
      // }
    });
  })
</script>

<script>
  var element = $('.floating-chat');
  var myStorage = localStorage;

  if (!myStorage.getItem('chatID')) {
      myStorage.setItem('chatID', createUUID());
  }

  setTimeout(function() {
      element.addClass('enter');
  }, 1000);

  element.click(openElement);

  function openElement() {
      var messages = element.find('.messages');
      var textInput = element.find('.text-box');
      element.find('>i').hide();
      element.addClass('expand');
      element.find('.chat').addClass('enter');
      var strLength = textInput.val().length * 2;
      textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
      element.off('click', openElement);
      element.find('.header button').click(closeElement);
      element.find('#sendMessage').click(sendNewMessage);
      messages.scrollTop(messages.prop("scrollHeight"));
  }

  function closeElement() {
      element.find('.chat').removeClass('enter').hide();
      element.find('>i').show();
      element.removeClass('expand');
      element.find('.header button').off('click', closeElement);
      element.find('#sendMessage').off('click', sendNewMessage);
      element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
      setTimeout(function() {
          element.find('.chat').removeClass('enter').show()
          element.click(openElement);
      }, 500);
  }

  function createUUID() {
      // http://www.ietf.org/rfc/rfc4122.txt
      var s = [];
      var hexDigits = "0123456789abcdef";
      for (var i = 0; i < 36; i++) {
          s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
      }
      s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
      s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
      s[8] = s[13] = s[18] = s[23] = "-";

      var uuid = s.join("");
      return uuid;
  }

  function sendNewMessage() {
      var userInput = $('.text-box');
      var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

      if (!newMessage) return;

      var messagesContainer = $('.messages');

      messagesContainer.append([
          '<li class="self">',
          newMessage,
          '</li>'
      ].join(''));

      // clean out old message
      userInput.html('');
      // focus on input
      userInput.focus();

      messagesContainer.finish().animate({
          scrollTop: messagesContainer.prop("scrollHeight")
      }, 250);
  }

  function onMetaAndEnter(event) {
      if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
          sendNewMessage();
      }
  }
</script>



@endpush