@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush

@section("content")
        <div class="container-fluid f-poppins">
            @include('hr_ga.AuditBuyer.alaram.partials.form-control',['submit' => 'Like'])
        </div>
@endsection

@push("scripts")
<script>

    $('#reservationdate').datetimepicker({
        format: 'Y-MM-DD'
        });

    $(document).ready(function () {

    /* When click New customer button */
    $('#pending').click(function () {
    $('#btn-save').val("create-customer");
    $('#customer').trigger("reset");
    $('#title').html("Ticket Pending");
    $('#Status_pending').modal('show');
    });

    });
    $('.finalpost').click(function (e){
        e.preventDefault();
        let form = $(this).parents('form');
        swal({
            title: 'Are you sure?',
            text: 'Before post please recheck all transaction and your closing balance is correct, As you cannot alter/delete the transaction after post?',
            icon: 'warning',
            buttons: ["Make Changes", "Yessss!"],
        }).then(function(value) {
            if(value){
                form.submit();
            }
        });
    });
</script>
@endpush
