@extends("layouts.app")
@section("title","Approval Request")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row approval">

      <div class="col-md-3">
        <div class="cards p-4" style="height:190px">
          <div class="icons1">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <div class="title-14-dark my-2">Total Amount</div>
          <div class="title-24-600-dark">Rp. {{number_format($amount, 2, ",", ".")}}</div>
          <div class="title-14-dark my-2">Amount submitted</div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="cards p-4" style="height:190px">
          <div class="icons2">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="title-14-dark my-2">Amount </div>
          <div class="title-24-600-dark" id="jumlahamount">Rp. 0 ,-</div>
          <div class="title-14-dark mt-2">Selected Amount</div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="cards p-4" style="height:190px">
          <div class="icons3">
          <i class="fas fa-check"></i>
          </div>
          <div class="title-14-dark my-2">Total Amount Approved</div>
          <div class="title-24-600-dark" id="jumlahamount">Rp. {{number_format($total_amount, 2, ",", ".")}}</div>
          <div class="title-14-dark mt-2">{{$bulan_sekarang}}</div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="cards p-4" style="height:190px">
          <div class="icons4">
          <i class="fas fa-file-invoice-dollar"></i>
          </div>
          <div class="title-14-dark my-2">Total Submited </div>
          <div class="title-24-600-dark" id="jumlahamount">{{$total_submit}} <span class="text-secondary font-weight-normal" style="font-size : 16px">/{{$total_tiket}}</span> </div>
          <div class="title-14-dark mt-2">{{$bulan_sekarang}}</div>
        </div>
      </div>


      <div class="col-12">
        <div class="cards p-4">
          <ul class="nav nav-tabs sch-md-tabs mb-4" role="tablist" id="myTab">
            <li class="nav-item-show">
                <a class="nav-link relative active" data-toggle="tab" href="#applicant" role="tab"></i>
                    <i class="fs-28 fas fa-file-import"></i>
                    <div class="f-14">Applicant</div>
                    <span class="tabs-badge">{{$applicant}}</span>
                </a>
                <div class="sch-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link relative" data-toggle="tab" href="#doner" role="tab"></i>
                    <i class="fs-28 fas fa-clipboard-check"></i>
                    <div class="f-14">Done & Reject</div>
                    <span class="tabs-badge">{{$done_rjc}}</span>
                </a>
                <div class="sch-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link relative" data-toggle="tab" href="#tiketAll" role="tab"></i>
                    <i class="fs-28 fas fa-clipboard-check"></i>
                    <div class="f-14">Tiket All Waiting</div>
                </a>
                <div class="sch-slide"></div>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane show active" id="applicant" role="tabpanel">
              @include('Approval.RequestApproval.partials.tab-applicant')
            </div>
            <div class="tab-pane" id="doner" role="tabpanel">
              @include('Approval.RequestApproval.partials.tab-doner')
            </div>
            <div class="tab-pane" id="tiketAll" role="tabpanel">
              @include('Approval.RequestApproval.partials.tab-tiketall')
            </div>
          </div>                        
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
  $(document).ready( function () {

    // fungsi select all 
    document.getElementsByClassName('check1')[0].addEventListener('click', function() {
      tolongcektotal();
    })

    // Ambil checkbok
    const inicheckbox = document.getElementsByClassName('cekamount');
    Array.from(inicheckbox).forEach(function(checkbox) {
      checkbox.addEventListener('click', function() {
        tolongcektotal();
      })
    })

    //funsi hiting sesuai check
    let tolongcektotal = ()=> {
      let total = 0;
        Array.from(inicheckbox).forEach(function(element) {
          if(element.checked) {
            let tmp = parseFloat(element.parentNode.parentNode.getElementsByClassName('AmountRencana')[0].value)
            total += tmp;
          }
        })
        let hasil = parseFloat(total).toFixed(2);
        document.getElementById('jumlahamount').innerHTML = `Rp. ${convertToRupiah(hasil)}`;
    }
    
    function convertToRupiah(NominalAmount)
    {
      var rupiah = '';
      let angka = NominalAmount.replace(".", ",");		
      var angkarev = angka.toString().split('').reverse().join('');
      for(var i = 0; i < angkarev.length; i++) {
        if(i%3 == 0) {
          var angkaKoma=angkarev.substr(i,3)
          var lastChar = angkaKoma.substr(angkaKoma.length - 1); 
          if(lastChar!=','){
          rupiah += angkarev.substr(i,3)+'.';
          }
          else{
            rupiah += angkarev.substr(i,3)+'';
          }
        }
      }
      
      return rupiah.split('',rupiah.length-1).reverse().join('');
    }
  });
</script>
<script>
  $('.reject').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
          title: 'Are you sure?',
          text: 'Please recheck the application that will be rejected.',
          icon: 'warning',
          buttons: ["CANCEL", "REJECT"],
          className: "modal-reject",
      })
      .then(function(value) {
          if (value) {
            window.location.href = url;
          }
      });
  });

  $('.approve').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
          title: 'Are you sure?',
          text: 'Please recheck the application that will be approved.',
          icon: 'warning',
          buttons: ["CANCEL", "APPROVE"],
          className : 'modal-approve'
      })
      .then(function(value) {
          if (value) {
              window.location.href = url;   
          }
      });
  });
</script>
<script>
  $('#checkAll').click(function() {
    if (this.checked) {
      $(':checkbox').each(function() {
          this.checked = true;            
      });
    } else {
      $(':checkbox').each(function() {
          this.checked = false; 
      });
    } 
  });

    jQuery(document).ready(function($) {

      const ValCek = document.getElementsByClassName('checked'); 
      const app = document.getElementById('app');
      const reject = document.querySelector('.rejectAll');
      const approve = document.querySelector('.approveAll');
      reject.addEventListener('click', function(event) {
        let tmp = 0;
        Array.from(ValCek).forEach(function (element) {
          if(element.checked ) {
            tmp +=1
          }
        });

        if (tmp == 0) {
          swal({
            title: "Select One",
            text: "Please select one of the submissions that will be approved or rejected!",
            icon: "warning",
            button : false,
          });
        } else {
          event.preventDefault();
          const submit = event.target.closest('form');
          swal({
              title: 'Are you sure?',
              text: 'Please recheck the application that will be rejected.',
              icon: 'warning',
              buttons: ["CANCEL", "REJECT"],
              className: "modal-reject",
          })
          .then(function(value) {
              if (value) {
                  app.value = 0; 
                  submit.submit();
              }
          });
        }
      })

      approve.addEventListener('click', function(event) {
        let tmp = 0;
        Array.from(ValCek).forEach(function (element) {
          if(element.checked ) {
            tmp +=1
          }
        });

        if (tmp == 0) {
          swal({
            title: "Select One",
            text: "Please select one of the submissions that will be approved or rejected!",
            icon: "warning",
            button : false,
          });
        } else {
          event.preventDefault();
          const submited =event.target.closest('form');
          swal({
              title: 'Are you sure?',
              text: 'Please recheck the application that will be approved.',
              icon: 'warning',
              buttons: ["CANCEL", "APPROVE"],
              className : 'modal-approve'
          })
          .then(function(value) {
              if (value) {
                  app.value = 1; 
                  submited.submit();
              }
          });
        }
      });
    });
</script>

<script type="text/javascript">
    $(function() {
      var filter_count = 0;
      $('input[name="daterange"]').daterangepicker();
    });

    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })

    function excel(button) {
      const tombol = document.getElementsByClassName('buttons-excel');

      if (button.classList.contains('exportExcel1')) {
          tombol[0].click();
      } else if (button.classList.contains('exportExcel2')) {
          tombol[1].click();
      }
    }

    function pdf(button) {
      const tombol = document.getElementsByClassName('buttons-pdf');

      if (button.classList.contains('exportPdf1')) {
          tombol[0].click();
      } else if (button.classList.contains('exportPdf2')) {
          tombol[1].click();
      }
    }

    $(function() {
        $('input[name="daterange_filter"]').daterangepicker();
    $("#filter_date_done").on("change.datetimepicker", ({date}) => {
        var filter = $("#filter_date_done").find("input").val();
        let result = filter.replaceAll("/", "-");
        location.replace("{{ url('/apv/acconting?date=')}}"+result) 
    })
  });
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      "pageLength": 10,
      dom: 'Bfrtp',
      "buttons": [ 
        {extend: 'excel', title: ''},
        {extend: 'pdf', title: ''}
      ],
    });
  });
</script>
<script>
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
    $(document).ready(function () {
        $(".cardApprove").on('click', '.checked', function () {
            $(this).closest('.cardApprove').toggleClass('selected', this.checked);
        });
        $('.cardApprove input:checkbox:checked').closest('.cardApprove').addClass('selected');
    });

    $(".checkAll").change(function () {
        if ($(this).is(":checked")) {
            $(".cardApprove").addClass("selected");
        } else {
            $(".cardApprove").removeClass("selected");
        }
    });

    $(".checkAll").on('change', function () {
        $(".checked").prop('checked', $(this).is(":checked"));
    });
</script>
<script>
   $(document).ready( function () {
    $(function () {
      $("#DTtable2").DataTable({
        dom: 'Brftp',
        "buttons": [ 
          {extend: 'excel', title: ''}, 
          {extend: 'pdf', title: ''}
        ],
      });
    });
  });
</script>

@endpush