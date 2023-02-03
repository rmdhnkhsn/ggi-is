@extends("layouts.app")
@section("title","Job Orientation")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row JobOri">
        <div class="col-12">
            <div class="cards" style="padding:20px 28px 16px 28px">
                <div class="cards-scroll pb-2 scrollX" id="scroll-bar">
                    <ul class="nav nav-pills flex" role="tablist" style="gap:.8rem !important;flex-wrap: nowrap;">
                        @include('more_program.job_orientation.partials.nav-tabs-public')
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tab-content">
                <div class="tab-pane fade" id="public" role="tabpanel">
                  @include('more_program.job_orientation.partials.tab-public')
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/guide/moment.min.js')}}"></script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>

<script>
  $( document ).ready(function() {
    console.log( "ready!" );
    const tab = document.getElementsByClassName('tab-pane');
    const navbar = document.getElementsByClassName('navBar');
    navbar[1].classList.add('active');
    tab[0].classList.add('active'); tab[0].classList.add('show');

  });
  
  $('#icons').click(function() {         
    if($(this).hasClass('fa-bars')){
      $(this).removeClass('fa-bars');
      $(this).addClass('fa-times');
    }

    else if($(this).hasClass('fa-times')){
      $(this).removeClass('fa-times');
      $(this).addClass('fa-bars');
    }        
  });
</script>

<script>
  const all = document.getElementById('all');
  const tabitem = document.getElementsByClassName('tab');
  all.addEventListener('click', function() {
    if (all.hasClass('show')) { 
      Array.from(tabitem).forEach(function (e) {
          e.toggle('show');
        });
      all.classList.add('show');
    }
  })
</script>

<script>
    /*=============== ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.accordionItem')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.iconFilter')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContent')

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
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var title = $('.nama_dokumen').html(); 
  if (title != null) {
    function showJobs(title){
      // console.log(title);
      $.ajax({
        data: {
          title:title,
        },
        url: '{{ route("job.public_list") }}',           
        type: "get",
        dataType: 'json',       
        success: function (data) {
          console.log(data);   
          show(data); 
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }
    function show (data) {
      const tabpane = document.getElementsByClassName('cobacoba');
      const inicoba = document.getElementsByClassName('cobaanwe');
      const tab_bagian = document.getElementsByClassName('inibagian');
      const inti_bagian = document.getElementsByClassName('inti_bagian');
      
      // console.log(inicoba);
      $('.inti_bagian').hide();
      $('.cobaanwe').hide();

      data.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          Array.from(inicoba).forEach(function (teuing) {
            if (teuing.getAttribute('departemen') == e.departemen) {
              if (teuing.getAttribute('atribut_we') == e.id) {
                  console.log(e.nama_dokumen);       
                  $('#kumaha_atuh'+e.id).show();
              }
            }
          })
        })
      })

      data.forEach(function(ehh) {
        Array.from(tab_bagian).forEach(function (element_nya) {
          Array.from(inti_bagian).forEach(function (teuing_atuh) {
            if (element_nya.getAttribute('departemen') == ehh.departemen) {
              if (teuing_atuh.getAttribute('atribut_nih') == ehh.id){
                  $('#kumaha_nya'+ehh.id).show();
              }
            }
          })
        })
      })
    }

    $('body').on('keyup', '.search', function () {       
      var title = $(this).val()
      showJobs(title)
    });

    $('body').on('click', '.button-search', function () {  
      var title = $('.search').val()
      showJobs(title)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
      console.log(search)
    }
  }

</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).ready(function() {
    $(".submit_btnqq").click('#btn-moreqq',function(e){
      e.preventDefault(); 
      // console.log('berhasil');
      const viewers = e.target.getAttribute('viewers_na');
      const loop = 1;
      var id = e.target.getAttribute('atribut_we');
      var update = (parseInt(viewers)+parseInt(loop));
      var data = {
        'id' :id,
        'viewers' : update
      }
      $.ajax({
        type: "PUT",
        url: '{{ route("job.update_viewers") }}',           
        data: data,
        dataType: 'json',
        success: function (response) {
          var qty_view=parseInt($('#result'+id).html());
          qty_view+=1;
          $('#result'+id).html(qty_view);
          console.log(response);
        }
      })
    })
  })
  $(document).ready(function() {
    $(".submit_donwnload").click('#btn-reqq',function(f){
      f.preventDefault(); 
      const viewers = f.target.getAttribute('viewers_na');
      const loop = 1;
      var id = f.target.getAttribute('atribut_we');
      var update = (parseInt(viewers)+parseInt(loop));
      var data = {
        'id' :id,
        'viewers' : update
      }
      $.ajax({
        type: "PUT",
        url: '{{ route("job.update_viewers") }}',           
        data: data,
        dataType: 'json',
        success: function (response) {
          var qty_view=parseInt($('#result'+id).html());
          qty_view+=1;
          $('#result'+id).html(qty_view);
          location.href = f.target.getAttribute('href');
        }
      })
    })
  })

  $(document).ready(function() {
    $(".submit_media").click('#btn-media',function(e){
      e.preventDefault(); 
      // console.log('berhasil');
      const viewers = e.target.getAttribute('viewers_na');
      const loop = 1;
      var id = e.target.getAttribute('atribut_we');
      var update = (parseInt(viewers)+parseInt(loop));
      var data = {
        'id' :id,
        'viewers' : update
      }
      $.ajax({
        type: "PUT",
        url: '{{ route("job.update_viewers") }}',           
        data: data,
        dataType: 'json',
        success: function (response) {
          var qty_view=parseInt($('#hasil'+id).html());
          qty_view+=1;
          $('#hasil'+id).html(qty_view);
          console.log(response);
        }
      })
    })
  })

  $(document).ready(function() {
    $(".submit_down").click('#btn-req2',function(f){
      f.preventDefault(); 
      const viewers = f.target.getAttribute('viewers_na');
      const loop = 1;
      var id = f.target.getAttribute('atribut_we');
      var update = (parseInt(viewers)+parseInt(loop));
      var data = {
        'id' :id,
        'viewers' : update
      }
      $.ajax({
        type: "PUT",
        url: '{{ route("job.update_viewers") }}',           
        data: data,
        dataType: 'json',
        success: function (response) {
          var qty_view=parseInt($('#hasil'+id).html());
          qty_view+=1;
          $('#hasil'+id).html(qty_view);
          location.href = f.target.getAttribute('href');
        }
      })
    })
  })
</script>

<!-- untuk image 1  -->
<script>
  function myFunction(clicked_id) {
    console.log(clicked_id);
    $('#previewImages'+clicked_id).modal('show');
    const classnya = document.getElementsByClassName("previewImageAtas"+clicked_id);
    let dv = 'priviewImage'+clicked_id;
    let ur=$(classnya).attr("pic-url");
    document.getElementById(dv).src=ur;
  }
</script>
<!-- untuk image 2  -->
<script>
  function imageBawah(clicked_id) {
    console.log(clicked_id);
    $('#previewImagesSub'+clicked_id).modal('show');
    const classnya = document.getElementsByClassName("previewImageBawah"+clicked_id);
    let dv = 'priviewImageBawah'+clicked_id;
    let ur=$(classnya).attr("pic-url");
    document.getElementById(dv).src=ur;
  }
</script>

<!-- untuk pdf atas  -->
<script>
  function pdfAtas(clicked_id) {
    // console.log(clicked_id);
      $('#previewPdf'+clicked_id).modal('show');
      const classnya = document.getElementsByClassName("previewPDFAtas"+clicked_id);
      let ur=$(classnya).attr("pic-url");
      // console.log(ur);

      $("#Dicobawe"+clicked_id).append(`
        <div class="col-12">
            <iframe id="pdf-js-viewer" src="{{ asset('storage/job_orientation/pdf/`+ur+`') }}" width="100%" height="530"></iframe>
        </div>
      `);

      $('#previewPdf'+clicked_id).on('hide.bs.modal', function(){
        const modal = document.getElementById("Dicobawe"+clicked_id);
        modal.innerHTML = '';
      }); 
  }
</script>
<!-- untuk pdf bawah  -->
<script>
  function pdfBawah(clicked_id) {
    // console.log(clicked_id);
      $('#previewPdfSub'+clicked_id).modal('show');
      const classnya = document.getElementsByClassName("previewPDFBawah"+clicked_id);
      let ur=$(classnya).attr("pic-url");
      // console.log(ur);
      $("#Dicobasaja"+clicked_id).append(`
        <div class="col-12">
            <iframe id="pdf-js-viewer" src="{{ asset('storage/job_orientation/pdf/`+ur+`') }}" width="100%" height="530"></iframe>
        </div>
      `);

      $('#previewPdfSub'+clicked_id).on('hide.bs.modal', function(){
        const modal = document.getElementById("Dicobasaja"+clicked_id);
        modal.innerHTML = '';
      }); 
  }
</script>

<!-- untuk video atas  -->
<script>
  function videoAtas(clicked_id) {
    $('#previewVideo'+clicked_id).modal('show');
    const classnya = document.getElementsByClassName("previewVideoAtas"+clicked_id);
    let ur=$(classnya).attr("pic-url");
    // // console.log(ur);
    $("#siVideoAtas"+clicked_id).append(`
      <div class="col-12">
          <video width="100%" controls>
              <source src="{{ asset('storage/job_orientation/video/`+ur+`') }}">
          </video>
      </div>
    `);

    $('#previewVideo'+clicked_id).on('hide.bs.modal', function(){
        const modal = document.getElementById("siVideoAtas"+clicked_id);
        modal.innerHTML = '';
      }); 
  }
</script>
<!-- untuk video bawah  -->
<script>
  function videoBawah(clicked_id) {
    console.log(clicked_id);
    $('#previewVideoSub'+clicked_id).modal('show');
    const classnya = document.getElementsByClassName("previewVideoBawah"+clicked_id);
    let ur=$(classnya).attr("pic-url");
    // // // console.log(ur);
    $("#siVideoBawah"+clicked_id).append(`
      <div class="col-12">
          <video width="100%" controls>
              <source src="{{ asset('storage/job_orientation/video/`+ur+`') }}">
          </video>
      </div>
    `);
    $('#previewVideoSub'+clicked_id).on('hide.bs.modal', function(){
        const modal = document.getElementById("siVideoBawah"+clicked_id);
        modal.innerHTML = '';
      }); 
  }
</script>
@endpush