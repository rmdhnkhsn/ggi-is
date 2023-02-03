@include('audit.Uji_TF.layouts.header')
@include('audit.Uji_TF.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                       
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="card-header">
                                <h3 class="card-title">Konfirmasi Temuan</h3>
                            </div>
                            <div class="card-body">
                           
                                    @csrf
                                    @include('audit.Uji_TF.UjiTF.partials.edit-control', ['submit' => 'Submit'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('audit.Uji_TF.layouts.footer')

<script>
$('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $(document).ready(function () {
/* When click New customer button */
$('#diterima').click(function () {
$('#btn-save').val("create-customer");
$('#customer').trigger("reset");
$('#title').html("Konfirmasi Diterima");
$('#Status_diterima').modal('show');
});

$('#dipertimbangkan').click(function () {
$('#btn-save').val("create-customer");
$('#customer').trigger("reset");
$('#titledone').html("Konfirmasi Dipertimbangkan");
$('#Status_dipertimbangkan').modal('show');
});

$('#diterima2').click(function () {
$('#btn-save').val("create-customer");
$('#customer').trigger("reset");
$('#title').html("Konfirmasi Diterima");
$('#Status_diterima2').modal('show');
});

$('#update').click(function () {
$('#btn-save').val("create-customer");
$('#customer').trigger("reset");
$('#titledone').html("Konfirmasi diterima");
$('#update_jde').modal('show');
});
});
 </script>
