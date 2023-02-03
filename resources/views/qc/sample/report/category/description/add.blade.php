@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 justify-sb my-3">
                                    <div class="title-18">Description List</div>
                                    <button id="addRow" type="button" class="btn btn-primary">Item<i class="fs-18 ml-2 fas fa-plus"></i> </button>
                                </div>
                                <!-- <div class="col-1">
                                    <button id="addRow" type="button" class="btn btn-primary justify-end"><i class="fas fa-plus"></i> </button>
                                </div> -->
                                <form action="{{ route('description_item.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('qc.sample.report.category.description.partials.form-add', ['submit' => 'Create'])
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
</script>
<!-- cari buyer  -->
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
</script>
<!-- add row item  -->
<script>
    // item_id
    let id_item = document.getElementById("si_item").value;
    // console.log(id_item); 
    $("#addRow").click(function () {
        var html = '';
            html +='<div class="row hapusRow" id="inputFormRowWO">' ;
            html +='<div class="col-11">' ;
            html +='<div class="form-group">' ;
            html +='<label for="roll"></label>' 
            html +='<input type="text" class="form-control" id="description" name="description[]" oninput="this.value = this.value.toUpperCase()" value="" placeholder="Insert Item Code">' ;
            html +='<input type="hidden" class="form-control" name="item_id[]" value="'+id_item+'" placeholder="Insert Item Code">' ;
            html +='</div>' ;
            html +='</div>' ;
            html +='<div class="col-1">';
            html +='<button id="removeRowWO" type="button" class="btn btn-danger" style="margin-top:1.5rem"><i class="fs-20 far fa-times-circle"></i></button>'; 
            html +='</div>';      
            html +='</div>';
                        
        $('#newRow').append(html);
    });

    //   remove row
    $(document).on('click', '#removeRowWO', function () {
        $(this).closest('#inputFormRowWO').remove();
    });
</script>
