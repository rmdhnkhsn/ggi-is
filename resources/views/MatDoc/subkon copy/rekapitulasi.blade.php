@extends("layouts.app")
@section("title","Rekapitulasi Subkon")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-subkon.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('subkon.monitoring',$no_kontrak)}}" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-desktop"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Monitoring SUBKON</div>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-file-contract"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Rekapitulasi Subkon</div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="row">
      <div class="col-12 justify-center">
        <div class="title-24">REKAPITULASI SUBKONTRAK KE PT. GISTEX GARMEN INDONESIA</div>
      </div>
    </div>
    @include('MatDoc.subkon.partials.rekapitulasi.card-flat')
    <div class="row mt-4">
      <div class="col-12 px-2">
        <ul class="nav nav-tabs sb-md-tabs mb-4" role="tablist">
            <li class="nav-item-show">
                <a class="nav-link active" data-toggle="tab" href="#S1" role="tab"></i>SUBKON 261</a>
                <div class="sb-slide"></div>
            </li>
            <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#S2" role="tab"></i>SUBKON 262</a>
                <div class="sb-slide"></div>
            </li>
        </ul>
        <div class="tab-content card-block">
            <div class="tab-pane active" id="S1" role="tabpanel">
              @include('MatDoc.subkon.partials.rekapitulasi.subkon_261')
            </div>
            <div class="tab-pane" id="S2" role="tabpanel">
              @include('MatDoc.subkon.partials.rekapitulasi.subkon_262')
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<!-- <script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var title = $('.nama_dokumen').html(); 
  var kontrak = $('.nomor_kontrak').val()
  // console.log(kontrak);
  if (title != null) {
    function showJobs(title){
      $.ajax({
        data: {
          title:title,
          kontrak:kontrak,
        },
        url: '{{ route("subkon.filter.261") }}',           
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
      const tabelnya = document.getElementsByClassName('initable');
      $('.initable').hide();
      result.forEach(function(e) {
        Array.from(tabelnya).forEach(function (teuing) {
          console.log(teuing.getAttribute('id_nya'))
          if (teuing.getAttribute('id_nya') == e.no_aju) {     
            $('#Aju261-'+e.no_aju).show();
          }
        })
      })
      // console.log(tabelnya);
    }
    $('body').on('keyup', '.search', function () {       
      var title = $(this).val()
      showJobs(title)
    });

    $('body').on('click', '.btn-subkon-submit', function () {  
      var title = $('.search').val()
      showJobs(title)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
      // console.log(search)
    }
  }
</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var judul = $('.nama_dokumen2').html(); 
  var kontrak2 = $('.nomor_kontrak2').val()
  console.log(kontrak2);
  if (judul != null) {
    function showJobs(judul){
      $.ajax({
          data: {
            judul:judul,
            kontrak2:kontrak2,
          },
          url: '{{ route("subkon.filter.262") }}',           
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
        // console.log(result);
        const tabelnya = document.getElementsByClassName('initable262');
        console.log(tabelnya);
        $('.initable262').hide();
        result.forEach(function(e) {
          Array.from(tabelnya).forEach(function (teuing) {
            console.log(e.no_aju)
            if (teuing.getAttribute('id_na') == e.no_aju) {     
              $('#Aju262-'+e.no_aju).show();
            }
          })
        })
      }
    $('body').on('keyup', '.search2', function () {       
      var judul = $(this).val()
      showJobs(judul)
    });

    $('body').on('click', '.btn-subkon-submit2', function () {  
      var judul = $('.search2').val()
      showJobs(judul)
    })

    var search = "{{ request()->query('') }}"
    if (search) {
      showJobs(search)
    }
  }
</script> -->
<script>
  $(function () {
    $("#DTtable").DataTable({
      dom: 'frtp',
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable tfoot th').each( function () {
        var title = $('#DTtable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="borderInput px-2" placeholder="search..." />' );
    });
    var table = $('#DTtable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
</script>
<script>
  $(function () {
    $("#DTtable2").DataTable({
      dom: 'frtp',
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable2 tfoot th').each( function () {
        var title = $('#DTtable2 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="borderInput px-2" placeholder="search..." />' );
    });
    var table = $('#DTtable2').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });
</script>
@endpush