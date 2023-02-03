@extends("layouts.app")
@section("title","Factory Audit")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/assets3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push("sidebar")
  @include('qc.factory_audit.layouts.navbar')
@endpush

@section("content")
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <span class="main-title">Packing Audit</span>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-10" style="margin: 0 auto;float: none;margin-bottom: 10px;">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Select Factory</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select" for="F0101_ALPH">Factory</span>
                                    </div>
                                    <select class="form-control select2bs4" id="factory" name="factory">
                                        <option  selected> </option>
                                        @foreach($dataBranch as $key => $value)
                                        <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Select PO Number</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select-GI" for="F560020_SEG4">PO</span>
                                    </div>
                                    <select class=" form-control  select-wo select2bs4" id="F4801_VR01" name="F4801_VR01">
                                        <option  selected> </option>
                                        @foreach($dataWO as $key => $value)
                                        <option value="{{$value->F4801_VR01}}">{{$value->F4801_VR01}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title" for="F0101_ALPH">Buyer</span>
                                <div class="input-group mb-3 mt-2">
                                    <input type="text" class="form-control border-input" id="F0101_ALPH" name="buyer" placeholder="Buyer" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Style</span>
                                <div class="input-group mb-3 mt-2">
                                    <input type="text" class="form-control border-input" id="style" name="style" placeholder="style" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Article</span>
                                <div class="input-group mb-3 mt-2">
                                
                                    <input type="text" class="form-control border-input" id="article" name="article" placeholder="article" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Color</span>
                                <div class="input-group mb-3 mt-2">
                                    
                                    <input type="text" class="form-control border-input F560020_SEG4 js-example-basic-multiple" name="states[]" multiple="multiple"  id="F560020_SEG4" name="color" placeholder="color">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Shipment Periode/ TOD</span>
                                <div class="input-group mb-3 mt-2">
                                
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <div class="input-group-append " data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Tanggal</span><i class="ml-2 fas fa-caret-down"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date"  placeholder="Pilih Tanggal" required/>
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Destination</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select" for="F0116_COUN">Destination</span>
                                    </div>
                                <select class="form-control select2bs4" id="destination" name="destination">
                                    @foreach($destination as $key => $value)
                                    <option value="{{$value->F0116_COUN}}">{{$value->F0116_COUN}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <span class="general-identity-title">Auditor</span>
                            <div class="input-group mb-3 mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-select-GI" for="article">Auditor</span>
                                </div>
                                <select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple" >
                                    @foreach($dataAuditor as $key => $value)
                                    <option value="{{$value->nama_auditor}}">{{$value->nama_auditor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Order</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_order" id="F4801_UORG" name="qty_order" placeholder="QTY Order">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Per Pack</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_pack" name="qty_pack" placeholder="QTY Per Pack ">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Per Carton</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_carton" name="qty_carton" placeholder="QTY Per Carton">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">Total QTY Carton</span>
                                <div class="field mt-2">
                                    <input type="text" class="total_carton" name="total_carton" placeholder="Total QTY Carton">
                                </div>
                            </div>
                        </div>
                    <!-- end card body-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push("scripts")
<script>
    ('.reservationdate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
</script>
<script>
   $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    $('.select2bs4').select2({
    theme: 'bootstrap4'
});
//     $(".js-example-placeholder-single").select2({
//     placeholder: "Select a state",
//     allowClear: true
// });
</script>
<script>
     $(document).ready(function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });

    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example1 tfoot th').each( function () {
            var title = $('#example1 thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" style="height:2em;" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#example1').DataTable(
          {
            "pageLength": 5,
            "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
          }
        );
    
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
    
    function loadColor() {
      
    }

    var wo_sizes
    function showWoInformation(id_wo, type, color) {
      $.ajax({
        data: {
          id_wo: id_wo,
        },
        url: '{{ route("FactoryAudit.show-wo-information") }}',           
        type: "post",
        dataType: 'json',            
        success: function (data) {
          $('#F0101_ALPH').empty();
          $('#F4801_DL01').empty();
          $('#F560020_SEG4').empty();
          
          var newOption = new Option(data.buyer, data.buyer, true, true);
          $('#F0101_ALPH').append(newOption).trigger('change');

          var newOption = new Option(data.style, data.style, true, true);
          $('#F4801_DL01').append(newOption).trigger('change');
          var newOption = new Option(data.style, data.style, true, true);
          $('#F560020_SEG4').append(newOption).trigger('change');

          color_option = `<option selected disabled>Select Color</option>`
          for (let i = 0; i < data.wo_information.length; i++) {
            color_option += `<option value="`+data.wo_information[i].color+`">`+data.wo_information[i].color+`</option>`
          }
        //   $('#F560020_SEG4').html(color_option)
        //   $('#update_F560020_SEG4').html(color_option)
        //   wo_sizes = data.wo_size

          if (type == 'UPDATE') {
            var wo_size_filtered = wo_sizes.filter(wo_size => wo_size.color == color)
            reloadWoSize(wo_size_filtered)
          }

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }
    $('.select-wo').change(function(){

      id_wo = $(this).val()
      console.log(id_wo)
      showWoInformation(id_wo, null, null)
    })

    $('.store-wo-information').click(function(){
      storeWoInformation()
    })

    // $('.F560020_SEG4').change(function(){ 
    //   var color = $(this).val()
    //   var wo_size_filtered = wo_sizes.filter(wo_size => wo_size.color == color)
    //   reloadWoSize(wo_size_filtered)
    // })

    function reloadWoSize(wo_size_filtered) {
 
      
      $('#F560020_DSC1').html(wo_size)
      $('#update_F560020_DSC1').html(wo_size)

      
      $('#wo_reject').html(wo_reject)
      $('#update_wo_reject').html(wo_reject)

      // for (let i = 0; i < wo_size_filtered.length; i++) {
      //   var number = i+1
      //   $('#nama_riject'+number).val(wo_size_filtered[i].reason)
        
      // }
    }
    
    $('.select-wo').change(function(){
      id_wo = $(this).val()
      console.log(id_wo)
      // showUpdateWoInformation(id_wo)
    })
</script>
@endpush