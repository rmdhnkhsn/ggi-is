<div class="modal fade" id="modal-xl" role="dialog" aria-labelledby="modal-infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:750px">
        <div class="modal-content p-4" style="border-radius:10px">
            <form id="form_wo" action="#" onsubmit="return validateMyForm();" method="post" enctype="multipart/form-data">
                @csrf
                @include('ppic.schedule.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
</div>