@include('indah.layouts.header')
@include('indah.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">
                                        @include('indah.vote.partials.form-control',['submit' => 'Like'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('indah.layouts.footer')

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

</script>