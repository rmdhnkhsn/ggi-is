@extends("layouts.app")
@section("title","List Item")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
<style>
  .nav-tabs {
    border-bottom: none !important;
  }
</style>
<section class="content">
  <div class="container-fluid">
    <form  action="{{route('mastersmv.storeSmvChild')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-12">
                <div class="cardPart">
                    <div class="cardHead p-3">
                        <div class="justify-sb3">
                            <div class="title-20-blue no-wrap">INVOICE ITEM</div>
                            <div class="endSide flexx gap-3">
                                <div class="DTtableSearch">
                                    <input type="text" id="SearchText" class="searchText" placeholder="Search...">
                                    <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="flex gap-3">
                                    <a href="" class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:37px;height:37px"><i class="fs-20 fas fa-file-excel"></i></a>
                                    <a href="" class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:37px;height:37px"><i class="fs-20 fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section"></div>
                    <input type="text" name="kode_ekspesisi" value="{{ last(request()->segments()) }}">
                    <div class="cardBody p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="cards-scroll scrollX" id="scroll-bar">
                                    <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
                                        <thead>
                                            <tr class="bg-thead2">
                                                <th>NO</th>
                                                <th>PO NUMBER</th>
                                                <th>WO NUMBER</th>
                                                <th>STYLE</th>
                                                <th>DESCRIPTION OF GOODS</th>
                                                <th>HS CODE</th>
                                                <th>QUANTITY</th>
                                                <th>UNIT</th>
                                                <th>UNIT PRICE ($)</th>
                                                <th>AMOUNT ($)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($data as $key =>$value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td> <input type="text" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['po'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                    <td><input type="text" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['wo'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                    <td><input type="text" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['style'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                    <td>
                                                        <div class="container-tbl-btn">
                                                            <input type="text" class="form-control borderInput" id="" name="" placeholder="-" style="min-width:250px">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="container-tbl-btn">
                                                            <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control border-input" id="wo" name="wo[]" value="{{ $value['qty'] }}" style="height:37px; width:120px; margin:-7px 0; padding:0 !important;border:none;background:#fff" readonly></td>
                                                    <td>PACK</td>
                                                    <td>
                                                        <div class="container-tbl-btn">
                                                            <input type="text" class="form-control borderInput" id="" name="" placeholder="-">
                                                        </div>
                                                    </td>
                                                    <td>91,90</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="text-right fw-6">INVOICE TOTAL</td>
                                                    <td colspan="2"><span class="fw-6 mr-1">6.826.268</span> PACK</td> 
                                                    <td></td>
                                                    <td class="fw-6">USD</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="10">
                                                        <div class="container-tbl-btn">
                                                            <input type="text" class="form-control readOnlyForm" id="" name="" value="US DOLLARS FOUR HUNDRED SEVENTY SIX THOUSAND FOUR HUNDRED AND FIFTY POINT SEVENTY" readonly>
                                                        </div>
                                                    </td>
                                                </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn-blue-md btnNext d-inline-block">Next & Save <i class="fs-18 ml-2 fas fa-arrow-right"></i></button>
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
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    "pageLength": 10,
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
</script>
@endpush