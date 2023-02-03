@extends("layouts.app")
@section("title","Data Process")
@push("styles")
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="cards p-4 o-hidden">
            <div class="row">
              <div class="col-12 justify-start gap-8">
                <div class="title-20 text-left">Data Process</div>
                <button type="button" class="icon-circle-blue" data-toggle="modal" data-target="#detailDataProses{{ $data2['id'] }}"><i class="fas fa-info"></i></button>
                    @include('production.mastersmv.partials.database_smv.detailsDataproses')
                {{-- <button type="button" class="icon-circle-blue"><i class="fas fa-info"></i></button> --}}
              </div>
            </div>
            <form  action="{{route('mastersmv.storeSmvChild')}}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id_header" value="{{ last(request()->segments()) }}">
                <input type="hidden"  name="buyer" value="{{ $data2['buyer'] }}">
                <input type="hidden"  name="style" value="{{ $data2['style'] }}">
                <input type="hidden"  name="item" value="{{ $data2['item'] }}">
                <input type="hidden" class="allowance" name="allowance" value="{{ $data2['allowance'] }}">
                <input type="hidden" class="manpowerHeader" name="manpower" value="{{ $data2['manpower'] }}">
               <input type="hidden" id="JmlRow" name="JmlRow" value="0">
               <input type="hidden" id="targets" name="targets" value="0">
                <div class="row">
                    <div class="col-12">
                        {{-- <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button> --}}
                        <div class="cards-scroll scrollX" id="scroll-bar">
                            <table id="DTtable" class="table tbl-content-center no-wrap">
                                <thead>
                                    <tr>
                                        <th></th>
                                        {{-- <th style="padding-bottom:2rem">NO</th> --}}
                                        <th style="padding-bottom:2rem">PROCESS OF GARMENT</th>
                                        <th style="padding-bottom:2rem">CAT</th>
                                        <th>CYCLE<br/>TIME<br/>(Second)</th>
                                        <th class="pb-4">SMV<br/>(Minute)</th>
                                        {{-- <th style="padding-bottom:2rem">TARGET</th> --}}
                                        <th>PRD ON<br/>CAPACITY<br/>(pcs/hour)</th>
                                        <th>MANPOWER<br/>NEED<br/>(Operator)</th>
                                        <th class="pb-4">ACTUAL MP<br/>(Operator)</th>
                                        <th>WORKING<br/>TIME<br/>(hour/opt)</th>
                                        <th>BALANCE<br/>WORKING<br/>TIME (hour/opt)</th>
                                        <th>ACTUAL M'C<br/>(hour/opt)<br/></th>
                                        <th style="padding-bottom:2rem">ATTACHMENT</th>
                                        <th style="padding-bottom:2rem">MACINE</th>
                                    
                                    </tr>
                                </thead>
                            </table> 
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 mb-2">
                                <div class="title-14-dark2">Add data from existing process</div>
                            </div>
                            
                            <div class="col-md-3 mb-2">
                                <a href="#" class="btn-outline-blue-md">Add Collumn <i class="fs-18 ml-2 fas fa-plus"></i></a>
                            </div>
                            <div class=" col-md-6 mb-2">
                                <div class="input-group flex">
                                    <div class="input-group-prepend">
                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-database"></i></span>
                                    </div>
                                    <select class="form-control border-input2 select2bs4" id="nama_proses" style="cursor:pointer">
                                        <option value="" selected>Pilih Proses</option>
                                        @foreach($MasterSmv as $key => $value)
                                            <option name="id" value="{{$value['nama_proses']}}">{{$value['nama_proses']}}-{{$value['style']}}-{{$value['smv_minute']}}</option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <button type="submit" class="btn-blue-md saveAll w-100">Save All <i class="fs-18 ml-2 fas fa-save"></i></button>
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
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script>
  $('.saveAll').on('click', function (event) {
    swal({
      position: 'center',
      icon: 'success',
      title: 'Successfully',
      text: 'SMV data Sucessfully Created.',
      buttons: false,
      timer: 2000
    })
  });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>

<script>
	$().ready(function(){
        var table = $('#DTtable').DataTable({
            // scrollX : '100%',
            "pageLength": 15,
            "dom": '<"search"><"top">rt<"bottom"><"clear">'
        });
        $(".dataTables_empty").empty();

	});
</script>

<script>
    var JmlRow = 0;
    var record_id = 1
    $('#DTtable').on('click', '.btn-delete-row2', function () {
        $(this).closest('tr').remove();
    })
    $('.btn-outline-blue-md').click(function () {
        JmlRow++
        var rand = JmlRow
        record_id =JmlRow
        $("#JmlRow").val(JmlRow)
        $('#DTtable').append(
            '<tr><td><button type="button" class="btn-delete-row2 container-tbl-btn"><i class="far fa-times-circle"></i></button></td><td><input type="text" class="form-control borderInput container-tbl-btn nama_proses2" name="nama_proses[]" style="width:190px"></td><td><select class="form-control borderInput select2bs4 pointer container-tbl-btn" id="cat" name="cat[]" style="width:160px"><option selected>Select CAT</option><option name="cat[]" value="M">M</option><option name="cat[]" value="Iron">Iron</option><option name="cat[]" value="Helper">Helper</option><option name="cat[]" value="B">B</option><option name="cat[]" value="QC">QC</option></select></td><td><input type="text" class="form-control borderInput container-tbl-btn cycle_time cycle_timerecord'+rand+'" data-record_id="'+rand+'" name="cycle_time[]" onchange=hitung(this,'+rand+') id="cycle_time'+rand+'" ></td><td><input type="text" class="form-control borderInput container-tbl-btn smv_minute smv_minuterecord'+rand+'" data-record_id="'+rand+'" name="smv_minute[]"></td><td style="display:none;"><input type="hidden" class="form-control borderInput container-tbl-btn target targetrecord'+rand+'" data-record_id="'+rand+'" name="target[]" onchange="onTes(this)" readonly></td></td><td><input type="text" class="form-control borderInput container-tbl-btn pardOncapacity pardOncapacityrecord'+rand+'" data-record_id="'+rand+'" name="prd_on_capacity[]" readonly></td><td style="display:none;"><input type="text" class="form-control borderInput container-tbl-btn output_pj output_pjrecord'+rand+'" data-record_id="'+rand+'" name="output_pj[]" readonly></td><td><input type="text" class="form-control borderInput container-tbl-btn manpower manpowerrecord'+rand+'" data-record_id="'+rand+'" name="manpower_need[]" readonly></td><td><input type="text" class="form-control borderInput container-tbl-btn actualMP actualMPrecord'+rand+'" data-record_id="'+rand+'" name="actual_mp[]" readonly><td><input type="text" class="form-control borderInput container-tbl-btn workingTime workingTimerecord'+rand+'" data-record_id="'+rand+'" name="working_time[]"readonly></td><td><input type="text" class="form-control borderInput container-tbl-btn workingBalance workingBalancerecord'+rand+'" data-record_id="'+rand+'" name="working_balance[]" readonly></td><td><input type="text" class="form-control borderInput container-tbl-btn actualUnit actualUnitrecord'+rand+'" data-record_id="'+rand+'" name="actual_unit[]" readonly></td><td><input type="text" class="form-control borderInput container-tbl-btn" name="attachment1[]"></td><td><input type="text" class="form-control borderInput container-tbl-btn mesin" name="mesin[]" style="width:150px"></td><td style="display:none;"><input type="hidden" name="user[]" value="{{ auth()->user()->nik }}"></td></tr>')
        // onKeyUp()
    });

</script>
<script>
      $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       
      });
  /* When click New customer button */
   $('.btn-outline-blue-md').trigger( "click" );
      
    });

    $('#nama_proses').change(function(){
        const tbody = document.getElementsByTagName('tbody')[0];
        let namaProses = tbody.lastChild.getElementsByClassName('nama_proses2')[0];
        let cycle_time = tbody.lastChild.getElementsByClassName('cycle_time')[0];
        let smv_minute = tbody.lastChild.getElementsByClassName('smv_minute')[0];
        let allowance  = tbody.lastChild.getElementsByClassName('allowance')[0];
        let prd_on_capacity  = tbody.lastChild.getElementsByClassName('prd_on_capacity')[0];
        let mesin  = tbody.lastChild.getElementsByClassName('mesin')[0];
        let target  = tbody.lastChild.getElementsByClassName('target')[0];
        let pardOncapacity  = tbody.lastChild.getElementsByClassName('pardOncapacity')[0];
        var nama_proses = $(this).val();
        // console.log(nama_proses)
         if(nama_proses){
          $.ajax({
          data: {
            nama_proses: nama_proses,
          },
          url: '{{ route("mastersmv.getDatabaseSMV") }}',           
          type: "post",
          dataType: 'json',
          success: function (data) {   
            namaProses.value = data.nama_proses
            cycle_time.value = data.cycle_time

            // var smv_minute = data.cycle_time*60
            smv_minute.value = data.smv_minute
            // $('.smv_minuterecord'+record_id+'').val(smv_minute);

            mesin.value = data.mesin

            var total_size =$('.smv_minute').val()
            var pardOfcapacity =  60/total_size ;

            var pardOfcapacity = pardOnCapacityNew(data.smv_minute)
            $('.pardOncapacityrecord'+record_id+'').val(pardOfcapacity);
            // var cycle_time = $('.cycle_time').val();
            // var allowance = $('.allowance').val();
            // var jumlah = (cycle_time / 60);
            // var allowancejumlah = (allowance/100 + 1);
            // var total = jumlah * allowancejumlah;
            // $('.smv_minute').val(total);
            // var target  = $('.target').val();
            // var pardOnCapacity2 = pardOnCapacityNew(data.smv_minute)
            // var manPowerNeed = ( target/ pardOnCapacity2);
            // console.log(manPowerNeed)

            // $('.manpowerrecord'+record_id+'').val(manPowerNeed);
            // var target  = $('.target').val();
            // var pardOnCapacity2 = pardOnCapacityNew(data.smv_minute)
            // var manPowerNeedactualMp = ( target/ pardOnCapacity2);
            // $('.actualUnitrecord'+record_id+'').val(actualMP);
            // $('.actualMPrecord'+record_id+'').val(actualMP);

            //  var wrokingTime = workingTime()
            // var wrokingBalance = 8 - wrokingTime;

            // var target  = $('.target').val();
            // var production =pardOnCapacityNew(data.smv_minute)
            // var actual_mv = actualMP()
            // var wrokingTime =target*8 ;
            // var wrokingTimeactual =production*actual_mv;
            // var wrokingTimeTotal =wrokingTime/wrokingTimeactual ;
            // var target =sumTotalTarget();
            // $('.target').val(target); 
            // sumTotalTarget()
            sumTotalTarget();
            hitung();
            $('#targets').val(target).trigger("change");
          },

        });
      }
    });
</script>
<script type="text/javascript">
    function pardOnCapacity() {
        var smv_minute  = $('.smv_minute').val();
        var cycle_time = $('.cycle_time').val();
        // console.log(smv_minute)
        var pardOncapacity = $('.pardOncapacity').val();
        var pardOfcapacity =  60/smv_minute ;
        return pardOfcapacity.toFixed(0) 
    }

    function pardOnCapacityNew(smv_minute) {
        var pardOfcapacity =  60/smv_minute ;
        return pardOfcapacity.toFixed(0) 
    }

    function smvMinuteNew(cycle_time,allowance){
        var cycle_time = $('.cycle_time').val();
        var allowance = $('.allowance').val();
        var jumlah = (cycle_time / 60);
        var allowancejumlah = (allowance/100 + 1);
        var total = jumlah * allowancejumlah;
        return total.toFixed(3)
    }
    function manPowerNeed() {
        var target  = $('.target').val();
        var pardOnCapacity2 =  pardOnCapacityNew(smv_minute)
        var manPowerNeed = ( target/ pardOnCapacity2);
        return manPowerNeed.toFixed(1) 
    }
    function actualMP() {
        var target  = $('.target').val();
        var pardOnCapacity2 =  pardOnCapacity()
        var manPowerNeedactualMp = ( target/ pardOnCapacity2);
        return manPowerNeedactualMp.toFixed(0) 
    }
    function workingTime() {
        var target  = $('.target').val();
        var production = pardOnCapacity()
        var actual_mv = actualMP()
        var wrokingTime =target*8 ;
        var wrokingTimeactual =production*actual_mv;
        var wrokingTimeTotal =wrokingTime/wrokingTimeactual ;
        
        return wrokingTimeTotal.toFixed(1) 
    }
    function workingBalance() {
        var wrokingTime = workingTime()
        var wrokingBalance = 8 - wrokingTime;
        
        return wrokingBalance.toFixed(1)
    }

    var target = 0; 

    function sumTotalTarget() {
        var total_target = 0;
        $('.smv_minute').each(function(){
            total_target += parseFloat(this.value);
        });

        var manpowerHeader =$('.manpowerHeader').val()
        var targetperhourse = 60 * manpowerHeader;
        var TotalTarget = targetperhourse / total_target;

        target = TotalTarget.toFixed(0); 
        
    }
    function triggerCT() {
         $(".cycle_time").each(function(){
           
           var record_id  = $(this).data("record_id")
            $("#"+record_id).trigger("change");
         })
    }
    var trgetVal = 0;

    $('#targets').change(function() {
        if (trgetVal != this.value){
            trgetVal = this.value
             $(".cycle_time").each(function(){
                var record_id  = $("#"+this.id).val()
                $("#"+this.id).trigger("change")
            })
        }
        
    });
    function hitung(data,index, type){
        // var record_id = $(data).data("record_id")
        var record_id = index
      
            var smv_minute = $(".smv_minuterecord"+record_id+"").val()
            var cycle_time = $(".cycle_timerecord"+record_id+"").val()
            // var target =targetg;
            var allowance = $('.allowance').val();
            var jumlah = (cycle_time / 60);
            var allowancejumlah = (allowance/100 + 1);
            var total = jumlah * allowancejumlah;
            var smv_minute = total.toFixed(3);
            var pardOnCapacity = pardOnCapacityNew(smv_minute)
            var pardOnCapacity2 =  pardOnCapacityNew(smv_minute)
            var manPowerNeed = ( target/ pardOnCapacity2);
            var manPowerNeedToFix =manPowerNeed.toFixed(1);
            var manPowerNeedactualMp = ( target / pardOnCapacity2);
            var totalmanpower =manPowerNeedactualMp.toFixed(1);
            var actual_mv = manPowerNeedactualMp.toFixed(0);
            
            var wrokingTime =target*8 ;
            var wrokingTimeactual =pardOnCapacity*actual_mv;
            var wrokingTimeTotal =wrokingTime/wrokingTimeactual ;
            var totalWT =wrokingTimeTotal.toFixed(1); ;
            var wrokingTime = wrokingTimeTotal;
            var wrokingBalance = 8-totalWT ;
            var wrokingBalanceToFIx = wrokingBalance.toFixed(1) ;
           
            $('.target').val(target); 
            $('.pardOncapacityrecord'+record_id+'').val(pardOnCapacity);
            $('.output_pjrecord'+record_id+'').val(pardOnCapacity);
            $('.smv_minuterecord'+record_id+'').val(smv_minute);
            $('.manpowerrecord'+record_id+'').val(manPowerNeedToFix);
            $('.actualUnitrecord'+record_id+'').val(actual_mv);
            $('.actualMPrecord'+record_id+'').val(actual_mv);
            $('.workingTimerecord'+record_id+'').val(totalWT);
            $('.workingBalancerecord'+record_id+'').val(wrokingBalanceToFIx);
            sumTotalTarget();
            $('#targets').val(target).trigger("change"); 
            triggerCT();
    }
    // onKeyUp()
    // function onKeyUp(){
    // }
 </script> 
@endpush