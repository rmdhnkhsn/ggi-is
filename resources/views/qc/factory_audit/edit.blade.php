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
            <div class="col-12 justify-center">
              <span class="fa-packing-title">Update Packing Audit</span>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <form id="formUpdateFactoryAudit" enctype="multipart/form-data">
            <input type="text" name="id_inputan" value="{{ $data->id }}" hidden>
            <div class="row">
                <div class="col-xl-9 ml-auto mr-auto">
                    <div class="cards py-5 px-4">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Select Factory</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-select" for="nama_branch">Factory</span>
                                    </div>
                                    <select class="form-control select2bs4 input-data-fa" id="factory" name="factory">
                                        <option  selected> </option>
                                        @foreach($dataBranch as $key => $value)
                                            @if ($value->nama_branch == $data->factory)
                                                <option selected value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>                                            
                                            @else
                                                <option value="{{$value->nama_branch}}">{{$value->nama_branch}}</option>                                            
                                            @endif
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
                                    <select class=" form-control select-wo select2bs4" id="F4801_VR01" name="po_number">
                                        <option  selected> </option>
                                        @foreach($dataWO as $key => $value)
                                        @if ($value->F4801_VR01 == $data->po_number)
                                            <option selected value="{{$value->F4801_VR01}}">
                                             {{$value->F4801_VR01}}</option>
                                        @else
                                            <option value="{{$value->F4801_VR01}}">
                                             {{$value->F4801_VR01}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="attr-detail-packing">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Buyer</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input buyer" name="buyer" id="F0101_ALPH" placeholder="Buyer..." readonly value="{{$data->buyer}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Style</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input type="text" class="form-control border-input style" id="F4801_DL01" name="style" placeholder="Style Name..." readonly value="{{$data->style}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Article</span>
                                    <div class="input-group mb-3 mt-2">
                                    
                                        <input type="text" class="form-control border-input article" id="F4801_LITM" name="article" placeholder="Article..." readonly value="{{$data->article}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <span class="general-identity-title">Color</span>
                                    <div class="input-group mb-3 mt-2">
                                        <input class="load-color form-control" value= "{{ $data->color }}" style="width: 550px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Shipment Periode/ TOD</span>
                                <div class="input-group mb-3 mt-2">
                                    <div class="input-group date" id="shipmentdate" data-target-input="nearest">
                                        <div class="input-group-append " data-target="#shipmentdate" data-toggle="datetimepicker">
                                            <div class="custom-calendar px-3" ><i class="fas fa-calendar-alt mr-2"></i> <span class="tgl">Date</span><i class="ml-2 fas fa-caret-down"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input input-data-fa" data-target="#shipmentdate" name="tanggal" placeholder="Pilih Tanggal" value="{{$data->tanggal}}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Destination</span>
                                <div class="input-group mb-3 mt-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-select" for="F0116_COUN">Destination</span>
                                        </div>
                                         <select class="form-control select2bs4" id="destination" name="destination" required>
                                        @foreach($destination as $key => $value)
                                        @if ($data->destination == $value->F0116_COUN)
                                            <option selected value="{{$value->F0116_COUN}}">{{$value->F0116_COUN}}</option>
                                        @else
                                            <option value="{{$value->F0116_COUN}}">{{$value->F0116_COUN}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="general-identity-title">Auditor</span>
                                <div class="input-group mb-3 mt-2">
                                    <select class="form-control input-data-fa js-example-basic-multiple" name="auditor_name[]" multiple="multiple" required>
                                        @foreach($dataAuditor as $key => $value)
                                        @foreach (json_decode($data->auditor_name) as $auditor)
                                            @if ($auditor == $value->nama_auditor)
                                                <option selected value="{{$value->nama_auditor}}">{{$value->nama_auditor}}</option>
                                            @else
                                                <option value="{{$value->nama_auditor}}">{{$value->nama_auditor}}</option>
                                            @endif                         
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Order</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_order" id="order_qty" value="{{ $data->order_qty }}" name="order_qty" placeholder="QTY Order" readonly>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Per Pack</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_pack" id="qty-pack" value="{{ $data->qty_pack  }}" name="qty_pack" placeholder="QTY Per Pack" required>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">QTY Per Carton</span>
                                <div class="field mt-2">
                                    <input type="text" class="qty_carton" id="qty_carton" name="qty_carton" value="{{$data->qty_carton}}" placeholder="QTY Per Carton" required>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <span class="general-identity-title">Total QTY Carton</span>
                                <div class="field mt-2">
                                    <input type="text" class="total_carton" id="total_carton" name="total_carton" 
                                        value="{{ $data->total_carton }}" placeholder="Total QTY Carton" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-fa-startA start-audit" id="start" name="start_time">Start Audit<i class="ml-2 fas fa-arrow-right" value="{{$data->start_time}}" required ></i></button>
                            </div>
                        </div>
                        <div class="attr-after-start-audit" hidden>
                        <div class="row mt-4">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Select AQL</span>
                                <div class="ks-cboxtags mb-3 mt-2">
                                    @if ($data->is_select_aql == 1)
                                        <input type="checkbox" checked id="checkboxOne" class="aql-adidas" name="is_select_aql" value="1">
                                    @else
                                        <input type="checkbox" id="checkboxOne" class="aql-adidas" name="is_select_aql" value="1">
                                    @endif
                                    <label for="checkboxOne">
                                        <span class="radio-desc">AQL Adidas</span>
                                        <i class="fs-18 fas fa-check"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title text-white">aql</span>
                                <div class="input-group mb-3 mt-2">
                                    <input type="text" class="form-control border-input percentage-aql" value="{{ $data->aql }}" id="" name="aql" placeholder="AQL 0%">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Sample (Carton)</span>
                                <div class="input-group mb-3 mt-2">
                                    <input type="text" class="form-control border-input sample-carton" id="sample_carton" name="sample_carton" value="{{ $data->sample_carton }}" placeholder="Sample carton..." readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Sample (Pcs)</span>
                                <div class="input-group mb-3 mt-2">
                                    <input type="text" class="form-control border-input sample_pcs" value="{{ $data->sample_pcs }}" id="sample_pcs" name="sample_pcs" placeholder="Sample pcs..." readonly>
                                </div>
                            </div>
                        </div>

                        <!-- -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="button" class="btn wp-btn-start mr-2" data-toggle="modal" data-target="#fa-add">Add
                                    <i class="fs-18 fas fa-plus"></i>
                                </button>
                                <div class="modal fade" id="fa-add" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="border-radius:10px">
                                            <div class="row">
                                                <div class="col-12 py-3 px-4">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row px-4">
                                                <div class="col-12">
                                                    <div class="wp-modal-title">Add Reject</div>
                                                </div>
                                                <div class="col-12">
                                                    <span class="general-identity-title">Remark</span>
                                                    <div class="fa-message mt-2">
                                                        <textarea placeholder="Input Remark.." name="remark" class="store-remark_name" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <span class="general-identity-title">QTY Reject</span>
                                                    <div class="input-group mb-3 mt-2">
                                                        <input type="text" class="form-control border-input store-remark_quantity" name="qty_reject" placeholder="Input Qty..." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row px-4 pb-4">
                                                <div class="col-12 text-right">
                                                    <button type="button" class="btn wp-btn-start store-remark">Save<i class="wp-icon-btn fas fa-download"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade modalUpdateRemark" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="border-radius:10px">
                                    <div class="row">
                                        <div class="col-12 py-3 px-4">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row px-4">
                                        <div class="col-12">
                                            <div class="wp-modal-title">Update Reject</div>
                                            <input type="hidden" class="update-id_remark">
                                        </div>
                                        <div class="col-12">
                                            <span class="general-identity-title">Remark</span>
                                            <div class="fa-message mt-2">
                                                <textarea placeholder="Input Remark.." class="update-remark_name"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <span class="general-identity-title">QTY Reject</span>
                                            <div class="input-group mb-3 mt-2">
                                                <input type="text" class="form-control border-input update-remark_quantity" placeholder="Input Qty..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-4 pb-4">
                                        <div class="col-12 text-right">
                                            <button type="button" class="btn wp-btn-start update-remark">Save<i class="wp-icon-btn fas fa-download"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 scrollX" id="scroll-bar">
                            <div class="col-12 text-center">
                                <table class="table table-bordered table-striped no-wrap">
                                    <thead>
                                        <tr>
                                        <th width="70%">Remark</th>
                                        <th width="15%">Quantity</th>
                                        <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="lists-remark">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Total Reject (Pcs)</span>
                                <div class="input-group mb-3 mt-2">
                                    <input type="text" class="form-control border-input total-reject-pcs" id="total_reject" name="total_reject" placeholder="Sample pcs..."readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Total Reject (Carton)</span>
                                <div class="input-group mb-3 mt-2">
                                    <input type="text" class="form-control border-input total-reject-carton" id="total_reject_carton" name="total_reject_carton" placeholder="Sample carton..." value="{{ $data->total_reject_carton }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="file-upload">
                                    <div class="image-upload-wrap-fa">
                                        <i class="icon-upload-fa fas fa-camera"></i>
                                        <button class="file-upload-btn-fa" type="button" id="file1"
                                            onclick="$('.file-upload-input-fa').trigger('click')">Open Camera</button>
                                        <input class="file-upload-input-fa" type='file' id="file1" name="file1"
                                            onchange="readURL_fa(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <h5>or select from galery</h5>
                                        </div>
                                    </div>
                                    <div class="file-upload-content-fa">
                                        <img class="file-upload-image-fa" src=" " alt=" Image Format Only" data-toggle="lightbox" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload_fa()" class="remove-image2"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="file-upload">
                                    <div class="image-upload-wrap-fa2">
                                        
                                        @if ($data->photo_2)
                                            <img src="{{ url("file_factory/$data->photo_2") }}" class="img img-responsive" height="196px" width="215px">                                                
                                        @else
                                            <button class="file-upload-btn-fa2" type="button" id="file2" name="file2"
                                            onclick="$('.file-upload-input-fa2').trigger( 'click' )"><i
                                                class="fas fa-plus"></i></button>
                                            <input class="file-upload-input-fa2" type='file' id="file2" name="file2" value=""
                                            onchange="readURL_fa2(this);" accept="image/*" />
                                        @endif
                                        
                                    </div>
                                    <div class="file-upload-content-fa2">
                                        <img class="file-upload-image-fa2"
                                            src="" alt=" Image Format Only"
                                            data-toggle="lightbox" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload_fa2()" class="remove-image2"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="file-upload">
                                    <div class="image-upload-wrap-fa3">
                                        
                                        @if ($data->photo_3)
                                            <img src="{{ url("file_factory/$data->photo_3") }}" class="img img-responsive" height="196px" width="215px">                                                
                                        @else
                                            <button class="file-upload-btn-fa3" type="button" id="file3" name="file3"
                                            onclick="$('.file-upload-input-fa3').trigger( 'click' )"><i
                                                class="fas fa-plus"></i></button>                                       
                                            <input class="file-upload-input-fa3" type='file' id="file3" name="file3" value=""
                                            onchange="readURL_fa3(this);" accept="image/*" />
                                        @endif
                                        
                                    </div>
                                    <div class="file-upload-content-fa3">
                                        <img class="file-upload-image-fa3"
                                            src="" alt=" Image Format Only"
                                            data-toggle="lightbox" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload_fa3()" class="remove-image2"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="file-upload">
                                    <div class="image-upload-wrap-fa4">
                                        
                                        @if ($data->photo_4)
                                            <img src="{{ url("file_factory/$data->photo_4") }}" class="img img-responsive" height="196px" width="215px">                                                                   
                                        @else
                                            <button class="file-upload-btn-fa4" type="button" id="file4" name="file4"
                                            onclick="$('.file-upload-input-fa4').trigger( 'click' )"><i
                                                class="fas fa-plus"></i></button>
                                            <input class="file-upload-input-fa4" type='file' id="file4" name="file4" value=""
                                                onchange="readURL_fa4(this);" accept="image/*" />
                                        @endif
                                        
                                    </div>
                                    <div class="file-upload-content-fa4">
                                        <img class="file-upload-image-fa4"
                                            src="" alt=" Image Format Only"
                                            data-toggle="lightbox" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload_fa4()" class="remove-image2"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title">Result</span>
                                <div class="wrapper-radio mb-3 mt-2">
                                    <input type="radio" name="result" value="PASS" class="result-radio result-passed" id="RPass">
                                    <label for="RPass" class="option option-pass">
                                        <span class="radio-desc">Audit Passed</span>
                                        <i class="f-18 icon-radio fas fa-check"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <span class="general-identity-title text-white">Result</span>
                                <div class="wrapper-radio mb-3 mt-2">
                                    <input type="radio" name="result" value="Fail" class="result-radio result-failed" id="RFail">
                                    <label for="RFail" class="option option-fail">
                                        <span class="radio-desc">Audit Failed</span>
                                        <i class="f-18 icon-radio fas fa-times"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span class="general-identity-title">Auditor Signature</span>
                                <div class="fa-message mt-2">
                                    <div class="col-md-12">
                                        <br>
                                        <img src="{{ url("signature/$data->signature") }}" class="img img-responsive">                                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="general-identity-title">SPV Signature</span>
                                <div class="fa-message mt-2">
                                    <div class="col-md-12">
                                            <br>
                                        <img src="{{ url("signature_spv/$data->signature_spv") }}" class="img img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-6 col-lg-6">
                            <div class="fa-cards flex">
                                <div class="fa-start-time">
                                    Start Time
                                </div>
                                <div class="fa-start-desc start-audit-time"> <!-- menampilkan tanggal ketika start-->
                                    
                                </div>
                                <input type="hidden" name="start_audit" class="start-audit">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="fa-cards flex">
                                <div class="fa-proses-time">
                                    Process Time
                                </div>
                                <div class="fa-proses-desc" ><!-- menampilkan waktu ketika start dimulai-->
                                    <div id="timer">
                                        <span id="hours">00:</span>
                                        <span id="mins">00:</span>
                                        <span id="seconds">00</span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-fa-finish store-factory-audit save" id="finish_time" class="finish_time">Finish<i class="ml-3 fs-20 fas fa-arrow-right"></i></button> <!-- menampilkan waktu berhenti ketika start dan menyimpan data-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection

@push("scripts")
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
      $('#shipmentdate').datetimepicker({
        format: 'DD-MM-Y',
        showButtonPanel: true
    });
</script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature").val('');
    });
</script>
<script>
   var hours =0;
var mins =0;
var seconds =0;

$('#start').click(function(){
      startTimer();
});

$('#stop').click(function(){
      clearTimeout(timex);
});

$('#reset').click(function(){
      hours =0;      mins =0;      seconds =0;
  $('#hours','#mins').html('00:');
  $('#seconds').html('00');
});

function startTimer(){
  timex = setTimeout(function(){
      seconds++;
    if(seconds >59){seconds=0;mins++;
       if(mins>59) {
       mins=0;hours++;
         if(hours <10) {$("#hours").text('0'+hours+':')} else $("#hours").text(hours+':');
        }
                       
    if(mins<10){                     
      $("#mins").text('0'+mins+':');}       
       else $("#mins").text(mins+':');
                   }    
    if(seconds <10) {
      $("#seconds").text('0'+seconds);} else {
      $("#seconds").text(seconds);
      }
     
    
      startTimer();
  },1000);
}
    
      
</script>
<script></script>
<script>
   $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
$('.select2bs4').select2({
    theme: 'bootstrap4'
});
</script>

<!-- js inputan -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

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
            "responsive": false, 
            "lengthChange": true, 
            "autoWidth": false, 
            "scrollX": true,
            ordering: false,
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
    
    jQuery(document).ready(function($) {
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

          sum_qty_order = 0
          color_option = `<option class="form-control selected disabled> </option>`
          for (let i = 0; i < data.wo_information.length; i++) {
            sum_qty_order += parseInt(data.wo_information[i].qty_order)
            color_option += `<option value="`+data.wo_information[i].color+`">`+data.wo_information[i].color+`</option>`
          }

          $('.load-color').html(color_option)
          $('.qty_order').val(sum_qty_order)
          $('.buyer').val(data.buyer)
          $('.style').val(data.style)
          $('.article').val(data.article)
        //   $('#F560020_SEG4').html(color_option)
        //   $('#update_F560020_SEG4').html(color_option)
        //   wo_sizes = data.wo_size

        //   if (type == 'UPDATE') {
        //     var wo_size_filtered = wo_sizes.filter(wo_size => wo_size.color == color)
        //     reloadWoSize(wo_size_filtered)
        //   }

        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
      });
    }

    $('body').on('click', '.start-audit', function () {
        var current_time = moment().format('YYYY-MM-DD HH:mm:ss')
        $('.start-audit-time').html(current_time)
        $('.start-audit').val(current_time)

        $('.attr-after-start-audit').attr({ hidden: false })
        console.log(current_time)
    })

     function sumQtyCarton() {
        // qty_pack
        // qty_carton
        // total_carton
        var qty_order = $('.qty_order').val()
        var qty_pack = $('.qty_pack').val()
        var qty_carton = $('.qty_carton').val()
        var total_carton = (qty_pack*qty_carton).toFixed(2)
        return total_carton
       
        
    }
 
    function countAqlAdidas(is_adidas){
        var qty_order = $('.qty_order').val()
        if (is_adidas == true) {
            $('.percentage-aql').attr({ readonly: true })
        }else{
            $('.percentage-aql').attr({ readonly: false })
        }
        var sum_qty_carbon = $('.total_carton').val()
        var sum_qty_pcs = $('.sample_pcs').val()

        // rules
        // 1-50= 100%
        // 51-100=50%
        // >101 =20%
        if (qty_order > 0 && qty_order < 50) {
            var percentage_aql = 100
        }else if(qty_order > 51 && qty_order < 100){
            var percentage_aql = 50
        }else if(qty_order > 101){
            var percentage_aql = 20
        }else{
            var percentage_aql = 0
        }
        $('.percentage-aql').val(percentage_aql)

        var sample_carton = percentage_aql*sum_qty_carbon/100
        $('.sample-carton').val(sample_carton)

        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
        console.log(sample_carton)
        
    }
    $('body').on('change', '.aql-adidas', function () {
        if ($(this).is(':checked')) {
            var is_adidas = true
            countAqlAdidas(is_adidas);
            
        }else{
            var is_adidas = false
            countAqlAdidas(is_adidas)
            $('.percentage-aql').val('');
        }
        console.log(is_adidas)
    })

    $('body').on('keyup', '.percentage-aql', function () {
        
        var percentage_aql = $('.percentage-aql').val()
        var sum_qty_carbon = $('.total_carton').val()
        var sample_carton = percentage_aql*sum_qty_carbon/100
        $('.sample-carton').val(sample_carton)
        
        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
        
        console.log(sample_carton)
    })

function sumQtypcs() {
        // qty_pack
        // qty_carton
        // total_carton
        var sample_carton =$('.sample-carton').val()
        var qty_pack = $('.qty_pack').val()
        var qty_carton = $('.qty_carton').val()
        var sample_pcs = (sample_carton*qty_pack*qty_carton).toFixed(2)

        return sample_pcs
        
    }

    $('body').on('keyup', '.qty_pack', function () {
        var sum_qty_carton = sumQtyCarton()
        console.log(sum_qty_carton)
        $('.total_carton').val(sum_qty_carton)
        
        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
    })

    $('body').on('keyup', '.qty_carton', function () {
        var sum_qty_carton = sumQtyCarton()
        console.log(sum_qty_carton)
        $('.total_carton').val(sum_qty_carton)

        var sum_qty_pcs = sumQtypcs()
        $('.sample_pcs').val(sum_qty_pcs)
    })

    var id_inputan = "{{ collect(request()->segments())->last() }}"
    showRemark(id_inputan)
    function showRemark(id_inputan){
    console.log(id_inputan)
        $.ajax({
            data: {
                id_inputan:id_inputan,
                type:'REVISION',
            },
            url: '{{ route("FactoryAudit.show-remark") }}',           
            type: "get",
            dataType: 'json',            
            success: function (data) { 
                var qty_reject = 0
                remark = '' 
                for (let i = 0; i < data.length; i++) {
                    qty_reject += data[i].qty_reject
                    remark += 
                        `<tr>
                            <td class="text-left">`+data[i].remark+`</td>
                            <td class="">`+data[i].qty_reject+`</td>
                            <td>
                                <div class="fa-container-action">
                                    <button type="button" class="btn btn-fa-edit show-remark" 
                                        data-id_inputan="`+data[i].id_inputan+`"
                                        data-remark="`+data[i].remark+`"
                                        data-id_remark="`+data[i].id+`"
                                        data-qty_reject="`+data[i].qty_reject+`">
                                        <i class="btn-icon-edit fas fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-fa-delete delete-remark" 
                                        data-id_remark="`+data[i].id+`">
                                        <i class="btn-icon-edit fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>`
                }

                $('.lists-remark').html(remark)
                $('.total-reject-pcs').val(qty_reject)
                if (qty_reject > 0) {
                    $('.result-failed').trigger('click');
                }else{
                    $('.result-passed').trigger('click');
                }
            },
            error: function (data) {
                alert('Attention! '+data.responseText);
            }
        });
    }

    function showLoading(){
        let timerInterval
        Swal.fire({
            title: 'please wait . . .',
            html: '',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    }

    function showSuccessAlert(){
        Swal.fire({
            
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 8700
        })
    }

    function updateRemark(id_remark, remark, quantity){
        showLoading()
        $.ajax({
            data: {
                id_remark: id_remark,
                remark: remark,
                qty_reject: quantity,
            },
            url: '{{ route("FactoryAudit.updateRemark") }}',
            type: "put",
            dataType: 'json',            
            success: function (data) {
                swal.close();
                showSuccessAlert()     
                showRemark(id_inputan)
                $('.modalUpdateRemark').modal("hide")
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    $('.update-remark').click(function(){
        console.log("update")
        var id_remark = $('.update-id_remark').val()
        var remark = $('.update-remark_name').val()
        var quantity = $('.update-remark_quantity').val()
        updateRemark(id_remark, remark, quantity)
    })

    $('body').on('click', '.show-remark', function () {
        console.log("show")
        var id_remark = $(this).data("id_remark")
        var remark = $(this).data("remark")
        var quantity = $(this).data("qty_reject")

        $('.update-id_remark').val(id_remark)
        $('.update-remark_name').val(remark)
        $('.update-remark_quantity').val(quantity)

        $('.modalUpdateRemark').modal("show")
    })

    $('body').on('click', '.delete-remark', function () {
        console.log('delete')
        var id_remark = $(this).data("id_remark")
        deleteRemark(id_remark)
    })

    function deleteRemark(id_remark){
        $.ajax({
            data: {
                id_remark: id_remark,
                type: 'REVISION',
            },
            url: '{{ route("FactoryAudit.deleteRemark") }}',
            type: "post",
            dataType: 'json',            
            success: function (data) {     
                showRemark(id_inputan)
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    $('body').on('click', '.store-remark', function () {
        console.log('store')
        var remark = $('.store-remark_name').val()
        var quantity = $('.store-remark_quantity').val()

        storeRemark(remark, quantity)
    })
    
    function storeRemark(remark, qty_reject){
        $.ajax({
            data: {
                id_inputan: id_inputan,
                qty_reject: qty_reject,
                remark: remark,
                type: 'REVISION',
            },
            url: '{{ route("FactoryAudit.storeRemark") }}',
            type: "post",
            dataType: 'json',            
            success: function (data) {     
                showRemark(id_inputan)
                $('#fa-add').modal("hide")
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    $('.select-wo').change(function(){
      id_wo = $(this).val()
      console.log(id_wo)
      $('.attr-detail-packing').attr({ hidden: false })
      showWoInformation(id_wo, null, null)
    })

    $('.store-wo-information').click(function(){
      storeWoInformation()
    })

    $("#formUpdateFactoryAudit").validate({        
        submitHandler: function(form) {
            showLoading()
            var form = $('#formUpdateFactoryAudit')[0];
            var formData = new FormData(form);
            event.preventDefault();

            $.ajax({
                url: '{{ route("factory-audit.update") }}',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,                         
                type: 'post',
                success: function (data, status){
                    swal.close();
                    showSuccessAlert()     
                    location.replace("{{ url('/qcr/factory-audit/view') }}") 
                },
                error: function (xhr, desc, err){
                    alert(xhr.responseText);
                }
            });
        }        
    });

    })
</script>


<!-- end js inputan -->
<!-- js photo -->
<script>
    function readURL_fa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa").attr("src", e.target.result);
                $(".file-upload-content-fa").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa();
        }
    }

    function removeUpload_fa() {
        $('.file-upload-input-fa').replaceWith($('.file-upload-input-fa').clone());
        $('.file-upload-content-fa').hide();
        $('.image-upload-wrap-fa').show();
    }
    $('.image-upload-wrap-fa').bind('dragover', function () {
        $('.image-upload-wrap-fa').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa').bind('dragleave', function () {
        $('.image-upload-wrap-fa').removeClass('image-dropping');
    });

    // ============================
    function readURL_fa2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa2').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa2").attr("src", e.target.result);
                $(".file-upload-content-fa2").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa2();
        }
    }

    function removeUpload_fa2() {
        $('.file-upload-input-fa2').replaceWith($('.file-upload-input-fa2').clone());
        $('.file-upload-content-fa2').hide();
        $('.image-upload-wrap-fa2').show();
    }
    $('.image-upload-wrap-fa2').bind('dragover', function () {
        $('.image-upload-wrap-fa2').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa2').bind('dragleave', function () {
        $('.image-upload-wrap-fa2').removeClass('image-dropping');
    });

    // ======================================
    function readURL_fa3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa3').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa3").attr("src", e.target.result);
                $(".file-upload-content-fa3").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa3();
        }
    }

    function removeUpload_fa3() {
        $('.file-upload-input-fa3').replaceWith($('.file-upload-input-fa3').clone());
        $('.file-upload-content-fa3').hide();
        $('.image-upload-wrap-fa3').show();
    }
    $('.image-upload-wrap-fa3').bind('dragover', function () {
        $('.image-upload-wrap-fa3').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa3').bind('dragleave', function () {
        $('.image-upload-wrap-fa3').removeClass('image-dropping');
    });
    // ==================================
    function readURL_fa4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.image-upload-wrap-fa4').hide();

            reader.onload = function (e) {
                $(".file-upload-image-fa4").attr("src", e.target.result);
                $(".file-upload-content-fa4").show();
                $('.image-title').html(input.files[0]);
                // $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload_fa4();
        }
    }

    function removeUpload_fa4() {
        $('.file-upload-input-fa4').replaceWith($('.file-upload-input-fa4').clone());
        $('.file-upload-content-fa4').hide();
        $('.image-upload-wrap-fa4').show();
    }
    $('.image-upload-wrap-fa4').bind('dragover', function () {
        $('.image-upload-wrap-fa4').addClass('image-dropping');
    });
    $('.image-upload-wrap-fa4').bind('dragleave', function () {
        $('.image-upload-wrap-fa4').removeClass('image-dropping');
    });
</script>

@endpush