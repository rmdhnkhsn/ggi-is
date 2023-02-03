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
                                <h3 class="card-title">Create Item</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('item_category.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('qc.sample.report.category.item.partials.form-add', ['submit' => 'Create'])
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
