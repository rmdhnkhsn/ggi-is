<div class="container-tbl-btn flex">
    <a class="btn btn-simple-info" href="{{ route('sample.detail',$value['id'])}}"><i class="fas fa-info"></i></a>
    <a  class="btn btn-simple-delete ml-1"  data-toggle="modal" data-target="#remark_cancel"><i class="fas fa-trash"></i></a>
    @include('marketing.sample_request.partials.modal.remark_cancel')
</div>