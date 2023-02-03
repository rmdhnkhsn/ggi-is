<div class="row">
    <div class="col-lg-12">
        <div class="card-body table-responsive p-0" style="height: 200px;">
            <table class="table table-hover text-nowrap">
                <thead>
                    @include('qc.sample.report.meadetail.partials.form-standar')
                </thead>
                <tbody>
                    @include('qc.sample.report.meadetail.partials.form-table_edit')
                </tbody>
            </table>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-success btn-block">{{$submit}}</button>
