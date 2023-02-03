@include('Career.layouts.header')
@include('Career.layouts.navbar')

  <div class="content-wrapper bg-career">
    <div class="content-header"></div>
    <section class="content pt-5 Career">
      <div class="container-fluid">
        <div class="row mt-5" style="padding-bottom:7rem">
          <div class="col-12">
            <div class="title">Find Your Dream Job in <span class="txt-orange">PT.Gistex Indonesia!</span></div> 
            <div class="sub-title">Our vision to be a group of companies that have the best management. Let’s Join With Us </div>
          </div>
          <div class="col-12">
            <form action="{{ route('search-job')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="filterCareer">
                  <div class="selectFactory flex">
                    <div class="input-group-prepend">
                        <span class="inputGroupOrange2"><i class="fs-24 fas fa-city"></i></span>
                    </div>
                    <select class="form-control border-input-10 select2bs4" id="penempatan" name="penempatan">
                      <option selected disabled>All Factory</option>
                      @foreach($branch as $key => $value)
                      <option value="{{$value['nama_branch']}}">{{$value['nama_branch']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="selectDept flex">
                    <div class="input-group-prepend">
                        <span class="inputGroupOrange2"><i class="fs-24 fas fa-network-wired"></i></span>
                    </div>
                    <select class="form-control border-input-10 select2bs4" id="string4" name="string4">
                      <option selected disabled>Departement</option>
                      @foreach($data_departemen as $key => $value)
                      <option value="{{$value['departemen']}}">{{$value['departemen']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btnFilter">Search</button>
              </div>
            </form>
          </div>
          <div class="col-12 text-center mt-5 mb-4">
            <div class="title-24">Job Vacancies</div>
            <div class="justify-center">
              <div class="borderOrange"></div>
            </div>
          </div>
          <div class="col-12 justify-center mb-5">
            <div class="container-form">
              <input type="text" class="search" placeholder="Search..." required>
              <button type="button" class="iconSearch"><i class="fas fa-search"></i></button>
            </div>
          </div>
          @foreach($data as $key => $value)
            <div class="col-xl-3 col-lg-4 col-md-6 tabs_index" id="index{{$value['ers_id']}}" nomor="{{$value['ers_id']}}">
              <div class="cardJob" style="padding: 28px 25px">
                <div class="titleJob mb-3">
                  <div class="title1 truncate nama_dokumen">{{$value['nama_ers']}}</div>
                </div>
                <div class="statusJob">
                  <i class="iconJob fas fa-city"></i>
                  <div class="title2">{{$value['string4']}}</div>
                </div>
                <div class="statusJob">
                  <i class="iconJob fas fa-network-wired"></i>
                  <div class="title2">{{$value['penempatan']}}</div>
                </div>
                <div class="statusJob">
                  <i class="iconJob fas fa-users"></i>
                  <div class="title2">{{ Str::upper($value['string3']) }} People</div>
                </div>
                <div class="buttonJob mt-3">
                  <a href="{{ route('apply-job', $value['ers_id']) }}" class="btn-orange-md">Apply Job</a>
                  <a href="{{ route('apply-job', $value['ers_id']) }}" class="btn-details mt-3">See Details</a>
                </div>
              </div>
            </div>  
          @endforeach
        </div>
      </div>
    </section>
  </div>
@include('Career.layouts.footer')
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

@if(Session::has('error'))
  <script>
    // toastr.error("{!!Session::get('error')!!}");
    window.onload = function() { 
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Tidak diperbolehkan untuk upload lebih dari satu tanggal produksi.'
      })
    }
  </script>
@endif

@if(Session::has('success'))
  <script>
    // toastr.success("{!!Session::get('success')!!}");
    window.onload = function() {
      swal({
        position: 'center',
        icon: 'success',
        title: 'Success',
        text: 'Data Berhasil Tersimpan',
        buttons: false,
        timer: 1500
      })
    };
  </script>
@endif
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var title = $('.nama_dokumen').html(); 
  console.log(title)
  if (title != null) {
    function showJobs(title){
      console.log(title);
      $.ajax({
        data: {
          title:title,
        },
        url: '{{ route("live_search-job") }}',           
        type: "get",
        dataType: 'json',       
        success: function (data) {
          // console.log(data);
          show(data); 
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }
    function show (data) {
      var result = Object.values(data);
      const tabpane = document.getElementsByClassName('tabs_index');
      $('.tabs_index').hide();
      result.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          if (element.getAttribute('nomor') == e.ers_id) {
              $('#index'+e.ers_id).show();
          }
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