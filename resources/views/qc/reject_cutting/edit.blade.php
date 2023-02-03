<meta name="csrf-token" content="{{ csrf_token() }}">
@include('qc.reject_cutting.layouts.header')
@include('qc.reject_cutting.layouts.navbar')

<style>
  .table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; }
  .table-responsive > .table-bordered {
    border: 0; }

  .no-wrap td,
  .no-wrap th {
  white-space: nowrap; }

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper f-poppins">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card-navigate">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
            <!-- <li class="breadcrumb-item"><a href="{{ route('hrga.index') }}" class="title-navigate">Dashboard</a></li> -->
            <li class="breadcrumb-item"><a href="{{ route('RejectCutting.index') }}" class="title-navigate">Quality Controll</a></li>
            <li class="breadcrumb-item title-navigate-active" aria-current="page"><span class="active">Reject Cutting</span></li>
            <li class="navigate-active ml-Rcutting"></li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xl-2 col-sm-6">
              <span class="reject-cutting-tittle">Reject Cutting</span>
            </div>

            <div class="col-lg-9 col-xl-10 col-sm-6">
              <button type="button" class="CRD" data-toggle="modal" data-target="#myModal" title="Create">
                <span class="mr-2">Create Reject Data</span>  
                <i class="fas fa-plus"></i>
              </button>
              <!-- Modal -->
          <form id="formWoInformation">
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content" style="border-radius:10px">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12 mb-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"><i class="fas fa-times"></i></span>
                          </button>
                        </div>  
                      </div> 
                      <div class="hide" data-step="1" data-title="General Identity">
                        <div class="row">
                          <div class="col-12 text-center mb-4">
                            <span class="reject-cutting-tittle">General Identity</span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl-6 col-lg-6">
                            <span class="general-identity-title">WO Number</span>
                            <div class="input-group mb-3 mt-2">
                              <div class="input-group-prepend">
                                <span class="input-group-select-GI" for="F4801_DOCO">WO</span>
                              </div>
                               <select class="form-control select2bs4" name="F4801_DOCO" id="F4801_DOCO">
                                  <option selected> </option>
                                      @foreach($data as $key => $value)
                                      @if ($value->F4801_DOCO == $data->t_v4801c_doco)
                                          <option selected value="{{$value->F4801_DOCO}}">
                                            {{$value->F4801_DOCO}}</option>
                                      @else
                                          <option value="{{$value->F4801_DOCO}}">
                                            {{$value->F4801_DOCO}}</option>
                                      @endif
                                      @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-xl-3 col-lg-6">
                            <span class="general-identity-title">Table Number</span>
                            <div class="input-group mb-3 mt-2">
                              <div class="input-group-prepend">
                                <span class="input-group-select-GI" for="meja">Table</span>
                              </div>
                               <input type="text" class="form-control border-input" id="meja" name="meja" placeholder="0" required>
                            </div>
                          </div>
                          <div class="col-xl-3 col-lg-6">
                            <span class="general-identity-title">Serial Number</span>
                            <div class="field mt-2">
                                <input type="text" id="SN" name="SN" placeholder="00-000" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl-6 col-lg-6 line-2">
                            <span class="general-identity-title">Buyer</span>
                            <div class="input-group mb-3 mt-2">
                              <div class="input-group-prepend">
                                <span class="input-group-select" for="F0101_ALPH">Select Buyer</span>
                              </div>
                               <select class="custom-select" name="buyer" id="F0101_ALPH"></select>
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 line-2">
                            <span class="general-identity-title">Color</span>
                              <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                  <span class="input-group-select-GI" for="F560020_SEG4">Color</span>
                                </div>
                                <select class="custom-select" name="color" id="F560020_SEG4"></select>
                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xl-6 col-lg-6 line-2">
                            <span class="general-identity-title">Style</span>
                            <div class="input-group mb-3 mt-2">
                              <div class="input-group-prepend">
                                <span class="input-group-select" for="F4801_DL01">Style</span>
                              </div>
                               <select class="custom-select" name="style" id="F4801_DL01"></select>
                            </div>
                          </div>
                          <div class="col-6 line-2">
                            <span class="general-identity-title">Quantity / Sheet</span>
                            <div class="field mt-2">
                                <input type="text" id="qty_gelar" name="qty_gelar" placeholder="Wo Number" value="0" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12 text-center line-3">
                            <span class="ratio-cutting-title">Ratio Cutting</span>
                          </div>
                        </div>
                        <div class="row line-3" id="F560020_SIZE55"></div>
                        <div class="row">
                          <div class="col-6">
                            <span class="general-identity-title">Qty Check QC</span>
                            <div class="field mt-2">
                                <input type="text" id="qty_check" name="qty_check" placeholder="Input QTY Check QC" required>
                            </div>
                          </div>
                          <div class="col-6">
                            <span class="general-identity-title">Total Ratio</span>
                            <div class="field mt-2">
                                <input type="text" class="total_ratio" name="total_ratio" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-next js-btn-step" data-orientation="next">Next<i class="ml-2 fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                        <div class="progress-1"></div>
                        <div class="progress-2"></div>
                      </div>
                      <div class="hide" data-step="2" data-title="Reject">
                        <div class="row">
                          <div class="col-12 text-center mb-4">
                            <span class="reject-cutting-tittle">Reject Quantity</span>
                          </div>
                        </div>
                        <div class="row" id="wo_reject"></div>
                        <div class="row mt-3">
                          <div class="col-12 text-center">
                            <span class="ratio-cutting-title">Totals</span>
                          </div>
                        </div>
                        <div class="row mt-2 mb-3">
                          <div class="col-xl-3 col-lg-6">
                            <span class="general-identity-title">QTY Table</span>
                            <div class="field mt-2">
                                <input type="text" id="qty_table" name="qty_table" placeholder="" disabled>
                            </div>
                          </div>
                          <div class="col-xl-3 col-lg-6">
                            <span class="general-identity-title">Total Ratio</span>
                            <div class="field mt-2">
                                <input type="text" class="total_ratio" name="total_ratio" placeholder=" " disabled>
                            </div>
                          </div>
                          <div class="col-xl-3 col-lg-6">
                            <span class="general-identity-title">Total Reject</span>
                            <div class="field mt-2">
                                <input type="text" class="total_reject" name="total_reject" placeholder="0" disabled>
                            </div>
                          </div>
                          <div class="col-xl-3 col-lg-6">
                            <span class="general-identity-title">Percentage</span>
                            <div class="field mt-2">
                                <input type="text" id="percentage" name="percentage" placeholder="%" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-4 mt-3">
                          <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-next store-wo-information" id="wo">Save
                              <i class="ml-3 fas fa-download"></i>
                            </button>
                          </div>
                        </div>
                        <div class="progress-3"></div>
                      </div>
                    </div>
                  </form>
                     {{-- <button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('qc.reject_cutting.layouts.footer')


  <script>
    $('#myModal').modalSteps();
  </script>
  <script>
function sum_old() {
      var txtFirstNumberValue = document.getElementById('size1').value;
      var txtSecondNumberValue = document.getElementById('size2').value;
      var txtthirdNumberValue = document.getElementById('size3').value;
      var txtfourNumberValue = document.getElementById('size4').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue)+parseInt(txtthirdNumberValue) + parseInt(txtfourNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total_ratio').value = result;
         document.getElementById('total_ratio1').value = result;
      }
}

var total_ratio

function sum_reject() {
  var total_reject = 0
  $('.reject-size').each(function() { 
    total_reject += parseInt($(this).val())
  });
  console.log(total_reject)
  $('.total_reject').val(total_reject)

  var qty_gelar = $('#qty_gelar').val()
  var percentage = total_reject/qty_gelar*100
  $('#percentage').val(percentage.toFixed(2))

  var qty_table = qty_gelar*total_ratio
  $('#qty_table').val(qty_table)

  
}

function sum() {
  total_ratio = 0
  $('.ratio-reject').each(function() { 
    total_ratio += parseInt($(this).val())
  });
  $('.total_ratio').val(total_ratio)
}

</script>
  {{-- <script>
function sum() {
      var reject1 = document.getElementById('reject1').value;
      var reject2 = document.getElementById('reject2').value;
      var reject3 = document.getElementById('reject3').value;
      var reject4 = document.getElementById('reject4').value;
      var result = parseInt(reject1) + parseInt(reject2)+parseInt(reject3) + parseInt(reject4);
      if (!isNaN(result)) {
         document.getElementById('total_reject').value = result;
      }
}
</script> --}}
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

        $('#example1').DataTable(
            {
                "pageLength": 25,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                
            } 
        );
    } );
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example1 tfoot th').each( function () {
            var title = $('#example1 thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#example1').DataTable();
    
        // Apply the search
        table.columns().every( function () {
            var that = this;
    
            $( 'input', this.footer() ).on( 'keyup change', function () {
                that
                    .search( this.value )
                    .draw();
            } );
        } );
    } );
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    function loadColor() {
      
    }

    function showWoInformation(id_wo) {
      $.ajax({
        data: {
          id_wo: id_wo,
        },
        url: '{{ route("RejectCutting.show-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {
          $('#F0101_ALPH').empty();
          $('#F4801_DL01').empty();
          
          var newOption = new Option(data.buyer, data.buyer, true, true);
          $('#F0101_ALPH').append(newOption).trigger('change');

          var newOption = new Option(data.style, data.style, true, true);
          $('#F4801_DL01').append(newOption).trigger('change');

          color_option = ``
          for (let i = 0; i < data.wo_information.length; i++) {
            color_option += `<option value="`+data.wo_information[i].color+`">`+data.wo_information[i].color+`</option>`
          }
          $('#F560020_SEG4').html(color_option)

          wo_size = ``
          for (let i = 0; i < data.wo_size.length; i++) {
            var number = i+1
            wo_size += `<div class="col-xl-3 col-lg-6">
                          <div class="input-group mb-3 mt-2">
                            <div class="input-group-prepend">
                            <span class="input-group-select" for="`+data.wo_size[i].size+`">Size `+data.wo_size[i].size+`</span>
                            </div>
                            <input type="hidden" name="size[]" value="`+data.wo_size[i].size+`">
                            <input type="text" class="form-control border-input ratio-reject" id="`+data.wo_size[i].size+`" name="ratio[]" value="0" onkeyup="sum();" required>
                          </div>
                        </div>` 
          }
          $('#F560020_SIZE55').html(wo_size)

          wo_reject = ``
          for (let i = 0; i < data.wo_size.length; i++) {
            var number = i+1
            wo_reject += `<div class="col-xl-3 col-lg-4">
                            <span class="general-identity-title">Size</span>
                            <div class="input-group mb-3 mt-2">
                              <div class="input-group-prepend">
                                <span class="input-group-select-size" for="reject`+number+`">`+data.wo_size[i].size+`</span>
                              </div>
                               <input type="text" class="form-control border-input reject-size" name="reject[]" value="0" onkeyup="sum_reject();" required>
                            </div>
                          </div>
                          <div class="col-xl-9 col-lg-8">
                            <span class="general-identity-title">Select Reason</span>
                            <div class="input-group mb-3 mt-2">
                              <div class="input-group-prepend">
                                <span class="input-group-select" for="inputGroupSelect01">Choose</span>
                              </div>
                               <select class="custom-select" name="reason[]" id="nama_riject`+number+`">
                                <option disabled selected>Select Reason</option>
                              @foreach($nama as $key => $value)
                                <option value="{{$value->nama_riject}}">{{$value->nama_riject}}</option>
                              @endforeach
                            </select>
                            </div>
                          </div>`
            }
            $('#wo_reject').html(wo_reject)

          // buyer = F0101_ALPH
          // style = F4801_DL01
          // color = F560020_SEG4
          // size = F560020_SIZE55

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }
    $('.select2bs4').change(function(){
      id_wo = $(this).val()
      console.log(id_wo)
      showWoInformation(id_wo)
    })

    $('.store-wo-information').click(function(){
      storeWoInformation()
    })

    function storeWoInformation() {
      $.ajax({
        data: $('#formWoInformation').serialize(),
        url: '{{ route("RejectCutting.store-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {     
          $('#myModal').modal('hide')
        },
        error: function (data) {
          $('#myModal').modal('hide')
        }
      });
    }

    $(".ratio-reject").keyup(function(){
      var value = []
      $('.ratio-reject').each(function() { 
        value.push($(this).val()); 
      });
      console.log(value)
    });
</script>