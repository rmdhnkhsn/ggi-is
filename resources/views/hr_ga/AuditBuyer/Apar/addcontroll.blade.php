@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">


<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush

@section("content")
    <div class="content-wrapper f-poppins">
        <section class="content-header">
            <div class="container-fluid">
                @include('hr_ga.AuditBuyer.Apar.partials.form-control',['submit' => 'Like'])
            </div>
        </section>  
    </div>
    @endsection

@push("scripts")
<script>
    $(document).ready(function () {

    /* When click New customer button */
    $('#pending').click(function () {
    $('#btn-save').val("create-customer");
    $('#customer').trigger("reset");
    $('#title').html("Ticket Pending");
    $('#Status_pending').modal('show');
    });

    });
    $('#reservationdate').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
        });
</script>

<script>
    $(function(){
        var requiredCheckboxes = $('.options :checkbox[required]');
        requiredCheckboxes.change(function(){
            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });
</script>
@endpush