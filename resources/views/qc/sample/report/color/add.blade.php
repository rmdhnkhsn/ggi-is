@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @include('qc.sample.layouts.stepbar')
                        </div>
                        <div class="card-body" style="overflow:auto;">
                            <div class="col-12 justify-sb my-3">
                                    <div class="title-18">Color List</div>
                                    <button id="addRow" type="button" class="btn btn-primary">Item<i class="fs-18 ml-2 fas fa-plus"></i> </button>
                            </div>
                            <form action="{{ route('sample_color.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    @include('qc.sample.report.color.partials.form-control', ['submit' => 'Create'])
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
    // report_id
    let id_report = document.getElementById("si_report").value;
    console.log(id_report); 
    $("#addRow").click(function () {
        console.log('berhasil');
        var html = '';
            html +='<div class="row hapusRow" id="inputFormRowWO">' ;
            html +='<div class="col-6">' ;
            html +='<div class="form-group">' ;
            html +='<label for="roll"></label>' 
            html +='<input type="text" class="form-control" id="description" name="color[]" oninput="this.value = this.value.toUpperCase()" value="" placeholder="Insert Color">' ;
            html +='<input type="hidden" class="form-control" name="report_id[]" value="'+id_report+'" placeholder="Insert Item Code">' ;
            html +='</div>' ;
            html +='</div>' ;
            html +='<div class="col-5">' ;
            html +='<div class="form-group">' ;
            html +='<label for="roll"></label>' 
            html +='<input type="number" step="0.01" class="form-control" id="pack" name="pack[]" value="" placeholder="Insert Pack">' ;
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