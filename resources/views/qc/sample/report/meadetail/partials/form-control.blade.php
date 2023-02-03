<div class="row">
    <div class="col-lg-12">
        <div class="card-body table-responsive p-0" style="height: 450px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    @include('qc.sample.report.meadetail.partials.form-standar')
                </thead>
                <tbody>
                    @include('qc.sample.report.meadetail.partials.form-table')
                </tbody>
            </table>
        </div>
    </div>
</div><br>
<button type="submit" class="btn btn-success btn-block">{{$submit}}</button>
