@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create New Report</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('qr.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('qc.sample.report.partials.form-control', ['submit' => 'Create'])
                                </form>
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                                    <button type="button" class="close" data-dismiss="alert">×</button>   
                                    <center> 
                                    <strong>{{ $message }}</strong>
                                    </center>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.sample.layouts.footer')
<script>
$('#reservationdate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});
$('.select2bs4_buyer').select2({
    theme: 'bootstrap4'
})
</script>
<!-- cari buyer 
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.select2bs4_add').select2({
        theme: 'bootstrap4',
        minimumInputLength: 3,
        ajax: {
        type: "POST",
        url: '{{ route("savingCost.search_buyer") }}',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                buyer: params.term // search term
            };
        },
        processResults: function (response) {
            console.log(response)
            return {
                results: response
            };
        },
        cache: true
        }
    })
    $('.select2bs4_add').on('select2:select', function (e) {
        e.preventDefault();
        var data = e.params.data;
        $('#buyer_name').val(data.text);
    });
</script> -->

<!-- cari buyer  -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#category_buyer').change(function(){
        var ID = $(this).val();    
        console.log(ID);
        if(ID){
            $.ajax({
            data: {
                ID: ID,
            },
            url: '{{ route("sample.cari_buyer") }}',           
            type: "post",
            dataType: 'json',    
                success:function(res){ 
                    res.unshift({id : 0, category_id : 0, kode_buyer : 0, nama_buyer : 'Select Buyer'})           
                    if(res){
                        $("#buyer_cari").empty();
                        $("#buyer_cari").append('');
                        i=0;
                        $.each(res,function(){
                            console.log(res[i].nama_item);
                            // $("#buyer_cari").append('<option value="'+res[i].kode_buyer+'">'+res[i].nama_buyer+'</option>');
                            $("#buyer_cari").append(`<option value="`+res[i].kode_buyer+`" ${ res[i].kode_buyer == '0' && 'selected disabled' }>`+res[i].nama_buyer+`</option>`);
                            i+=1;
                        });
                    }else{
                        $("#buyer_cari").empty();
                    }
                }
            });
        }else{
            $("#buyer_cari").empty();
        }      
    });
    $('.select2bs4_buyer').on('select2:select', function (e) {
        e.preventDefault();
        var data = e.params.data;
        $('#buyer_name').val(data.text);
    });
</script>

<!-- cari item -->
<script>
    $('#buyer_cari').change(function(){
        var ID = $(this).val();    
        console.log(ID);
        if(ID){
            $.ajax({
            data: {
                ID: ID,
            },
            url: '{{ route("sample.cari_item") }}',           
            type: "post",
            dataType: 'json',    
                success:function(res){        
                res.unshift({id : 0, buyer_id : 0, kode_item : 0, nama_item : 'Select Item'})           
                if(res){
                    $("#item_cari").empty();
                    $("#item_cari").append('');
                    i=0;
                    $.each(res,function(){
                        console.log(res[i].nama_item);
                        // $("#item_cari").append('<option value="'+res[i].id+'">'+res[i].nama_item+'</option>');
                        $("#item_cari").append(`<option value="`+res[i].id+`"  ${ res[i].id == '0' && 'selected disabled' }>`+res[i].nama_item+`</option>`);
                        i+=1;
                    });
                }else{
                    $("#item_cari").empty();
                }
                }
            });
        }else{
            $("#item_cari").empty();
        }      
    });
</script>
