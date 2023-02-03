@extends("layouts.app")
@section("title","Employee Tracking")
@push("styles")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-chart-pie"></i>
            </div>
            <div class="col-12">
              <div class="desc">Dashboard</div>
            </div>
          </div>
        </div>
      </a>
      <a href="" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-file-contract"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Job Aplicant</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-4">
      <div class="col-12 jobVacancy">
        <div class="cards-18 p-4">
          <div class="text-center pt-2 pb-5">
            <div class="title-24">Employee Tracking</div>
            <div class="sub-title-14">selection of prospective new employees as needed</div>
          </div>  
          <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'RECRUITMENT')
              <li class="nav-item-show">
                  <a class="nav-link relative active" bagian="request" data-toggle="tab" href="#request" role="tab"></i>
                      <i class="fs-28 fas fa-eject"></i>
                      <div class="f-14">Request</div>
                      <span class="tabs-badge">{{$count_request}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
              <li class="nav-item-show">
                  <a class="nav-link relative " data-toggle="tab" href="#publish" role="tab"></i>
                      <i class="fs-28 fas fa-envelope-open-text"></i>
                      <div class="f-14">Publish</div>
                      <span class="tabs-badge">{{$count_publish}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
              <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#applicant" role="tab"></i>
                      <i class="fs-28 fas fa-user-tie"></i>
                      <div class="f-14">Applicant</div>
                      <span class="tabs-badge">{{$count_applicant}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
              <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#psychotest" role="tab"></i>
                      <i class="fs-28 fa-solid fa-brain"></i>
                      <div class="f-14">Psychological Test</div>
                      <span class="tabs-badge">{{$count_psyco}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
              <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#test_skill" role="tab"></i>
                      <i class="fs-28 fa-solid fa-users-gear"></i>
                      <div class="f-14">Technical Test</div>
                      <span class="tabs-badge">{{$count_skills}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
            @endif
              <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#interview" role="tab"></i>
                      <i class="fs-28 fa-solid fa-people-arrows-left-right"></i>
                      <div class="f-14">Interview</div>
                      <span class="tabs-badge">{{$count_interview}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'RECRUITMENT')
              <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#probation" role="tab"></i>
                      <i class="fs-28 fas fa-walking"></i>
                      <div class="f-14">Probation</div>
                      <span class="tabs-badge">{{$count_probation}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
              <li class="nav-item-show">
                  <a class="nav-link relative" data-toggle="tab" href="#disqualification" role="tab"></i>
                      <i class="fs-28 fa-solid fa-users-slash"></i>
                      <div class="f-14">Disqualification</div>
                      <span class="tabs-badge">{{$count_disqualification}}</span>
                  </a>
                  <div class="sch-slide"></div>
              </li>
            @endif
          </ul>
          <div class="tab-content card-block">
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'RECRUITMENT')
            <div class="tab-pane active" id="request" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.request.tabs_request')
            </div>
            <div class="tab-pane " id="publish" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.publish.tabs_publish')
            </div>
            <div class="tab-pane" id="applicant" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.applicant.tabs_applicant')
            </div>
            <div class="tab-pane" id="psychotest" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.psychotest.tabs_psychotest')
            </div>
            <div class="tab-pane" id="test_skill" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.test_skills.tabs_skills')
            </div>
            @endif
            <div class="tab-pane" id="interview" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.interview.tabs_interview')
            </div>
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'RECRUITMENT')
            <div class="tab-pane" id="probation" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.probation.tabs_probation')
            </div>
            <div class="tab-pane" id="disqualification" role="tabpanel">
                @include('hr_ga.job_vacancy.job_aplicant.partials.disqualification.tabs_disqualification')
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script src="{{asset('common/js/employee_tracking/publish.js')}}"></script>
<script src="{{asset('common/js/employee_tracking/applicant.js')}}"></script>
<script src="{{asset('common/js/employee_tracking/psychotest.js')}}"></script>
<script src="{{asset('common/js/employee_tracking/test_skills.js')}}"></script>
<script src="{{asset('common/js/employee_tracking/interview.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(".customFileInput").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".customFileLabelsBlue").addClass("selected").html(fileName).css('padding-left', '184px');
  });
  
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>

<script>
  $('.endProbation').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'End the probation period of this employee?',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });

  $('.promoteProbation').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'Promote this candidate to probation?',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
  
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

  $('.disqualification_btn').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    // console.log(url);
    swal({
        title: 'Are you sure?',
        text: 'Want to disqualification this candidate?',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });

  $('.deleteDisqualification').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    // console.log(url);
    swal({
        title: 'Are you sure?',
        text: 'Delete this candidate?',
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
  // Publish
  $('.delete_all').on('click', function(e) {
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    console.log(allVals);
    if(allVals.length <=0)  
    {  
        alert("Please select row.");  
    }  else {  
      var check = confirm("Are you sure you want to delete this row?");  
      if(check == true){  
        var join_selected_values = allVals.join(","); 
        $.ajax({
            url: '{{ route("publish-update_all") }}',
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+join_selected_values,
            success: function (data) {
              console.log(data);
                if (data['success']) {
                    $(".sub_chk:checked").each(function() { 
                      allVals.forEach(function(e) {
                        $('#publish'+e).remove();
                      })
                        // $(this).parents("tr").remove();
                    });
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
      }
    }
  })

  // Applican 
  $('.delete_semua').on('click', function(e) {
    var allVals = [];  
    $(".sub_cek:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    console.log(allVals);
    if(allVals.length <=0)  
    {  
        alert("Please select row.");  
    }  else {  
      var check = confirm("Are you sure you want to delete this row?");  
      if(check == true){  
        var join_selected_values = allVals.join(","); 
        $.ajax({
            url: '{{ route("disqualification-all") }}',
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+join_selected_values,
            success: function (data) {
              console.log(data);
                if (data['success']) {
                    $(".sub_cek:checked").each(function() { 
                      allVals.forEach(function(e) {
                        $('.testajadulu'+e).remove();
                      })
                        // $(this).parents("tr").remove();
                    });
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
      }
    }
  })

  // psychotest  
  $('.all_psychotest').on('click', function(e) {
    var allVals = [];  
    $(".cek_psychotest:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    console.log(allVals);
    if(allVals.length <=0)  
    {  
        alert("Please select row.");  
    }  else {  
      var check = confirm("Are you sure you want to delete this row?");  
      if(check == true){  
        var join_selected_values = allVals.join(","); 
        $.ajax({
            url: '{{ route("disqualification-all") }}',
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+join_selected_values,
            success: function (data) {
              console.log(data);
                if (data['success']) {
                    $(".cek_psychotest:checked").each(function() { 
                      allVals.forEach(function(e) {
                        $('#psikologi'+e).remove();
                      })
                        // $(this).parents("tr").remove();
                    });
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
      }
    }
  })

  // test skill  
  $('.all_skill').on('click', function(e) {
    var allVals = [];  
    $(".cek_skill:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    console.log(allVals);
    if(allVals.length <=0)  
    {  
        alert("Please select row.");  
    }  else {  
      var check = confirm("Are you sure you want to delete this row?");  
      if(check == true){  
        var join_selected_values = allVals.join(","); 
        $.ajax({
            url: '{{ route("disqualification-all") }}',
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+join_selected_values,
            success: function (data) {
              console.log(data);
                if (data['success']) {
                    $(".cek_skill:checked").each(function() { 
                      allVals.forEach(function(e) {
                        $('.testaja'+e).remove();
                      })
                        // $(this).parents("tr").remove();
                    });
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
      }
    }
  })

  // Interview
  $('.all_interview').on('click', function(e) {
    var allVals = [];  
    $(".cek_interview:checked").each(function() {  
        allVals.push($(this).attr('data-id'));
    });  
    console.log(allVals);
    if(allVals.length <=0)  
    {  
        alert("Please select row.");  
    }  else {  
      var check = confirm("Are you sure you want to delete this row?");  
      if(check == true){  
        var join_selected_values = allVals.join(","); 
        $.ajax({
            url: '{{ route("disqualification-all") }}',
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+join_selected_values,
            success: function (data) {
              console.log(data);
                if (data['success']) {
                    $(".cek_interview:checked").each(function() { 
                      allVals.forEach(function(e) {
                        $('#interview'+e).remove();
                      })
                        // $(this).parents("tr").remove();
                    });
                    alert(data['success']);
                } else if (data['error']) {
                    alert(data['error']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
      }
    }
  })
  
  $(document).ready( function () {
    var table = $('#DTtable1').DataTable({
    "pageLength": 15,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  var input = document.getElementById("SearchText");
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("SearchBtn").click();
      }
  });
  // ===============
  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    "pageLength": 15,
    "dom": '<"search"><"top">rt<"bottom"><"clear">'
    });
    $('#SearchBtn2').on( 'keyup click', function () {
      table.search($('#SearchText2').val()).draw();
    });
  });

  var input = document.getElementById("SearchText2");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("SearchBtn2").click();
    }
  });

  $('#Date').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date2').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
  $('#Date3').datetimepicker({
    format: 'DD-MM-YY',
    showButtonPanel: false
  })
</script>

<!-- Request Search  -->
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
        url: '{{ route("request-search") }}',           
        type: "get",
        dataType: 'json',       
        success: function (data) {
          show(data); 
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }
    function show (data) {
      var result = Object.values(data);
      const tabpane = document.getElementsByClassName('cobarequest');
      $('.cobarequest').hide();
      result.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          if (element.getAttribute('nomor') == e.ers_id) {
              $('#request'+e.ers_id).show();
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

<!-- Publish Search  -->
<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var title = $('.dokumen_publish').html(); 
  console.log(title)
  if (title != null) {
    function showJobs(title){
      console.log(title);
      $.ajax({
        data: {
          title:title,
        },
        url: '{{ route("publish-search") }}',           
        type: "get",
        dataType: 'json',       
        success: function (data) {
          show(data); 
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }
    function show (data) {
      var result = Object.values(data);
      const tabpane = document.getElementsByClassName('cobapublish');
      $('.cobapublish').hide();
      result.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          if (element.getAttribute('nomor') == e.ers_id) {
              $('#publish'+e.ers_id).show();
          }
        })
      })

    }
    $('body').on('keyup', '.search_publish', function () {       
      var title = $(this).val()
      showJobs(title)
    });

    $('body').on('click', '.button-search', function () {  
      var title = $('.search_publish').val()
      showJobs(title)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
      console.log(search)
    }
  }
</script>

<!-- Applicant Search  -->
<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var title = $('.dokumen_applicant').html(); 
  console.log(title)
  if (title != null) {
    function showJobs(title){
      console.log(title);
      $.ajax({
        data: {
          title:title,
        },
        url: '{{ route("applicant-search") }}',           
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
      const tabpane = document.getElementsByClassName('coba_applicant');
      $('.coba_applicant').hide();
      result.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          if (element.getAttribute('nomor') == e.id) {
              $('#applicant'+e.id).show();
          }
        })
      })

    }
    $('body').on('keyup', '.search_applicant', function () {       
      var title = $(this).val()
      showJobs(title)
    });

    $('body').on('click', '.button-search', function () {  
      var title = $('.search_applicant').val()
      showJobs(title)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
      console.log(search)
    }
  }
</script>

<!-- Psychotest Search  -->
<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var title = $('.dokumen_psikologi').html(); 
  console.log(title)
  if (title != null) {
    function showJobs(title){
      console.log(title);
      $.ajax({
        data: {
          title:title,
        },
        url: '{{ route("psikologi-search") }}',           
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
      const tabpane = document.getElementsByClassName('coba_psikologi');
      $('.coba_psikologi').hide();
      result.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          if (element.getAttribute('nomor') == e.id) {
              $('#psikologi'+e.id).show();
          }
        })
      })

    }
    $('body').on('keyup', '.search_psikologi', function () {       
      var title = $(this).val()
      showJobs(title)
    });

    $('body').on('click', '.button-search', function () {  
      var title = $('.search_psikologi').val()
      showJobs(title)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
      console.log(search)
    }
  }
</script>

<!-- Skill Test Search  -->
<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var title = $('.dokumen_skill').html(); 
  console.log(title)
  if (title != null) {
    function showJobs(title){
      console.log(title);
      $.ajax({
        data: {
          title:title,
        },
        url: '{{ route("skill-search") }}',           
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
      const tabpane = document.getElementsByClassName('coba_skill');
      $('.coba_skill').hide();
      result.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          if (element.getAttribute('nomor') == e.id) {
              $('#skill'+e.id).show();
          }
        })
      })

    }
    $('body').on('keyup', '.search_skill', function () {       
      var title = $(this).val()
      showJobs(title)
    });

    $('body').on('click', '.button-search', function () {  
      var title = $('.search_skill').val()
      showJobs(title)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
      console.log(search)
    }
  }
</script>

<!-- Interview Search  -->
<script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var title = $('.dokumen_interview').html(); 
  console.log(title)
  if (title != null) {
    function showJobs(title){
      console.log(title);
      $.ajax({
        data: {
          title:title,
        },
        url: '{{ route("interview-search") }}',           
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
      const tabpane = document.getElementsByClassName('coba_interview');
      $('.coba_interview').hide();
      result.forEach(function(e) {
        Array.from(tabpane).forEach(function (element) {
          if (element.getAttribute('nomor') == e.id) {
              $('#interview'+e.id).show();
          }
        })
      })

    }
    $('body').on('keyup', '.search_interview', function () {       
      var title = $(this).val()
      showJobs(title)
    });

    $('body').on('click', '.button-search', function () {  
      var title = $('.search_interview').val()
      showJobs(title)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
      console.log(search)
    }
  }
</script>

<!-- Percobaan1 jika test skill dan psikologi di gabung -->
<script>
  function reply_click(clicked_id)
  {
    console.log('#double_testA'+clicked_id)
    $('#double_testA'+clicked_id).change(function(){
      var ID = $(this).val();
      console.log(clicked_id);
      if(ID){
        $("#digabung"+clicked_id).empty();
        $("#digabung"+clicked_id).append('');
        if (ID == 'No') {
          $("#digabung"+clicked_id).append(`
              <span class="title-sm">Psychological Date</span>
              <div class="input-group mt-1">
                  <div class="input-group date">
                      <div class="input-group-append">
                          <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                      </div>
                      <input type="datetime-local" class="form-control border-input" style="border-radius:0 10px 10px 0" name="psyco_date" value="" required/>
                  </div>
              </div>
              <div class="input-group my-3" style="gap:1.4rem">
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="psyco_location" id="radioAN1110" value="Online" class="radioCustomInput">
                          <label for="radioAN1110" class="radioCustom"></label>
                      </div>
                      <label for="radioAN1110" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                  </div>
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="psyco_location" id="radioAN222" value="Offline" class="radioCustomInput">
                          <label for="radioAN222" class="radioCustom"></label>
                      </div>
                      <label for="radioAN222" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                  </div>
              </div>
          `);
        }
        if (ID == 'True'){
          $("#digabung"+clicked_id).append(`
              <span class="title-sm">Psychological & technical Date</span>
              <div class="input-group mt-1">
                  <div class="input-group date">
                      <div class="input-group-append">
                          <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                      </div>
                      <input type="datetime-local" class="form-control border-input" style="border-radius:0 10px 10px 0" name="double_test_date" value="" required/>
                  </div>
              </div>
              <div class="input-group my-3" style="gap:1.4rem">
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="double_test_location" id="radioAT1110" value="Online" class="radioCustomInput">
                          <label for="radioAT1110" class="radioCustom"></label>
                      </div>
                      <label for="radioAT1110" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                  </div>
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="double_test_location" id="radioAT222" value="Offline" class="radioCustomInput">
                          <label for="radioAT222" class="radioCustom"></label>
                      </div>
                      <label for="radioAT222" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                  </div>
              </div>
          `);
        }if (ID == 'True2'){
          $("#digabung"+clicked_id).append(`
            <span class="title-sm">Interview Date</span>
            <div class="input-group mt-1">
                <div class="input-group date">
                    <div class="input-group-append">
                        <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                    </div>
                    <input type="datetime-local" class="form-control border-input" style="border-radius:0 10px 10px 0" name="interview" value="" required/>
                </div>
            </div>
            <div class="input-group my-3" style="gap:1.4rem">
                <div class="justify-start">
                    <div class="radioContainer">
                        <input type="radio" name="interview_location" id="radioIT1110" value="Online" class="radioCustomInput">
                        <label for="radioIT1110" class="radioCustom"></label>
                    </div>
                    <label for="radioIT1110" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                </div>
                <div class="justify-start">
                    <div class="radioContainer">
                        <input type="radio" name="interview_location" id="radioIT222" value="Offline" class="radioCustomInput">
                        <label for="radioIT222" class="radioCustom"></label>
                    </div>
                    <label for="radioIT222" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                </div>
            </div>
          `);
        }
      }else{
          $("#digabung"+clicked_id).empty();
      }
    })
  }
</script>

<!-- Percobaan2 other candidate jika test skill dan psikologi di gabung -->
<script>
  function reply_clickB(clicked_id)
  {
    console.log('#double_testB'+clicked_id)
    $('#double_testB'+clicked_id).change(function(){
      var ID = $(this).val();
      // console.log(clicked_id);
      if(ID){
        $("#digabungB"+clicked_id).empty();
        $("#digabungB"+clicked_id).append('');
        if (ID == 'No') {
          $("#digabungB"+clicked_id).append(`
            <span class="title-sm">Psychological Date</span>
            <div class="input-group mt-1">
                <div class="input-group date">
                    <div class="input-group-append">
                        <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                    </div>
                    <input type="datetime-local" class="form-control border-input" style="border-radius:0 10px 10px 0" name="psyco_date" value="" required/>
                </div>
            </div>
            <div class="input-group my-3" style="gap:1.4rem">
                <div class="justify-start">
                    <div class="radioContainer">
                        <input type="radio" name="psyco_location" id="radioBN1110" value="Online" class="radioCustomInput">
                        <label for="radioBN1110" class="radioCustom"></label>
                    </div>
                    <label for="radioBN1110" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                </div>
                <div class="justify-start">
                    <div class="radioContainer">
                        <input type="radio" name="psyco_location" id="radioBN222" value="Offline" class="radioCustomInput">
                        <label for="radioBN222" class="radioCustom"></label>
                    </div>
                    <label for="radioBN222" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                </div>
            </div>
          `);
        }
        if (ID == 'True'){
          $("#digabungB"+clicked_id).append(`
              <span class="title-sm">Psychological & technical Date</span>
              <div class="input-group mt-1">
                  <div class="input-group date">
                      <div class="input-group-append">
                          <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                      </div>
                      <input type="datetime-local" class="form-control border-input" style="border-radius:0 10px 10px 0" name="double_test_date" value="" required/>
                  </div>
              </div>
              <div class="input-group my-3" style="gap:1.4rem">
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="double_test_location" id="radioBT1110" value="Online" class="radioCustomInput">
                          <label for="radioBT1110" class="radioCustom"></label>
                      </div>
                      <label for="radioBT1110" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                  </div>
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="double_test_location" id="radioBT222" value="Offline" class="radioCustomInput">
                          <label for="radioBT222" class="radioCustom"></label>
                      </div>
                      <label for="radioBT222" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                  </div>
              </div>
          `);
        }
        if (ID == 'True2'){
          $("#digabungB"+clicked_id).append(`
            <span class="title-sm">Interview Date</span>
            <div class="input-group mt-1">
                <div class="input-group date">
                    <div class="input-group-append">
                        <div class="custom-calendar px-3" style="border-radius:10px 0 0 10px"><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span></div>
                    </div>
                    <input type="datetime-local" class="form-control border-input" style="border-radius:0 10px 10px 0" name="interview" value="" required/>
                </div>
            </div>
            <div class="input-group my-3" style="gap:1.4rem">
                <div class="justify-start">
                    <div class="radioContainer">
                        <input type="radio" name="interview_location" id="radioUKM1110" value="Online" class="radioCustomInput">
                        <label for="radioUKM1110" class="radioCustom"></label>
                    </div>
                    <label for="radioUKM1110" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                </div>
                <div class="justify-start">
                    <div class="radioContainer">
                        <input type="radio" name="interview_location" id="radioUKM222" value="Offline" class="radioCustomInput">
                        <label for="radioUKM222" class="radioCustom"></label>
                    </div>
                    <label for="radioUKM222" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                </div>
            </div>
          `);
        }
      }else{
          $("#digabungB"+clicked_id).empty();
      }
    })
  }
</script>

<!-- Percobaan 3 Jika Akan Interview dulu sebelum Test Skill  -->
<script>
  function reply_clickC(clicked_id)
  {
    $('#next_step'+clicked_id).change(function(){
    var ID = $(this).val();    
    if(ID){
      $("#stepselanjutnya"+clicked_id).empty();
      $("#stepselanjutnya"+clicked_id).append('');
      if (ID == 'Technical Test') {
        console.log('skill')
        $("#stepselanjutnya"+clicked_id).append(`
          <input type="hidden" name="next_step" id="next_step" value="Technical Test">
          <span class="title-sm">Skill Test Date</span>
          <div class="input-group mt-1">
              <div class="inputGroupSelect"><i class="fas fa-calendar-alt mr-3 fs-18"></i> <span class="fs-16">Date</span></div>
              <input type="datetime-local" class="form-control border-input-10" id="test_skill_date" name="test_skill_date" value="" />
          </div>
          <div class="col-12">
              <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="skill_location" id="radioS112" value="Online" class="radioCustomInput">
                          <label for="radioS112" class="radioCustom"></label>
                      </div>
                      <label for="radioS112" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                  </div>
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="skill_location" id="radioS255" value="Offline" class="radioCustomInput">
                          <label for="radioS255" class="radioCustom"></label>
                      </div>
                      <label for="radioS255" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                  </div>
              </div>
          </div>         
        `);
      }
      if (ID == 'Interview'){
        console.log('int')
        $("#stepselanjutnya"+clicked_id).append(`
          <input type="hidden" name="next_step" id="next_step" value="Interview">
          <span class="title-sm">Interview Date</span>
          <div class="input-group mt-1">
              <div class="inputGroupSelect"><i class="fas fa-calendar-alt mr-3 fs-18"></i> <span class="fs-16">Date</span></div>
              <input type="datetime-local" class="form-control border-input-10" id="interview_date" name="interview_date" value="" />
          </div>
          <div class="col-12">
              <div class="input-group mt-1 mb-3" style="gap:1.4rem">
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="interview_location" id="radioI315" value="Online" class="radioCustomInput">
                          <label for="radioI315" class="radioCustom"></label>
                      </div>
                      <label for="radioI315" class="title-16 pointer ml-1" style="margin-top:6px">Online</label>
                  </div>
                  <div class="justify-start">
                      <div class="radioContainer">
                          <input type="radio" name="interview_location" id="radioF755" value="Offline" class="radioCustomInput">
                          <label for="radioF755" class="radioCustom"></label>
                      </div>
                      <label for="radioF755" class="title-16 pointer ml-1" style="margin-top:6px">Offline</label>
                  </div>
              </div>
          </div>  
        `);
      }
    }else{
        $("#stepselanjutnya"+clicked_id).empty();
    }
    });
  }
</script>
@endpush