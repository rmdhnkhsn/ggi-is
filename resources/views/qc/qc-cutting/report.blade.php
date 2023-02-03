@extends("layouts.app")
@section("title","Report")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('qc-cutting')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-file-signature"></i>
              <div class="desc">Cek Marker</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-cutting-daily')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-cut"></i>
              <div class="desc">Cutting Daily</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-reject-cutting')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-window-close"></i>
              <div class="desc">Reject Cutting</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-embro-print')}}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-tags"></i>
              <div class="desc">Embro & Print </div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('qc-report')}}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-book"></i>
              <div class="desc-active">Report</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row pb-5 QCreport">
      <div class="col-12">
        <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem;overflow:hidden">
          <form id="download" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="title-24">Daily Report</div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Date</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="date" class="form-control border-input-10" style="height:40px !important">
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Branch</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px" for=""><i class="fs-18 fas fa-building"></i></span>
                  </div>
                  <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                    <option selected disabled>Select Branch</option>
                    <option name="Cileunyi">Cileunyi</option>    
                    <option name="Maja 1">Maja 1</option>    
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Category</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px" for=""><i class="fs-18 fas fa-network-wired"></i></span>
                  </div>
                  <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                    <option selected disabled>Select Category</option>
                    <option name="lorem">lorem</option>    
                    <option name="lorem ipsum">lorem ipsum</option>    
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="flexx" style="gap:.5rem">
                  <div class="downloadBtn">
                    <div class="title-sm mb-1">Document Pdf</div>
                    <button type="submit" class="btn-merah-md" style="height:40px">Download <i class="fs-18 ml-2 fas fa-file-pdf"></i> </button>
                  </div>  
                  <div class="downloadBtn">
                    <div class="title-sm mb-1">Document Excel</div>
                    <button type="submit" class="btn-green-md" style="height:40px">Download <i class="fs-18 ml-2 fas fa-file-excel"></i> </button>
                  </div>  
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-12">
        <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem;overflow:hidden">
          <form id="download" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="title-24">Monthly Report</div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Month</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="month" class="form-control border-input-10" style="height:40px !important">
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Branch</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px" for=""><i class="fs-18 fas fa-building"></i></span>
                  </div>
                  <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                    <option selected disabled>Select Branch</option>
                    <option name="Cileunyi">Cileunyi</option>    
                    <option name="Maja 1">Maja 1</option>    
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Category</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px" for=""><i class="fs-18 fas fa-network-wired"></i></span>
                  </div>
                  <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                    <option selected disabled>Select Category</option>
                    <option name="lorem">lorem</option>    
                    <option name="lorem ipsum">lorem ipsum</option>    
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="flexx" style="gap:.5rem">
                  <div class="downloadBtn">
                    <div class="title-sm mb-1">Document Pdf</div>
                    <button type="submit" class="btn-merah-md" style="height:40px">Download <i class="fs-18 ml-2 fas fa-file-pdf"></i> </button>
                  </div>  
                  <div class="downloadBtn">
                    <div class="title-sm mb-1">Document Excel</div>
                    <button type="submit" class="btn-green-md" style="height:40px">Download <i class="fs-18 ml-2 fas fa-file-excel"></i> </button>
                  </div>  
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-12">
        <div class="cards" style="padding: 1.5rem 1.8rem 2.2rem 1.8rem;overflow:hidden">
          <form id="download" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="title-24">Yearly Report</div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Year</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px"><i class="fs-18 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="number" placeholder="input year" min="2020" max="2100" class="form-control border-input-10" style="height:40px !important">
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Branch</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px" for=""><i class="fs-18 fas fa-building"></i></span>
                  </div>
                  <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                    <option selected disabled>Select Branch</option>
                    <option name="Cileunyi">Cileunyi</option>    
                    <option name="Maja 1">Maja 1</option>    
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="title-sm">Category</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px;height:40px" for=""><i class="fs-18 fas fa-network-wired"></i></span>
                  </div>
                  <select class="form-control border-input-10 select2bs4" id="" name="" style="cursor:pointer" required>
                    <option selected disabled>Select Category</option>
                    <option name="lorem">lorem</option>    
                    <option name="lorem ipsum">lorem ipsum</option>    
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="flexx" style="gap:.5rem">
                  <div class="downloadBtn">
                    <div class="title-sm mb-1">Document Pdf</div>
                    <button type="submit" class="btn-merah-md" style="height:40px">Download <i class="fs-18 ml-2 fas fa-file-pdf"></i> </button>
                  </div>  
                  <div class="downloadBtn">
                    <div class="title-sm mb-1">Document Excel</div>
                    <button type="submit" class="btn-green-md" style="height:40px">Download <i class="fs-18 ml-2 fas fa-file-excel"></i> </button>
                  </div>  
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")

<script>
  document.querySelector("input[type=number]")
  .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
</script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
  $(document).ready(function(){
    const options = document.getElementsByClassName('select2-selection--single');
    Array.from(options).forEach(function (element) {
        element.style = "height : 40px !important";
        console.log(element);
      });
	});
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX : '100%',
      order:[[3,"desc"]],
      "pageLength": 10,
      "dom": '<"search"><"top">rt<"bottom"p><"clear">'
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
</script>
@endpush 
